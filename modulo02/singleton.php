<?php

require __DIR__ . "/classes/Preferecias.php";

$p1 = Preferencias::getInstance();

print "Linguagem padrão: " . $p1->getData('language') . "<br >";
$p1->setData('language', 'wu');

// print "Linguagem Alterada! <br >";

var_dump($p1);

echo '<br >';

$p2 = Preferencias::getInstance();
// var_dump($p2);

print "Linguagem padrão: " . $p2->getData('language') . "<br >";