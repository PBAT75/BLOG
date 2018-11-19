<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 19/11/18
 * Time: 14:25
 */

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for($i=0;$i<=50;$i++) {
          $category = new Category();
          $category->setName('Nom de catégorie'.$i);
          $manager->persist($category);
      }
        $manager->flush();
    }
}
