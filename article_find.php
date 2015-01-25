<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $articleRepository */
$articleRepository = $em->getRepository('PandumWeb\Init\Article');


$status = !empty($_POST['status']) ? $_POST['status'] : (\PandumWeb\Init\Article::STATUS_PENDING);

if (!empty($_POST['username'])) {
    $username = $_POST['username'];

    $article = new \PandumWeb\Init\Article();
    $article
        ->setTitle($username)
        ->setSlug('zezeg')
        ->setStatus($status)
    ;

    $em->persist($article);
    $em->flush();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="username">Useranme</label>
        <input id="username" name="username" type="text"/>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="<?php echo \PandumWeb\Init\Article::STATUS_PENDING; ?>">En attente</option>
            <option value="1">Validé</option>
            <option value="2">Supprimé</option>
        </select>
        
        <input type="submit" value="Créer user!"/>
    </form>
</body>
</html>