<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class ArticleController extends AbstractController{
        /**
         * @Route("/home", name="app_homepage")
         */

    //========================================

    public function homepage()
    {
        return $this->render('article/home.html.twig');
    }
    //========================================
        /**
         * @Route("/articles/{titre}", name="article_show")
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

    /**
     * @Route("/articleCreate", name="article_create")
     */
    public function create()
    {
       $entityManager = $this->getDoctrine()->getManager();
       $article = new Article();
       $article->setTitre('Titre article');
       $article->setContenu('Contenu de mon article');

       $entityManager->persist($article);//on veut gardee en memeoir notre article

        $entityManager->flush();//avec cette commende, elle sera écrite dans la base de donnée

        return new Response('Article a été bien sauvegardé id = '.$article->getId());
    }


    /**
     * @Route("/article/{id}", name="article_show_from_name_db")
     */
    public function showfromDB(Article $article)
    {
        $comments = ['comm 1', 'comm 2', 'comm 3','comm 4'];

        return $this->render('article/show.html.twig',[
            "titre"=>$article->getTitre(),
            "Contenu"=>$article->getContenu(),
            "comments"=>$comments
            ]);

    }

    }
