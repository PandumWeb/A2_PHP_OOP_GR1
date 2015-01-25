<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use PandumWeb\Init\Article;
use Cocur\Slugify\Slugify;

$article = new Article();
$slugify = new Slugify();

$article
    ->setTitle('lzakj kjezfbkahz ')
    ->setSlug($slugify->slugify('efe efklnezklnazd azdh za azj zad  azdbazdazd'))
    ->setStatus(Article::STATUS_REMOVED)
;

$em->persist($article);

$em->flush();

