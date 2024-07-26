<?php

namespace Felipechiodini\Cpf;

class Validator
{

    public static function isValid(Cpf $cpf): Bool
    {
        return self::validate($cpf->withoutMask()) === true;
    }

    public static function isInvalid(Cpf $cpf): Bool
    {
        return self::validate($cpf->withoutMask()) === false;
    }

    private static function validate(String $value): Bool
    {
        if (strlen($value) != 11) {
            return false;
        }

        if (preg_match('/^(\d)\1*$/', $value)) {
            return false;
        }

        for ($i = 9; $i < 11; $i++) {
            $digito = 0;
            for ($j = 0; $j < $i; $j++) {
                $digito += $value[$j] * (($i + 1) - $j);
            }
            $digito = (($digito % 11) < 2) ? 0 : 11 - ($digito % 11);
            if ($digito != $value[$i]) {
                return false;
            }
        }

        return true;
    }

}