<?php

namespace ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClientBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use ClientBundle\Form\ClientType;



class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Client/Default/index.html.twig');
    }

    public function AjouterClientAction(Request $request)
    {
     /*** Réclaration pour créer form */
    $form=$this->createForm(ClientType::class);
    $formView=$form->createView();


    /**   Récupérer les données de request */
    $form->handleRequest($request);


    
    if($form->isValid() && $form->isSubmitted())
    {

        $em   =  $this->getDoctrine()->getManager();

    /** Remplir l'objet client à partir des données existantes dans form */
        $Client =new Client();
        $Client->setName($form["name"]->getData());
        $Client->setPrenom($form["prenom"]->getData());
        $Client->setDateNai(new \DateTime($form["dateNai"]->getData()->format('d-m-Y')));
        $Client->setSexe($form["sexe"]->getData());
        $Client->setTelephone($form["telephone"]->getData());
        $Client->setPays($form["pays"]->getData());
        $Client->setDateinsc(new \DateTime("now"));

        $age=$this->getAge($Client->getDateNai()->format('d-m-Y'),$Client->getDateinsc()->format('d-m-Y'));
        $date = (int)$this->getHeur($Client->getDateinsc()->format('h'));
        

    /***Vérifier l'heure pour laquelle la demande a été créée */    
         
        if($date>=12 && $date<=21)
        {
             $Client->setEtat("validé");
      
        }   
        else
        {
       
            $Client->setEtat("attente");
        }


  /***Vérifier nombre inscription a dépassé 11 ou pas */
        if($this->getCount()<11)
        {

            /**Vérifier age et pays de candidat */

            if(($Client->getPays()=="Maroc" && $age>="16") || ($Client->getPays()!="Maroc" && $age>="18")  )
                {     
            $em->persist($Client);
            $em->flush();
                }
            else
                {
             echo "<script>alert(\"L'âge n'est pas  suffisant\")</script>";
                }

        }
      else
      {
          $moypour=$this->ValiderMoyenne()*0.1;
          $moy1=$this->ValiderMoyenne()+$moypour;
          $moy2=$this->ValiderMoyenne()-$moypour;

          if($age>=$moy2 && $age<=$moy1)
          {
            $em->persist($Client);
            $em->flush();
          }
          else
          {
            echo "<script>alert(\"L'âge n'est pas  suffisant\")</script>";
          }

      }


    }
    
    return $this->render('@Client/Default/index.html.twig', array('form' => $formView) );

    }



   public function  getAge(string $d1,string $d2)
    {
        $start_date = strtotime($d1); 
        $end_date   = strtotime($d2);
     
   
        $dif  = ceil(abs($start_date - $end_date) / 86400/365)-1;

        return $dif;
    }

    public function getHeur(string $d1)
    {
        return (int)$d1;
    }

    public function ValiderMoyenne()
    {
         $Client1= $this->getDoctrine()->getRepository(Client::class)->findAll();
         $somme=0;
         $compt=0;
 
    foreach($Client1 as $cli)
    {
        $compt++;
        $somme=$somme+$this->getAge($cli->getDateNai()->format('d-m-Y'),$cli->getDateinsc()->format('d-m-Y'));
    }

    return $somme/$compt;

    }

    public function getCount()
    {
         $Client1= $this->getDoctrine()->getRepository(Client::class)->findAll();
      
         $compt=0;
 
    foreach($Client1 as $cli)
    {
         $compt++;
        
    }

    return $compt;

    }

}
