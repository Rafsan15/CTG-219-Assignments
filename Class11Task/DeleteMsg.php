<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 7:30 PM
 */

include "Connection.php";
include "Form.php";
$form=new Form();
$conn= new Connection();

if(isset($_POST['EditMsg'])) {
    $data=$conn->GetById($_POST['Id']);
    $form->EditTask($data);
}

if(isset($_POST['DeleteMsg'])) {
    $id=$_POST['Id'];
    $conn->DeleteMsg($id);
    echo '<script>window.location="Messages.php"</script>';
}