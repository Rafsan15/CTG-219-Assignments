<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 6:51 PM
 */
session_start();
include "Connection.php";
include "Form.php";
$form=new Form();
$conn= new Connection();
if(isset($_POST['LogIn'])) {
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    if ($email=="" || $password==""  ) {
        echo '<script type="text/javascript">alert("Please Enter Valid Values");</script>';

        echo '<script>window.location="Login.php"</script>';
    } else {
        $info=$conn->LogIN($email,$password);
        $_SESSION['Email']=$info[0]['Email'];
        $_SESSION['Password']=$info[0]['Password'];
        $_SESSION['Name']=$info[0]['Name'];
        $_SESSION['Id']=$info[0]['Id'];


        echo '<script>window.location="Messages.php"</script>';


    }
}
else{
    $form->LogInPage();

}

