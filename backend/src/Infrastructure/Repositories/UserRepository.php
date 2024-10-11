<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository implements UserRepositoryInterface
{
    private string $entityClass = User::class;

    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function findById(int $id): ?User
    {
        return $this->entityManager->getRepository($this->entityClass)->find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->entityManager->getRepository($this->entityClass)->findOneBy(['email' => $email]);
    }
}