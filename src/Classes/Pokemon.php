<?php

class Pokemon {
    private $id;
    private $name;
    private $type;
    private $status;

    public function __construct($id, $name, $type, $status) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->status = true;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function estaMuerto() {
        return $this->status === false;
    }

    public function getStatus() {
        $this->status = $status;
    }
}