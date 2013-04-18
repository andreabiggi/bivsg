<?php

/*
 * This file is part of the BixCategoryBundle package.
 *
 * (c) Andrea Biggi <http://andreabiggi.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bix\Bundle\CategoryBundle\Doctrine;

use Bix\Bundle\CategoryBundle\Model\CategoryManager as BaseCategoryManager;
use Bix\Bundle\CategoryBundle\Model\CategoryManagerInterface;
use Doctrine\ORM\EntityManager;
use Bix\Bundle\CategoryBundle\Model\CategoryInterface;

/**
*   
*/
class CategoryManager extends BaseCategoryManager
{

    protected $entityManager;

    protected $class;

    protected $repository;
    
    /**
     * Constructor
     * @param EntityManager $em    
     * @param string        $class 
     */
    public function __construct(EntityManager $em, $class)
    {
        //parent::__construct();

        $this->entityManager = $em;
        $this->repository = $em->getRepository($class);

        $metadata = $em->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function deleteCategory(CategoryInterface $category)
    {
        $this->entityManager->remove($category);
        $this->entityManager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * {@inheritDoc}
     */
    public function findCategoryBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function findCategories()
    {
        return $this->repository->findAll();
    }

    /**
     * {@inheritDoc}
     */
    public function reloadCategory(CategoryInterface $category)
    {
        $this->entityManager->refresh($category);
    }

    /**
     * {@inheritDoc}
     */
    public function updateCategory(CategoryInterface $category, $andFlush = true)
    {
        $this->entityManager->persist($category);
        if ($andFlush) {
            $this->entityManager->flush();
        }
    }
}