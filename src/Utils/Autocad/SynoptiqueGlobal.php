<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 06/12/2019
 * Time: 14:55
 */

namespace App\Utils\Autocad;


use olivierlb\phpdxf\Color;
use olivierlb\phpdxf\LineType;

class SynoptiqueGlobal {

    public function setGlobal($dxf){
        $this->addContour($dxf);
        $this->addLegende($dxf);
    }

    private function addContour($dxf){
        $x = -200;
        $y = 50;

        $dxf->setLayer('texte')
            ->addLine($x, $y, 0, $x + 793.1579, $y, 0)
            ->addLine($x, $y, 0, $x, $y - 556.7128, 0)
            ->addLine($x + 793.1579, $y, 0, $x + 793.1579, $y - 556.7128, 0)
            ->addLine($x, $y - 556.7128, 0, $x + 793.1579, $y - 556.7128, 0)
            ->saveToFile('synoptiqueGenere.dxf');
    }

    private function addLegende($dxf){
        $this->addModules($dxf);
        $this->addPmzToPa($dxf);
    }

    private function addPmzToPa($dxf) {
        $this->createPremiereBase($dxf);
        $this->createSecondeBase($dxf);
        $this->createTroisiemeBase($dxf);
    }

    private function createTroisiemeBase($dxf){
        $x = -700;
        $y = -50;
        $this->createBase($dxf, $x, $y);
        $dxf->setLayer('texte')
            ->addText($x + 48, $y + 30, 0, "TR-14-XXXX", 3.8392, 1)
            ->addText($x + 48, $y + 25, 0, "144 fo", 3.8392, 1)
            ->setLayer('fondRouge')
            ->addText($x + 70, $y + 25, 0, "xx m", 3.8392, 1)
            ->setLayer('rougeDashed', Color::RED, LineType::DASHED)
            ->addPolyline([
                $x + 47, $y + 31,
                $x + 83, $y + 31,
                $x + 83, $y + 20,
                $x + 84.64, $y + 5,
                $x + 83, $y + 20,
                $x + 47, $y + 20,
                $x + 47, $y + 31
            ], 0, 0, 0.5)

            ->saveToFile('synoptiqueGenere.dxf');
    }

    private function createSecondeBase($dxf){
        $x = -550;
        $y = -50;
        $this->createBase($dxf, $x, $y);
        $dxf->setLayer('delim', Color::WHITE, LineType::DASHED)
            ->addPolyline([
                $x + 41.74, $y + 40,
                $x + 41.74, $y - 192.85
            ], 0, 0, 0.1)
            ->setLayer('texte')
            ->addEllipse($x + 19.71, $y - 28, 0, $x + 19.71, $y - 75, 0, 0.07)
            ->setLayer('texte')
            ->addText($x + 48, $y + 30, 0, "TR-14-XXXX", 3.8392, 1)
            ->addText($x + 48, $y + 25, 0, "144 fo", 3.8392, 1)
            ->setLayer('fondRouge')
            ->addText($x + 70, $y + 25, 0, "xx m", 3.8392, 1)
            ->setLayer('texte')
            ->addText($x + 40, $y + 47, 0, "PA : xxx", 2.5, 1, 90)
            ->setLayer('fondRouge')
            ->addPolyline([
                $x + 39, $y + 64.44,
                $x + 39, $y + 41,
                $x + 43.86, $y + 41,
                $x + 43.86, $y + 65.44,
                $x + 39, $y + 65.44,
                $x + 39, $y + 64.44,
            ], 0, 0.375)
            ->saveToFile('synoptiqueGenere.dxf');
    }

