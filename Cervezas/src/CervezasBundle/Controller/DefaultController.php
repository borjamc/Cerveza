<?php

namespace CervezasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="cerveza_home")
     */
    public function indexAction()
    {
        return $this->render('CervezasBundle:Default:index.html.twig');
    }

    /**
     * @Route("/cards", name="cerveza_cards")
     */

    public function cardsAction()
    {
        return $this->render('CervezasBundle:Default:cards.html.twig');
    }
}
