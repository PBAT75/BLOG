<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 19/11/18
 * Time: 14:25
 */

namespace App\DataFixtures;

use  Faker;
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
        $faker = Faker\Factory::create('fr_FR');

        for ($index = 0; $index <= 3; $index++){
            for ($i = 1; $i <= 50; $i++) {
                $article = new Article();
                $article->setTitle($faker->name);
                $article->setContent($faker->text);
                $manager->persist($article);
                $article->setCategory($this->getReference('categorie_' . $index));
            }
    }
        $manager->flush();
    }
}
