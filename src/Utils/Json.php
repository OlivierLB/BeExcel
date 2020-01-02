<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 29/11/2019
 * Time: 11:03
 */

namespace App\Utils;

use phpDocumentor\Reflection\Types\Object_;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\HttpFoundation\Response;

class Json {

    public function sauvegardeJson($form){
        $parametrageForm = new Object_();
        $pageGarde = new Object_();
        $pointage = new Object_();
        $positionnement = new Object_();
        $adductabilite = new Object_();
        $synoptique = new Object_();

        $parametrageForm->version = $form->get('version')->getData();

        $pageGarde->pgColInfos = $form->get('pgColInfos')->getData();
        $pageGarde->pgColLab = $form->get('pgColLab')->getData();
        $pageGarde->pgColLabId = $form->get('pgColLabId')->getData();
        $pageGarde->pgLiPmz = $form->get('pgLiPmz')->getData();
        $pageGarde->pgColPaGeo = $form->get('pgColPaGeo')->getData();
        $pageGarde->pgColPaId = $form->get('pgColPaId')->getData();
        $pageGarde->pgLiPa = $form->get('pgLiPa')->getData();
        $pageGarde->pgLiDebInfos = $form->get('pgLiDebInfos')->getData();
        $pageGarde->pgLiFinInfos = $form->get('pgLiFinInfos')->getData();
        $pageGarde->pgColNbPmz = $form->get('pgColNbPmz')->getData();
        $pageGarde->pgColNbPa = $form->get('pgColNbPa')->getData();
        $pageGarde->pgLiNb = $form->get('pgLiNb')->getData();
        $pageGarde->pgColLabNb = $form->get('pgColLabNb')->getData();
        $pageGarde->pgColEmpPa = $form->get('pgColEmpPa')->getData();
        $pageGarde->pgLiEmpPa = $form->get('pgLiEmpPa')->getData();
        $pageGarde->pgLiPaGeo = $form->get('pgLiPaGeo')->getData();
        $pageGarde->pgColLog = $form->get('pgColLog')->getData();
        $pageGarde->pgLiLog = $form->get('pgLiLog')->getData();

        $pointage->peColMenu = $form->get('peColMenu')->getData();
        $pointage->peColTotal = $form->get('peColTotal')->getData();
        $pointage->peColElp = $form->get('peColElp')->getData();
        $pointage->peColElr = $form->get('peColElr')->getData();
        $pointage->peColNbre = $form->get('peColNbre')->getData();
        $pointage->peLiDe = $form->get('peLiDe')->getData();

        $positionnement->pseColId = $form->get('pseColId')->getData();
        $positionnement->pseColNb = $form->get('pseColNb')->getData();
        $positionnement->pseColNbSum = $form->get('pseColNbSum')->getData();
        $positionnement->pseLiDe = $form->get('pseLiDe')->getData();
        $positionnement->pseColTro = $form->get('pseColTro')->getData();
        $positionnement->pseColAdr = $form->get('pseColAdr')->getData();
        $positionnement->pseColSit = $form->get('pseColSit')->getData();
        $positionnement->pseColIdGeo = $form->get('pseColIdGeo')->getData();

        $adductabilite->addColCom = $form->get('addColCom')->getData();
        $adductabilite->addColIte = $form->get('addColIte')->getData();
        $adductabilite->addColHau = $form->get('addColHau')->getData();
        $adductabilite->addColIon = $form->get('addColIon')->getData();
        $adductabilite->addColNat = $form->get('addColNat')->getData();

        $synoptique->sbColNb = $form->get('sbColNb')->getData();
        $synoptique->sbLiPmz = $form->get('sbLiPmz')->getData();
        $synoptique->sbLiPa = $form->get('sbLiPa')->getData();

        $parametrageForm->pageDeGarde = $pageGarde;
        $parametrageForm->pointage = $pointage;
        $parametrageForm->positionnement = $positionnement;
        $parametrageForm->adductabilite = $adductabilite;
        $parametrageForm->synoptique = $synoptique;
        $myJson = json_encode($parametrageForm);

        $fs = new \Symfony\Component\Filesystem\Filesystem();
        try {
            $fs->dumpFile('uploads/param.json', $myJson);
        }
        catch(IOException $e) {
            return new Response($e->getMessage());
        }
    }
}