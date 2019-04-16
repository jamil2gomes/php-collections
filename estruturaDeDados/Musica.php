<?php
class Musica{
    private $nome;
    private $vezesTocada;

    public function __construct($nome){
        $this->nome = $nome;
        $this->vezesTocada = 0;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getVezesTocada(){
        return $this->vezesTocada;
    }

    public function tocar(){
        echo 'Tocando música: '.$this->getNome().'<br>';
        $this->vezesTocada++;
    }

    public function __toString(){
        return $this->nome;
    }
}