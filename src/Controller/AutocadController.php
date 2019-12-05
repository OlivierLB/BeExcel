<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 03/12/2019
 * Time: 15:21
 */

namespace App\Controller;


use App\Utils\Autocad\EtiquettePB;


use olivierlb\phpdxf\Creator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutocadController extends AbstractController {

    protected $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @Route("/test", name="verif")
     * @throws
     */
    public function import(){

        $dxf = new Creator(Creator::MILLIMETERS);
        $etiquettePB = new EtiquettePB();

        //Récupération de l'url du fichier
        $url = $this->parameterBag->get('kernel.project_dir'). '/public/uploads/toCheck.xlsx';
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);

        try{
            $spreadsheet = $reader->load($url);
            $etiquettePB->listPB($dxf, $spreadsheet);
        }catch (FileException $e){
            return new Response($e->getMessage());
        }




        return $this->render('be/autocad/import.html.twig');
    }
}