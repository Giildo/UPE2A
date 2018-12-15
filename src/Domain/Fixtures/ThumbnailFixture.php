<?php

namespace App\Domain\Fixtures;

use App\Domain\Model\Thumbnail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ThumbnailFixture extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $calecon = new Thumbnail(
            'Caleçon',
            'jpg'
        );
        $manager->persist($calecon);

        $chanteuse = new Thumbnail(
            'Chanteuse',
            'jpg'
        );
        $manager->persist($chanteuse);

        $fee = new Thumbnail(
            'Fée',
            'jpg'
        );
        $manager->persist($fee);

        $fenetre = new Thumbnail(
            'Fenêtre',
            'jpg'
        );
        $manager->persist($fenetre);

        $furet = new Thumbnail(
            'Furet',
            'jpg'
        );
        $manager->persist($furet);

        $manager->flush();
    }
}
