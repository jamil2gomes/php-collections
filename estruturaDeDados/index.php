<?php

require 'TocadorDeMusica.php';

$musicas =  new SplFixedArray(2); // cria um array de tamanho fixo

$musicas[0] = "Closer";
$musicas[1] = "Winds of Change";

$musicas->setSize(4); //caso eu queira aumentar o tamanho do array

$musicas[2] = "Fullmoon";
$musicas[3] = "Kings and Queens";

$musicas->getSize(); //caso eu queira saber o tamanho do array

$tocador = new TocadorDeMusica();

$tocador->adicionarMusicas($musicas);


