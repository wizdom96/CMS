<?php




$mysqli = new mysqli('localhost', 'root', '', 'cms') or die(mysqli_error($mysqli));

if (isset($_POST['add'])){

        $destination= $_POST['destination'];
        $price= $_POST['price'];
        $description= $_POST['description'];

       
    $mysqli->query ("INSERT INTO content (destination, price, content_message) VALUES ('$destination', '$price', '$description' )") or 
    die($mysqli->error);

    header("location: ../editindex.php");

}


if(isset($_GET['edit'])){  
    $id = $_GET['edit'];    
    $result = $mysqli -> query("SELECT * FROM content WHERE id=$id") or  die($mysqli->error());

             $row = $result -> fetch_array();
             $destination= $row ['destination'];
             $price= $row['price'];       
             $description = $row ['content_message'];
             
             
        }
        

    

    if(isset($_POST['update'])){
        $id= $_POST['edit'];
        $destination= $_POST['destination'];
        $price= $_POST['price'];
        $description= $_POST['description'];
       
        $mysqli-> query ("UPDATE  content SET destination='$destination', price='$price', content_message ='$description' WHERE id=$id") or  die($mysqli->error());

       

        header("location: ../editindex.php");
    }

    if(isset($_GET['delete'])){  
        $id=$_GET['delete'];
        $mysqli->query ("DELETE FROM content WHERE id=$id") or  die($mysqli->error());

        $_SESSION['message'] = "Record has been deleted!";
        header("location: ../editindex.php");

 }
   