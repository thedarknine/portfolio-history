<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class indexController extends AbstractController
{
    private function getImagesDir(): string
    {
        return $this->getParameter('kernel.project_dir').'/public/images/';
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $finder = new Finder();
        $finder->in($this->getImagesDir().'creations')->depth('<2')->name('*.JPG');

        $creationsList = [];
        foreach ($finder as $file) {
            $creationsList[] = $file->getRelativePath().'/'.$file->getFilename();
        }
        shuffle($creationsList);
        $data['creationsList'] = array_slice($creationsList, 0, 12);

        return $this->render('layout.html.twig', ['page' => 'home', 'data' => $data]);
    }
}
