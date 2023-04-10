<?php

namespace ProductBundle\Controller;

use AppBundle\Controller\DefaultController;
use ProductBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends DefaultController
{
    public function newFormAction(Request $request, $id = null){
        if(! $product = $this->getEntityManager()->getRepository('ProductBundle:Product')->findOneById($id)){
            $product = new Product();
        }

        $form = $this->createForm(\ProductBundle\Form\ProductType::class, $product);
        $form->handleRequest($request);
        
        if ($form->isSubmitted())
        {
            if($form->isValid()){
                $entityManager->persist($productCategory);
                $entityManager->flush();
                $entityManager = $this->getDoctrine()->getManager();

                return 'Vista de exito';
            }
        }

        return $this->render('ProductBundle:Product:form_product_category.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}