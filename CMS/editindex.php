<?php

require_once 'core/init.php';
$user = new User();

$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

if(Input::exists()){
    if(!Token::check(Input::get('token'))){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
            ));

            if($validation->passed()){
                try{ 
                    $user->update(array(
                        'name' => Input::get('name')
                    ));

                    Session::flash('home', 'Your details have been updated!');
                    Redirect::to('profile.php');
                } catch(Exception $e) {
                die($e->getMessage());
                }
            } else {
                foreach($validation->errors() as $error){
                    echo $error, '<br>' ;
                }
            }
        }     
}
?>
<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Outing : Home</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main Style -->
    <link href="./css/indexstyle.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Poppins For Title -->
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
 
 
	</head>
    <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <button class="btn btn-outline-success" type="button" ><a href="logout.php" >LOGOUT</a></button>
    <button class="btn btn-outline-success" type="button"><a href="profile.php" >BACK</a></button>
  </form>
</nav>
<main>
		<section id="mu-about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-about-area">
							<!-- Start Feature Content -->
							<div class="row">
								<div class="col-md-6">
									<div class="mu-about-left">
										<img  src="images/about.jfif" alt="img">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mu-about-right">
										<h2>Travel Agency</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam aliquam distinctio magni enim error commodi suscipit nobis alias nulla, itaque ex, vitae repellat amet neque est voluptatem iure maxime eius!</p>

										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus in accusamus qui sequi nisi, sint magni, ipsam, porro nesciunt id veritatis quaerat ipsum consequatur laborum, provident veniam quibusdam placeat quam?</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End About -->
		

		
		<!-- Start Featured Tours -->

		<section id="mu-featured-tours">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-featured-tours-area">
							<h2>Our Featured Tours</h2>
							<p class="mu-title-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, officia aut molestiae quod. Veritatis voluptas, possimus. Quae qui optio minus dolorem fugit dolore, cum at, harum omnis sint? Saepe, asperiores.</p>
                            <a href="./addfield.php" class="btn btn-danger">Add new field</a>
                            <?php 
                              
                               
                                
                            $mysqli = new mysqli('localhost', 'root', '', 'cms') or die(mysqli_error($mysqli));
                            $idd= $mysqli->query("SELECT *  from content");
                           while ($row = $idd->fetch_assoc()):

                               ?> 
                            <div class="mu-featured-tours-content">
								<div class="row">									
										<div class="mu-featured-tours-single">                                       
											<div class="mu-featured-tours-single-info">
                                            
												<h3><?php echo $row ['destination']; ?></h3>  
												<h4> 3 Days, 2 Nights</h4>
												<span class="mu-price-tag"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<?php echo $row ['price']; ?> $ </span>
                                                <p>
                                                <?php echo $row ['content_message'];?> 
                                                </p>

                                                <a href="updateindex.php?edit=<?php echo $row['id'] ?>" class="btn btn-info" name="edit">Edit</a>
                                                <a href="./core/updateindexcontent.php?delete=<?php echo $row['id'] ?>"
                            button type="submit" class="btn btn-info" name='delete' onclick="return confirm('Do you want to make these changes ?');"> Delete</a>
                                                <br>	
											</div>
										</div>
									</div>
                                    	
                                    <?php 
                
                                 endwhile; 
                                    
                                ?>

                               						
								</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Featured Tours -->

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>