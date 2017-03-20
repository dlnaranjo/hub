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
use Hub\HubBundle\Entity\Category;
use Hub\HubBundle\Entity\User;
use Hub\HubBundle\Entity\Profession;
use Hub\HubBundle\Entity\Professional;
use Hub\HubBundle\Entity\Skill;
use Hub\HubBundle\Entity\Role;
use Hub\HubBundle\Entity\Basicuser;

/**
 * Description of UserController
 *
 * @author baby1
 */
class UserController extends Controller {
    
    public function signup_user1Action()
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

        return $this->render('HubBundle:Default:signup_user1.html.twig');
    }

    public function index_userAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $age = $request->request->get('age');
        $sex = $request->request->get('sex');
        $website = $request->request->get('website');
        $country =  $request->request->get('country');
        $city = $request->request->get('city');
        $language = $request->request->get('language');
       
//        $ext = $request->files->get('photo')->guessExtension();
//        $photo = uniqid();
//        $photo = $photo.'.'.$ext;
        
        $photo = $request->request->get('photo');

        $session->set('country', $country);
        $session->set('city', $city);
        $session->set('age', $age);
        $session->set('sex', $sex);
        $session->set('website', $website);
        $session->set('photo', $photo);
        $session->set('language', $language);

//        $dir = $this->container->getParameter('kernel.root_dir').'/../web/bundles/hub/perfil';
//        $request->files->get('photo')->move($dir, $photo);

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
        $user->setRole("ROLE_USER");
        $em->persist($user);
        $basicUser = new Basicuser();
        $basicUser->setFirstname($session->get('firstname'));
        $basicUser->setLastname($session->get('lastname'));
        $basicUser->setAge($session->get('age'));
        $basicUser->setSex($session->get('sex'));
        $basicUser->setUser($user);
        $em->persist($basicUser);
        $em->flush();
        
        $user = $em->getRepository('HubBundle:User')->find($session->get('user'));
        $firewall_name = "admin_area";
        $token = new UsernamePasswordToken($user, null, $firewall_name, $user->getRoles());
        $this->get('security.token_storage')->setToken($token);

        return $this->render('HubBundle:Default:index_user.html.twig');
    }
    
     public function index_user2Action()
    {
            return $this->render('HubBundle:Default:index_user.html.twig');
    }
    
     
}
