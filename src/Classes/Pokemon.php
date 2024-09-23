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
        $this->status = $status;
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

    public function getStatus() {
        return $this->status;
    }
}