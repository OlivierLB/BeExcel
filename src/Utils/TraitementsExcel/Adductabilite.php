<?php


namespace App\Utils\TraitementsExcel;


use App\Utils\ChiffreFromLettre;
use App\Utils\GestionExcel;

class Adductabilite
{
    public function traitementAdductabilite($adductabilite, $nbAdresse, $paramObject){
        $errorAdductabilite = array();
        $gestionExcel = new GestionExcel();
        $chiffreFromLettre = new ChiffreFromLettre();

        for($i = 3; $i <= $nbAdresse; $i++){
            $nature = $gestionExcel->getCalculatedValue($adductabilite, $chiffreFromLettre->getChiffreFromLettre($paramObject->addColNat), $i);
            $hauteur = substr($gestionExcel->getCalculatedValue($adductabilite, $chiffreFromLettre->getChiffreFromLettre($paramObject->addColHau), $i),0, 2);
            $complexite = $gestionExcel->getCalculatedValue($adductabilite, $chiffreFromLettre->getChiffreFromLettre($paramObject->addColIte), $i);
            $adduction = substr($gestionExcel->getCalculatedValue($adductabilite, $chiffreFromLettre->getChiffreFromLettre($paramObject->addColIon), $i), 0, 2);

            if(($nature === "Souterrain" && ($hauteur !== "HH" || $complexite !== "simple")) ||
                ($nature === "Façade" && ($hauteur !== "GH" || $complexite !== "complexe")) ||
                (($nature !== "Souterrain" && $nature !== "Façade" && $nature) && ($hauteur !== "PH" || $complexite !== "complexe"))){

                array_push($errorAdductabilite, "Erreur ligne $i de la feuille adductabilité des sites");
            }

            if($adduction === "AS"){
                $commentaire = explode(" ", strtolower($gestionExcel->getCalculatedValue($adductabilite, $chiffreFromLettre->getChiffreFromLettre($paramObject->addColCom), $i)));
                $motAduction =  $motDirect = false;

                foreach ($commentaire as $mot){
                    if(strtolower($mot) === strtolower("adduction"))
                        $motAduction = true;
                    elseif (strtolower($mot) === strtolower("directe"))
                        $motDirect = true;
                }

                if(!$motDirect || !$motAduction)
                    array_push($errorAdductabilite, "Erreur de commentaire ligne $i de la feuille adductabilité des sites");
            }
        }

        return $errorAdductabilite;
    }
}