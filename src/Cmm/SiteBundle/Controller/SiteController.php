<?php

namespace Cmm\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cmm\SiteBundle\Entity\Contact;
use Cmm\SiteBundle\Form\Type\ContactType;
use Symfony\Component\Validator\Validator;

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
            
            case "cmm_site_page_creperie_presentation":
                $page   = 'presentation';
                break;
            
            case 'cmm_site_page_creperie_quartier':
                $page   = 'quartier';
                break;
            
            case 'cmm_site_page_creperie_moment':
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
        $isSubmit       = false;
        $tabErrors      = array();
        
        
        if($request->getMethod() === "POST"){
            
            $isSubmit   = true;
            $form->submit($request);
            $validateur = $this->get('validator');
            $errors     = $validateur->validate($contact);
            
            foreach ($errors as $error)
            {
                $tabErrors[$error->getPropertyPath()] = array(
                    'elementId' => str_replace('data.', '', $error->getPropertyPath()),
                    'errorMessage' => $error->getMessage(),
                );
            }
            
            if($form->isValid()){
                
                $from = function ($contact){
                    if($contact->getCivilite() == 0){
                        $civilite   = 'Mme';
                    }else{
                        $civilite   = 'Mr';
                    }
                    return $civilite." ".$contact->getNom()." ".$contact->getPrenom();
                };
                $message = \Swift_Message::newInstance();
                $message->setSubject($contact->getObjet());
                $message->setTo('shonen.shojo@gmail.com'); //Mettre l'adresse du client'
                $message->setBody($contact->getMessage());
                $message->setFrom($contact->getEmail(), $from($contact));
                $this->get('mailer')->send($message);
               
                $messageConfirm = "Votre message a été envoyer. Vous recevrai une reponse très"
                        . "prochainement.";
                $this->get('session')->getFlashBag()->add('notice', $messageConfirm);
                
                $url = $this->generateUrl($this->get('request')->get('route'));
                return $this->redirect($url);
                
            }
        }
        $template       = 'CmmSiteBundle:Pages:contact.html.twig';
        return $this->container->get('templating')->renderResponse($template,
                array(
                            'form'      => $form->createView(),
                            'isSubmit'  => $isSubmit,
                            'errors'    => $tabErrors
                ));
        
    }
}
