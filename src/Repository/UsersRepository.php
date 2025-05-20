<?php
// src/Repository/UsersRepository.php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    // public function findWithAccountInfo(int $id) 
    // {
    //     $user = $this->find($id);
    //     dd($user->getAccountInformation()); // Vérifiez si l'objet est bien chargé
    //     return $user;
    // }

    public function getListUsers($query) {
        $qb = $this->createQueryBuilder('u')
            ->select(
                'u.id',
                'ac.emailAddress',
                'rl.id as role_id', 
                'rl.roleName as role_name'
            )
            ->leftJoin('u.roles', 'rl')
            ->leftJoin('u.accountInformation', 'ac');

        if (isset($query['role'])) {
            $qb->where('rl.roleCode = :role')
                ->setParameter('role', $query['role']);
        }
        
        return $qb->getQuery()
                ->getResult();
    }
}