    private function createPremiereBase($dxf){
        $x = -400;
        $y = -50;
        $this->createBase($dxf, $x, $y);
        $dxf->setLayer('delim', Color::WHITE, LineType::DASHED)
            ->addPolyline([
                $x + 21.32, $y + 40,
                $x + 21.32, $y - 192.85
            ], 0, 0, 0.1)
            ->addPolyline([
                $x + 46.22, $y + 40,
                $x + 46.22, $y - 192.85
            ], 0, 0, 0.1)
            ->setLayer('texte')
            ->addEllipse($x + 8.09, $y - 28, 0, $x + 8.09, $y - 75, 0, 0.07)
            ->addEllipse($x + 33.91, $y - 28, 0, $x + 33.91, $y - 75, 0, 0.07)
            ->addText($x - 3, $y + 30, 0, "TR-14-XXXX", 2.6, 1)
            ->addText($x - 3, $y + 25, 0, "144 fo", 2.6, 1)
            ->setLayer('fondRouge')
            ->addText($x + 12, $y + 25, 0, "xx m", 2.6, 1)
            ->setLayer('texte')
            ->addText($x + 22.82, $y + 30, 0, "TR-14-XXXX", 2.6, 1)
            ->addText($x + 22.82, $y + 25, 0, "144 fo", 2.6, 1)
            ->setLayer('fondRouge')
            ->addText($x + 37.82, $y + 25, 0, "xx m", 2.6, 1)
            ->setLayer('texte')
            ->addText($x + 48, $y + 30, 0, "TR-14-XXXX", 3.8392, 1)
            ->addText($x + 48, $y + 25, 0, "144 fo", 3.8392, 1)
            ->setLayer('fondRouge')
            ->addText($x + 70, $y + 25, 0, "xx m", 3.8392, 1)
            ->setLayer('texte')
            ->addText($x + 20, $y + 47, 0, "PA : xxx", 2.5, 1, 90)
            ->addText($x + 45, $y + 47, 0, "PA : xxx", 2.5, 1, 90)
            ->setLayer('fondRouge')
            ->addPolyline([
                $x + 19, $y + 64.44,
                $x + 19, $y + 41,
                $x + 23.86, $y + 41,
                $x + 23.86, $y + 65.44,
                $x + 19, $y + 65.44,
                $x + 19, $y + 64.44,
            ], 0, 0.375)
            ->addPolyline([
                $x + 44, $y + 64.44,
                $x + 44, $y + 41,
                $x + 48.86, $y + 41,
                $x + 48.86, $y + 65.44,
                $x + 44, $y + 65.44,
                $x + 44, $y + 64.44,
            ], 0, 0.375)
            ->saveToFile('synoptiqueGenere.dxf');
    }



    private function createBase($dxf, $x, $y){
        $dxf->setLayer('texte')
            ->addPolyline([
                $x, $y,
                $x + 80.43, $y,
                $x + 80.43, $y - 9.6,
                $x + 88.94, $y - 9.6
            ])
            ->addPolyline([
                $x, $y - 13.26,
                $x + 76.88, $y - 13.26,
                $x + 76.88, $y - 49.38,
                $x + 88.94, $y - 49.38
            ])
            ->addPolyline([
                $x, $y - 26.51,
                $x + 72.07, $y - 26.51,
                $x + 72.07, $y - 87.15,
                $x + 88.94, $y - 87.15
            ])
            ->addPolyline([
                $x, $y - 39.76,
                $x + 67.38, $y - 39.76,
                $x + 67.38, $y - 128.91,
                $x + 88.94, $y - 128.91
            ])
            ->addPolyline([
                $x, $y - 50.31,
                $x + 62.68, $y - 50.31,
                $x + 62.68, $y - 169.7,
                $x + 88.94, $y -169.7
            ])
            ->addPolyline([
                $x, $y - 63.57,
                $x + 58.29, $y - 63.57,
                $x + 58.29, $y - 208.48,
                $x + 88.94, $y - 208.48
            ])
            ->addEllipse($x + 84.64, $y - 110, 0, $x + 84.64, $y - 215, 0, 0.03)
            ->saveToFile('synoptiqueGenere.dxf');

    }

