<?php

    //calling our Dao file to access its functions
    include_once('../../../Dao.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/webhook/post_hook.php');

    //getting values the variables to be inserted into our database
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip_code = trim($_POST['zip_code']);
    $msg = trim($_POST['msg']);
    $requirement = trim($_POST['moneyReq']);

    if(!empty(trim($_POST['industry']))){
        $industry = $_POST['industry'];
    }else{
        $industry = 'Transportation';
    }

    //assigning client name
    if(!empty(trim($_POST['client_name']))){
        $client_name = $_POST['client_name'];
    }else{
        $client_name = 'Novus Glass';
    }

    if(!empty(trim($_POST['sub_domain']))){
        $sub_domain = $_POST['sub_domain'];
    }else{
        $sub_domain = 'novus-glass';
    }

    $notification  = new HookNotification();
    $notification->notify($_POST);

    $dao = new Dao();
    $dao->getConnectionStatus();
    $dao->addMainLead($first_name, $last_name, $email, $city, $state, $phone_number, $zip_code, $msg, $industry, $client_name, $sub_domain, $requirement);
    // $dao->addMainLead($first_name, $last_name, $email, $phone_number, $zip_code, $msg, $industry, $client_name, $sub_domain);
?>
