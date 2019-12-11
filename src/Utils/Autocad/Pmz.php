<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 06/12/2019
 * Time: 09:32
 */

namespace App\Utils\Autocad;


use olivierlb\phpdxf\Color;
use olivierlb\phpdxf\LineType;

class Pmz {

    public function addPmz($dxf, $spreadsheet){
        $x = -192.95;
        $y = -35.25;

        $this->addContour($x, $y, $dxf);
        $this->addPmzInfos($dxf, $spreadsheet);
        for($i = 1; $i <= 4; $i++){
            $this->addTete($x, $y, $i, $dxf);
            $y -= 50.31;
        }
    }

    private function addTete($x, $y, $i, $dxf){
        $dxf->setLayer('texte')
            ->addText($x + 3, $y - 2.2, 0, "Tête " . $i ." TC" . $i, 3.5, 1)
            ->addText($x + 37, $y - 8, 0, "A1 à ...", 2, 1)
            ->addText($x + 37, $y - 48, 0, "... à L12", 2, 1)
            ->addLine($x + 2.06, $y - 1.61, 0, $x + 48.45, $y - 1.61, 0)
            ->addLine($x + 2.06, $y - 1.61, 0, $x + 2.06, $y - 51.92, 0)
            ->addLine($x + 48.45, $y - 1.61, 0, $x + 48.45, $y - 51.92, 0)
            ->addLine($x + 2.06, $y - 51.92, 0, $x + 48.45, $y - 51.92, 0)
            ->addLine($x + 2.06, $y - 6.55, 0, $x + 48.45, $y - 6.55, 0)
            ->addLine($x + 48.47, $y - 10.17, 0, $x + 51.47, $y - 10.17, 0)
            ->addLine($x + 48.47, $y - 23.43, 0, $x + 51.47, $y - 23.43, 0)
            ->addLine($x + 48.47, $y - 36.68, 0, $x + 51.47, $y - 36.68, 0)
            ->addLine($x + 48.47, $y - 49.93, 0, $x + 51.47, $y - 49.93, 0)
            ->saveToFile("synoptiqueGenere.dxf");
    }

    private function addContour($x, $y, $dxf){

        $dxf->setLayer('pmz', Color::MAGENTA, LineType::SOLID)
            ->addLine($x, $y, 0, $x + 53.04, $y, 0)
            ->addLine($x, $y - 204.95, 0, $x + 53.04, $y - 204.95, 0)
            ->addLine($x, $y, 0, $x, $y - 204.95, 0)
            ->addLine($x + 53.04, $y, 0, $x + 53.04, $y - 204.95, 0)
            ->saveToFile("synoptiqueGenere.dxf");
    }

    private function addPmzInfos($dxf, $spreadsheet){
        $x = -184.16;
        $y = -10.63;

        $dxf->setLayer('rouge', Color::RED, LineType::SOLID)
            ->addPolyline([
                $x + 1, $y,
                $x + 33.94, $y,
                $x + 33.94, $y - 22.93,
                $x , $y - 22.93,
                $x , $y,
                $x + 1, $y,
            ], 0, 0.3)
            ->addPolyline([
                $x, $y - 3.34,
                $x + 33.94, $y - 3.34,
                $x, $y - 3.34
            ], 0, 0.3)
            ->setLayer('texte')
            ->addText($x + 0.5, $y - 0.75, 0, "PMZ : ", 1.875, 1)
            ->addText($x + 0.5, $y - 4.5, 0, "PT : ", 1.875, 1)
            ->addText($x + 0.5, $y - 8.25, 0, "PF : ", 1.875, 1)
            ->addText($x + 0.5, $y - 11.5, 0, "Code ch. IPON : ", 1.875, 1)
            ->addText($x + 0.5, $y - 14.75, 0, "ADR : ", 1.875, 1)
            ->addText($x + 0.5, $y - 18, 0, "ELR : ", 1.875, 1)
            ->saveToFile('synoptiqueGenere.dxf');
    }

}