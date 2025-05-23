<?php

namespace App\Controller;

use App\Repository\PayementsRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class ListPayementsUsersController extends AbstractController
{
     public function __construct(private Connection $connection) {}

    public function __invoke(Request $request, PayementsRepository $payement) : JsonResponse
    {
        $query      = $request->query->all();       

        $payements  = $payement->getListPayementUser($query);

        // foreach ($payements as $payement) {
        //     $payements['dateSubmitted'] =$payement['dateSubmitted']->format('Y-M-d');
        //     $payements['payementDate'] =$payement['payementDate']->format('Y-M-d');
        // }

        return new JsonResponse($payements);
    }
}
