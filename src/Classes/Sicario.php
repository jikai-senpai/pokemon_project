<?php

namespace Sicario;

class Sicario {
    private $id;
    private $name;
    private $working;

    public function __construct($id, $name, $working) {
        $this->id = $id;
        $this->name = $name;
        $this->working = false;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getWorking() {
        return $this->working;
    }

    public function killPokemon($pokemon) {
        if ($pokemon->estaMuerto() {
            echo $this->name . " ha matado a " . $pokemon->getName();
            return;
        }

        sleep(120);
        $pokemon->setStatus(false);
        echo "El pokemon {$pokemon->getName()} esta muerto";
    }
}