    private function addModules($dxf){
        $x = -330;
        $y = -450;

        $dxf->setLayer('fondRouge', Color::RED, LineType::SOLID)
            ->addPolyline([
                $x, $y,
                $x, $y + 10,
                $x, $y
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x - 1.8, $y + 8, 1, "Rou", 1.4, 1)
            ->addText($x - 1.2, $y + 5, 1, "0", 3, 1)
            ->addText($x - 11, $y + 5, 0, "01 à 06", 1.875, 1)
            ->setLayer('fondBleu', Color::BLUE, LineType::SOLID)
            ->addPolyline([
                $x + 20, $y,
                $x + 20, $y + 10,
                $x + 20, $y
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x + 18.4, $y + 8, 1, "Blf", 1.4, 1)
            ->addText($x + 18.8, $y + 5, 1, "0", 3, 1)
            ->addText($x + 9, $y + 5, 0, "07 à 12", 1.875, 1)
            ->setLayer('fondVert', Color::GREEN, LineType::SOLID)
            ->addPolyline([
                $x + 40, $y,
                $x + 40, $y + 10,
                $x + 40, $y
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x + 38.4, $y + 8, 1, "Ver", 1.4, 1)
            ->addText($x + 38.8, $y + 5, 1, "0", 3, 1)
            ->addText($x + 29, $y + 5, 0, "13 à 18", 1.875, 1)
            ->setLayer('fondJaune', Color::YELLOW, LineType::SOLID)
            ->addPolyline([
                $x + 60, $y,
                $x + 60, $y + 10,
                $x + 60, $y
            ], 0, 3.63)
            ->setLayer('texteNoir', Color::BLACK, LineType::SOLID)
            ->addText($x + 58.4, $y + 8, 1, "Jau", 1.4, 1)
            ->addText($x + 58.8, $y + 5, 1, "0", 3, 1)
            ->setLayer('texte')
            ->addText($x + 49, $y + 5, 0, "19 à 24", 1.875, 1)
            ->setLayer('fondViolet', Color::rgb(191, 127, 255), LineType::SOLID)
            ->addPolyline([
                $x + 80, $y,
                $x + 80, $y + 10,
                $x + 80, $y
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x + 78.4, $y + 8, 1, "Vio", 1.4, 1)
            ->addText($x + 78.8, $y + 5, 1, "0", 3, 1)
            ->addText($x + 69, $y + 5, 0, "25 à 30", 1.875, 1)
            ->setLayer('texte')
            ->addPolyline([
                $x + 100, $y,
                $x + 100, $y + 10,
                $x + 100, $y
            ], 0, 3.63)
            ->setLayer('texteNoir', Color::BLACK, LineType::SOLID)
            ->addText($x + 98.4, $y + 8, 1, "Bla", 1.4, 1)
            ->addText($x + 98.8, $y + 5, 1, "0", 3, 1)
            ->setLayer('texte')
            ->addText($x + 89, $y + 5, 0, "31 à 36", 1.875, 1)
            ->setLayer('fondOrange', Color::rgb(255, 127, 0), LineType::SOLID)
            ->addPolyline([
                $x, $y - 15,
                $x, $y - 5,
                $x, $y - 15
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x - 1.8, $y - 7, 1, "Ora", 1.4, 1)
            ->addText($x - 1.2, $y - 10 , 1, "0", 3, 1)
            ->addText($x - 11, $y - 10, 0, "37 à 42", 1.875, 1)
            ->setLayer('fondGris', Color::GRAY, LineType::SOLID)
            ->addPolyline([
                $x + 20, $y - 15,
                $x + 20, $y - 5,
                $x + 20, $y - 15
            ], 0, 3.63)
            ->setLayer('texteNoir')
            ->addText($x + 18.3, $y - 7, 1, "Gris", 1.4, 1)
            ->addText($x + 18.8, $y - 10, 1, "0", 3, 1)
            ->setLayer('texte')
            ->addText($x + 9, $y - 10, 0, "43 à 48", 1.875, 1)
            ->setLayer('fondMarron', Color::rgb(59, 45, 31), LineType::SOLID)
            ->addPolyline([
                $x + 40, $y - 15,
                $x + 40, $y - 5,
                $x + 40, $y - 15
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x + 38.2, $y - 7, 1, "Marr", 1.2, 1)
            ->addText($x + 38.8, $y - 10, 1, "0", 3, 1)
            ->addText($x + 29, $y - 10, 0, "49 à 54", 1.875, 1)
            ->setLayer('texteNoir')
            ->addPolyline([
                $x + 60, $y - 15,
                $x + 60, $y - 5,
                $x + 60, $y - 15
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x + 58.2, $y - 7, 1, "Noir", 1.3, 1)
            ->addText($x + 58.8, $y - 10, 1, "0", 3, 1)
            ->addText($x + 49, $y - 10, 0, "55 à 60", 1.875, 1)
            ->setLayer('fondTurquoise', Color::rgb(0, 255, 255), LineType::SOLID)
            ->addPolyline([
                $x + 80, $y - 15,
                $x + 80, $y - 5,
                $x + 80, $y - 15
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x + 78.4, $y - 7, 1, "Blc", 1.4, 1)
            ->addText($x + 78.8, $y - 10, 1, "0", 3, 1)
            ->addText($x + 69, $y - 10, 0, "61 à 66", 1.875, 1)
            ->setLayer('fondMagenta', Color::rgb(255, 0, 255), LineType::SOLID)
            ->addPolyline([
                $x + 100, $y - 15,
                $x + 100, $y - 5,
                $x + 100, $y - 15
            ], 0, 3.63)
            ->setLayer('texte')
            ->addText($x + 98.2, $y - 7, 1, "Mag", 1.35, 1)
            ->addText($x + 98.8, $y - 10, 1, "0", 3, 1)
            ->addText($x + 89, $y - 10, 0, "67 à 72", 1.875, 1)
            ->saveToFile('synoptiqueGenere.dxf');
    }
}