<?php

require __DIR__.'/_header.php';


if (empty($_SESSION['connected'])) {
    header('Location: login.php');
    die;
}

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $pokemonRepository */
$pokemonRepository = $em->getRepository('PandumWeb\Init\Pokemon\Model\PokemonModel');

/** @var PandumWeb\Init\Pokemon\Model\PokemonModel|null $pokemon */
$pokemon = $pokemonRepository->findOneBy([
    'trainerId' => $_SESSION['id'],
]);

$pokemonResuscitate = (0 === $pokemon->getHP()) ? false : true;

if (!$pokemonResuscitate) {
    $pokemon->addHP(100);

    $em->persist($pokemon);
    $em->flush();
}

header('Location: home.php');