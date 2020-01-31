<?php
require_once 'core/init.php';
$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
?>

<link rel="stylesheet" href="./css/checkin.css">
<link rel="stylesheet" href="./css/indexstyle.css">

<html>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
 integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


 <section id="mu-featured-tours">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
 
 
                        <?php 
                              $mysqli = new mysqli('localhost', 'root', '', 'cms') or die(mysqli_error($mysqli));
                              $idd= $mysqli->query("SELECT *  from content");
                              
                              if (isset($_GET['id']))
                              {
                                $id=($_GET['id']);
                                $idd= $mysqli->query("SELECT *  from content WHERE id='$id'");
                              }
                            
  
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
                                                  <br>	
                                            </div>
                                          </div>
                                      </div>
                                </div>
                
                                     
                
                                <?php endwhile; ?>
                                    
                                
					</div>
				</div>
			</div>
</section>

                                  
<div class="padding">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <strong>Credit Card</strong>
                    <small>enter your card details</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" placeholder="Enter your name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="ccnumber">Credit Card Number</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-credit-card"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ccmonth">Month</label>
                            <select class="form-control" id="ccmonth">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ccyear">Year</label>
                            <select class="form-control" id="ccyear">
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cvv">CVV/CVC</label>
                                <input class="form-control" id="cvv" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-success float-right" type="submit">
                        <i class="mdi mdi-gamepad-circle"></i> Continue</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                        <i class="mdi mdi-lock-reset"></i> Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>