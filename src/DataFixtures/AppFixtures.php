<?php 

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Rayon;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Category;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'un utilisateur admin
        $user = new User();
        $Apassword = "admin2022";
        $hashedPassword = $this->passwordHasher
            ->hashPassword($user, $Apassword);
        $user->setUsername('admin');
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        // Création des rayons
        $rayonNames = [
            'Water Sports',
            'Team Sports',
            'Outdoors',
            'Fitness & Exercice',

        ];

        foreach ($rayonNames as $rayonName) {
            $rayon = new Rayon();
            $rayon->setName($rayonName);
            $manager->persist($rayon);
        }

        // Sauvegarder les entités dans la base de donnéess
        $manager->flush();

        $category = new Category();
        $category->setName('Bande');
        $category->setRayon($rayon); // Associe la catégorie au rayon
        $manager->persist($category);

    }
}
