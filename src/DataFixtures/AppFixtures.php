<?php

namespace App\DataFixtures;

use App\Entity\Commande;
use App\Entity\Model;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager): void
    {
        $user=new User();
        $user->setNom("SARR");
        $user->setPrenom("Mariama");
        $user->setTelephone("783987244");
        $user->setUsername("admin");
        $user->setRoles(["ROLE_GERANTE"]);
        $password = $this->passwordEncoder->encodePassword($user,'password');
        $user->setPassword($password);

        $client=new User();
        $client->setNom("SARR");
        $client->setPrenom("Issa");
        $client->setTelephone("779455666");
        $client->setNom("Issa");
        $client->setCeintureClient("100");
        $client->setCouClient("200");
        // $client->setCouleurTissuClient("VERT");
        $client->setRoles(["ROLES_CLIENT"]);


        $model=new Model();
        $model->setLibelle("Tandance korité");
        $model->setPrix("25.000");

        $commande=new Commande();
        $commande->setModel($model);
        $commande->setPrix("50000");
        $commande->setAvance("10000");
        $commande->setNumeroCommande("234567");
        $commande->setRelicat($commande->getPrix()-$commande->getAvance());
        $commande->setNomCommande("first commande");
        $commande->setTypeCommande("Commande");
        $commande->setDateCommande("12/09/2022");
        $commande->setUser($client);
        

        $manager->persist($user);
        $manager->persist($commande);
        $manager->flush();
    }
}
