<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class cntController extends Controller
{
    public function fnctAction()
    {
        return $this->render('@App/ManelFezai/developement.html.twig', array(
            'var'=>$param1,
            'va'=>$para,
        ));
    }

}
