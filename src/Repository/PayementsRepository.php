<?php
// src/Repository/UsersRepository.php

namespace App\Repository;

use App\Entity\Payements;
use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PayementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Payements::class);
    }

    // public function findWithAccountInfo(int $id) 
    // {
    //     $user = $this->find($id);
    //     dd($user->getAccountInformation()); // Vérifiez si l'objet est bien chargé
    //     return $user;
    // }

    public function getListPayementUser($query) {
        $qb = $this->createQueryBuilder('p')
            ->select(
                'p.id',
                'p.dateSubmitted',
                'p.invoiceNum', 
                'p.claimNum',
                'p.claimAmount',
                'p.payementDate',
                'st.statusName'
            )
            ->leftJoin('p.users', 'u')
            ->leftJoin('p.status', 'st');

        // Filtre par utilisateur
        if (isset($query['user_id'])) {
            $qb->where('u.id = :user_id')
                ->setParameter('user_id', intval($query['user_id']));
        }

        // Filtre par numéro de claim
        // if (isset($query['claim_number'])) {
        //     $qb->andWhere('p.claimNum = :claim_number')
        //         ->setParameter('claim_number', $query['claim_number']);
        // }
        
        return $qb->getQuery()
                ->getResult();
    }
}