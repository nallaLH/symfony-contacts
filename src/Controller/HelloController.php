<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
        ]);
    }
    #[Route('/hello/{name}')]
    public function world($name): Response
    {
        return $this->render('hello/world.html.twig', ['name' => $name]);
    }

    #[Route('/hello/{name}/{times}')]
    public function manyTimes($name, $times): Response
    {
        return $this->render('hello/many_times.html.twig', ['name' => $name, 'times' => $times]);
    }
}
