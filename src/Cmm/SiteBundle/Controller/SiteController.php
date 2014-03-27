<?php

namespace Cmm\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cmm\SiteBundle\Entity\Contact;
use Cmm\SiteBundle\Form\Type\ContactType;

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
        $template           = '::accueil.html.twig';
        return $this->container->get('templating')->renderResponse($template);
    }
    
    public function pagesAction(){
        
        $routeName          = $this->get('request')->get('_route');
        $template           = 'CmmSiteBundle:Pages:%s.html.twig';
        
        // Créer un services qui gère le switch
        switch ($routeName){
            
            case 'cmm_site_page_creperie':
                $page   = 'creperie';
                break;
            
            case "cmm_site_page_presentation":
                $page   = 'presentation';
                break;
            
            case 'cmm_site_page_quartier':
                $page   = 'quartier';
                break;
            
            case 'cmm_site_page_en_ce_moment':
                $page   = 'moment';
                break;
            
            case 'cmm_site_page_produits':
                $page   = 'produits';
                break;
            
            case 'cmm_site_page_carte':
                $page   = 'carte';
                break;
            
            case 'cmm_site_page_carte_crepes_galettes':
                $page   = 'crepes_galettes';
                break;
            
            case 'cmm_site_page_formules':
                $page   = 'formules';
                break;
            
            case 'cmm_site_page_acces':
                $page   = 'acces';
                break;
            
        }
        
        $newTemplate = sprintf($template, $page);
        return $this->container->get('templating')->renderResponse($newTemplate);
    }
    
    public function contactAction(){
        
        $contact        = new Contact();
        $form           = $this->createForm(new ContactType(), $contact);
        $request        = $this->container->get('request');
        
        if($request->getMethod() === "POST"){
            
            $form->submit($request);
            
            if($form->isValid()){
                
                //Envoi email 
            }
        }
        
        $template       = 'CmmSiteBundle:Pages:contact.html.twig';
        return $this->container->get('templating')->renderResponse($template,
                array(
                            'form'      => $form->createView()
                ));
        
    }
}
