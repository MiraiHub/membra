<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    #[ORM\ManyToOne(targetEntity: UserProfile::class)]
    #[ORM\JoinColumn(name: 'profile_id', referencedColumnName: 'id')]
    private UserProfile $profile;

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        // Validação se necessário
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email): void
    {
        // Validação de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Email inválido.');
        }
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        // A senha já deve estar criptografada
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setProfile(UserProfile $profile): void
    {
        $this->profile = $profile;
    }

    public function getProfile(): UserProfile
    {
        return $this->profile;
    }
}
