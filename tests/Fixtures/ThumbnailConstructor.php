<?php

namespace App\Tests\Fixtures;

use App\Domain\Model\Interfaces\ThumbnailInterface;
use App\Domain\Model\Thumbnail;

trait ThumbnailConstructor
{
    /**
     * @var ThumbnailInterface
     */
    private $calecon;

    /**
     * @var ThumbnailInterface
     */
    private $fee;

    /**
     * @var ThumbnailInterface
     */
    private $chanteuse;

    public function thumbnailConstructor()
    {
        $this->calecon = new Thumbnail(
            'Caleçon',
            'jpg'
        );
        $this->fee = new Thumbnail(
            'Fée',
            'jpg'
        );
        $this->chanteuse = new Thumbnail(
            'Chanteuse',
            'jpg'
        );
    }
}
