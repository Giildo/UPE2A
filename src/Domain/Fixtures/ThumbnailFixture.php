<?php

namespace App\Domain\Fixtures;

use App\Application\Helper\Interfaces\SluggerInterface;
use App\Domain\Model\Thumbnail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ThumbnailFixture extends Fixture
{
    /**
     * @var SluggerInterface
     */
    private $slugger;

    /**
     * ThumbnailFixture constructor.
     * @param SluggerInterface $slugger
     */
    public function __construct(SluggerInterface $slugger)
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
                $name,
                $nameSlugged,
                $extSlugged
            );
            $manager->persist($tbn);

            rename(
                __DIR__ . '/../../../public/pic/' . $name . '.' . $ext,
                __DIR__ . '/../../../public/pic/' . $nameSlugged . '.' . $extSlugged
            );
        }

        $manager->flush();
    }
}
