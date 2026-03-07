<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setName('Alice');
        $user1->setAge(25);
        $user1->setEmail('alice@example.com');
        $manager->persist($user1);
        
        $user2 = new User();
        $user2->setName('Bob');
        $user2->setAge(30);
        $user2->setEmail('bob@example.com');
        $manager->persist($user2);

        $manager->flush();
    }
}
