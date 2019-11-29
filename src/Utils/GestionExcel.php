<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 10:26
 */

namespace App\Utils;


class GestionExcel {

    public function getCalculatedValue($feuille, $collumn, $row){
        return $feuille->getCellByColumnAndRow($collumn, $row)->getCalculatedValue();
    }

    public function getOldCalculatedValue($feuille, $collumn, $row){
        return $feuille->getCellByColumnAndRow($collumn, $row)->getOldCalculatedValue();
    }

    public function getNbAdresse($pointageEtude){
        $dimension = $pointageEtude->calculateWorksheetDataDimension();
        if(intval(substr($dimension, -3)) === 0){
            if(intval(substr($dimension, -2)) === 0)
                $longueur = substr($dimension, -1);
            else
                $longueur = substr($dimension, -2);
        }else
            $longueur = substr($dimension, -3);
        return $longueur;
    }
}