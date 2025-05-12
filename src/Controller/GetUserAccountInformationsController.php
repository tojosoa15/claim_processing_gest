<?php
namespace App\Controller;

use App\Repository\AccountInformationsRepository;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class GetUserAccountInformationsController extends AbstractController
{
    public function __construct(private Connection $connection) {}

    public function __invoke(Request $request, AccountInformationsRepository $AccountInformationsRepository) : JsonResponse
    {
        $result = $AccountInformationsRepository->getAccountInformations();
        return new JsonResponse($result);
    }
}