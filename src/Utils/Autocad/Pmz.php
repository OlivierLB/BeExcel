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

    public function addPmz($dxf){
        $x = -193;
        $y = -40;

        $this->addContour($x, $y, $dxf);
        for($i = 1; $i <= 4; $i++){
            $this->addTete($x, $y, $i, $dxf);
            $y -= 53;
        }
    }

    private function addTete($x, $y, $i, $dxf){
        $dxf->setLayer('texte')
            ->addText($x, $y, 0, "Tête " . $i ." TC" . $i, 3.8392, 1)
            ->addText($x + 30, $y - 5, 0, "A1 à ...", 2, 1)
            ->addText($x + 30, $y - 50, 0, "... à L12", 2, 1)
            ->addLine($x - 0.5, $y + 0.5, 0, $x + 40, $y + 0.5, 0)
            ->addLine($x - 0.5, $y + 0.5, 0, $x - 0.5, $y - 52.5, 0)
            ->addLine($x + 40, $y + 0.5, 0, $x + 40, $y - 52.5, 0)
            ->addLine($x - 0.5, $y - 52.5, 0, $x + 40, $y - 52.5, 0)
            ->addLine($x - 0.5, $y - 4.5, 0, $x + 40, $y - 4.5, 0)
            ->addLine($x + 40, $y - 6, 0, $x + 45, $y - 6, 0)
            ->addLine($x + 40, $y - 21, 0, $x + 45, $y - 21, 0)
            ->addLine($x + 40, $y - 36, 0, $x + 45, $y - 36, 0)
            ->addLine($x + 40, $y - 51, 0, $x + 45, $y - 51, 0)
            ->saveToFile("synoptiqueGenere.dxf");
    }

    private function addContour($x, $y, $dxf){

        $dxf->setLayer('pmz', Color::MAGENTA, LineType::SOLID)
            ->addLine($x - 3, $y + 3, 0, $x + 47, $y + 3, 0)
            ->addLine($x - 3, $y - 214, 0, $x + 47, $y - 214, 0)
            ->addLine($x - 3, $y + 3, 0, $x - 3, $y - 214, 0)
            ->addLine($x + 47, $y + 3, 0, $x + 47, $y - 214, 0)
            ->saveToFile("synoptiqueGenere.dxf");
    }

}