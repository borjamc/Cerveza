<?php

namespace CervezaBundle\Controller;

use CervezaBundle\Entity\Cerveza;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventosController extends Controller
{
    public function allAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('CervezaBundle:Cerveza');
        $cerveza = $repository->findById($id);
        return $this->render('CervezaBundle:Eventos:all.html.twig',array("cervezas"=>$cerveza));
    }

}
