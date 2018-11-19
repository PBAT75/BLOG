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

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $categories = [
            'PHP',
            'Javascript',
            'Java',
            'Ruby'
        ];

        foreach($categories as $key => $categoryName ) {
          $category = new Category();
          $category->setName($categoryName);
          $manager->persist($category);
          $this->addReference('categorie_' . $key, $category);
      }
        $manager->flush();
    }
}
