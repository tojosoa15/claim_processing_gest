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

    public function findWithAccountInfo(int $id) 
    {
        $user = $this->find($id);
        dd($user->getAccountInformation()); // Vérifiez si l'objet est bien chargé
        return $user;
    }

    public function getAccountInformations() {
        $query = $this->getEntityManager()
        ->createQuery('SELECT e.id, e.businessName FROM App\Entity\AccountInformations e');
        return $query->getResult();
    }
}