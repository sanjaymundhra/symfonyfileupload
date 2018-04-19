<?php 
namespace AppBundle\Controller; 

use AppBundle\Entity\Student; 
use AppBundle\Form\FormValidationType; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 

use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\FileType; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType;  

class StudentController extends Controller {    
   /** 
      * @Route("/student/new") 
   */ 
   public function newAction(Request $request) { 
      $student = new Student(); 
      $form = $this->createFormBuilder($student) 
         ->add('name', TextType::class) 
         ->add('age', TextType::class) 
         ->add('photo', FileType::class, array('label' => 'Photo (png, jpeg)')) 
         ->add('save', SubmitType::class, array('label' => 'Submit')) 
         ->getForm(); 
         
      $form->handleRequest($request); 
      if ($form->isSubmitted() && $form->isValid()) { 
         $file = $student->getPhoto(); 
         $fileName = md5(uniqid()).'.'.$file->guessExtension(); 
         $file->move($this->getParameter('photos_directory'), $fileName); 
         $student->setPhoto($fileName); 
         return new Response("User photo is successfully uploaded."); 
      } else { 
         return $this->render('student/new.html.twig', array( 
            'form' => $form->createView(), 
         )); 
      } 
   }   
}  