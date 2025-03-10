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
        return $this->render('hello/index.html.twig');
    }

    #[Route('/hello/{name}', priority: 1)]
    public function world($name): Response
    {
        return $this->render('hello/world.html.twig', ['name' => $name]);
    }

    #[Route('/hello/{name}/{times}', name: 'app_hello_manytimes', requirements: ['times' => '\d+'], priority: 2)]
    public function manyTimes($name, $times = 3): Response
    {
        if (0 == $times || 10 < $times) {
            return $this->redirectToRoute('app_hello_manytimes', ['name' => $name, 'times' => 3]);
        }

        return $this->render('hello/many_times.html.twig', ['name' => $name, 'times' => $times]);
    }
}
