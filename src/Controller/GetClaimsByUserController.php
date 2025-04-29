<?php
namespace App\Controller;

use App\Dto\GetClaimsByUserInput;
use Doctrine\DBAL\Connection;
use ApiPlatform\Metadata\Get;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Get(
    name: 'get_claims_by_user',
    uriTemplate: '/api/claims/by_user/{email}',  // Notez le /api/ prefix
    input: GetClaimsByUserInput::class
)]
class GetClaimsByUserController extends AbstractController
{
    public function __construct(private Connection $connection) {}

    public function __invoke(GetClaimsByUserInput $input): JsonResponse
    {
        // $sql = "EXEC [dbo].[GetClaimsByUser] 
        //     @email = :email,
        //     @received_date = :received_date,
        //     @number = :number,
        //     @name = :name,
        //     @registration_number = :registration_number,
        //     @agein = :agein,
        //     @phone = :phone,
        //     @status = :status";
        $sql = "EXEC [dbo].[GetClaimsByUser] 
                @email = :email";

        // try {
            $stmt = $this->connection->prepare($sql);
            
            // Bind des paramètres
            $stmt->bindValue('email', $input->email);
            // $stmt->bindValue('received_date', $input->received_date ?? 'false');
            // $stmt->bindValue('number', $input->number);
            // $stmt->bindValue('name', $input->name);
            // $stmt->bindValue('registration_number', $input->registration_number);
            // $stmt->bindValue('agein', $input->agein ?? 'false');
            // $stmt->bindValue('phone', $input->phone);
            // $stmt->bindValue('status', $input->status);

            $results = $stmt->executeQuery()->fetchAllAssociative();
            
            return new JsonResponse($results);
        // } catch (\Exception $e) {
        //     return new JsonResponse(
        //         ['error' => $e->getMessage()],
        //         400
        //     );
        // }
    }
}