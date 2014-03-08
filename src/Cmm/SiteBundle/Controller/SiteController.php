<?php

namespace Cmm\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function indexAction()
    {
        $template           = '::base.html.twig';
        return $this->container->get('templating')->renderResponse($template);
    }
}
