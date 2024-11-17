<?php

namespace App\Controller;

use App\Entity\Rayon;
use App\Entity\Category;
use App\Repository\RayonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RayonController extends AbstractController
{
    #[Route('/rayon', name: 'app_rayon')]
    public function index(): Response
    {
        // Récupérer tous les rayons depuis la base de données
        $rayons = $this->getDoctrine()->getRepository(Rayon::class)->findAll();

        return $this->render('rayon/index.html.twig', [
            'rayons' => $rayons, // Afficher tous les rayons
        ]);
    }

    #[Route('/rayon/{id}', name: 'app_rayon_show')]
    public function show(int $id, RayonRepository $rayonRepository): Response
{
    // Trouver le rayon par son ID
    $rayon = $rayonRepository->find($id);

    if (!$rayon) {
        throw $this->createNotFoundException('Rayon not found');
    }

    // Récupérer tous les produits associés au rayon
    $products = [];
    foreach ($rayon->getCategories() as $category) {
        foreach ($category->getProducts() as $product) {
            $products[] = $product;
        }
    }

    // Passer les données des produits et du rayon à la vue
    return $this->render('rayon/show.html.twig', [
        'rayon' => $rayon,
        'products' => $products, // Assurez-vous que les produits sont envoyés à la vue
    ]);
}
    #[Route('add/rayon', name: 'rayon_add')]
    public function addR(Request $req): Response
    {
        $rayon = new Rayon();
        $form = $this->createForm(RayonType::class, $rayon);
        return $this->renderForm('rayon/create.html.twig', [
            'form' => $form,
        ]);
    }
}
