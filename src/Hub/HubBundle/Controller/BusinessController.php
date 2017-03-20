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
use Hub\HubBundle\Entity\Productsandservices;
use Hub\HubBundle\Entity\Profession;
use Hub\HubBundle\Entity\Professional;
use Hub\HubBundle\Entity\Business;

/**
 * Description of BusinessController
 *
 * @author baby1
 */
class BusinessController extends Controller {

    public function signup_business1Action() {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $name = $request->request->get('namebusiness');
        $username = $request->request->get('user');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $confirm = $request->request->get('confirm');

        $session->set('namebusiness', $name);
        $session->set('user', $username);
        $session->set('email', $email);
        $session->set('password', $password);
        $session->set('confirm', $confirm);

        return $this->render('HubBundle:Default:signup_business1.html.twig');
    }

    public function signup_business2Action() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('HubBundle:Category');
        $categories = $repository->findAll();

        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $phone1 = $request->request->get('phone1');
        $phone2 = $request->request->get('phone2');
        $phone3 = $request->request->get('phone3');
        $website = $request->request->get('website');
        $presentation = $request->request->get('presentation');

        $session->set('phone1', $phone1);
        $session->set('phone2', $phone2);
        $session->set('phone3', $phone3);
        $session->set('presentation', $presentation);
        $session->set('website', $website);

        return $this->render('HubBundle:Default:signup_business2.html.twig', array('categories' => $categories));
    }

    public function signup_business3Action() {


        return $this->render('HubBundle:Default:signup_business3.html.twig');
    }

    public function signup_business_finishAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();

        $country = $request->request->get('country');
        $city = $request->request->get('city');
        $address = $request->request->get('address');
        $category = $request->request->get('category');
        $language = $request->request->get('language');

        $session->set('country', $country);
        $session->set('city', $city);
        $session->set('address', $address);
        $session->set('category', $category);
        $session->set('language', $language);

        $category = $em->getRepository('HubBundle:Category')->find($session->get('category'));
        $user = new User();
//        $photo = uniqid();
//        $ext = $request->files->get('photo')->guessExtension();
//        $photo = $photo . '.' . $ext;
//        $dir = $this->container->getParameter('kernel.root_dir') . '/../web/bundles/hub/perfil';
//        $request->files->get('photo')->move($dir, $photo);
        
        $photo = $request->request->get('photo');

        $user->setUser($session->get('user'));
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($session->get('password'), $user->getSalt());
        $user->setPassword($password);
        $user->setEmail($session->get('email'));
        $user->setLanguage($session->get('language'));
        $user->setActive(true);
        $user->setRole("ROLE_BUSINESS");
        $user->setPerfilPhoto($photo);
        $user->setCity($session->get('city'));
        $user->setCountry($session->get('country'));
        $user->setWebsite($session->get('website'));
        $em->persist($user);

        $business = new Business();
        $business->setName($session->get('namebusiness'));
        $business->setAddress($session->get('address'));
        $business->setPhone1($session->get('phone1'));
        $business->setPhone2($session->get('phone2'));
        $business->setPhone3($session->get('phone3'));
        $business->setPresentation($session->get('presentation'));
        $business->setTrial(true);
        $business->setIdcategory($category);
        $business->setUser($user);

        $em->persist($business);
        $em->flush();

        $user = $em->getRepository('HubBundle:User')->find($session->get('user'));
        $firewall_name = "admin_area";
        $token = new UsernamePasswordToken($user, null, $firewall_name, $user->getRoles());
        $this->get('security.token_storage')->setToken($token);

        return $this->render('HubBundle:Default:index_business.html.twig');
    }

    public function index_businessAction() {
        return $this->render('HubBundle:Default:index_business.html.twig');
    }

    public function list_businessAction($page) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT b FROM HubBundle:Business b');
        $business = $query->setFirstResult(12 * ($page - 1))->setMaxResults(12)->getResult();
        $pages = count($em->getRepository('HubBundle:business')->findAll());

        $pages = $pages / 12;

        return $this->render('HubBundle:Default:list_business.html.twig', array('business' => $business, 'page' => $page, 'pages' => $pages));
    }

    public function addProductAction() {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        if ($request->getMethod() == 'POST') {
            $pands = new Productsandservices();
            $em = $this->getDoctrine()->getManager();
            $business = $em->getRepository('HubBundle:Business')->find($this->get('security.token_storage')->getToken()->getUsername());

            $pands->setName($request->request->get('name'));
            $pands->setPrice($request->request->get('price'));
            $pands->setDescription($request->request->get('description'));
            if ($request->files->get('photo')) {
                $photo = uniqid();
                $ext = $request->files->get('photo')->guessExtension();
                $photo = $photo . '.' . $ext;
                $dir = $this->container->getParameter('kernel.root_dir') . '/../web/bundles/hub/perfil';
                $request->files->get('photo')->move($dir, $photo);
                $pands->setPhoto($photo);
            }

            $em->persist($pands);
            $pands->setUser($business);
            $em->flush();
        }
        return $this->render('HubBundle:default:add_products_and_services.html.twig');
    }

    public function listMyBusinessProductsAction($page) {
        $em = $this->getDoctrine()->getManager();
        $username = $this->get('security.token_storage')->getToken()->getUsername();
        $query = $em->createQuery('SELECT ps FROM HubBundle:Productsandservices ps WHERE ps.user = :user')->setParameter('user', $username);
        $pands = $query->setFirstResult(12 * ($page - 1))->setMaxResults(12)->getResult();
        $pages = count($em->getRepository('HubBundle:Productsandservices')->findAll());

        $pages = $pages / 12;

        return $this->render('HubBundle:Default:my_products_and_services.html.twig', array('pands' => $pands, 'page' => $page, 'pages' => $pages));
    }

    public function listBusinessProductsAction($page) {
        $em = $this->getDoctrine()->getManager();
        $username = $this->get('security.token_storage')->getToken()->getUsername();
        $query = $em->createQuery('SELECT ps FROM HubBundle:Productsandservices ps');
        $pands = $query->setFirstResult(12 * ($page - 1))->setMaxResults(12)->getResult();
        $pages = count($em->getRepository('HubBundle:Productsandservices')->findAll());

        $pages = $pages / 12;

        return $this->render('HubBundle:Default:list_products_and_services.html.twig', array('pands' => $pands, 'page' => $page, 'pages' => $pages));
    }

}
