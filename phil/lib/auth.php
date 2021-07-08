<?php
function auth($email, $password) {
    $userDetails = DB::select('users', ['*'], 'email', $email);
    if(!empty($userDetails)){
        if(password_verify($password, $userDetails[0]['password'])){
            unset($userDetails[0]['password']);
            $_SESSION['bookneyUser'] = $userDetails;
            header("Location:" . Inaki::path().'app');
        } else {
            header("Location:". Inaki::path().'login?er');
        }
    } else {
         header("Location:". Inaki::path().'login?er');
    }
    
}
