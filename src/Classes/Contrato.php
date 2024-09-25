<?php

class Contrato {
    private $id;
    private $nameSicario;
    private $idPokemon;
    private $createAt;

    public function __construct($id, $nameSicario, $idPokemon, $createAt) {
        $this->id = $id;
        $this->nameSicario = $nameSicario;
        $this->idPokemon = $idPokemon;
        $this->createAt = $createAt;
    }

    public function getId() {
        return $this->id;
    }

    public function getNameSicario() {
        return $this->nameSicario;
    }

    public function getIdPokemon() {
        return $this->idPokemon;
    }

    public function getCreateAt() {
        return $this->createAt;
    }
}