<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\ProductRepository")
 */
class Product {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;

     /**
     * @ORM\Column(name="code", type="string", nullable=false)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="ProductCategory", mappedBy="product", cascade={"persist", "remove"})
     */
    private $categories;



    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function addCategory(\ProductBundle\Entity\ProductCategory $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    public function removeCategory(\ProductBundle\Entity\ProductCategory $category)
    {
        $this->categories->removeElement($category);
    }

    public function getCategories()
    {
        return $this->categories;
    }
}
