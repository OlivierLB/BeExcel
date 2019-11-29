<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 10:41
 */

namespace App\Utils\TraitementsExcel;


use App\Utils\ChiffreFromLettre;
use App\Utils\GestionExcel;

class Positionnement {

    public function traitementPositionnement($positionnementEtude, $nbAdresse, $paramObject){
        $errorPositionnement = array();
        $chiffreFromLettre = new ChiffreFromLettre();
        $gestionExcel = new GestionExcel();
        $somme = 0;
        $premier = 0;
        for($i = $paramObject->pseLiDe; $i <= $nbAdresse; $i++){
            if($gestionExcel->getCalculatedValue($positionnementEtude, 1, $i)){
                ($somme===0?$premier=$i:'');
                $somme += $gestionExcel->getOldCalculatedValue($positionnementEtude,
                    $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColNb), $i);
                if($gestionExcel->getCalculatedValue($positionnementEtude,
                        $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColId), $i) !==
                    $gestionExcel->getCalculatedValue($positionnementEtude,
                        $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColId), $i+1)){

                    if($somme !== $gestionExcel->getOldCalculatedValue($positionnementEtude,
                            $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColNbSum), $premier)){
                        $idPB = $gestionExcel->getCalculatedValue($positionnementEtude,
                            $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColId), $i);
                        array_push($errorPositionnement, "Nombre de logement erroné (id PB Geofibre : $idPB)");
                    }
                    $somme = 0;
                }
            }
        }
        return $errorPositionnement;
    }
}