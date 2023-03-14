<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\Produit;
use App\Entity\Membre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Member extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $members = [];
        $faker = Factory::create('fr_FR'); 

        
        for ($i=0; $i < 50; $i++) { 
            $categorie = new Categorie();
            $membre = new Membre();
            $commande = new Commande();
            $produit = new Produit();

            $membre -> setPrenom($faker -> firstName());
            $membre -> setNom($faker -> lastName());
            $membre -> setEmail($faker->email());
            $membre -> setPassword($faker -> password());
            $membre -> setAdress($faker->address());
            $membre -> setVille($faker->city());
            $membre -> setCodePostal((int)$faker->postcode());
            $membre -> setPays($faker-> country());
            $membre -> setTelephone((int)$faker->phoneNumber());
            $membre -> setDateInscription(new \DateTime());

            $members[] = $membre;

            $produit -> setTitre($faker -> text());
            $produit -> setDescription($faker -> text());
            $produit -> setPrix($faker -> numberBetween(9,100));
            $produit -> setStock($faker -> numberBetween(0,100));
            $produit -> setPhoto($faker->imageUrl(640, 480, 'cats'));
            $produit -> setCreatedAt(new \DateTimeImmutable());

            $categorie -> setTitre($faker -> text());
            $categorie -> setDescription($faker -> text());
            $categorie -> setSlug('slug' . $i);

            $commande -> setMontant($faker -> numberBetween(9,100));
            $commande -> setDateEnregistrement(new \DateTime());
            $commande -> setEtat($faker->randomElement(['Expedié', 'en cours', 'livré']));

            $manager -> persist($membre);
            $manager -> persist($produit);
            $manager -> persist($commande);
            $manager -> persist($categorie);
        }

        $manager->flush();
    }
}
