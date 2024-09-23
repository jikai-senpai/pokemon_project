<?php

class Sicario {
    private $id;
    private $name;
    private $working;

    public function __construct($id, $name, $working) {
        $this->id = $id;
        $this->name = $name;
        $this->working = $working;
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
}