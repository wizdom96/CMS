<?php

class Hash{
    public static function make($string, $salt = ''){
        return Hash('sha256', $string . $salt);       
    }
    public static function salt($length){
        return openssl_random_pseudo_bytes($lenght);
    }
    public static function unique(){
        return self::make(uniqid());   
     }
}