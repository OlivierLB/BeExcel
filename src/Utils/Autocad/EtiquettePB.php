<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 04/12/2019
 * Time: 08:42
 */

namespace App\Utils\Autocad;


use App\Utils\ChiffreFromLettre;
use App\Utils\GestionExcel;
use olivierlb\phpdxf\Color;
use olivierlb\phpdxf\LineType;


class EtiquettePB {

    public function gestionPB($dxf, $spreadsheet, $paramObject){
        $this->listPB($dxf, $spreadsheet, $paramObject);
    }

    private function listPB($dxf, $spreadsheet, $paramObject){
        $x = -150;
        $y = 150;

        $positionnementEtude = $spreadsheet->getSheetByName('positionnement-etude');
        $gestionExcel = new GestionExcel();
        $chiffreFromLettre = new ChiffreFromLettre();

        for ($i = 5; $i <= 80; $i++) {
            if($gestionExcel->getCalculatedValue($positionnementEtude, 1, $i)){
                if($gestionExcel->getCalculatedValue($positionnementEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColIdGeo), $i) !== $gestionExcel->getCalculatedValue($positionnementEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColIdGeo), $i - 1)){
                    $data['troncon'] = $gestionExcel->getCalculatedValue($positionnementEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColTro), $i);
                    $data['ELR'] = $gestionExcel->getOldCalculatedValue($positionnementEtude,$chiffreFromLettre->getChiffreFromLettre($paramObject->pseColNbSum), $i);
                    $data['ADR'] = $gestionExcel->getOldCalculatedValue($positionnementEtude,$chiffreFromLettre->getChiffreFromLettre($paramObject->pseColAdr), $i);
                    $data['codeCH'] = $gestionExcel->getOldCalculatedValue($positionnementEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColSit), $i);
                }
                if($gestionExcel->getCalculatedValue($positionnementEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColIdGeo), $i) !== $gestionExcel->getCalculatedValue($positionnementEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColIdGeo), $i + 1)){
                    $data['PB'] =  substr($gestionExcel->getCalculatedValue($positionnementEtude, $chiffreFromLettre->getChiffreFromLettre($paramObject->pseColIdGeo), $i), -5);
                    $this->newEtiquettePB($x, $y, $dxf, $data);
                    $x += 60;
                }
            }
        }
    }

    private function newEtiquettePB($x, $y, $dxf, $data){

        $dxf->setLayer('texte', Color::WHITE, LineType::SOLID)
            ->addText($x, $y - 0.5, 0, "PB : " . $data['PB'], 1.875, 1)
            ->addText($x + 28, $y - 0.5, 0, substr($data['troncon'], 0, 6) . ".", 1.875, 1)
            ->addText($x, $y - 6, 0, "PT : ", 1.875, 1)
            ->addText($x, $y - 9.5, 0, "PF : ", 1.875, 1)
            ->addText($x, $y - 13, 0, "Code ch. IPON : " . substr($data['codeCH'], 4, -6), 1.875, 1)
            ->addText($x, $y - 16.5, 0, "N° type VOIE : ", 1.875, 1)
            ->addText($x, $y - 20, 0, "ADR : " . $data['ADR'], 1.875, 1)
            ->addText($x, $y - 23.5, 0, "ELR : " . $data['ELR'], 1.875, 1)
            ->setLayer('contour', Color::BLUE, LineType::SOLID)
            ->addPolyline([
                $x + 27.57, $y + 1,
                $x + 27.57, $y + 1,
                $x + 27.57, $y - 3.44,
                $x + 27.57, $y + 1,
                $x + 42.9, $y + 1,
                $x + 42.9, $y - 3.44,
                $x - 1, $y - 3.44,
                $x + 42.9, $y - 3.44,
                $x + 42.9, $y - 27.5,
                $x - 1, $y - 27.5,
                $x - 1, $y + 1,
                $x + 27.57, $y + 1
            ], 0, 0.30)
            ->setLayer('texte')
            ->addPolyline([
                $x + 2.37, $y - 30.71,
                $x + 35.59, $y - 30.71,
                $x + 35.59, $y - 41.37,
                $x + 2.37, $y - 41.37,
                $x + 2.37, $y - 30.71
            ])
            ->addText($x + 5, $y - 34, 0, "PB " . $data['PB'], 4.5, 1)
            ->saveToFile('synoptiqueGenere.dxf');

        $this->newDerivationPB($x, $y, $dxf, $data);
    }

    private function newDerivationPB($x, $y, $dxf, $data){

        $dxf->setLayer('texte')
            ->addText($x, $y - 49, 0, "Fo 01 à Fo 12 -> 01 à 12 ", 1.875, 1)
            ->setLayer('contour')
            ->addPolyline([
                $x, $y - 44.62,
                $x + 42.9, $y -  44.62,
                $x + 42.9, $y - 56.52,
                $x - 1, $y - 56.52,
                $x - 1, $y - 44.62,
                $x, $y - 44.62,
            ], 0, 0.3)
            ->saveToFile('synoptiqueGenere.dxf');
    }


}