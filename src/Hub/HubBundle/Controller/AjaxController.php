<?php

namespace Hub\HubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hub\HubBundle\Entity\User;
use Hub\HubBundle\Entity\Basicuser;
use Hub\HubBundle\Entity\Profession;
use Hub\HubBundle\Entity\Professional;
use Hub\HubBundle\Entity\Skill;
use Hub\HubBundle\Entity\Business;
use Hub\HubBundle\Entity\Notification;

class AjaxController extends Controller {

    public function createNotificationAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $emitter = $em->getRepository('HubBundle:User')->find($request->request->get('emitter'));
        $receiver = $em->getRepository('HubBundle:User')->find($request->request->get('receiver'));

        $notification = new Notification();
        $notification->setUserreceiver($receiver);
        $notification->setUseremitter($emitter);
        $notification->setMessage($request->request->get('message'));
        $notification->setIsread(false);
        $notification->setDate(new \DateTime(null, null));
        $em->persist($notification);
        $em->flush();
        //return new Response('Your message has been send', 200,array('Content-Type'=>'text/plain')) ;

        if (true) {
//$em->flush();
            return new Response('Your message has been send ' . $this->get('security.token_storage')->getToken()->getUsername(), 200, array('Content-Type' => 'text/plain'));
        } else {
            return new Response('you can not send message, please registrer as professional or business', 200, array('Content-Type' => 'text/plain'));
        }
    }

    public function insertPhotoBusinessAction() {
        $request = $this->container->get('request_stack')->getCurrentRequest();

        if ($request->getMethod() == 'POST') {
            $ext = $request->files->get('archivo')->guessExtension();
            $photo = uniqid();
            $photo = $photo . '.' . $ext;
            $dir = $this->container->getParameter('kernel.root_dir') . '/../web/bundles/hub/perfil';
            $request->files->get('archivo')->move($dir, $photo);
        } else {
            return $this->render('HubBundle:Default:test2.html.twig');
        }
    }

    public function newNotificationAction() {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $user = $this->get('security.token_storage')->getToken()->getUsername();
        $em = $this->getDoctrine()->getManager();
        $newNotification = $em->createQuery('SELECT n FROM HubBundle:Notification n where n.userreceiver = :receiver and n.isread = 0')->setParameter('receiver', $user)->getResult();
        $count = count($newNotification);

        $notification = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><answer><count>" . $count . "</count><notifications>";
        foreach ($newNotification as $n) {
            $perfil = $n->getUseremitter()->getPerfilphoto();
            $emitter = $n->getUseremitter()->getUser();
            $date = $n->getDate();
            $message = $n->getMessage();
            $intervalo = date_diff(new DateTime("now"), DateTime($date->format('Y-m-d')));
            $result = $intervalo->format('%R%a day');
//             $result = $date->format('Y-m-d');
            $notification = $notification . "<notification><perfil>" . $perfil . "</perfil><emitter>" . $emitter . "</emitter><message>" . $message . "</message><date>" . $result . "</date></notification>";
        }

        $notification = $notification . "</notifications></answer>";
        return new Response($notification, 200, array('Content-Type' => 'application/xml'));
    }

    public function testAjaxAction() {
        
    }

    /**
     * Crop image profile.
     */
    public function imageCropAction(Request $request) {

        $fileName = uniqid();

        $fileName = $fileName . '.' . $request->files->get('photoToCrop')->guessExtension();
        $target_dir = "bundles/hub/perfil/";
        $target_file = $target_dir . $fileName;

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $targ_w = 750;
        $targ_h = 750;
        $jpeg_quality = 90;

        $src = $_FILES["photoToCrop"]["tmp_name"];
        $img_r = null;
        if ($imageFileType != "jpg" or $imageFileType != "jpeg") {
            $img_r = imagecreatefromjpeg($src);
            $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
            imagecopyresampled($dst_r, $img_r, 0, 0, $request->request->get('x'), $request->request->get('y'), $targ_w, $targ_h, $request->request->get('w'), $request->request->get('h'));
            imagejpeg($dst_r, $target_file, $jpeg_quality);
        } else if ($imageFileType != "png") {
            $img_r = imagecreatefrompng($src);
            $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
            imagecopyresampled($dst_r, $img_r, 0, 0, $request->request->get('x'), $request->request->get('y'), $targ_w, $targ_h, $request->request->get('w'), $request->request->get('h'));
            imagepng($dst_r, $target_file, $jpeg_quality);
        } else if ($imageFileType != "gif") {
            $img_r = imagecreatefromgif($src);
            $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
            imagecopyresampled($dst_r, $img_r, 0, 0, $request->request->get('x'), $request->request->get('y'), $targ_w, $targ_h, $request->request->get('w'), $request->request->get('h'));
            imagegif($dst_r, $target_file);
        }

        return new Response($fileName, 200, array('Content-Type' => 'text/plain'));
    }

}
