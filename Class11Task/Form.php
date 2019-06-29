<?php
/**
 * Created by PhpStorm.
 * User: ctbd
 * Date: 6/22/2019
 * Time: 6:32 PM
 */
//session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script>
            function Confirmation() {
                var del=confirm("Are you sure you want to delete this record?");
                if (del==true){
                    return true;
                }
                else{
                    return false;
                }
            }
            

        </script>
    </head>
    <body>


<?php
class Form
{

    private function NavBar(){?>
        <div class="Nav">


            <form action="LogIn.php" method="post">
                <input type="submit" name="LogInBtn" value="LogIn">
            </form>
            <form action="Registration.php" method="post">
                <input type="submit" name="ListBtn" value="Registration">
            </form>



        </div>

        <?php
    }
    private function NavBar2(){?>
        <div class="Nav">

            <form action="index.php" method="post">
                <input type="submit" name="IndexBtn" value="LogOut">
            </form>
            <form action="Messages.php" method="post">
                <input type="submit" name="CompleteBtn" value="Complete Tasks">
            </form>

            <form action="Messages.php" method="post">
                <input type="submit" name="DashboardBtn" value="Dashboard">
            </form>


        </div>

        <?php
    }
    public function LandingPage()
    {

            $this->NavBar();
        ?>
        <div id="messageArea">
           <h1>Welcome To My Task Bar. Here You Can Store Your Wife's Commands To Execute!!</h1>
        </div>




<?php
    }

    public function RegisterPage()
    {
        $this->NavBar();
        ?>
        <div id="messageArea">
            <form action="Registration.php" method="post" enctype="multipart/form-data">
                <input type="text" name="Name" placeholder="Name"><br>
                <span id="NameSpan" style="color: #e8491d"></span>
                <input type="email" name="Email" placeholder="Email"><br>
                <span id="EmailSpan" style="color: #e8491d"></span>
                <input type="text" name="Password" placeholder="Password"><br>
                <span id="PriceSpan" style="color: #e8491d"></span>

                <input type="submit" name="Register" class="Btn" value="Submit">
            </form>
        </div>


<?php
    }

    public function LogInPage()
    {
        $this->NavBar();
        ?>
        <div id="messageArea">
            <form action="LogIn.php" method="post" enctype="multipart/form-data">

                <input type="email" name="Email" placeholder="Email"><br>
                <span id="EmailSpan" style="color: #e8491d"></span>
                <input type="password" name="Password" placeholder="Password"><br>
                <span id="PasswordSpan" style="color: #e8491d"></span>
                <input type="submit" name="LogIn" class="Btn" value="Submit">
            </form>
        </div>


        <?php
    }

    public function DashBoard($data)
    {
        $this->NavBar2();
        ?>
            <div>
                <h1>Welcome <?php echo $_SESSION['Name']; ?>

                </h1>
                <form action="MessagePost.php" method="post">
                    <input type="submit" name="AddTask" class="Btn" value="Add Task">
                </form>
            </div>
            <table border="1">
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
                <th>Is Done</th>
                <?php foreach ($data as $d){

                    if($d["IsDone"]=="True"){}
                    else{


                    ?>

                    <tr>
                        <td align="center"><?php echo $d['Title'] ?></td>
                        <td align="center"><?php echo $d['Description'] ?></td>
                        <td align="center"><form action="DeleteMsg.php" method="post" >
                                <input type="hidden" name="Id" value="<?php echo $d['Id'] ?>">
                                <input type="submit" name="EditMsg"  class="TableBtn" value="Edit">
                                <input type="submit" name="DeleteMsg"  class="TableBtn" value="Delete">
                            </form></td>
                        <td align="center"><form name="ChangeName" action="IsImp.php" method="post">
                                <input type="hidden" name="Id" value="<?php echo $d['Id'] ?>">
                                <input type="hidden" name="IsMarked"   value="<?php echo $d['IsDone'] ?>">
                                <?php
                                if($d["IsDone"]=="True"){

                                    ?>

                                    <?php
                                }
                                else{
                                    ?>
                                    <input type="submit" id="<?php echo $d['Id'] ?>" name="MarkImp" class="TableBtn" value="Unmarked" onclick="changeName(<?php echo $d['Id'] ?>)">

                                    <?php
                                }

                                ?>
                            </form></td>
                    </tr>
                <?php  }}?>
            </table>


        <?php
    }

    public function AddTask()
    {
        $this->NavBar2();
        ?>
        <div id="messageArea">
            <form action="MessagePost.php" method="post" enctype="multipart/form-data">

                <input type="Text" name="Title" placeholder="Title"><br>
                <input type="Text" name="Description" placeholder="Description"><br>
                <input type="submit" name="Add" class="Btn" value="Submit">
            </form>
        </div>


        <?php
    }

    public function EditTask($data)
    {
        $this->NavBar2();
        ?>
        <div id="messageArea">
            <form action="MessagePost.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Id" value="<?php echo $data[0]['Id'] ?>">
                <input type="Text" name="Title" value="<?php echo $data[0]['Title'] ?>"><br>
                <input type="Text" name="Description" value="<?php echo $data[0]['Description'] ?>"><br>
                <input type="submit" name="Update" class="Btn" value="Update">
            </form>
        </div>


        <?php
    }

    public function DashBoard2($data)
    {
        $this->NavBar2();
        ?>
        <div>
            <h1>Welcome <?php echo $_SESSION['Name']; ?>

            </h1>
            <form action="MessagePost.php" method="post">
                <input type="submit" name="AddTask" class="Btn" value="Add Task">
            </form>
        </div>
        <table border="1">
            <th>Title</th>
            <th>Description</th>

            <?php foreach ($data as $d){

                if($d["IsDone"]=="False"){}
                else{


                    ?>

                    <tr>
                        <td align="center"><?php echo $d['Title'] ?></td>
                        <td align="center"><?php echo $d['Description'] ?></td>


                    </tr>
                <?php  }}?>
        </table>


        <?php
    }
}

?>

    </body>
</html>


