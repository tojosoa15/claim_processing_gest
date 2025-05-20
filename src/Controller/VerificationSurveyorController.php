<?php

namespace App\Controller;

use App\Repository\VerificationsDraftRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class VerificationSurveyorController extends AbstractController
{
     public function __construct(private Connection $connection) {}

    public function __invoke(Request $request, VerificationsDraftRepository $verificationDraft) : JsonResponse
    {
        $result = [];
        $query  = $request->query->all();

        $summary = $verificationDraft->getSummaryInDraft($query);

        if (!$summary) {
            return new JsonResponse(
                ['error' => 'Result not found'],
                JsonResponse::HTTP_NOT_FOUND
            );
        }
        foreach ($summary as $value) {
            $date_time_of_survey = ($value['dateOfSurvey'] ? $value['dateOfSurvey']->format('d:M:y') : null) . '-' . ($value['timeOfSurvey'] ? $value['timeOfSurvey']->format('H:i:s') : null);

            $result = [
               'claim_no' => $value['claim_number'],
               'general_information' => [
                   'name_customer'               => $value['name_customer'] ?? null ?? null,            
                   'make'                        => $value['make'] ?? null,            
                   'model'                       => $value['model'] ?? null,            
                   'chasisi_number'              => $value['chasisiNumber'] ?? null,            
                   'point_of_impact'             => $value['pointOfImpact'] ?? null,            
                   'place_of_survey'             => $value['placeOfSurvey'] ?? null,            
                   'is_the_vehicle_total_loss'   => $value['isTheVehicleTotalLoss'] ?? null            
               ],
               'survey_information' => [
                   'invoice_number'         => $value['invoiceNumber'] ?? null,            
                   'survey_type'            => $value['surveyType'] ?? null,            
                   'eor_value'              => $value['eorValue'] ?? null,            
                   'date_time_of_survey'    => $date_time_of_survey
               ],
               'repaire_estimate' => [
                    'part' => [
                        'part_cost'     => $value['costPart'] ?? null,
                        'part_discount' => $value['discountPart'] ?? null,
                        'part_vat'      => $value['part_vat'] ?? null,
                        'part_total'    => $value['partTotal'] ?? null
                    ],
                    'labour' => [
                        'lobour_cost'       => $value['hourlyCostLabour'] ?? null,
                        'labour_discount'   => $value['discountLabour'] ?? null,
                        'labour_vat'        => $value['labour_vat'] ?? null,
                        'labour_total'      => $value['labourTotal'] ?? null
                    ], 
                    'grand_total' => [
                        'part_cost'     =>($value['costPart'] ?? null) + ($value['hourlyCostLabour'] ?? null),
                        'part_discount' => ($value['discountPart'] ?? null) + ($value['discountLabour'] ?? null),
                        'part_vat'      => ($value['part_vat'] ?? null) + ($value['labour_vat'] ?? null),
                        'part_total'    => ($value['partTotal'] ?? null) + ($value['labourTotal'] ?? null),
                    ]
               ]
           ];
        }

        return new JsonResponse($result);
    }
}
