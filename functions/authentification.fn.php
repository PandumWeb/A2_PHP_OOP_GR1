<?php

use PandumWeb\Init\User;
$username = !empty($_POST['username']) ? $_POST['username'] : null;
$password = !empty($_POST['password']) ? $_POST['password'] : null;


/**
 * SignIn
 */

// function addUser(){

   

//     $username = !empty($_POST['username']) ? $_POST['username'] : null;
//     $password = !empty($_POST['password']) ? $_POST['password'] : null;

//     if (null !== $username && null !== $password) {
//                    $user = new User();

//             $user
//                 ->setUsername($username)
//                 ->setPassword($password)
//             ;

//             $em->persist($user);
//             $em->flush();

//             echo 'User created!';
//         }else{
//         echo'Veuillez compléter tous les champs';
//     }

// }
/**
 * Login
 */

function connection(){

    /** @var \Doctrine\ORM\EntityManager $em */
    $em = require __DIR__.'/../bootstrap.php';
    $username = !empty($_POST['username']) ? $_POST['username'] : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if (null !== $username && null !== $password) {
        /** @var \Doctrine\ORM\EntityRepository $userRepository */
        $userRepository = $em->getRepository('PandumWeb\Init\User');

        /** @var User|null $user */
        $user = $userRepository->findOneBy([
            'username' => $username,
            'password' => $password,
        ]);


        if (null !== $user) {
            $_SESSION['id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['connected'] = true;
            echo "top";
        }
    }
 
}