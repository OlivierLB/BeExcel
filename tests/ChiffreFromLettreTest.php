<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 10:17
 */

namespace App\Tests;
use App\Utils\ChiffreFromLettre;
use Monolog\Test\TestCase;



class ChiffreFromLettreTest extends TestCase{
    public function testChiffreFomLettre(){
        $chiffreFromLettre = new ChiffreFromLettre();
        $result = $chiffreFromLettre->getChiffreFromLettre('H');

        $this->assertEquals(8, $result);
    }
}