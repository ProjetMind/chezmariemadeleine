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
    
    public function pagesAction(){
        
        $routeName          = $this->get('request')->get('_route');
        $template           = '::accueil.html.twig';
        
        // Créer un services qui gère le switch
        switch ($routeName){
            
            case 'cmm_site_page_creperie':
                $template   = 'creperie';
                break;
            
            case "cmm_site_page_presentation":
                $template   = 'presentation';
                break;
            
            case 'cmm_site_page_quartier':
                $template   = 'quartier';
                break;
            
            case 'cmm_site_page_en_ce_moment':
                $template   = 'moment';
                break;
            
            case 'cmm_site_page_produits':
                $template   = 'produits';
                break;
            
            case 'cmm_site_page_carte':
                $template   = 'carte';
                break;
            
            case 'cmm_site_page_crepe_galette':
                $template   = 'crepes_galettes';
                break;
            
            case 'cmm_site_page_formules':
                $template   = 'formules';
                break;
            
            case 'cmm_site_page_acces':
                $template   = 'acces';
                break;
            
            case 'cmm_site_page_contact':
                $template   = 'conatact';
                break;
        }
        
        return $this->container->get('templating')->renderResponse($template);
    }
}
