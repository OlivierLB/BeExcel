<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 10:43
 */

namespace App\Utils\TraitementsExcel;


use App\Utils\ChiffreFromLettre;
use App\Utils\GestionExcel;

class Synoptique {

    public function traitementSynoptique($synoptique, $paramObject){
        $errorSynoptique = array();
        $chiffreFromLettre = new ChiffreFromLettre();
        $gestionExcel = new GestionExcel();

        if($gestionExcel->getOldCalculatedValue($synoptique, $chiffreFromLettre->getChiffreFromLettre($paramObject->sbColNb),
                $paramObject->sbLiPmz) === '* Champ à renseigner manuellement')
            array_push($errorSynoptique, "Nombre de µmodules affecté lors de l'étude PMZ-PA non renseigné");
        if($gestionExcel->getOldCalculatedValue($synoptique, $chiffreFromLettre->getChiffreFromLettre($paramObject->sbColNb),
                $paramObject->sbLiPa) == 0)
            array_push($errorSynoptique, "Nombre de µmodules issus de l'étude de la zone arrière de PA non renseigné");
        return $errorSynoptique;
    }
}