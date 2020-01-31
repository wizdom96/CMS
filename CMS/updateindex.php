<?php

require_once 'core/init.php';
$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

$id= basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)); 
$id= filter_var($id,FILTER_SANITIZE_NUMBER_INT); 

require './core/updateindexcontent.php';

?>
 

    
<html>
<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <button class="btn btn-outline-success" type="button" ><a href="logout.php" >LOGOUT</a></button>
    <button class="btn btn-outline-success" type="button"><a href="editindex.php" >BACK</a></button>
  </form>
</nav>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css" >

<div class="container register">
                <div class="row">                
                    <div class="col-md-9 register-right">
                                     
                                <h3 class="register-heading"></h3>
                                <div class="row register-form">
                                    <div class="col-md-6">

                                        <form action="./core/updateindexcontent.php" method="post">
                                         
                                        <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $row ['destination'] ?>" name="destination" id="destination"/>
                                        </div> 
                                        <div class="form-group">
                                                <input type="number" class="form-control" value="<?php echo $row ['price'] ?>" name="price" id="price"/>
                                        </div>
                                        <div class="form-group">
                                        <textarea class="form-control" name="description" rows="10" cols="30" ><?php echo $row ['content_message'];?></textarea>

                                        </div>
                                                
                                        <input type="hidden" name="edit" value="<?php echo $id ?> ">
                                                <input type="submit" name="update" value="Update">
                                                
                                            </div>
                                                                                      
                                        </div>
                                    </div>
                                <div>
                        </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>