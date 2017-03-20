<?php

namespace Hub\HubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Hub\HubBundle\Entity\Category;
use Hub\HubBundle\Entity\User;
use Hub\HubBundle\Entity\Basicuser;
use Hub\HubBundle\Entity\Profession;
use Hub\HubBundle\Entity\Professional;
use Hub\HubBundle\Entity\Skill;
use Hub\HubBundle\Entity\Business;
use Hub\HubBundle\Entity\Notification;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = 'balmarales'; //user loged
        $receiver = $em->getRepository('HubBundle:User')->find($user);    
        $count = count($receiver->getIdnotificationreceiver()); 
       return $this->render('HubBundle:Default:index.html.twig', array('notifications' => $receiver->getIdnotificationreceiver(), 'count' => $count));
       //  return $this->render('HubBundle:Default:signup.php');
    }
    public function signupAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('HubBundle:User');
        $users = $repository->findAll();      
        return $this->render('HubBundle:Default:signup.html.twig', array('users' => $users));
              
    }
    
    public function loginAction()
    {
        return $this->render('HubBundle:Default:login.html.twig');
    }     

    public function test1Action() {
        /*$em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $emitter = $em->getRepository('HubBundle:User')->find('leo');
        $receiver = $em->getRepository('HubBundle:User')->find('otro');

        /*
        $notification = new Notification();
        $notification->setUserreceiver($receiver);
        $notification->setUseremitter($emitter);
        $notification->setMessage('hola, necesito que me llames');
        $notification->setIsread(false);
        $em->persist($notification);
        $em->flush();
        */
       /* $dir = $this->container->getParameter('kernel.root_dir').'/../web/bundles/hub/perfil';

        if ($request->getMethod() == 'POST') {
        $ext = $request->files->get('photo1')->guessExtension();
        $request->files->get('photo1')->move($dir, 'testPhoto1'.'.'.$ext);
        }*/
        
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $name = "myname";

        if ($request->getMethod() == 'POST') {
            $name = uniqid();
            $ext = $request->files->get('archivo')->guessExtension();
             $dir = $this->container->getParameter('kernel.root_dir').'/../web/bundles/hub/businessImages';

            $request->files->get('archivo')->move($dir, $name.'.'.$ext);
        } 
}

public function test2Action() {
       return $this->render('HubBundle:Default:test1.html.twig');
}    

public function test3Action() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('HubBundle:Category');
        $categories = $repository->findAll();
        $repository = $em->getRepository('HubBundle:Professional');
        $professionals = $repository->findAll();
       return $this->render('HubBundle:Default:list.html.twig', array('categories' => $categories, 'professionals' => $professionals));
}
}
