<?php
    include "../../../includes/functions.php";

    checkAPIRate();
    logAPI('users/get/');

    $json = array();
    $json['success'] = false;

    if($_SERVER['REQUEST_METHOD'] == "GET") {
        $user = array();
        if(!gone($_REQUEST['id']))
            $user = getUser($_REQUEST['id'], false);
        else if(!gone($_REQUEST['username']))
            $user = getUserByName($_REQUEST['username'], false);
        else {
            $json['error'] = 'Parameter \'id\' or \'username\' is not set.';
            dump($json);
        }

        if(!gone($user['banned']) || $user['banned']) {
            $json['success'] = true;
            $json['user'] = $user;
            dump($json);
        } else {
            $json['error'] = 'That user does not exist.';
            dump($json);
        }
    } else {
        $json['error'] = 'Request method must be GET.';
        dump($json);
    }
?>
