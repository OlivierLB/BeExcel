<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 04/12/2019
 * Time: 08:42
 */

namespace App\Utils\Autocad;


use App\Utils\GestionExcel;
use olivierlb\phpdxf\Color;
use olivierlb\phpdxf\LineType;


class EtiquettePB {

    public function listPB($dxf, $spreadsheet){
        $x = -150;
        $y = 150;

        $positionnementEtude = $spreadsheet->getSheetByName('positionnement-etude');
        $gestionExcel = new GestionExcel();

        for ($i = 5; $i <= 80; $i++) {
            if($gestionExcel->getCalculatedValue($positionnementEtude, 1, $i)){
                if($gestionExcel->getCalculatedValue($positionnementEtude,16, $i) !== $gestionExcel->getCalculatedValue($positionnementEtude,16, $i - 1)){
                    $data['troncon'] = $gestionExcel->getCalculatedValue($positionnementEtude,22, $i);
                    $data['ELR'] = $gestionExcel->getOldCalculatedValue($positionnementEtude,15, $i);
                    $data['ADR'] = $gestionExcel->getOldCalculatedValue($positionnementEtude,24, $i);
                    $data['codeCH'] = $gestionExcel->getOldCalculatedValue($positionnementEtude,23, $i);
                }
                if($gestionExcel->getCalculatedValue($positionnementEtude,16, $i) !== $gestionExcel->getCalculatedValue($positionnementEtude,16, $i + 1)){
                    $data['PB'] =  substr($gestionExcel->getCalculatedValue($positionnementEtude,16, $i), -5);
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
                $x + 42.9, $y + 1,
                $x + 42.9, $y - 27.5,
                $x - 1, $y - 27.5,
                $x - 1, $y + 1,
                $x + 27.57, $y + 1], 0, 0.30)
            ->addPolyline([
                $x + 27.57, $y + 1,
                $x + 27.57, $y - 3.44,
                $x + 27.57, $y + 1], 0, 0.3)
            ->addPolyline([
                $x - 1, $y - 3.44,
                $x + 42.9, $y - 3.44,
                $x - 1, $y - 3.44], 0, 0.3)
            ->setLayer('texte')
            ->addText($x + 5, $y - 34, 0, "PB " . $data['PB'], 4.5, 1)
            ->addLine($x + 2.37, $y - 30.71, 0, $x + 35.59, $y - 30.71, 0)
            ->addLine($x + 2.37, $y - 30.71, 0, $x + 2.37, $y - 41.37, 0)
            ->addLine($x + 35.59, $y - 30.71, 0, $x + 35.59, $y - 41.37, 0)
            ->addLine($x + 2.37, $y - 41.37, 0, $x + 35.59, $y - 41.37, 0)
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