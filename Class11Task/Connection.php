<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 6:30 PM
 */

class Connection
{
    private $conn;
    public function __construct()
    {
        $this->conn=new PDO("mysql:host=localhost;dbname=Class11","root","");
    }
    public function GetConnection(){return $this->conn;}

    public function SaveMessage($title,$des){
        try{
            $statement= $this->conn->prepare("INSERT INTO tasks (Title,Description,IsDone,UserId) VALUES (:title,:des,:isdone,:uId)");
            $statement->execute(
                array(
                    ':title'=> $title,
                    ':des'=>$des,
                    ':isdone'=>'false',
                    ':uId'=>$_SESSION['Id']

                )
            );
        }
        catch (Exception $ex){
            echo "<br>Error in Inserting Data";
        }
    }

    public function Register($name,$email,$password){
        try{
            $statement= $this->conn->prepare("INSERT INTO Users (Name,Email,Password) VALUES (:name,:email,:password)");
            $statement->execute(
                array(
                    ':name'=> $name,
                    ':email'=>$email,
                    ':password'=>$password

                )
            );
        }
        catch (Exception $ex){
            echo "<br>Error in Inserting Data";
        }
    }

    public  function LogIN($email,$password)
    {

        try{
            $query= "SELECT * FROM Users where Email='".$email."' And Password='".$password."'";
            $result = $this->conn->prepare($query);
            $result->execute();
        //  print_r($result->fetchAll());
            return $result->fetchAll();
        }
        catch(Exception $ex){
            echo "Invalid<br>";
        }

    }

    public  function GetAllUser()
    {

        try{
            $query= "SELECT * FROM Users ";
            $result = $this->conn->prepare($query);
            $result->execute();
            //  print_r($result->fetchAll());
            return $result->fetchAll();
        }
        catch(Exception $ex){
            echo "Invalid<br>";
        }

    }

    public  function GetMessages()
    {

        try{
            $query= "SELECT * FROM tasks where UserId=".$_SESSION['Id'];
            $result = $this->conn->prepare($query);
            $result->execute();
         //   print_r($result->fetchAll());
            return $result->fetchAll();
        }
        catch(Exception $ex){
            echo "Invalid<br>";
        }

    }

    public function DeleteMsg($id){
        try{
            $query= "DELETE FROM tasks where id=".$id;
            $result = $this->conn->prepare($query);
            $result->execute();
        }
        catch(Exception $ex){
            echo "Invalid<br>";
        }

    }

    public function GetById($id){
        try{
            $query= "SELECT * FROM tasks where id=".$id;
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result->fetchAll();
        }
        catch(Exception $ex){
            echo "Invalid<br>";
        }

    }

    function UpdateMessage($ismarked,$id)
    {
        try{
            $statement= $this->conn->prepare("UPDATE tasks SET IsDone=:isimp where id=".$id);
            $statement->execute(
                array(
                    ':isimp'=>$ismarked

                )
            );
        }
        catch (Exception $ex){
            echo "<br>Error in Inserting Data";
        }
    }

    function UpdateTask($title,$des,$id)
    {
        try{
            $statement= $this->conn->prepare("UPDATE tasks SET Title=:title,Description=:des where id=".$id);
            $statement->execute(
                array(
                    ':title'=>$title,
                    ':des'=>$des

                )
            );
        }
        catch (Exception $ex){
            echo "<br>Error in Inserting Data";
        }
    }

}