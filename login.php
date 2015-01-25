<?php

require __DIR__.'/_header.php';
use PandumWeb\Init\Trainer;
   
    /** @var \Doctrine\ORM\EntityManager $em */
  
    $trainername = !empty($_POST['trainername']) ? $_POST['trainername'] : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if (null !== $trainername && null !== $password) {
        /** @var \Doctrine\ORM\EntityRepository $trainerRepository */
        $trainerRepository = $em->getRepository('PandumWeb\Init\Trainer');

        /** @var Trainer|null $trainer */
        $trainer = $trainerRepository->findOneBy([
            'trainername' => $trainername,
            'password' => $password,
        ]);


        if (null !== $trainer) {
            $_SESSION['id'] = $trainer->getId();
            $_SESSION['trainername'] = $trainer->getTrainername();
            $_SESSION['connected'] = true;
            header('location:create_pokemon.php');
             }
           
            
       
    }

echo $twig->render('login.html.twig');