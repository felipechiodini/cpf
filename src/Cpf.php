<?php

namespace Felipechiodini\Cpf;

class Cpf {

    public $cpf;

    public function __construct(String $cpf)
    {
        $this->cpf = preg_replace('/[^0-9]/', '', $cpf);
    }

    public function withoutMask(): String
    {
        return $this->cpf;
    }

    public function getFormated(): String
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $this->cpf);
    }

    public function isInvalid(): Bool
    {
        return Validator::isValid($this);
    }

    public function isValid(): Bool
    {
        return Validator::isValid($this);
    }

}