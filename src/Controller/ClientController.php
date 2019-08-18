<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/base", name="base")
     */
    public function base()
    {
        return $this->render('client/base.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
    
    
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('client/home.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/project", name="project")
     */
    public function project()
    {
        return $this->render('client/project.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/notice", name="notice")
     */
    public function notice()
    {
        return $this->render('client/notice.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/help", name="help")
     */
    public function help()
    {
        return $this->render('client/help.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/referral", name="referral")
     */
    public function referral()
    {
        return $this->render('client/referral.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('client/contact.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/donate", name="donate")
     */
    public function donate()
    {
        return $this->render('client/donate.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
