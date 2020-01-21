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

                                        <form action="" method="post">

                                                <div class="filed">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
                                            
                                                <input type="submit" value="Update">
                                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?> "> 
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