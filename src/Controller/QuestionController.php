<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twigEnvironmentr)
    {   /**
        $html = $twigEnvironmentr->render('question/homepage.html.twig');

        return new Response($html);
        **/
        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function showpage($slug)
    {
        $answers = [
            'fake answer 1',
            'fake answer 2',
            'fake answer 3',
        ];

        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-',' ',$slug)),
            'answers' => $answers
        ]);
    }
}