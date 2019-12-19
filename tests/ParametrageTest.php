<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 28/11/2019
 * Time: 16:33
 */

namespace App\Tests;
use App\Entity\Parametrage;
use Monolog\Test\TestCase;


class ParametrageTest extends TestCase {
    public function testVersion(){
        $parametrage = new Parametrage();
        $uri = '2.64';
        $parametrage->setVersion($uri);

        $this->assertEquals("2.64", $parametrage->getVersion());
    }

    public function testPgColInfos(){
        $parametrage = new Parametrage();
        $uri = 'a';
        $parametrage->setPgColInfos($uri);
        $this->assertEquals("A", $parametrage->getPgColInfos());
    }

    public function testPgColPaGeo(){
        $parametrage = new Parametrage();
        $uri = 'b';
        $parametrage->setPgColPaGeo($uri);
        $this->assertEquals("B", $parametrage->getPgColPaGeo());
    }

    public function testPgColPaId(){
        $parametrage = new Parametrage();
        $uri = 'c';
        $parametrage->setPgColPaId($uri);
        $this->assertEquals("C", $parametrage->getPgColPaId());
    }

    public function testPgColNbPmz(){
        $parametrage = new Parametrage();
        $uri = 'd';
        $parametrage->setPgColNbPmz($uri);
        $this->assertEquals("D", $parametrage->getPgColNbPmz());
    }

    public function testPgColNbPa(){
        $parametrage = new Parametrage();
        $uri = 'e';
        $parametrage->setPgColNbPa($uri);
        $this->assertEquals("E", $parametrage->getPgColNbPa());
    }

    public function testPgColLabNb(){
        $parametrage = new Parametrage();
        $uri = 'f';
        $parametrage->setPgColLabNb($uri);
        $this->assertEquals("F", $parametrage->getPgColLabNb());
    }

    public function testPeColMenu(){
        $parametrage = new Parametrage();
        $uri = 'g';
        $parametrage->setPeColMenu($uri);
        $this->assertEquals('G', $parametrage->getPeColMenu());
    }

    public function testPeColTotal(){
        $parametrage = new Parametrage();
        $uri = 'h';
        $parametrage->setPeColTotal($uri);
        $this->assertEquals('H', $parametrage->getPeColTotal());
    }

    public function testPeColElp(){
        $parametrage = new Parametrage();
        $uri = 'i';
        $parametrage->setPeColElp($uri);
        $this->assertEquals('I', $parametrage->getPeColElp());
    }

    public function testPeColElr(){
        $parametrage = new Parametrage();
        $uri = 'j';
        $parametrage->setPeColElr($uri);
        $this->assertEquals('J', $parametrage->getPeColElr());
    }

    public function testPeColNbre(){
        $parametrage = new Parametrage();
        $uri = 'k';
        $parametrage->setPeColNbre($uri);
        $this->assertEquals('K', $parametrage->getPeColNbre());
    }

    public function testPseColId(){
        $parametrage = new Parametrage();
        $uri = 'l';
        $parametrage->setPseColId($uri);
        $this->assertEquals('L', $parametrage->getPseColId());
    }

    public function testPseColNb(){
        $parametrage = new Parametrage();
        $uri = 'm';
        $parametrage->setPseColNb($uri);
        $this->assertEquals("M", $parametrage->getPseColNb());
    }

    public function testPseColNbSum(){
        $parametrage = new Parametrage();
        $uri = 'n';
        $parametrage->setPseColNbSum($uri);
        $this->assertEquals("N", $parametrage->getPseColNbSum());
    }

    public function testSbColNb(){
        $parametrage = new Parametrage();
        $uri = 'o';
        $parametrage->setSbColNb($uri);
        $this->assertEquals('O', $parametrage->getSbColNb());
    }

    public function testPseColIdGeo(){
        $parametrage = new Parametrage();
        $uri = 'p';
        $parametrage->setPseColIdGeo($uri);
        $this->assertEquals('P', $parametrage->getPseColIdGeo());

    }
}