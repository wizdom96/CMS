<?php 

require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
 
    if(Input::exists()){

         if(!Token::check(Input::get('token'))){
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                    'password_current' => array(
                    'required' => true,
                    'min' => 6
                ),
                    'password_new' =>array(
                    'required' => true,
                    'matches' => 'password_new',
                    'min' => 6
                    
                ),
                    'password_new_again' =>array(
                    'required' => true,
                    'matches' => 'password_new'
                )
                ));
                if($validation->passed()){
                    if(Hash::make(Input::get('password_current')) === $user->data()->password){   //proveri pak
                        
                        $salt = Hash::salt(70);
                        $user -> update(array(

                            'password' => Hash::make(Input::get('password_new'), $salt),
                            'salt' => $salt
                        ));
                        Session::flash('home', 'Your password has been changerd.');
                        Redirect::to('profile.php');
                    } else {

                        echo 'Your current password is wrong!';
                    }
                } else {
                    foreach($validation->errors() as $error){
                    echo $error, '<br>' ;
                }

                }
            }
        }


?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<html>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
 integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="./css/style.css" >
<form action="" method="post">

<div class="container register">
                <div class="row">
                    
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Change password</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Current password*" name="password_current" id="password_current"/>
                                        </div> 
                                       
                                        <div class="form-group">
                                            <input type="password" class="form-control" name ="password_new" placeholder="New password *" id="password_new" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name ="password_new_again" placeholder="Confirm Password *" id="password_new_again" />
                                        </div>
                                        
                                        <div class="form-group">                                 
                                        <input type="submit" class="btnRegister"  value="Change"/>
                                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?> ">
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>