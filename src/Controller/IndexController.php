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
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private function getImagesDir(): string
    {
        $projectDir = $this->getParameter('kernel.project_dir');

        return $projectDir.'/public/images/';
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(ExperienceRepository $experienceRepository)
    {
        $data['lastExperiences'] = $experienceRepository->getExperiencesWithCompany(3);

        $listCreations = [];

        $finder = new Finder();
        $finder->in($this->getImagesDir().'creations')->depth('< 2')->name('*.JPG');

        foreach ($finder as $file) {
            $listCreations[] = $file->getRelativePath(). '/'. $file->getFilename();
        }
        shuffle($listCreations);

        $data['listCreations'] = array_slice($listCreations, 0, 12);

        return $this->render('homepage.html.twig', ['page' => 'home', 'data' => $data]);
    }
}
