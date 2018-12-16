<?php

namespace App\Domain\Model\Interfaces;

interface ThumbnailInterface extends ModelInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getSlug(): string;

    /**
     * @return string
     */
    public function getExtension(): string;

    /**
     * @return CategoryInterface|null
     */
    public function getCategory(): ?CategoryInterface;

    /**
     * @param CategoryInterface $category
     */
    public function addCategory(CategoryInterface $category): void;
}