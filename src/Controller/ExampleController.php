<?php

namespace App\Controller;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Ulid;

class ExampleController extends AbstractController
{
    #[Route('/example', name: 'example')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $personId = new Ulid();

        $filter = $entityManager
            ->getFilters()
            ->enable('person_filter');
        $filter->setParameter('person_id', ($personId->toBinary() ?? ''), 'binary');

        /** @var PersonRepository $personRepository */
        $personRepository = $entityManager->getRepository(Person::class);
        $people = $personRepository->findAll();

        return $this->render('example/index.html.twig', [
            'people' => $people,
        ]);
    }
}
