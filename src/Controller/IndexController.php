<?php

declare(strict_types=1);

/**
 * This file is part of TheDarkNine project N9/website
 *
 * (c) Caroline Noyer - All Rights Reserved
 *
 * This source file is subject to the proprietary license.
 */

namespace N9App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController.
 *
 * @author cnoyer
 *
 * @version 1.0.0
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', ['plop']);
    }
}
