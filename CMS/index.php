<?php 

require_once 'core/init.php';

if(Session::exists('home')){
 echo '<p>'  .  Session::flash('home')  .  '</p>';
    }

	$user = new User();

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
    <button class="btn btn-outline-success" type="button" ><a href="login.php" >LOGIN</a></button>
    <button class="btn btn-outline-success" type="button"><a href="register.php" >REGISTER</a></button>
  </form>
</nav>
  <body>
  

<!-- Links -->

	
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
		

		
		<section id="mu-featured-tours">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-featured-tours-area">
							<h2>Our Featured Tours</h2>
							<p class="mu-title-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, officia aut molestiae quod. Veritatis voluptas, possimus. Quae qui optio minus dolorem fugit dolore, cum at, harum omnis sint? Saepe, asperiores.</p>
                            <?php $idd=array(); 
                            $idd=  DB::getInstance()->query("SELECT *  from content"); 
							$id = ($idd->first()->id);
                              while ($id < 7) :
                               ?> 
                            <div class="mu-featured-tours-content">
								<div class="row">									
										<div class="mu-featured-tours-single">                                       
											<div class="mu-featured-tours-single-info">
                                            
												<h3><?php  $a = DB::getInstance()->action('SELECT destination' , 'content',  array('id', '=', $id)); 
												echo ($a->first()->destination); ?></h3>
												<h4> 3 Days, 2 Nights</h4>
												<span class="mu-price-tag">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php $a = DB::getInstance()->action('SELECT price' , 'content',  array('id', '=', $id)); 
												echo ($a->first()->price); ?>$</span>
												<p><?php $a = DB::getInstance()->action('SELECT content_message' , 'content',  array('id', '=', $id)); 
												echo ($a->first()->content_message); ?> </p>
                                                <br>	
											</div>
										</div>
									</div>	
                                    <?php 
                                $id++; 
                                endwhile; ?>						
								</div>
							
                           
							<!-- End Featured Tours content -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Featured Tours -->

		<!-- Start Call to Action -->
		<section id="mu-callto-action">
			<div class="container">
				<div class="row col-md-12">
					<div class="mu-callto-action-area">
						<h2>Explore the world by making journey with us</h2>
						<a class="mu-book-now-btn" href="#">Start Journey</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Start Call to Action -->


	<!-- Start footer -->
	<footer id="mu-footer">
		<div class="container">
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
		</div>

	</footer>
	<!-- End footer -->

	


	
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
</html>
