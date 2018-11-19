<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 19/11/18
 * Time: 14:25
 */

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Article;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

          $article = new Article();
          $article->setTitle('Framework PHP : Symfony 4');
          $article->setContent('Symfony 4, un framework sympa à connaître!');
          $manager->persist($article);
        $article->setCategory($this->getReference('categorie_0'));

        $manager->flush();
    }
}
