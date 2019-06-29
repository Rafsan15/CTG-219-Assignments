<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 7:58 PM
 */

include "Connection.php";
include "Form.php";
$form=new Form();
$conn= new Connection();
if(isset($_POST['MarkImp'])) {
    $id=$_POST['Id'];
    $ismarked=$_POST['IsMarked'];
    if($ismarked=="True"){
        $ismarked="False";
    }
    else{
        $ismarked="True";
    }
    $conn->UpdateMessage($ismarked,$id);
    echo '<script>window.location="Messages.php"</script>';


}