<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 6:50 PM
 */

include "Connection.php";
include "Form.php";
$form=new Form();
$conn= new Connection();
if(isset($_POST['Register'])) {
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $count=0;
    if ($name=="" ||$email=="" || $password==""  ) {
        echo '<script type="text/javascript">alert("Please Enter Valid Values");</script>';

        echo '<script>window.location="Registration.php"</script>';
    } else {
        $data= $conn->GetAllUser();
        foreach ($data as $d){
            if($d['Email']==$email){
                echo '<script type="text/javascript">alert("This email has already used.Please enter another email.");</script>';
                $count=1;
                echo '<script>window.location="Registration.php"</script>';
                }

        }
        if($count==0){
            $conn->Register($name,$email,$password);
            echo '<script>window.location="LogIn.php"</script>';
        }

}

    }


else{
    $form->RegisterPage();
}