<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 6:40 PM
 */
session_start();
include "Connection.php";
include "Form.php";
$form=new Form();
$conn= new Connection();
if(isset($_POST['AddTask'])) {
    $form->AddTask();
}

if(isset($_POST['Add'])) {
    $title=$_POST['Title'];
    $des=$_POST['Description'];
    if ($title=="" || $des=="" ) {
        echo "Please Enter a Message";
    } else {
        $conn->SaveMessage($title,$des);
        echo '<script type="text/javascript">alert("Your Message Sent Successfully");</script>';

        echo '<script>window.location="Messages.php"</script>';
    }
}

if(isset($_POST['Update'])) {
    $title=$_POST['Title'];
    $des=$_POST['Description'];
    $Id=$_POST['Id'];
    if ($title=="" || $des=="" ) {
        echo "Please Enter a Message";
        echo '<script type="text/javascript">alert("Please Enter Valid Values");</script>';

        echo '<script>window.location="Messages.php"</script>';
    } else {
        $conn->UpdateTask($title,$des,$Id);
        echo '<script type="text/javascript">alert("Your Message Updated Successfully");</script>';

        echo '<script>window.location="Messages.php"</script>';
    }
}