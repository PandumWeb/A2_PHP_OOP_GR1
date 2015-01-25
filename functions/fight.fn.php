
<?php

/**
* Logic
*/

function fight(){

    $matchOver ='';
    $roundNumber='';
    $goal='';
    $striker='';

    while (false === $matchOver) {
        echo '<h2>Round n°'.$roundNumber.'</h2>';

        $attackNumber = mt_rand(1, 3);

        for ($i = 0; $i < $attackNumber; $i++) {
            $attackValue = mt_rand(5, 20);

            if ($striker->isTypeWeak($goal->getType()))
                $attackValue = ceil($attackValue / 2);

            if ($striker->isTypeStrong($goal->getType()))
                $attackValue = ceil($attackValue * 2);

            $goal->removeHP((int)$attackValue);

            echo '<h3>'.$striker->getName().' attacks '.$goal->getName().'. Attack n°'.($i+1).' on '.$attackNumber.' '.$attackValue.' HP removed. '.$goal->getName().' have '.$goal->getHP().'HP left</h3>';

            if (0 === $goal->getHP()) {
                $matchOver = true;
                break;
            }
        }

        if (false === $matchOver)
            list($striker, $goal) = [$goal, $striker];

        $roundNumber++;
    }
}
