<?php 

namespace AppBundle\Entity; 
use Symfony\Component\Validator\Constraints as Assert;  class Student { 
   /** 
      * @Assert\NotBlank() 
   */ 
   private $name;  
      
   /** 
      * @Assert\NotBlank() 
   */ 
   private $age;  
      
   /** 
      * @Assert\NotBlank(message="Please, upload the photo.") 
      * @Assert\File(mimeTypes={ "text/plain" }) 
   */ 
   private $photo; 
      
   public function getName() { 
      return $this->name; 
   } 
   public function setName($name) { 
      $this->name = $name; 
      return $this; 
   } 
   public function getAge() { 
      return $this->age; 
   } 
   public function setAge($age) { 
      $this->age = $age; 
      return $this; 
   } 
   public function getPhoto() { 
      return $this->photo; 
   } 
   public function setPhoto($photo) { 
      $this->photo = $photo; 
      return $this; 
   } 
} 