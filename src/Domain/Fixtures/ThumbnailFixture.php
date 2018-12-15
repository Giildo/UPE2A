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
        $abeille = new Thumbnail(
            'abeille',
            'gif'
        );
        $manager->persist($abeille);

        $calecon = new Thumbnail(
            'caleçon',
            'jpg'
        );
        $manager->persist($calecon);

        $chanteuse = new Thumbnail(
            'chanteuse',
            'jpg'
        );
        $manager->persist($chanteuse);

        $fee = new Thumbnail(
            'fée',
            'jpg'
        );
        $manager->persist($fee);

        $fenetre = new Thumbnail(
            'fenêtre',
            'jpg'
        );
        $manager->persist($fenetre);

        $furet = new Thumbnail(
            'furet',
            'jpg'
        );
        $manager->persist($furet);

        $manager->flush();
    }
}
