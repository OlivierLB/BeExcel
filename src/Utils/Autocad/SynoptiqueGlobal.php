<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 06/12/2019
 * Time: 14:55
 */

namespace App\Utils\Autocad;


class SynoptiqueGlobal {

    public function addContour($dxf){
        $x = -200;
        $y = +50;

        $dxf->setLayer('texte')
            ->addLine($x, $y, 0, $x + 793.1579, $y, 0)
            ->addLine($x, $y, 0, $x, $y - 556.7128, 0)
            ->addLine($x + 793.1579, $y, 0, $x + 793.1579, $y - 556.7128, 0)
            ->addLine($x, $y - 556.7128, 0, $x + 793.1579, $y - 556.7128, 0)
            ->saveToFile('demo.dxf');
    }
}