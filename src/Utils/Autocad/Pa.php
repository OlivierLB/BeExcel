<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 09/12/2019
 * Time: 12:02
 */

namespace App\Utils\Autocad;


use olivierlb\phpdxf\Color;
use olivierlb\phpdxf\LineType;

class Pa {
    public function addPa($dxf, $spreadsheet){
        $x = -41.13;
        $y = 5.18;

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
            ->addText($x + 0.5, $y - 0.75, 0, "PA : ", 1.875, 1)
            ->addText($x + 0.5, $y - 4.5, 0, "PT : ", 1.875, 1)
            ->addText($x + 0.5, $y - 8.25, 0, "PF : ", 1.875, 1)
            ->addText($x + 0.5, $y - 11.5, 0, "Code ch. IPON : ", 1.875, 1)
            ->addText($x + 0.5, $y - 14.75, 0, "ADR : ", 1.875, 1)
            ->addText($x + 0.5, $y - 18, 0, "ELR : ", 1.875, 1)
            ->addText($x + 0.5, $y - 21.25, 0, "TYPE PEO : ", 1.875, 1)
            ->addText($x + 0.5, $y - 24.5, 0, "SORTIES : ", 1.875, 1)
            ->addText($x + 0.5, $y - 27.75, 0, "NB µmodules : ", 1.875, 1)
            ->saveToFile('synoptiqueGenere.dxf');
    }
}