<?php

File::requireOnce(REP_MODEL, 'ModelDefault.php');

class ControllerDefault {

    private static $resp = array(
        'error' => null,
        'res' => null,
    );

    public static function addGens(){
        $nom = isset($_REQUEST['nom']) ? $_REQUEST['nom'] : "";
        $prenom = isset($_REQUEST['prenom']) ? $_REQUEST['prenom'] : "";
        $DN = isset($_REQUEST['DN']) ? $_REQUEST['DN'] : "";
        echo json_encode(ModelDefault::insertGens($nom, $prenom, $DN));
    }

    public static function getAllGens(){
        echo json_encode(ModelDefault::getAllGens());
    }

    public static function supprGensById(){
        ModelDefault::deleteGensById($_REQUEST['idGens']);
        echo json_encode(ModelDefault::getAllGens());
    }
}