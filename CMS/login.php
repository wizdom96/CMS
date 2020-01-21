<?php
require_once 'core/init.php';
if(Input::exists()){ 
    if(Token::check(Input::get('token'))){
        return null;
    }
    else{
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
        'username' => array('required' => true),
        'password'=> array('required' => true)
            
        ));
       
        if($validation->passed()){
            $user = new User();

            $remember = (Input::get('remember') === 'on') ?  true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
            
            if($login){
                Redirect::to('profile.php');
            }else{
                echo '<p>Sorry, logging in failed!</p>';
            }
            
        } else {
foreach($validation->errors() as $error){
    echo $error, '<br>';
           
        }
      }
   }
 }
?>

<html>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" >

    <div class="container register">
                <div class="row">                
                    <div class="col-md-9 register-right">
                                     
                                <h3 class="register-heading">LOGIN</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <form action="" method="post">
                                        <div class="form-group">                                        
                                            <input type="text" class="form-control" placeholder="Username*" name="username" id="username" autocomplete="off" > 
                                        </div> 
                                       
                                        <div class="form-group">
                                            <input type="password" class="form-control" name ="password" placeholder="Password *" id="password" >
                                        </div>
                                        
                                        <div class="form-group">                                        
                                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                        </div> 
                                   
                                        
                                        <input type="submit" class="btnRegister"  value="Log in">
                                        </form>
                                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
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