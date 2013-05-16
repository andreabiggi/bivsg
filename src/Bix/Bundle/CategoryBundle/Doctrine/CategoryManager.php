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
use Bix\Bundle\CategoryBundle\Entity\RecursiveCategoryIterator;
use Doctrine\Common\Collections\Collection;

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
        $this->entityManager = $em;
        $this->repository = $em->getRepository($class);

        $metadata = $em->getClassMetadata($class);
        $this->class = $metadata->getName();
    }
    
    /**
     * Create a new category
     * 
     * @param string $title
     * @param string $slug
     * @param Category $parent
     * @return Category
     * @throws \Exception
     */
    public function newCategory($title, $slug, $parent = null)
    {
        if ($parent instanceof $this->class) {
            $cat = $this->createCategory();
            $cat->setTitle($title);
            $cat->setSlug($slug);
            $cat->setParent($parent);

            $this->entityManager->persist($cat);
            $this->entityManager->flush();

            return $cat;
        } else {
            throw new \Exception('$parent must be a Category Object');
        }
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
    
    /**
     * Get the childs of category recursively or not
     * 
     * @param \Bix\Bundle\CategoryBundle\Model\CategoryInterface $category
     * @param bool $direct
     * @param string $sortBy
     * @return array of Category
     */
    public function getChildrensOf(CategoryInterface $category, $direct = TRUE, $sortBy = null)
    {
        return $this->repository->children($category, $direct, $sortBy);
    }
    
    /**
     * Count childrens of category recursively or not
     * 
     * @param \Bix\Bundle\CategoryBundle\Model\CategoryInterface $category
     * @param bool $direct if TRUE returns the direct childrens; if FALSE return all childrens recursively
     * @return int
     */
    public function countChildrens(CategoryInterface $category, $direct)
    {
        return $this->repository->childCount($category, $direct);
    }
    
    public function getPath(CategoryInterface $category)
    {
        return $this->repository->getPath($category);
    }

}