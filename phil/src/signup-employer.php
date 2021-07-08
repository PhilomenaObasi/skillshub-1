<?php 
function Loginq($username, $password, $signup= null) {
    $sd = DB::QueryBuilder("select * from employer where email = '$username'");
    if (count($sd) > 0) {
        if (password_verify($password, $sd[0]['password'])) {
            unset($sd[0]['password']);
            $_SESSION['em'] = $sd;
            $_SESSION['yorklessa'] = Inaki::token();
            header("Location:". Inaki::path().'job-post-employer?'.Inaki::token() );

        } else {
            header("Location:" . Inaki::path() . 'signup-candidates?vr=' . urlencode('incorrect password, please try again'));
        }
    } else {
        header("Location:" . Inaki::path() . 'signup-candidates?vr=' . urlencode('This account does not exist'));
    }
}
if(isset($_SESSION['dr'])){
    Loginq(strtolower($_SESSION['dr']['email']), $_SESSION['dr']['password']);
    
}
if(isset($_POST['login'])){
    Loginq(strtolower(DB::email('email')), $_POST['password']);
}


Inaki::head('Employer signup');

?>
<body class="h-full container">
    <a href="/" class="text-xl font-bold text-primary-text py-5 block">SkillsHub</a>
    <div class="text-center my-14">
        <h1 class="text-2xl md:text-4xl font-bold text-primary-text">Create an employer account</h1>
        <p class="text-sm">Set up your employer account and fast-track your recruitment process</p>
    </div>
    <form method="POST" action="#">
 

        <h1 class="text-xl font-bold text-primary-text text-center">PERSONAL INFORMATION</h1>
        <div class="border py-5 md:py-10 px-5 md:px-14 my-10 md:w-3/4 mx-auto shadow-lg">
         
<?php 
if(isset($_POST['vb'])){
    if(DB::check('employer','email',DB::email('email')) > 0){
        echo Inaki::alertError('This email address has been registered.');
    }else{
        $df = DB::insert('employer',[
            'first_name' => ucfirst(DB::grinder('first_name')),
            'last_name' => ucfirst(DB::grinder('last_name')),
            'email' => DB::email('email'),
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'details' => json_encode($_POST['company'])
        ]);
        if($df){
            $_SESSION['em'] = $_POST;
            echo Inaki::alertSuccess('Your account has been created. <br/> <br/><a href="'. Inaki::path() .'signin-employer" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Click here to continue</a>');
        }
    }
}

?>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 items-center md:space-x-10 my-5">
                <div class="form-group w-full">
                    <label for="first-name" class="text-sm font-bold">First Name</label>
                    <input name="first_name" type="text" id="first-name"
                        class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
                <div class="form-group w-full">
                    <label for="last-name" class="text-sm font-bold">Last Name</label>
                    <input name="last_name" type="text" id="last-name"
                        class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
            </div>
            <div class="form-group mb-5">
                <label for="email" class="text-sm font-bold">Email Address</label>
                <input name="email" type="email" id="email"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group mb-5">
                <label for="password" class="text-sm font-bold">Password</label>
                <input name="password" type="password" id="password"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
        </div>
        <h1 class="text-xl font-bold text-primary-text text-center">COMPANY DETAILS</h1>
        <div class="border py-5 md:py-10 px-5 md:px-14 my-10 md:w-3/4 mx-auto shadow-lg">
            <div class="form-group mb-5">
                <label for="company" class="text-sm font-bold">Company name*</label>
                <input name="company[name]" type="text" id="company"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group mb-5">
                <label for="industry" class="text-sm font-bold">Industry*</label>
                <input  name="company[industry]" type="text" id="industry"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group mb-5">
                <label for="size" class="text-sm font-bold">Company size</label>
                <input  name="company[size]" min="1" type="number" id="size"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group mb-5">
                <label for="website" class="text-sm font-bold">Website URL*</label>
                <input  name="company[url]" type="url" id="website"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 items-center md:space-x-10 my-5">
                <div class="form-group w-full">
                    <label for="country" class="text-sm font-bold">Country*</label>
                    <input  name="company[contry]" type="text" id="country"
                        class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
                <div class="form-group w-full">
                    <label for="state" class="text-sm font-bold">State</label>
                    <input  name="company[state]" type="text" id="state"
                        class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
            </div>
            <div class="form-group w-full mb-5">
                <label for="role" class="text-sm font-bold">Your role*</label>
                <textarea  name="company[role]" id="role" rows="10" class="border block w-full border-gray-700 rounded"></textarea>
            </div>
            <div class="form-group mb-5">
                <label for="phone" class="text-sm font-bold">Contact phone number*</label>
                <input  name="company[phone_number]" type="number " id="phone"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group mt-8 mb-5">
                <input name="vb" type="submit" value="Create an account" class=" primary-btn py-3 block w-full px-10">
            </div>
        </div>
    </form>
</body>

</html>