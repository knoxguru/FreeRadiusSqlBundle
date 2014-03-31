<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
    * @Route("/")
    */
    public function indexAction()
    {
        return $this->render('KnoxGuruFreeRadiusSqlBundle:Default:index.html.twig');    
    }

}
