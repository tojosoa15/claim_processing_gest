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

    public function __invoke(Request $request, AccountInformationsRepository $accountRepo) : JsonResponse
    {
        $query = $request->query->all(); // Récupère tous les paramètres GET

        // Vérifie si ni email ni id n'est fourni
        if (empty($query['email'] ?? null) && empty($query['id'] ?? null)) {
            return new JsonResponse(
                ['error' => 'Email ou identifiant obligatoire'],
                JsonResponse::HTTP_BAD_REQUEST
            );
        }

        // Si les deux sont fournis, renvoyer une erreur
        if (!empty($query['email']) && !empty($query['id'])) {
            return new JsonResponse(
                ['error' => 'Utilisez soit un email, soit un ID, pas les deux'],
                JsonResponse::HTTP_BAD_REQUEST
            );
        }

        // Récupère le paramètre (email ou ID)
        $param = $query['email'] ?? $query['id'];

        // Appelle le repository
        $account = $accountRepo->getAccountInformations($param);

        if (!$account) {
            return new JsonResponse(
                ['error' => 'Aucun compte trouvé'],
                JsonResponse::HTTP_NOT_FOUND
            );
        }

        return new JsonResponse($account);
    }
}