<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 10:39
 */

namespace App\Utils\TraitementsExcel;


use App\Utils\ChiffreFromLettre;
use App\Utils\GestionExcel;

class Pointage {

    public function traitementPointage($pointageEtude, $nbAdresse, $paramObject){
        $errorPointage = array();
        $chiffreFromLettre = new ChiffreFromLettre();
        $gestionExcel = new GestionExcel();
        for($i = $paramObject->peLiDe; $i <= $nbAdresse; $i++){
            $calculatedValue = $gestionExcel->getOldCalculatedValue($pointageEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->peColMenu), $i);
            if($calculatedValue === "Immeuble à supprimer" || $calculatedValue === "Immeuble hors PA"){
                if( $gestionExcel->getOldCalculatedValue($pointageEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->peColElr), $i) != 0 ||
                    $gestionExcel->getOldCalculatedValue($pointageEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->peColElp), $i) != 0 ||
                    $gestionExcel->getOldCalculatedValue($pointageEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->peColTotal), $i) != 0){
                    array_push($errorPointage, "Erreur ligne $i de la feuille \"pointage-etude\"");
                }
            }
        }
        return $errorPointage;
    }

}