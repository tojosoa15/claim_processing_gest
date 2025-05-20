<?php
// src/Repository/UsersRepository.php

namespace App\Repository;

use App\Entity\VerificationsDraft;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class VerificationsDraftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VerificationsDraft::class);
    }

    public function getSummaryInDraft($query) {
        $qb = $this->createQueryBuilder('vd')
            ->select(
                'vd.id',
                'cl.number AS claim_number',
                'u.id AS user_id',
                'dsi.invoiceNumber',
                'dsi.surveyType',
                'dsi.eorValue',
                'dsi.dateOfSurvey',
                'dsi.timeOfSurvey',
                'cl.name as name_customer',
                'dvi.make',
                'dvi.model',
                'dvi.chasisiNumber',
                'dvi.pointOfImpact',
                'dvi.placeOfSurvey',
                'dvi.isTheVehicleTotalLoss',
                'dpd.costPart',
                'dpd.discountPart',
                'vat_p.vatValue AS part_vat',
                'dpd.partTotal',
                'dld.hourlyCostLabour',
                'dld.discountLabour',
                'vat_l.vatValue AS labour_vat',
                'dld.labourTotal'
            )->leftJoin('vd.claims', 'cl')
            ->leftJoin('vd.surveyor', 'u')
            ->leftJoin('vd.draftSurveyInformations', 'dsi')
            ->leftJoin('vd.draftEstimateOfRepairs', 'deor')
            ->leftJoin('deor.draftVehicleInformations', 'dvi')
            ->leftJoin('deor.draftPartDetails', 'dpd')
            ->leftJoin('dpd.draftLabourDetails', 'dld')
            ->leftJoin('dpd.vats', 'vat_p')
            ->leftJoin('dld.vats', 'vat_l');
          
        if (isset($query['claim_number'])) {
            $qb->where('cl.number = :claim_number')
                ->setParameter('claim_number', $query['claim_number']);
        }
        return  $qb->getQuery()->getResult();
    }
}