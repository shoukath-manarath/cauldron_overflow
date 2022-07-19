<?php

namespace App\Controller;

use App\Service\MarkdownHelper;
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
    public function showpage($slug, MarkdownHelper $markdownHelper)
    {
        $answers = [
            'fake answer one',
            'fake answer two',
            'fake answer three',
        ];

        $questionText = "Shoukath here I've been turned into a cat, any *thoughts* on how to turn back? While I'm **adorable**, I don't really care for cat food.";
        $parsedQuestionText = $markdownHelper->parse($questionText);



        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-',' ',$slug)),
            'questionText' => $parsedQuestionText,
            'answers' => $answers
        ]);
    }
}