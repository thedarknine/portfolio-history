<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controller;

use App\Repository\ExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private function getImagesDir(): string
    {
        return $this->getParameter('kernel.project_dir').'/public/images/';
    }

    #[Route('/', name: 'homepage')]
    public function index(ExperienceRepository $experienceRepository): Response
    {
        $data = ['nbYearsExperience' => (new \DateTime('2006-10-01'))->diff(new \DateTime('now'))->y];
        $finder = new Finder();
        $finder->in($this->getImagesDir().'creations')->depth('<2')->name('*.JPG');

        $creationsList = [];
        foreach ($finder as $file) {
            $creationsList[] = $file->getRelativePath().'/'.$file->getFilename();
        }
        shuffle($creationsList);
        $data['creationsList'] = array_slice($creationsList, 0, 10);

        $data['lastExperiences'] = $experienceRepository->getExperiencesWithCompany(3);

        $data['mentalLandscape'] = [
            'rugby' => ['image' => 'images/home/rugby-asm.jpeg', 'alt' => 'Rugby', 'big' => false],
            'zen' => ['image' => 'images/home/lac-zen.jpg', 'alt' => 'Sérénité', 'big' => true],
            'chat' => ['image' => 'images/home/chat.jpg', 'alt' => 'Chat', 'big' => false],
            'auvergne' => ['image' => 'images/home/auvergne.jpg', 'alt' => 'Auvergne', 'big' => false],
            'equipe' => ['image' => 'images/home/equipe.jpg', 'alt' => 'Equipe', 'big' => false],
            // 'photographie' => ['image' => 'images/home/photographe.jpg', 'alt' => 'Photographie', 'big' => false],
        ];

        return $this->render('homepage.html.twig', ['page' => 'home', 'data' => $data]);
    }
}
