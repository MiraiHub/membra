<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: 'user_profiles')]
class UserProfile
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }
}