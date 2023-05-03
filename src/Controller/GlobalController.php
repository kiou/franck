<?php
namespace App\Controller;

use App\Repository\LegendeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GlobalController extends AbstractController
{
    public function index(LegendeRepository $legendeRepository)
    {
        $carte1 = $legendeRepository->findByCategory('carte 1');
        $carte2 = $legendeRepository->findByCategory('carte 2');
        $carte3 = $legendeRepository->findByCategory('carte 3');

        return $this->render('index.html.twig',[
            'action' => 'accueil',
            'carte1' => $carte1,
            'carte2' => $carte2,
            'carte3' => $carte3
        ]);
    }

}