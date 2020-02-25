<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController{
        /**
         * @Route("/")
         */

    //========================================

    public function homepage()
    {
        return new Response('TEST');
    }
    //========================================
        /**
         * @Route("/articles/{titre}")
        */
    public function show($titre)
    {
                //chemin vers un fichier tamplet 'twig'
                //new Response("Mon article ayant pour titre".' '.$titre.' '."s'affiche");
        $comments = ['comm 1', 'comm 2', 'comm 3','comm 4'];
        return $this->render('article/show.html.twig',[
            "titre"=>$titre,
            "maVariable"=>"TEST",
            "comments"=>$comments

        ]);
    }

    }