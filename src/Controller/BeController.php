<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\Parametrage;
use App\Form\DocumentType;
use App\Form\ParametrageType;
use App\Utils\GestionExcel;
use App\Utils\Json;
use App\Utils\TraitementsExcel\Adductabilite;
use App\Utils\TraitementsExcel\PageDeGarde;
use App\Utils\TraitementsExcel\Pointage;
use App\Utils\TraitementsExcel\Positionnement;
use App\Utils\TraitementsExcel\Synoptique;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeController extends AbstractController
{

    protected $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @Route("/", name="be")
     */
    public function index(Request $request)
    {
        $document = new Document();
        $form = $this->createForm(DocumentType::class, $document);

        $form->handleRequest($request);

        //Traitement seulement si un document est renseigné
        if ($form->isSubmitted() && $form->isValid()) {

            if($document->getFichier() !== null){
                //Récupération du fichier
                $file = $form->get('fichier')->getData();
                //On renomme le fichier
                $fileName =  'toCheck.xlsx';

                try {
                    //Sauvegarde du fichier
                    $file->move(
                        $this->getParameter('files_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }
                $document->setFichier($file);
                return $this->redirectToRoute('document_verif');
            }
        }

        return $this->render('be/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/verif", name="verif")
     * @throws
     */
    public function verif(Request $request, \Symfony\Component\Asset\Packages $assetsManager){
        $gestionExcel = new GestionExcel();
        $traitementPageDeGarde = new PageDeGarde();
        $traitementPointage = new Pointage();
        $traitementPositionnement = new Positionnement();
        $traitementSynoptique = new Synoptique();
        $traitementAdductabilite = new Adductabilite();

        //Récupération de l'url du fichier
        $url = $this->parameterBag->get('kernel.project_dir'). '/public/uploads/toCheck.xlsx';

        $paramJson = file_get_contents('uploads/param.json');
        $paramObject = json_decode($paramJson);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);

        try{
            //Chargement du fichier
            $spreadsheet = $reader->load($url);
            //Récupération des feuilles utiles à vérifier
            $pageDeGarde = $spreadsheet->getSheetByName('page_de_garde');
            $pointageEtude = $spreadsheet->getSheetByName('pointage-etude');
            $positionnementEtude = $spreadsheet->getSheetByName('positionnement-etude');
            $synoptique = $spreadsheet->getSheetByName('synoptique-bilan µmodules');
            $adductabilite = $spreadsheet->getSheetByName('adductabilité des sites');
            //Compte le nombre d'adresses qui ont été traité
            $nbAdresse = $gestionExcel->getNbAdresse($pointageEtude);

            //Appels des fonctions de vérification
            //Les fonctions retournent une liste des erreurs rencontrées
            $errorGarde = $traitementPageDeGarde->traitementPageDeGarde($pageDeGarde, $paramObject->pageDeGarde);
            $errorPointage = $traitementPointage->traitementPointage($pointageEtude, $nbAdresse, $paramObject->pointage);
            $errorPositionnement = $traitementPositionnement->traitementPositionnement($positionnementEtude, $nbAdresse, $paramObject->positionnement);
            $errorSynoptique = $traitementSynoptique->traitementSynoptique($synoptique, $paramObject->synoptique);
            $errorAdductabilite = $traitementAdductabilite->traitementAdductabilite($adductabilite, $nbAdresse, $paramObject->adductabilite);
        }catch (FileException $e){
            return new Response($e->getMessage());
        }

        //Appel la page verif.html avec les tableaux des erreurs
        return $this->render('be/verif.html.twig', [
            'errorGarde' => $errorGarde,
            'errorPointage' => $errorPointage,
            'errorPositionnement' => $errorPositionnement,
            'errorSynoptique' => $errorSynoptique,
            'errorAdductabilite' => $errorAdductabilite
        ]);
    }

    /**
     * @Route("/regle", name="regle")
     */
    public function regle(Request $request){
        //Appel la page regle.html avec les tableaux des erreurs
        return $this->render('be/regle.html.twig', []);
    }

    public function param(Request $request){
        $parametrage = new Parametrage();
        $json = new Json();
        $form = $this->createForm(ParametrageType::class, $parametrage);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $json->sauvegardeJson($form);
            return $this->redirectToRoute('homepage');
        }
        return $this->render('be/param.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
