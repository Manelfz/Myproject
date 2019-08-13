<?php

namespace acceuilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class acceuilController extends Controller
{
    public function indexAction()
    {
        return $this->render('@acceuil/acceuil/index.html.twig');
    }
    
        public function aproposAction()
    {
        return $this->render('@acceuil/apropos/apropos.html.twig');
    }
    
        public function contactAction()
    {
        return $this->render('@acceuil/contact/contact.html.twig');
    }
}
