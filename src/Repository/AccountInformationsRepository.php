<?php
// src/Repository/AccountInformationsRepository.php

namespace App\Repository;

use App\Entity\AccountInformations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AccountInformationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccountInformations::class);
    }

    // public function findWithAccountInfo(int $id) 
    // {
    //     $user = $this->find($id);
    //     dd($user->getAccountInformation()); // Vérifiez si l'objet est bien chargé
    //     return $user;
    // }

    public function getAccountInformations($param) {
        $qb = $this->createQueryBuilder('ac')
            ->select(
                'IDENTITY(ac.users) as user_id',
                'ac.businessName',
                'ac.businessRegistrationNumber',
                'ac.businessAddress',
                'ac.city',
                'ac.postalCode',
                'ac.phoneNumber',
                'ac.emailAddress',
                'ac.website'
            );

        // Si c'est un ID (numérique)
        if (is_numeric($param)) {
            $qb->where('ac.id = :param');
        } 
        // Sinon, traite comme un email
        else {
            $qb->where('ac.emailAddress = :param');
        }

        return $qb
            ->setParameter('param', $param)
            ->getQuery()
            ->getOneOrNullResult(); // Retourne null si non trouvé
    }
}