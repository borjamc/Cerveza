<?php

namespace CervezaBundle\Controller;

use CervezaBundle\Entity\Cerveza;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventosController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('CervezaBundle:Cerveza');
        $cerveza = $repository->findAll();
        return $this->render('CervezaBundle:Eventos:all.html.twig',array("cervezas"=>$cerveza));
    }

    public function insertarAction()
{
    $em = $this->getDoctrine()->getManager();

    $cerveza = new Cerveza();
    $cerveza->setNombre('Amstel');
    $cerveza->setPais('Suecia');
    $cerveza->setPoblacion('Algo');
    $cerveza->setTipo('Rubia');
    $cerveza->setImportacion(0);
    $cerveza->setTamano(100);
    $cerveza->setFechaAlmacen(date("2017-10-29"));
    $cerveza->setCantidad(1000);
    $cerveza->setCantidad('Amstel.jpg');

    // tells Doctrine you want to (eventually) save the Product (no queries yet)
    $em->persist($cerveza);

    // actually executes the queries (i.e. the INSERT query)
    $em->flush($cerveza);

    return $this->render('CervezaBundle:Eventos:actualizar.html.twig',array("cervezaId"=>$cerveza));
}

}
