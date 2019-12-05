<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 04/12/2019
 * Time: 08:42
 */

namespace App\Utils\Autocad;

use adamasantares\dxf\Color;
use adamasantares\dxf\LineType;
use App\Utils\GestionExcel;


class EtiquettePB {

    public function listPB($dxf, $spreadsheet){
        $x = 0;
        $y = 0;

        $positionnementEtude = $spreadsheet->getSheetByName('positionnement-etude');
        $gestionExcel = new GestionExcel();

        for ($i = 5; $i <= 80; $i++) {
            if($gestionExcel->getCalculatedValue($positionnementEtude, 1, $i)){
                if($gestionExcel->getCalculatedValue($positionnementEtude,16, $i) !== $gestionExcel->getCalculatedValue($positionnementEtude,16, $i - 1)){
                    $data['Troncon'] = $gestionExcel->getCalculatedValue($positionnementEtude,22, $i);
                }
                if($gestionExcel->getCalculatedValue($positionnementEtude,16, $i) !== $gestionExcel->getCalculatedValue($positionnementEtude,16, $i + 1)){
                    $data['PB'] =  substr($gestionExcel->getCalculatedValue($positionnementEtude,16, $i), -5);
                    $data['ADR'] = $gestionExcel->getCalculatedValue($positionnementEtude,9, $i);
                    $this->newEtiquettePB($x, $y, $dxf, $data);
                    $x += 100;
                }
            }
        }
    }

    private function newEtiquettePB($x, $y, $dxf, $data){

        $dxf->setLayer('texte', Color::WHITE, LineType::SOLID)
            ->addText($x, $y, 0, "PB : " . $data['PB'], 3, 1)
            ->addText($x + 50, $y, 0, substr($data['Troncon'], 0, 6) . ".", 3, 1)
            ->addText($x, $y - 10, 0, "PT : ", 3, 1)
            ->addText($x, $y - 15, 0, "PF : ", 3, 1)
            ->addText($x, $y - 20, 0, "Code ch. IPON :  ", 3, 1)
            ->addText($x, $y - 25, 0, "N° type VOIE : ", 3, 1)
            ->addText($x, $y - 30, 0, "ADR : " . $data['ADR'], 3, 1)
            ->addText($x, $y - 35, 0, "ELR : ", 3, 1)
            ->setLayer('contour', Color::BLUE, LineType::SOLID)
            ->addLine($x - 5, $y - 7, 0, $x + 70, $y - 7, 0)
            ->addLine($x - 5, $y + 3, 0, $x + 70, $y + 3, 0)
            ->addLine($x - 5, $y - 40, 0, $x + 70, $y - 40, 0)
            ->addLine($x - 5, $y + 3, 0, $x -5, $y - 40, 0)
            ->addLine($x + 70, $y + 3, 0, $x + 70, $y - 40, 0)
            ->addLine($x + 48, $y + 3, 0, $x + 48, $y - 7, 0)
            ->setLayer('texte')
            ->addText($x + 3, $y - 50, 0, "PB " . $data['PB'], 8, 1)
            ->addLine($x, $y -47, 0, $x + 63, $y - 47, 0)
            ->addLine($x, $y -47, 0, $x, $y - 60, 0)
            ->addLine($x + 63, $y -47, 0, $x + 63, $y - 60, 0)
            ->addLine($x, $y -60, 0, $x + 63, $y - 60, 0)
            ->saveToFile('demo.dxf');

        $this->newDerivationPB($x, $y, $dxf, $data);
    }

    private function newDerivationPB($x, $y, $dxf, $data){

        $dxf->setLayer('texte')
            ->addText($x, $y - 70, 0, "Fo 01 à Fo 12 -> 01 à 12 ", 2, 1)
            ->setLayer('contour')
            ->addLine($x - 5, $y -67, 0, $x + 70, $y - 67, 0)
            ->addLine($x - 5, $y -75, 0, $x + 70, $y - 75, 0)
            ->addLine($x - 5, $y -67, 0, $x - 5, $y - 75, 0)
            ->addLine($x + 70, $y -67, 0, $x + 70, $y - 75, 0)
            ->saveToFile('demo.dxf');
    }


}