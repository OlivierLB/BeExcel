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
        $this->addLignes($dxf);
        $this->addSymboles($dxf);
    }

    private function addSymboles($dxf){
        $x = -600;
        $y = -280;

        $dxf->setLayer('fondVert')
            ->addCircle($x, $y, 0, 6)
            ->addCircle($x + 19, $y - 30, 0, 6)
            ->addCircle($x + 50, $y - 30, 0, 6)
            ->setLayer('texte')
            ->addText($x - 7, $y - 7, 0, 'FT 0XXXXX', 1.8, 1)
            ->addText($x - 6, $y - 10, 0, 'Adresse', 2.5, 1)
            ->setLayer('fondBleu')
            ->addCircle($x + 20, $y, 0, 6)
            ->addCircle($x + 80, $y - 30, 0, 6)
            ->setLayer('texte')
            ->addCircle($x + 110, $y - 30, 0, 6)
            ->addCircle($x + 110, $y - 30, 0, 1)
            ->addLine($x + 110, $y - 28.5, 0, $x + 110, $y - 26, 0)
            ->addLine($x + 110, $y - 31.5, 0, $x + 110, $y - 34, 0)
            ->addLine($x + 111.3, $y - 30.75, 0, $x + 113.46, $y - 32, 0)
            ->addLine($x + 108.7, $y - 30.75, 0, $x + 106.54, $y - 32, 0)
            ->addLine($x + 111.3, $y - 29.25, 0, $x + 113.46, $y - 28, 0)
            ->addLine($x + 108.7, $y - 29.25, 0, $x + 106.54, $y - 28, 0)
            ->addPolyline([
                $x + 15.442, $y - 3,
                $x + 20, $y + 1.5,
                $x + 20, $y - 1.5,
                $x + 23, $y + 1.5
            ], 0, 0.2)
            ->addPolyline([
                $x + 50, $y - 30,
                $x + 50, $y - 26.2,
                $x + 50, $y - 30,
                $x + 52.89, $y - 32.89,
                $x + 50, $y - 30,
                $x + 47.11, $y - 32.89,
                $x + 50, $y - 30,
            ], 0, 0.2)
            ->addpolyline([
                $x + 75.442, $y - 33,
                $x + 80, $y - 28.5,
                $x + 80, $y - 31.5,
                $x + 83, $y - 28.5,
                $x + 82.46, $y - 27.96,
                $x + 83.54, $y - 29.04,
                $x + 84.16, $y - 27.35,
                $x + 82.46, $y - 27.96,
                $x + 83, $y - 28.5,
            ], 0, 0.2)
            ->addText($x + 14, $y - 7, 0, 'ERDF 0XX', 1.8, 1)
            ->addText($x + 15, $y - 10, 0, 'Adresse', 2.5, 1)
            ->setLayer('fondRouge')
            ->addPolyline([
                $x + 30, $y + 7.5,
                $x + 45, $y + 7.5,
                $x + 45, $y - 7.5,
                $x + 30, $y - 7.5,
                $x + 30, $y + 7.5
            ])
            ->addPolyline([
                $x - 72, $y,
                $x - 36, $y,
                $x - 36, $y - 22.81,
                $x - 72, $y - 22.81,
                $x - 72, $y
            ], 0, 0.4)
            ->addPolyline([
                $x - 48.67, $y,
                $x - 48.67, $y - 3.27,
                $x - 36, $y - 3.27,
                $x - 72, $y - 3.27
            ], 0, 0.4)
            ->setLayer('texte')
            ->addText($x + 30, $y - 8.5, 0, 'LXT/0XXXX', 1.8, 1)
            ->addText($x + 31, $y - 11.5, 0, 'Adresse', 2.5, 1)
            ->addText($x - 71, $y - 0.5, 0, "PEP : xx", 1.875, 1)
            ->addText($x - 48, $y - 0.5, 0, "DERIV.", 1.875, 1)
            ->addText($x - 71, $y - 4, 0, "PT : xx", 1.875, 1)
            ->addText($x - 71, $y - 7, 0, "Propriétaire : xx", 1.875, 1)
            ->addText($x - 71, $y - 10, 0, "N° Poteau : xx", 1.875, 1)
            ->addText($x - 71, $y - 13, 0, "N° type VOIE : xx", 1.875, 1)
            ->addText($x - 71, $y - 16, 0, "ADR : xx", 1.875, 1)
            ->addText($x - 71, $y - 19, 0, "TYPE PEO : xx", 1.875, 1)
            ->addText($x - 69.5, $y - 28, 0, "PEP XXX", 4.5, 1)
            ->addPolyline([
                $x - 72.5, $y - 26,
                $x - 35.43, $y - 26,
                $x - 35.43, $y - 36.03,
                $x - 72.5, $y - 36.03,
                $x - 72.5, $y - 26
            ])
            ->addpolyline([
                $x + 18, $y - 26.5,
                $x + 22.39, $y - 26.5,
                $x + 20.54, $y - 26.5,
                $x + 20.54, $y - 29.5,
                $x + 14.65, $y - 29.5,
                $x + 20.54, $y - 29.5,
                $x + 17.36, $y - 33.68,
            ], 0, 0.2)
            ->saveToFile('synoptiqueGenere.dxf');

        $this->addBlocsColore($dxf);

    }

    private function addBlocsColore($dxf){
        $ordre = ['fondRouge',
            'fondBleu',
            'fondVert',
            'fondJaune',
            'fondViolet',
            'texte',
            'fondOrange',
            'fondGris',
            'fondMarron',
            'texteNoir',
            'fondTurquoise',
            'fondMagenta',
            'fondRouge',
            'fondBleu',
            'fondVert',
            'fondJaune',
            'fondViolet',
            'texte',
            'fondOrange',
            'fondGris',
            'fondMarron',
            'texteNoir',
            'fondTurquoise',
            'fondMagenta'];

        $nb = 0;
        $x = -660;
        $y = $yInit = -321;

        foreach ($ordre as $i => $fond){
            switch ($fond){
                case 'fondJaune':
                case 'texte':
                    $textColor = 'texteNoir';
                    break;
                default:
                    $textColor = 'texte';
            }

            if($i % 2 === 0)
                $nb = str_pad($nb+1, 2, 0, STR_PAD_LEFT);

            if($i < 10){
                $dxf->setLayer('texte')
                    ->addLine($x + 12.57, $y, 0, $x + 14.14, $y, 0)
                    ->saveToFile('synoptiqueGenere.dxf');
            }

            $dxf->setLayer($fond)
                ->addPolyline([
                    $x, $y,
                    $x + 12.57, $y
                ], 0, 3.15 )
                ->setLayer($textColor)
                ->addText($x + 3, $y + 0.7, 0, "K7-" . $nb, 1.7109, 1)
                ->setLayer('texte')
                ->addLine($x, $y, 0, $x - 1.57, $y, 0)
                ->saveToFile('synoptiqueGenere.dxf');
            $y = $y - 3.5;

        }
        $dxf->setLayer('texte')
            ->addLine($x - 1.57, $yInit, 0, $x - 1.57, $y + 3.5, 0)
            ->addLine($x + 14.14, $yInit, 0, $x + 14.14, $yInit - 31.5, 0)
            ->addPolyline([
                $x - 3.14, $yInit + 2.91,
                $x + 15.72, $yInit + 2.91,
                $x + 15.72, $y - 0.59,
                $x - 3.14, $y - 0.59,
                $x - 3.14, $yInit + 2.91
            ])
            ->saveToFile('synoptiqueGenere.dxf');
    }

    private function addLignes($dxf){
        $x = -600;
        $y = -380;

        $dxf->setLayer('texte')
            ->addLine($x, $y, 0, $x + 300, $y, 0)
            ->addLine($x, $y - 20, 0, $x + 300, $y - 20, 0)
            ->setLayer('blancDashed', Color::WHITE, LineType::DASHED)
            ->addPolyline([
                $x, $y - 40,
                $x + 300, $y - 40
            ], 0, 0, 0.1)
            ->saveToFile('synoptiqueGenere.dxf');

        for($i = $x; $i <= $x + 295; $i = $i + 15){
            $dxf->setLayer('texte')
                ->addPolyline([
                    $i + 5, $y + 0.2,
                    $i + 4, $y + 2.2,
                    $i + 5, $y + 0.2,
                    $i + 6, $y + 2.2,
                    $i + 5, $y + 0.2
                ], 0, 0.2)
                ->saveToFile('synoptiqueGenere.dxf');
        }
        for($i = $x; $i <= $x + 295; $i = $i + 7){
            $dxf->setLayer('texte')
                ->addPolyline([
                    $i + 5, $y - 20,
                    $i + 6, $y - 18,
                    $i + 5, $y - 20
                ])
                ->saveToFile('synoptiqueGenere.dxf');
        }
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