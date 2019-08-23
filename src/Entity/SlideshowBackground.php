<?php declare(strict_types=1);

namespace App\Entity;

class SlideshowBackground
{
    private $image;
    private $imageAlt;

    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image;}

    public function getImageAlt() { return $this->imageAlt; }
    public function setImageAlt($imageAlt) { $this->imageAlt = $imageAlt;}
}