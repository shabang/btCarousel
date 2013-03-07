<?php
/**
 * @purpose   Affichage d'un migx avec Bootstrap Caroussel
 *===============================================================================
 * @version   0.1
 * @date      06/02/2013
 * @author    d.feldle@ackwa.fr
 * @see       http://www.ackwa.fr
 * @require   migx - http://rtfm.modx.com/display/ADDON/MIGX
 *            Twitter Bootstrap carousel - http://twitter.github.com/bootstrap/
 * @copyright (c) 2013 - Ackwa
 *===============================================================================
 * @history   0.1 - 06/02/13 - Création
 *===============================================================================
 * @usage     [[btSlider?&tv=`migxTV`&itemTpl=`contentChunk`&containerTpl=`containerChunk`]]
 *===============================================================================
 */

/*
 * On récupère nos paramètres
 */
$tv           = $modx->getOption('tv',           $scriptProperties, False);
$itemTpl      = $modx->getOption('itemTpl',      $scriptProperties, False);
$containerTpl = $modx->getOption('containerTpl', $scriptProperties, False);
$identifiant  = $modx->getOption('identifiant',  $scriptProperties, "main-banner");

if ($tv && $itemTpl && $containerTpl){
    $tabParam['identifiant'] = $identifiant;
    /*
     * On récupère le nombre de ligne du migx
     */
    $oRes  = $modx->getObject('modResource', $modx->resource->get('id'));
    $sData = $oRes->getTVValue($tv);
    $lData = json_decode($sData);
    $MIGX_id = 0;
    foreach($lData as $oData) {
        $MIGX_id = max($MIGX_id, $oData->MIGX_id);
    }
    /*
     * Construction des indicateurs
     */
    $tabParam['indicator'] ='';
    for ($i=0; $i < $MIGX_id ; $i++) { 
        $tabParam['indicator'] .= '<li data-target="'.$identifiant.'" data-slide-to="'.$i.'" class="';
        $tabParam['indicator'] .= (($i==0)?'active':'');
        $tabParam['indicator'] .= '"></li>';
    }
    
    /*
     * Mise en place des item
     */
    $getImageListParams = array(
        'tvname'    => $tv,
        'tpl'       => $itemTpl 
    );  
    $tabParam['item'] = $modx->runSnippet('getImageList', $getImageListParams); 

    return $modx->getChunk($containerTpl, $tabParam);  
}
else{
    $modx->log(xPDO::LOG_LEVEL_ERROR, "btCarousel : Paramètre(s) manquant(s)");
    return false;
}