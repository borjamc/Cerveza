<?php

namespace Cerveza2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Cerveza2Bundle\Entity\Cervezas;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="cerveza2_inicio")
     */
    public function indexAction()
    {
        return $this->render('Cerveza2Bundle:Default:index.html.twig');
    }

    /**
     * @Route("/cards", name="cerveza2_cartas")
     */
    public function cardsAction()
    {
        return $this->render('Cerveza2Bundle:Default:cards.html.twig');
    }

    /**
     * @Route("/all", name="cerveza2_mostrar_todo")
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('Cerveza2Bundle:Cervezas');
        $cerveza = $repository->findAll();
        return $this->render('Cerveza2Bundle:Default:all.html.twig',array("cervezas"=>$cerveza));
    }

    /**
     * @Route("/insertar/{nombre}/{pais}/{poblacion}/{tipo}/{importacion}/{tamano}/{cantidad}/{foto}", name="cerveza2_insertar")
     */

    public function insertarAction($nombre,$pais,$poblacion,$tipo,$importacion=0,$tamano,$cantidad,$foto)
{
    $em = $this->getDoctrine()->getManager();

    $cerveza = new Cervezas();
    $cerveza->setNombre($nombre);
    $cerveza->setPais($pais);
    $cerveza->setPoblacion($poblacion);
    $cerveza->setTipo($tipo);
    $cerveza->setImportacion($importacion);
    $cerveza->setTamano($tamano);
    $cerveza->setCantidad($cantidad);
    $cerveza->setFoto($foto);

    // tells Doctrine you want to (eventually) save the Product (no queries yet)
    $em->persist($cerveza);

    // actually executes the queries (i.e. the INSERT query)
    $em->flush($cerveza);

    return $this->render('Cerveza2Bundle:Default:insertar.html.twig',array("cervezaId"=>$cerveza->getId()));
}
    /**
     * @Route("/actualizar/{id}/{nombre}", name="cerveza2_actualizar")
     */

    public function actualizarAction($nombre,$id)
    {
      $em = $this->getDoctrine()->getManager();
      $cerveza = $em->getRepository(Cervezas::class)->find($id);
      $cerveza->setNombre($nombre);
      $em->flush();

      return $this->redirectToRoute('cerveza2_mostrar_todo');
}
}
