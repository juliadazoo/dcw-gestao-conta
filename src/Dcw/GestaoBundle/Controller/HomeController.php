<?php

namespace Dcw\GestaoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Address controller.
 *
 */
class HomeController extends Controller
{

    public function indexAction()
    {
        return $this->render('DcwGestaoBundle:Home:index.html.twig');
    }
}
