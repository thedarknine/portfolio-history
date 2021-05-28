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
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    private function getImagesDir(): string
    {
        $projectDir = $this->getParameter('kernel.project_dir');

        return $projectDir.'/public/images/';
    }

    /**
     * @Route("/experience", name="experience")
     */
    public function experience(ExperienceRepository $repository): Response
    {
        $data['listExperiences'] = $repository->getExperiencesWithCompany();

        return $this->render(
            'experience.html.twig',
            ['page' => 'experience', 'data' => $data]
        );
    }

    /**
     * @Route("/competences", name="competences")
     */
    public function competences(SkillRepository $skillRepository): Response
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('App:SkillType');
        $listSkillTypes = $repository->findBy([], ['position' => 'ASC']);

        $data['listSkillTypes'] = $listSkillTypes;

        $data['listSkills'] = $skillRepository->getSkillsByType();

        return $this->render('competences.html.twig', ['page' => 'competences', 'data' => $data]);
    }

    /**
     * @Route("/formation", name="formation")
     */
    public function formation(): Response
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('App:Education');

        $data['listEducations'] = $repository->getEducationsWithSchool();

        return $this->render('formation.html.twig', ['page' => 'formation', 'data' => $data]);
    }

    /**
     * @Route("/projets", name="projets")
     */
    public function projets(): Response
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('App:Project');

        $data['listProjects'] = $repository->findBy([], ['year' => 'DESC']);

        return $this->render('projets.html.twig', ['page' => 'projets', 'data' => $data]);
    }

    /**
     * @Route("/creations", name="creations")
     */
    public function creations(): Response
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('App:CreationType');

        $listCreationTypes = $repository->findBy([], ['position' => 'ASC']);
        $listCreations = [];

        foreach ($listCreationTypes as $type) {
            $listCreations[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'creations/'.$type->getLabel());
            foreach ($finder as $file) {
                $listCreations[$type->getLabel()][] = $file->getFileName();
            }
            shuffle($listCreations[$type->getLabel()]);
        }

        $data['listCreationTypes'] = $listCreationTypes;
        $data['listCreations'] = $listCreations;

        return $this->render('creations.html.twig', ['page' => 'creations', 'data' => $data]);
    }

    /**
     * @Route("/photos", name="photos")
     */
    public function photos(): Response
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('App:PhotoType');

        $listPhotoTypes = $repository->findBy([], ['position' => 'ASC']);
        $listPhotos = [];

        foreach ($listPhotoTypes as $type) {
            $listPhotos[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'photos/'.$type->getLabel());
            foreach ($finder as $file) {
                $listPhotos[$type->getLabel()][] = $file->getFileName();
            }
            shuffle($listPhotos[$type->getLabel()]);
        }

        $data['listPhotoTypes'] = $listPhotoTypes;
        $data['listPhotos'] = $listPhotos;

        return $this->render('photos.html.twig', ['page' => 'photos', 'data' => $data]);
    }

    /**
     * @Route("/arcade", name="arcade")
     */
    public function arcade(): Response
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('App:ArcadeType');

        $listArcadeTypes = $repository->findBy([], ['position' => 'ASC']);
        $listArcade = [];

        foreach ($listArcadeTypes as $type) {
            $listArcade[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'arcade/'.$type->getLabel());
            foreach ($finder as $file) {
                $listArcade[$type->getLabel()][] = $file->getFileName();
            }
        }

        $data['listArcadeTypes'] = $listArcadeTypes;
        $data['listArcade'] = $listArcade;

        return $this->render('arcade.html.twig', ['page' => 'arcade', 'data' => $data]);
    }
}
