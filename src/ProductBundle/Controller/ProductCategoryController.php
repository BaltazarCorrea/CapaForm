<?php

namespace ProductBundle\Controller;

use AppBundle\Controller\DefaultController;
use ProductBundle\Entity\ProductCategory;
use Symfony\Component\HttpFoundation\Request;

class ProductCategoryController extends DefaultController
{
    public function newFormAction(Request $request, $id = null){
        if(! $product_category = $this->getEntityManager()->getRepository('ProductBundle:ProductCategory')->findOneById($id)){
            $product_category = new ProductCategory();
        }

        $form = $this->createForm(\ProductBundle\Form\ProductCategoryType::class, $product_category);
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