<?php

require_once 'core/init.php';


if(Input::exists()){
    
    if(Token::check(Input::get('token'))){
        return null;
    }
    else{
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
     
        'username' => array(
            'required' => true,
            'min' =>4,
            'max' =>20,
            'unique' => 'users'
        ),
        'password' => array(
            'required' => true,
            'min' => 6
        ),
            'password_again' => array(
            'required' => true,
            'matches' => 'password'    
            ),
            'name' => array(
                'required' => true,
                'min' => 4,
                'max' => 50
            )
    ));
    
    if($validation->passed()){
        $user = new User();

         $salt = Hash::salt(70);
        try{
            $user->create(array(
                'username' => Input::get('username'),
                'password' => Hash::make(Input::get('password'), $salt),
                'salt' => '$salt',
                'name' => Input::get('name'),
                'joined' => date('Y-m-d H:i:s'),
                'group' => 1
            ));
            Session::flash('home', 'You have been register and you can <a href="login.php" >log in!</a>');
            Redirect::to('index.php');    
        }catch(Exception $e){
        die($e->getMessage());
        }
    }else{
        foreach($validation->errors() as $error){
            echo $error, '<br>' ;
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
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">REGISTER</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">

                                     <form action="" method="post">           

                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Username*" name="username" id="username"/>
                                            </div> 
                                       
                                           <div class="form-group">
                                             <input type="password" class="form-control" name ="password" placeholder="Password *" id="password" />
                                             </div>
                                            <div class="form-group">
                                              <input type="password" class="form-control" name ="password_again" placeholder="Confirm Password *" id="password_again" />
                                              </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name*" value="<?php echo escape(Input::get('name')); ?>" id="name" name="name" />
                                            </div>
                                            <div class="form-group">
                                           
                                            <input type="submit" class="btnRegister"  value="Register"/>
                                            </form>
                                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?> "> 
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>