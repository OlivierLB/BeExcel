<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 10:37
 */

namespace App\Utils\TraitementsExcel;

use App\Utils\ChiffreFromLettre;
use App\Utils\GestionExcel;

class PageDeGarde {

    public function traitementPageDeGarde($pageDeGarde, $paramObject){
        $errorGarde = array();
        $chiffreFromLettre = new ChiffreFromLettre();
        $gestionExcel = new GestionExcel();

        //Les données à vérifier commencent ligne 8 et terminent ligne 17
        for($i = $paramObject->pgLiDebInfos; $i <= $paramObject->pgLiFinInfos; $i++){
            //Traitement spécifique pour les lignes 12 et 13
            if($i === $paramObject->pgLiPmz || $i === $paramObject->pgLiPa){
                $donnee = $gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColPaGeo), $i);
                $identifiant = $gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColPaId), $i);

                if( $donnee === "A renseigner Manuellement"){
                    $champ = $gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColInfos), $i);
                    array_push($errorGarde, "Le champ $champ est vide.");
                }
                if(!$identifiant){
                    $champ = $gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColLabId), $i);
                    array_push($errorGarde, "Le champ $champ est vide.");
                }
            }else{
                $donnee = $gestionExcel->getCalculatedValue($pageDeGarde,  $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColInfos), $i);
                if( $donnee === null || $donnee === "à determiner" || $donnee == ""){
                    $champ = $gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColLab), $i);
                    array_push($errorGarde, "Le champ $champ est vide.");
                }
            }
        }
        $donneePMZ = $gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColNbPmz),
            $chiffreFromLettre->getChiffreFromLettre($paramObject->pgLiNb));
        if($donneePMZ === "* Champ à renseigner manuellement"){
            $champ = $gestionExcel->getCalculatedValue($pageDeGarde,  $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColLabNb),
                $chiffreFromLettre->getChiffreFromLettre($paramObject->pgLiNb));
            array_push($errorGarde, "Le champ $champ est vide.");
        }
        return $errorGarde;
    }
}