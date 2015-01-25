<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $articleRepository */
$articleRepository = $em->getRepository('PandumWeb\Init\Article');

/** @var \PandumWeb\Init\Article $article */
$article = $articleRepository->find(3);

$article->setTitle('plop');

$em->flush();