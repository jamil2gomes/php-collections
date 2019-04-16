<?php

class TocadorDeMusica {

    private $musicas; 
    private $historico;
    private $filaDownloads;
    private $ranking;

   public function __construct(){
        $this->musicas = new SplDoublyLinkedList();
        $this->historico = new SplStack(); //pilha
        $this->filaDownloads = new SplQueue();
        $this->ranking = new Ranking();
        $this->musicas->rewind();
    }

    public function adicionarMusicas(SplFixedArray $musica){

        //rewind seta pro primeiro elemento ; valid verifica se existe valor; next vai pro próximo elemento
        for($musica->rewind(); $musica->valid(); $musica->next()){
            $this->musicas->push($musica->current());
        }
        $this->musicas->rewind();
    }

    public function adicionarMusica($musica){
        $this->musicas->push($musica);
    }
    
    public function adicionarMusicaNoComeco($musica){
        $this->musicas->unshift($musica);
    }

    public function removerMusicaNoComeco(){
        $this->musicas->shift();
    }

    public function removerMusica(){
        $this->musicas->pop();
    }

    public function tocarMusica(){
        if($this->musicas->count()==0){
            echo 'Erro, não existe música para ser tocada <br>';
        }else{
            $this->historico->push($this->musicas->current()); //lifo
            $this->musicas->current()->tocar();
        }
    }

    public function tocarUltimaMusicaTocada(){
        echo 'Tocando do histórico'. $this->historico->pop(). '<br>';
    }

    public function avancarMusica(){
        $this->musicas->next();

        if(!$this->musicas->valid()){
            $this->musicas->rewind();
        }
    }

    public function voltarMusica(){
        $this->musicas->prev();

        if(!$this->musicas->valid()){
            $this->musicas->rewind();
        }
    }

    public function exibirMusicas(){
        for($musica->rewind(); $musica->valid(); $musica->next()){
            echo 'Música: '.$musica->current();
        }
    }

    public function tamanhoDaLista(){
        echo 'Existem '.$this->musicas->count().' músicas na lista.';
    }

    //fifo
    public function baixarMusicas(){

        if($this->musicas->count() > 0) {

            for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()) {
                    $this->filaDeDownloads->push($this->musicas->current());
            }
            
            for($this->filaDeDownloads->rewind(); $this->filaDeDownloads->valid(); $this->filaDeDownloads->next()) {
                    echo "Baixando: " . $this->filaDeDownloads->current() . "...<br>";
            }
            
            } else {
                echo "Nenhuma música encontrada para baixar<br>";
            }

    
    }

    public function exibeRanking(){
        foreach ($this->musicas as $musica)
            $this->ranking->insert($musica);

        foreach ($this->ranking as $musica)
            echo 'Música '.$musica->getNome().' - '. $musica->getVezesTocada();
    }

    


}