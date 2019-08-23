<?php

namespace App\Controller;

use App\Entity\SlideshowBackground;
use App\Type\SlideshowBackgroundType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /** @Route("/upload", name="upload") */
    public function upload(Request $request)
    {
        $slideshowBackground = new SlideshowBackground();
        $form = $this->createForm(SlideshowBackgroundType::class, $slideshowBackground);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $imageFile */
            $imageFile = $form['image']->getData();
            dump($imageFile);
            // It is up to your to get the original filename per the example in the docs
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            // this is needed to safely include the file name as part of the URL
            //$safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
            //$newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

            $slideshowBackground->setImage($originalFilename);
            dump($slideshowBackground);
        }
        return $this->render('upload/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
