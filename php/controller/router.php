<?php

File::requireOnce(REP_LIB, 'Session.php');

if (!$_REQUEST == null) {
    if (isset($_REQUEST['Default'])){
        File::requireOnce(REP_CONTROLLER, 'ControllerDefault.php');
        $action = $_REQUEST['Default'];
        ControllerDefault::$action();
    }

}
