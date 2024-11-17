<?php
namespace App\Form;

use App\Entity\Category;
use App\Entity\Rayon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Ajouté pour EntityType
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name') // Champ pour le nom de la catégorie
            ->add('rayon', EntityType::class, [
                'class' => Rayon::class, // Spécifie l'entité Rayon
                'choice_label' => 'name', // Affichage du nom du rayon
                'placeholder' => 'Choisissez un rayon', // Option vide au début
            ])
            ->add('Submit', SubmitType::class); // Bouton de soumission
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class, // Associe le formulaire à l'entité Category
        ]);
    }
}
