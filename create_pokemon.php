<?php
require __DIR__.'/_header.php';

if (empty($_SESSION['connected']))
    header("Location: login.php");

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';
use PandumWeb\Init\Pokemon\Model\PokemonModel;
use PandumWeb\Init\Pokemon\PokemonFire;
use PandumWeb\Init\Pokemon\PokemonWater;
use PandumWeb\Init\Pokemon\PokemonPlant;

/** @var \Doctrine\ORM\EntityRepository $trainerRepository */
$trainerRepository = $em->getRepository('PandumWeb\Init\Trainer');
$trainer = $trainerRepository->find($_SESSION['id']);

$pokemonName = !empty($_POST['pokemonName']) ? $_POST['pokemonName'] : null;
$pokemonType = !empty($_POST['pokemonType']) ? $_POST['pokemonType'] : null;
$attackedAtInit = new DateTime();

if (null !== $pokemonName && null !== $pokemonType) {
    if ($pokemonType === 'Fire') {
        $pokemon = new PokemonFire();

        $pokemon
            ->setName($pokemonName)
            ->setHP(100)
            ->setTrainerId($trainer)
        ;

        $em->persist($pokemon);
        $em->flush();
    } else if ($pokemonType === 'Water') {
        $pokemon = new PokemonWater();

        $pokemon
            ->setName($pokemonName)
            ->setHP(100)
            ->setTrainerId($trainer)
        ;

        $em->persist($pokemon);
        $em->flush();
    } else {
        $pokemon = new PokemonPlant();

        $pokemon
            ->setName($pokemonName)
            ->setHP(100)
            ->setTrainerId($trainer)
        ;

        $em->persist($pokemon);
        $em->flush();
    }

    header('Location:home.php');
}
echo $twig->render('create_pokemon.html.twig', [
]);


