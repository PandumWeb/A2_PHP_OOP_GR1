<?php

require __DIR__.'/_header.php';
/**
 * Protection
 */
if (empty($_SESSION['connected'])) {
    header('Location: index.php');
    die;
}
use PandumWeb\Init\Pokemon\Model\PokemonModel;

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';
/** @var \Doctrine\ORM\EntityRepository $pokemonRepository */
$pokemonRepository = $em->getRepository('PandumWeb\Init\Pokemon\Model\PokemonModel');

$pokemons = $pokemonRepository->findAll();
$pokemonStriker = $pokemonRepository->findOneBy([
    'trainerId' => $_SESSION['id'],
]);


if (!empty($_GET['id'])) {
    if ($_SESSION['id'] === (int)$_GET['id']) {
        echo"Tu dois attaquer un adversaire !";
       
    } else {
        $trainerId = $_GET['id'];
        $pokemonVersus = $pokemonRepository->findOneBy([
            'trainerId' => $trainerId,
        ]);
        if (0 === $pokemonVersus->getHP()) {
            echo "Ce pokemon est déjà K.O !";;
        
        } else {
           //combat
        }
    }
} 
echo $twig->render('fight.html.twig', [
    'pokemons' => $pokemons,
    'home'     => 'home.php',
    
]);
?>