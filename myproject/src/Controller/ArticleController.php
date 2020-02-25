<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController
{
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
    return new Response("Mon article ayant pour titre".' '.$titre.' '."s'affiche");
}

}