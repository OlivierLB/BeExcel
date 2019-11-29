<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 09:50
 */

namespace App\Utils;


class ChiffreFromLettre {
    public function getChiffreFromLettre($lettre){
        $chiffre = 0;
        switch ($lettre){
            case 'A':
                $chiffre = 1;
                break;
            case 'B':
                $chiffre = 2;
                break;
            case 'C':
                $chiffre = 3;
                break;
            case 'D':
                $chiffre = 4;
                break;
            case 'E':
                $chiffre = 5;
                break;
            case 'F':
                $chiffre = 6;
                break;
            case 'G':
                $chiffre = 7;
                break;
            case 'H':
                $chiffre = 8;
                break;
            case 'I':
                $chiffre = 9;
                break;
            case 'J':
                $chiffre = 10;
                break;
            case 'K':
                $chiffre = 11;
                break;
            case 'L':
                $chiffre = 12;
                break;
            case 'M':
                $chiffre = 13;
                break;
            case 'N':
                $chiffre = 14;
                break;
            case 'O':
                $chiffre = 15;
                break;
            case 'P':
                $chiffre = 16;
                break;
            case 'Q':
                $chiffre = 17;
                break;
            case 'R':
                $chiffre = 18;
                break;
            case 'S':
                $chiffre = 19;
                break;
            case 'T':
                $chiffre = 20;
                break;
            case 'U':
                $chiffre = 21;
                break;
            case 'V':
                $chiffre = 22;
                break;
            case 'W':
                $chiffre = 23;
                break;
            case 'X':
                $chiffre = 24;
                break;
            case 'Y':
                $chiffre = 25;
                break;
            case 'Z':
                $chiffre = 26;
                break;
        }
        return $chiffre;
    }
}