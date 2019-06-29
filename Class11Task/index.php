<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 6:26 PM
 */
session_start();
include "Connection.php";
include "Form.php";
$form=new Form();
$conn= new Connection();

$form->LandingPage();

session_unset();
