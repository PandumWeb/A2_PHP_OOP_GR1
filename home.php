<?php
require __DIR__.'/_header.php';
/**
 * Protection
 */
if (empty($_SESSION['connected'])) {
    header('Location: login.php');
    die;
}
/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';
/** @var \Doctrine\ORM\EntityRepository $pokemonRepository */
$pokemonRepository = $em->getRepository('PandumWeb\Init\Pokemon\Model\PokemonModel');
$pokemon = $pokemonRepository->findOneBy([
    'trainerId' => $_SESSION['id'],
]);

$pokemonExist = (null !== $pokemon) ? true : false;
if ($pokemonExist) {
        $pokemonFight = (0 === $pokemon->getHP()) ? false : true;
        $HP = $pokemon->getHP();
        $pokemonName = $pokemon->getName();
} 
echo $twig->render('home.html.twig', [
    'username'     => $_SESSION['trainername'],
    'logout'       => 'logout.php',
    'pokemonExist'  => $pokemonExist,
    'pokemonFight' => $pokemonFight,
    'pokemonName'  => $pokemonName,
    'pokemonHP'    => $HP,
]);