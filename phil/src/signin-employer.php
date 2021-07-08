<?php 
function Loginq($username, $password) {
    $sd = DB::QueryBuilder("select * from employer where email = '$username'");
    if (count($sd) > 0) {
        if (password_verify($password, $sd[0]['password'])) {
            unset($sd[0]['password']);
            $_SESSION['ske'] = $sd;
            $_SESSION['yorklesse'] = Inaki::token();
            header("Location:employers-dashboard?". Inaki::token() );

        } else {
            header("Location:" . Inaki::path() . 'signin-employer?vr=' . urlencode('incorrect password, please try again'));
        }
    } else {
        header("Location:" . Inaki::path() . 'signin-employer?vr=' . urlencode('This account does not exist'));
    }
}
if(isset($_SESSION['em'])){
    Loginq(strtolower($_SESSION['em']['email']), $_SESSION['em']['password']);
    
}
if(isset($_POST['logina'])){
  
    Loginq(strtolower(DB::email('email')), $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign In Employer</title>
</head>
<body class="h-full container">
    <div class="flex flex-col space-y-10 md:space-y-0 md:flex-row items-stretch justify-center md:space-x-10 my-5">
        <div class="mt-10 md:w-3/4">
            <img src="./assets/img/Group 16 (1).png" alt="" class="">
        </div>
       <div class="md:w-3/4">
           <h4 class="font-bold text-center text-2xl mb-3 text-primary-text"><a href="index.html">SkillsHub</a></h4>
        <div class="border px-5 md:px-14 py-10 border-primary-b rounded-md shadow-2xl">
           <div>
            <h4 class="text-base md:text-xl font-bold text-primary-text mb-5  md:mb-12">Another chance to choose the best</h4>
            <h1 class="text-2xl md:text-4xl font-bold text-primary-text">Sign in</h1>
            <p class="text-xs md:text-sm mt-2">New Job Provider? <a href="" class="hover:text-primary-text">Create an account</a></p>
           </div>
            <form method="POST" action="#">
                <?php 
if(isset($_GET['vr'])){
    echo Inaki::alertError(urldecode($_GET['vr']));
}
if(isset($_GET['vlad'])){
    echo Inaki::alertError('Please login to continue.');
}


?>
                <div class="form-group mt-5 mb-5">
                    <label for="email" class="text-sm font-bold">Email Address</label>
                    <input name="email" type="email" id="email" class="h-12 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
                <div class="form-group mb-5">
                    <label for="password" class="text-sm font-bold">Password</label>
                    <input name="password" type="password" id="password" class="h-12 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
                <div class="form-group mt-8 mb-14">
                    <input name="logina" type="submit" value="Sign in" class=" primary-btn py-3 px-10">
                </div>
            </form>
            <div>
                <p class="flex flex-row items-center"><span class="w-1/2 border-b block mr-5 border-gray-700"></span> or <span class="w-1/2 border-b block ml-5 border-gray-700"></span></p>
                <a href="<?= Inaki::path() ?>signup-employer" class="primary-btn w-full block my-6 py-3 px-5">Create account</a>
                <!-- <a href="#" class="primary-btn w-full block my-6 py-3 px-5">Continue with LinkedIn</a>
                <a href="#" class="text-sm text-center underline font-medium block mt-10">Forgot Password?</a>
            </div> -->
        </div>
       </div>
    </div>
</body>
</html>