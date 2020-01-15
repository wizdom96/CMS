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
            'min' =>2,
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
                'min' => 2,
                'max' => 50
            )
    ));
    
    if($validation->passed()){
        Session::flash('success', 'You register successfully!');
        header('Location: index.php');
    }else{
        foreach($validation->errors() as $error){
            echo $error, '<br>' ;
        }
    }
  }
 }
?>

<form action="" method="post">

    <div class="filed">
        <label for="username"> Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
    </div>

    <div class="filed">
        <label for="password"> Choose a Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="filed">
        <label for="password_again"> Repeat the Password</label>
        <input type="password" name="password_again" id="password_again">
    </div>

    <div class="filed">
        <label for="name"> Enter your name</label>
        <input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name">
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?> "> 
    <input type="submit" value="Register!">
</form>
