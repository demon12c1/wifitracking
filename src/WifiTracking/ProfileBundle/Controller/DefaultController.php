<?php

namespace WifiTracking\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProfileBundle:Default:index.html.twig', array('name' => $name));
    }

    public function loginAction()
    {

    }
}
