<?php

namespace CervezaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CervezaBundle:Default:index.html.twig');
    }

    public function cardsAction()
    {
        return $this->render('CervezaBundle:Default:cards.html.twig');
    }
}
