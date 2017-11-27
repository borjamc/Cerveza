<?php

namespace Cerveza2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Cerveza2Bundle\Entity\Cervezas;
use Cerveza2Bundle\Form\CervezasType;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/algonuevo")
     */
    public function nuevoAction(Request $request)
    {
      $cerveza=new Cervezas();
      $form=$this->createForm(CervezasType::class, $cerveza);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $turismo=$form->getData();
        $em=$this->getDoctrine()->getManager();
        $em->persist($turismo);
        $em->flush();
        return $this->redirectToRoute('cerveza2_mostrar_todo');
      }
      return $this->render('Cerveza2Bundle:Default:algonuevo.html.twig', array('form'=>$form->createView()));
    }
    /**
     * @Route("/actualizarnuevo/{id}")
     */
    public function editarCervezaAction(Request $request, $id)
    {
      $cerveza=$this->getDoctrine()->getRepository(Cervezas::class)->find($id);
      $form=$this->createForm(CervezasType::class, $cerveza);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
         $em = $this->getDoctrine()->getManager();
         $em->persist($cerveza);
         $em->flush();
         return $this->redirectToRoute('cerveza2_mostrar_todo');
       }
      return $this-> render('Cerveza2Bundle:Default:algonuevo.html.twig', array('form'=>$form->createView()));
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
         * @Route("/borrar/{id}", name="borrar")
         */
        public function borrarAction($id)
        {
          $db=$this->getDoctrine()->getManager();
          $eliminar = $db ->getRepository(Cervezas::class)->find($id);
          $db->remove($eliminar);
          $db->flush();
            return $this->redirectToRoute('cerveza2_mostrar_todo');
        }

}
