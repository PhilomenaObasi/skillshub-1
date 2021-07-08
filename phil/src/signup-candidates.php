<?php 
Inaki::head('Candidate sign up');

?>
<body class="h-full container">
    <a href="<?= Inaki::path() ?>" class="text-xl font-bold text-primary-text py-5 block">SkillsHub</a>
    <div class="flex flex-col space-y-10 md:space-y-0 md:flex-row items-stretch justify-center md:space-x-10 my-5">
        <div>
            <img src="./assets/img/Group 12.png" alt="">
        </div>
        <div>
            <div>
                <div>
                    <h4 class="text-xl md:text-3xl font-bold text-primary-text">Create an account</h4>
                    <p class="text-xs md:text-sm mt-2">Set up your account and open yourself to limitless opportunities
                    </p>
                </div>
                <form method="POST" action="#">
                 
                 <?php
                 if(isset($_POST['create'])){
                   if(!empty($_POST)){
                       $create = DB::check('candidates','email', strtolower(DB::email('email')));
                       if($create > 0){
                           echo Inaki::alertError('This email address has been used on another account. Please use a diffrent email address.');
                       }else{
                           $dc = DB::insert('candidates',[
                               'first_name' => ucfirst(DB::grinder('first_name')),
                               'last_name' => ucfirst(DB::grinder('last_name')),
                               'email' => strtolower(DB::email('email')),
                               'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
                           ]);

                           if($dc){
                               $_SESSION['dr'] = $_POST;
                               echo Inaki::alertSuccess('Your account has been created. <br/> <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="'. Inaki::path().'signin-candidate?'. Inaki::token(8).'">Click here to continue </a><br/> ');
                           }
                       }
                   }
                 }

                 ?>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 items-center md:space-x-10 my-5">
                        <div class="form-group w-full">
                            <label for="first-name" class="text-sm font-bold">First Name</label>
                            <input name="first_name" type="text" id="first-name"
                                class="h-12 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                        </div>
                        <div class="form-group w-full">
                            <label for="last-name" class="text-sm font-bold">Last Name</label>
                            <input name="last_name" type="text" id="last-name"
                                class="h-12 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="email" class="text-sm font-bold">Email Address</label>
                        <input name="email" type="email" id="email"
                            class="h-12 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                    </div>
                    <div class="form-group mb-5">
                        <label for="password" class="text-sm font-bold">Password</label>
                        <input name="password" type="password" id="password"
                            class="h-12 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                    </div>
                    <div class="form-group mt-8 mb-14">
                        <input name="create" type="submit" value="Create an account" class=" primary-btn py-3 block w-full px-10">
                    </div>
                </form>
                <div>
                    <p class="flex flex-row items-center text-sm text-center">By clicking ‘create account’, you agree to
                        SkillsHub’s terms & conditions and privacy policy.</p>
                    <p class="text-sm mt-2 text-center">Have an account? <a href="#" class="underline">Sign in.</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>