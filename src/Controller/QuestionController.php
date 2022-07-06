<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('Hello welcome');
    }

    /**
     * @Route("/questions/{slug}")
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
        //return new Response(sprintf('Future page to show a question "%s"!',ucwords(str_replace('-',' ',$slug))));
    }
}