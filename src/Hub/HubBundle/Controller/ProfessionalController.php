<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Hub\HubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Response;
use Hub\HubBundle\Entity\Category;
use Hub\HubBundle\Entity\User;
use Hub\HubBundle\Entity\Profession;
use Hub\HubBundle\Entity\Professional;
use Hub\HubBundle\Entity\Skills;
use Hub\HubBundle\Entity\Role;
/**
 * Description of ProfessionalController
 *
 * @author baby1
 */
class ProfessionalController extends Controller {
    //put your code here

public function signup_professional1Action()
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $firstname = $request->request->get('firstname');
        $lastname = $request->request->get('lastname');
        $username = $request->request->get('user');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $confirm = $request->request->get('confirm');

        $session->set('firstname', $firstname);
        $session->set('lastname', $lastname);
        $session->set('user', $username);
        $session->set('email', $email);
        $session->set('password', $password);
        $session->set('confirm', $confirm);
        
        return $this->render('HubBundle:Default:signup_professional1.html.twig');
    }

    public function signup_professional2Action()
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('HubBundle:Category');
        $categories = $repository->findAll();
        $repository = $em->getRepository('HubBundle:Profession');
        $professions = $repository->findAll();
        $age = $request->request->get('age');
        $sex = $request->request->get('sex');
        $personalphone = $request->request->get('personalphone');
        $workphone = $request->request->get('workphone');
        $otherphone = $request->request->get('otherphone');
        $website = $request->request->get('website');

        $session->set('age', $age);
        $session->set('sex', $sex);
        $session->set('personalphone', $personalphone);
        $session->set('workphone', $workphone);
        $session->set('otherphone', $otherphone);
        $session->set('website', $website);

        return $this->render('HubBundle:Default:signup_professional2.html.twig', array('categories' => $categories, 'professions' => $professions));
    }

    public function signup_professional3Action()
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $country =  $request->request->get('country');
        $city = $request->request->get('city');
        $profession = $request->request->get('profession');
        $category = $request->request->get('category');
        
//        $ext = $request->files->get('photo')->guessExtension();
//        $photo = uniqid();
//        $photo = $photo.'.'.$ext;
        
        $photo = $request->request->get('photo');
        
        $session->set('country', $country);
        $session->set('city', $city);
        $session->set('profession', $profession);
        $session->set('photo', $photo);
        $session->set('category', $category);

//        $dir = $this->container->getParameter('kernel.root_dir').'/../web/bundles/hub/perfil';
//        $request->files->get('photo')->move($dir, $photo);

        return $this->render('HubBundle:Default:signup_professional3.html.twig');
    }

    public function signup_professional4Action()
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $presentation = $request->request->get('presentation');
        $cv = uniqid();
        $experience = $request->request->get('experience');
        $language = $request->request->get('language');

        $session->set('presentation', $presentation);
        $session->set('cv', $cv);
        $session->set('experience', $experience);
        $session->set('language', $language);

        $dir = $this->container->getParameter('kernel.root_dir').'/../web/bundles/hub/cv';
        $ext = $request->files->get('cv')->guessExtension();
        $request->files->get('cv')->move($dir, $cv.'.'.$ext);

        return $this->render('HubBundle:Default:signup_professional4.html.twig');
    }

    public function signup_professional_finishAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $category = $em->getRepository('HubBundle:Category')->find($session->get('category'));
        $profession = $em->getRepository('HubBundle:Profession')->find($session->get('profession'));     

        $user = new User();  
        $user->setUser($session->get('user'));
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($session->get('password'), $user->getSalt());
        $user->setPassword($password);
        $user->setEmail($session->get('email'));
        $user->setLanguage($session->get('language'));
        $user->setActive(true);
        $user->setPerfilPhoto($session->get('photo'));
        $user->setCity($session->get('city'));
        $user->setCountry($session->get('country'));
        $user->setWebsite($session->get('website'));
        $user->setRole("ROLE_PROFESSIONAL");
        $em->persist($user);

        $professional = new Professional();
        $professional->setFirstName($session->get('firstname'));
        $professional->setLastName($session->get('lastname'));
        $professional->setAge($session->get('age'));
        $professional->setSex('true');
        $professional->setPersonalPhone($session->get('personalphone'));
        $professional->setWorkPhone($session->get('workphone'));
        $professional->setOtherPhone($session->get('otherphone'));
        $professional->setPresentation($session->get('presentation'));
        $professional->setExperience($session->get('experience'));
        $professional->setCurriculum($session->get('cv'));
        $professional->setTrial(true);
        $professional->setIdCategory($category);
        $professional->setUser($user);
        $professional->addIdProfession($profession);
        $em->persist($professional);

        foreach ($request->request->all() as $key => $value) {
            $skill = new Skills();
            $skill->setSkill($value);
            $skill->setUser($professional);
            $em->persist($skill);
        }

      $em->flush();

        $user = $em->getRepository('HubBundle:User')->find($session->get('user'));
        $firewall_name = "admin_area";
        $token = new UsernamePasswordToken($user, null, $firewall_name, $user->getRoles());
        $this->get('security.token_storage')->setToken($token);

        return $this->render('HubBundle:Default:index_professional.html.twig');
    }
     public function index_professionalAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.token_storage')->getToken()->getUsername();
        
        return $this->render('HubBundle:Default:index_professional.html.twig');
    }

    public function list_professionalAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM HubBundle:Professional p');
        $professionals = $query->setFirstResult(12*($page-1))->setMaxResults(12)->getResult();
        $pages = count($em->getRepository('HubBundle:Professional')->findAll());

        $pages = $pages / 12;

         return $this->render('HubBundle:Default:list_professional.html.twig', array('professionals' => $professionals, 'page' => $page, 'pages' => $pages));
    }
    public function show_professionalAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $userShow = $em->getRepository('HubBundle:User')->find($user);
        $professional = $em->getRepository('HubBundle:Professional')->find($user);
        return $this->render('HubBundle:Default:show_professional.html.twig', array('user' => $userShow, 'professional'=>$professional));
    }
    
    public function emitterAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        $emitter = $em->getRepository('HubBundle:User')->find($user);
        if ($emitter->getRole() == "ROLE_PROFESSIONAL") {
            $userLog = $em->getRepository('HubBundle:Professional')->find($user);   
            return new Response($userLog->getFirstname()." ".$userLog->getLastname(), 200, array('Content-Type'=>'text/plain')) ;
        }
        else if ($emitter->getRole() == "ROLE_BUSINESS") {
            $userLog = $em->getRepository('HubBundle:Business')->find($user); 
            return new Response($userLog->getName(), 200, array('Content-Type'=>'text/plain')) ;
        }
        else if ($emitter->getRole() == "ROLE_USER") {
            $userLog = $em->getRepository('HubBundle:Basicuser')->find($user);  
             return new  Response($userLog->getFirstname()." ".$userLog->getLastname(), 200, array('Content-Type'=>'text/plain')) ;
        }
       return new Response('Ninguno', 200, array('Content-Type'=>'text/plain')) ;
        
    }
}