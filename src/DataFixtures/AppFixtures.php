<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Article;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        //Création de 20 Users
        $users=[];
        for($i = 0; $i<20; $i++){
            $user = new User();
            $user->setNameUser($faker->lastname())
                ->setFirstnameUser($faker->firstname())
                ->setEmailUser($faker->unique()->email())
                ->setPasswordUser($faker->password(6,20))
                ->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($user);
            array_push($users,$user);
        }

        //Création de 100 Articles
        for($i=0; $i<100; $i++){
            $article = new Article();
            $article->setTitleArticle($faker->sentence())
                ->setContentArticle($faker->paragraph())
                ->setImageArticle($faker->imageUrl())
                ->setCreatedAt(new \DateTimeImmutable())
                ->setWriteBy($users[rand(0, sizeof($users) - 1)]);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
