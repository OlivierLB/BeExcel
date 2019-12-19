<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 09/12/2019
 * Time: 12:02
 */

namespace App\Utils\Autocad;


use App\Utils\ChiffreFromLettre;
use App\Utils\GestionExcel;
use olivierlb\phpdxf\Color;
use olivierlb\phpdxf\LineType;

class Pa {
    public function addPa($dxf, $spreadsheet, $paramObject){
        $x = -41.13;
        $y = 5.18;

        $pageDeGarde = $spreadsheet->getSheetByName('page_de_garde');
        $gestionExcel = new GestionExcel();
        $chiffreFromLettre = new ChiffreFromLettre();

        $dxf->setLayer('rouge')
            ->addPolyline([
                $x + 1, $y,
                $x + 34, $y,
                $x + 34, $y - 32.5,
                $x, $y - 32.5,
                $x, $y,
                $x + 1, $y,
            ], 0, 0.3)
            ->addPolyline([
                $x, $y - 3.4,
                $x + 34, $y - 3.4,
                $x, $y - 3.4
            ], 0, 0.3)
            ->setLayer('texte')
            ->addText($x + 0.5, $y - 0.75, 0, "PA : " . substr($gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColPaGeo), $paramObject->pgLiPaGeo), -5), 1.875, 1)
            ->addText($x + 0.5, $y - 4.5, 0, "PT : ", 1.875, 1)
            ->addText($x + 0.5, $y - 8.25, 0, "PF : ", 1.875, 1)
            ->addText($x + 0.5, $y - 11.5, 0, "Code ch. IPON : " . substr($gestionExcel->getCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColEmpPa), $paramObject->pgLiEmpPa),4, 8 ), 1.875, 1)
            ->addText($x + 0.5, $y - 14.75, 0, "ADR : ", 1.875, 1)
            ->addText($x + 0.5, $y - 18, 0, "ELR : " . $gestionExcel->getOldCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColLog), $paramObject->pgLiLog), 1.875, 1)
            ->addText($x + 0.5, $y - 21.25, 0, "TYPE PEO : ", 1.875, 1)
            ->addText($x + 0.5, $y - 24.5, 0, "SORTIES : ", 1.875, 1)
            ->addText($x + 0.5, $y - 27.75, 0, "NB µmodules : " . $gestionExcel->getOldCalculatedValue($pageDeGarde, $chiffreFromLettre->getChiffreFromLettre($paramObject->pgColNbPa), $paramObject->pgLiNb), 1.875, 1)
            ->addText($x   + 5, $y - 45, 0, "Jonction", 4.125, 1)
            ->addPolyline([
                $x - 5, $y - 50,
                $x + 39, $y - 50,
                $x + 39, $y - 280,
                $x - 5, $y - 280,
                $x - 5, $y - 50
            ])
            ->setLayer('delim')
            ->addPolyline([
                $x + 17, $y - 50,
                $x + 17, $y - 280
            ], 0, 0, 0.1)
            ->saveToFile('synoptiqueGenere.dxf');
    }
}