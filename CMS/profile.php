<?php 

require_once 'core/init.php';

if(Session::exists('home')){
 echo '<p>'  .  Session::flash('home')  .  '</p>';
    }

    $user = new User();
     if($user->isLoggedIn()){
  ?>

<html>

<body>


    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/indexstyle.css" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
    <link href="./css/profilecss.css" rel="stylesheet" type='text/css'>


<div class="container" >
	<div class="row panel">
		
        <div class="col-md-8  col-xs-12">
           <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail picture hidden-xs" />
           <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail visible-xs picture_mob" />
           <div class="header">
                <h1><p>Hello  <i><?php echo escape($user->data()->name) ?></i></p></h1><a href="logout.php"> Log Out</a>
                <h4><?php    
  
  if($user->hasPermission('admin')){
    echo '<p>You are administrator.</p>';
    echo '<span>You can change and update the content of the webapge and also add new fields.</span>';
  } else {
    
    echo '<p> You are logged in as a user.</p>';
   echo'<span>Check our offers and reserve your dream vacation !!!</span>';
  }
   
} ?></h4>
  
           </div>
        </div>
    </div>   
    <br><br>
	<div class="row nav">    
        <div class="col-md-1"></div>
        <div class="col-md-8 col-xs-10" >
        <a href="update.php"> <div class="col-md-4 col-xs-4 well">Update details</div></a> 
        <a href="changepassword.php"><div class="col-md-4 col-xs-4 well">Change password</div></a>
        
        <a href="<?php    
  
  if($user->hasPermission('admin')){

     echo 'editindex.php';

       } else {

      echo 'index.php';
}
         ?>">    <div class="col-md-4 col-xs-4 well"><?php    
  
         if($user->hasPermission('admin')){
       
            echo 'Edit Content';
       
              } else {
       
             echo 'View offers';
       }
                ?>
              </div></a>               
        </div>               
</div><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>

			<div class="mu-footer-area">
				<div class="row">
					<div class="col-md-6">
						<div class="mu-footer-left">
							<p class="mu-copy-right">&copy; Copyright <a rel="nofollow" href="http://markups.io">I.K.</a>. All right reserved.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mu-footer-right">
							<div class="mu-social-media">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-youtube"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>


  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</html>