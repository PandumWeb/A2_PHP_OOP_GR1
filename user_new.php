<?php
require __DIR__.'/_header.php';
use PandumWeb\Init\Trainer;
$missing_credential= '';
$credential_error ='';
$user_created = '';
/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__ .'/bootstrap.php';

 $trainername = !empty($_POST['trainername']) ? $_POST['trainername'] : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if (null !== $trainername && null !== $password) {
                   $trainer = new Trainer();

           $trainer
                ->setTrainername($trainername)
                ->setPassword($password)
            ;

            $em->persist($trainer);
            $em->flush();
           
   
        }
    if (empty($trainername) || empty($password)) {
        $missing_credential = true;
    } else {
        
            header('Location: create_pokemon.php');
       
    }

// $register = addUser();
echo $twig->render('user_new.html.twig', [
'missing_credential' => $missing_credential,
    'credential_error' => $credential_error,
    ' user_created ' => $user_created,
]);


