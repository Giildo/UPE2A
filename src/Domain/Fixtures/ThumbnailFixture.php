<?php

namespace App\Domain\Fixtures;

use App\Application\Helper\Slugger;
use App\Domain\Model\Thumbnail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ThumbnailFixture extends Fixture
{
    /**
     * @var Slugger
     */
    private $slugger;

    /**
     * ThumbnailFixture constructor.
     * @param Slugger $slugger
     */
    public function __construct(Slugger $slugger)
    {
        $this->slugger = $slugger;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $files = scandir(__DIR__ . '/../../../public/pic');
        unset($files[1], $files[0]);

        foreach ($files as $file) {
            $params = explode(
                '.',
                $file
            );

            $name = $params[0];
            $nameSlugged = $this->slugger->slugify($name);
            $ext = $params[1];
            $extSlugged = $ext;

            $tbn = new Thumbnail(
                $nameSlugged,
                $extSlugged
            );
            $manager->persist($tbn);

            rename(
                __DIR__ . '/../../../public/pic/' . $name . '.' . $extSlugged,
                __DIR__ . '/../../../public/pic/' . $nameSlugged . '.' . $extSlugged
            );
        }

        $manager->flush();
    }
}
