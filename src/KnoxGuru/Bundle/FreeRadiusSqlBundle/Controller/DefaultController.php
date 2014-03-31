<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KnoxGuruFreeRadiusSqlBundle:Default:index.html.twig', array('name' => $name));
    }
}
