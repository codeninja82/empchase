<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController

{

    /**
     * @Route("/home")
     */


    public function index(): Response 

    {

        $myString = "Zian!";

        return $this->render('/home.html.twig',[

            'mystring' => $myString,
        ]

        );

    }


}