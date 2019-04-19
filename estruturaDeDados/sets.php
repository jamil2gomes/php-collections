<?php

require 'Album.php';
require 'Musica.php';

$albuns = new SplObjectStorage(); //trata como set (não aceita valores duplicados)

$album1 = new Album("Album 1");
$album2 = new Album("Album 2");

$albuns->attach($album1);
$albuns->attach($album2);

$musicasAlbum1 = new SplFixedArray(3);

$musicasAlbum1[0] = new Musica("Musica1");
$musicasAlbum1[1] = new Musica("Musica2");
$musicasAlbum1[2] = new Musica("Musica3");


$musicasAlbum2 = new SplFixedArray(3);

$musicasAlbum2[0] = new Musica("Musica11");
$musicasAlbum2[1] = new Musica("Musica22");
$musicasAlbum2[2] = new Musica("Musica33");

//Como adicionar as musicas nos albuns? Como se fosse o map 
//usando os objetos albuns como chave

$albuns[$album1] = $musicasAlbum1;
$albuns[$album2] = $musicasAlbum2;

foreach ($albuns as $album) {
    echo 'Album '. $album->getNome().'<br>';

    foreach ($albuns[$album] as $musica) {
       echo 'Musica '. $musica->getNome().'<br>';
    }

    echo '<br>';
}