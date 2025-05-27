<?php
namespace App\Controller;

use App\Repository\PayementsRepository;
use App\Service\PayementService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class ExportListPayementController extends AbstractController
{
    public function __invoke(Request $request, PayementsRepository $payement, PayementService $payementService): JsonResponse
    {
        $query      = $request->query->all();

        $payements  = $payement->getListPayementUser($query);

        return new JsonResponse($payementService->generatePdf($payements));
    }
}