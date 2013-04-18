BixCategoryBundle
=================

Features include:

- Support for the management of categories
- Categories can be stored via Doctrine ORM
- Parent Children structure

About
-----

BixCategoryBundle is a [Andrea Biggi](https://github.com/andreabiggi) initiative.

Visit my [internet site](http://www.andreabiggi.net).

## Prerequisites

This version of the bundle requires Symfony 2.2+.

## Installation

Installation steps:

1. Download BixCategoryBundle
2. Enable the bundle
3. Create your Category class
4. Import BixCategoryBundle routing
4. Update your database schema

### Step 1: Download BixCategoryBundle

Clone git repository and install the bundle in your `vendor/Bix` folder

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Bix\CategoryBundle\BixCategoryBundle(),
    );
}
?>
```
### Step 3: Create your Category class

The goal of this bundle is to persist some `Category` class to a database (MySql). 
Your first job, then, is to create the `Category` class
for your application. This class can look and act however you want: add any
properties or methods you find useful. This is *your* `Category` class.

The bundle provides base classes which are already mapped for most fields
to make it easier to create your entity. Here is how you use it:

1. Extend the base `Category` class (the class to use depends of your storage).
2. Map the `id` field. It must be protected as it is inherited from the parent class.
3. Map the `childrens` and `parent` protected properties

**Warning:**

> If you override the __construct() method in your Category class, be sure
> to call parent::__construct(), as the base Category class depends on
> this to initialize some fields.

**a) Doctrine ORM Category class**

If you're persisting your users via the Doctrine ORM, then your `User` class
should live in the `Entity` namespace of your bundle and look like this to
start:

``` php
    <?php
    // src/Acme/CategoryBundle/Entity/Category.php

    namespace Acme\CategoryBundle\Entity;

    use Bix\CategoryBundle\Entity\Category as BaseCategory;
    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;

    /**
     * @ORM\Entity
     * @ORM\Table(name="category")
     */
    class Category extends BaseCategory
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

        /**
         * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
         **/
        protected $childrens;

        /**
         * @ORM\ManyToOne(targetEntity="Category", inversedBy="childrens")
         * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
         **/
        protected $parent;
        

        public function __construct()
        {
            $this->childrens = new ArrayCollection();
            parent::__construct();
            // your own logic
        }

        /**
         * -------------------------------------------------------------------
         * From here also put your logic
         * -------------------------------------------------------------------
         */ 
    }
    ?>
    ```

### Step 4: Update your database schema

Now that the bundle is configured, the last thing you need to do is update your
database schema because you have added a new entity, the `Category` class which you
created in Step 3.

For ORM run the following command.

``` bash
$ php app/console doctrine:schema:update --force
```

