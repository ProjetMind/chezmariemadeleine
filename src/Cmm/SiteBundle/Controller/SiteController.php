<?php

namespace Cmm\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    /**
     * 
     * Cette fonction gère princiopalement le rendu de la page d'accueil du site     
     *  
     * @return type
     */
    public function indexAction()
    {
        $template           = '::base.html.twig';
        return $this->container->get('templating')->renderResponse($template);
    }
}
