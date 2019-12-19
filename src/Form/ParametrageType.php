<?php

namespace App\Form;

use App\Entity\Parametrage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParametrageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $paramJson = file_get_contents('uploads/param.json');
        $paramObject = json_decode($paramJson);
        $builder
            ->add('pgColInfos', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColInfos
            ])
            ->add('pgColLabId', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColLabId
            ])
            ->add('pgColLab', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColLab
            ])
            ->add('pgLiPmz', IntegerType::class, [
                'data' => $paramObject->pageDeGarde->pgLiPmz
            ])
            ->add('pgColPaGeo', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColPaGeo
            ])
            ->add('pgColPaId', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColPaId
            ])
            ->add('pgLiPa', IntegerType::class, [
                'data' => $paramObject->pageDeGarde->pgLiPa
            ])
            ->add('pgLiDebInfos', IntegerType::class, [
                'data' => $paramObject->pageDeGarde->pgLiDebInfos
            ])
            ->add('pgLiFinInfos', IntegerType::class, [
                'data' => $paramObject->pageDeGarde->pgLiFinInfos
            ])
            ->add('pgColNbPmz', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColNbPmz
            ])
            ->add('pgColNbPa', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColNbPa
            ])
            ->add('pgLiNb', IntegerType::class, [
                'data' => $paramObject->pageDeGarde->pgLiNb
            ])
            ->add('pgColLabNb', TextType::class, [
                'data' => $paramObject->pageDeGarde->pgColLabNb
            ])
            ->add('version', TextType::class, [
                'data' => $paramObject->version
            ])
            ->add('peColMenu', TextType::class, [
                'data' => $paramObject->pointage->peColMenu
            ])
            ->add('peColTotal', TextType::class, [
                'data' => $paramObject->pointage->peColTotal
            ])
            ->add('peColElp', TextType::class, [
                'data' => $paramObject->pointage->peColElp
            ])
            ->add('peColElr', TextType::class, [
                'data' => $paramObject->pointage->peColElr
            ])
            ->add('peColNbre', TextType::class, [
                'data' => $paramObject->pointage->peColNbre
            ])
            ->add('peLiDe', TextType::class, [
                'data' => $paramObject->pointage->peLiDe
            ])
            ->add('pseColId', TextType::class, [
                'data' => $paramObject->positionnement->pseColId
            ])
            ->add('pseColNb', TextType::class, [
                'data' => $paramObject->positionnement->pseColNb
            ])
            ->add('pseColNbSum', TextType::class, [
                'data' => $paramObject->positionnement->pseColNbSum
            ])
            ->add('pseLiDe', TextType::class, [
                'data' => $paramObject->positionnement->pseLiDe
            ])
            ->add('pseColTro', TextType::class, [
                'data' => $paramObject->positionnement->pseColTro
            ])
            ->add('pseColAdr', TextType::class, [
                'data' => $paramObject->positionnement->pseColAdr
            ])
            ->add('pseColIdGeo', TextType::class, [
                'data' => $paramObject->positionnement->pseColIdGeo
            ])
            ->add('pseColSit', TextType::class, [
                'data' => $paramObject->positionnement->pseColSit
            ])
            ->add('sbColNb', TextType::class, [
                'data' => $paramObject->synoptique->sbColNb
            ])
            ->add('sbLiPmz', IntegerType::class, [
                'data' => $paramObject->synoptique->sbLiPmz
            ])
            ->add('sbLiPa', IntegerType::class, [
                'data' => $paramObject->synoptique->sbLiPa
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parametrage::class,
        ]);
    }
}
