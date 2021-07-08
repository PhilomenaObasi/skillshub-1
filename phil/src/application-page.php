<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Application Page</title>
</head>
<body class="container pb-10">
    <header class="py-5">
        <a href="/" class="text-xl font-bold text-primary-textblock">SkillsHub</a>
    </header>
    <main>
        <form method="POST" action="#" enctype="multipart/form-data" class="border md:w-3/4 mx-auto shadow-lg">
   
   <input type="hidden" value="<?= (int)urldecode($_GET['apply']) ?>" name="jobid">
 
        <?php 

if(isset($_POST['apply'])){
    if(!empty($_FILES['uploaded_file']))
    {
      $path = "uploads/";
      $path = $path . basename( $_FILES['uploaded_file']['name']);
  
      if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      
        $application = DB::insert('applications', [
            'name' => ucwords(DB::grinder('name')),
            'email' => DB::email('email'),
            'phone' => DB::grinder('phone'),
            'city' => ucfirst(DB::grinder('city')),
            'skills' => json_encode($_POST['skill']),
            'resume' => $path,
            'link' => json_encode($_POST['portfolio']),
            'cid' => (int)$_POST['cid'],
            'jid' => (int)$_GET['apply']
        ]);
        if($application){
            echo Inaki::alertSuccess('Your application has been submitted.');
        }else{
            echo Inaki::alertError("Something went wrong. Please try again");
        }

      } else{
          echo Inaki::alertError("There was an error uploading the file, please try again!");
      }
    }

   
}
?>
    
        <div class="py-10 px-5 md:px-14">
                <h4 class="font-bold text-xl mb-5">Bio data</h4>
            <div class="form-group mb-5">
                <label for="name" class="text-sm font-bold">Name*</label>
                <input name="name" type="text" id="name"
                class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group mb-5">
                <label for="name" class="text-sm font-bold">Email*</label>
                <input name="email" type="email" id="email"
                class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group mb-5">
                <label for="phone" class="text-sm font-bold">Phone Number*</label>
                <input name="phone" type="number" id="phone"
                class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group">
                <label for="city" class="text-sm font-bold">City*</label>
                <input name="city" type="text" id="city"
                class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            </div>
            <div class="border-t py-7 px-5 md:px-14">
                <h4 class="text-xl font-bold">Skills</h4>
                <p class="text-sm mb-10">Tick boxes with your relevant skillset</p>
                <div class="check-group my-5 flex space-y-5 sm:space-y-0 space-x-0 flex-col sm:flex-row sm:space-x-10 font-medium">
                    <div class="flex flex-col">
                        <label for="html" class="text-sm mb-2">HTML</label>
                        <input name="skill[html]" value="yes" type="checkbox" id="html">
                    </div>
                    <div class="flex flex-col">
                        <label for="css" class="text-sm mb-2">CSS</label>
                        <input name="skill[css]" value="yes" type="checkbox" id="css">
                    </div>
                    <div class="flex flex-col">
                        <label for="Javascript" class="text-sm mb-2">Javascript</label>
                        <input name="skill[javascript]" value="yes" type="checkbox" id="Javascript">
                    </div>
                    <div class="flex flex-col">
                        <label for="angular" class="text-sm mb-2">Angular JS</label>
                        <input name="skill[angular]" value="yes" type="checkbox" id="angular">
                    </div>
                </div>
                <div class="check-group my-5 flex space-y-5 sm:space-y-0 space-x-0 flex-col sm:flex-row sm:space-x-10 font-medium">
                    <div class="flex flex-col">
                        <label for="wordpress" class="text-sm mb-2">Wordpress</label>
                        <input name="skill[wordpress]" value="yes" type="checkbox" id="wordpress">
                    </div>
                    <div class="flex flex-col">
                        <label for="c#" class="text-sm mb-2">C#</label>
                        <input name="skill[C#]" value="yes" type="checkbox" id="c#">
                    </div>
                    <div class="flex flex-col">
                        <label for="php" class="text-sm mb-2">PHP</label>
                        <input name="skill[PHP]" value="yes" type="checkbox" id="php">
                    </div>
                    <div class="flex flex-col">
                        <label for="node" class="text-sm mb-2">Node JS</label>
                        <input name="skill[nodejs]" value="yes" type="checkbox" id="node">
                    </div>
                </div>
                <div class="form-group w-full mt-10 mb-5">
                    <label for="job-description" class="text-sm font-bold">Other skills</label>
                    <textarea name="skill[others]" id="job-description" rows="7" class="border block w-full border-gray-700 rounded"></textarea>
                </div>
                <div class="form-group w-full my-10">
                    <span class="mr-10 font-bold text-sm">Resume*</span>
                    <label for="resume" class="primary-btn py-3 px-4">Choose File</label>
                    <input name="uploaded_file" type="file" id="resume" class="hidden">
                </div>
                <div class="form-group mb-5">
                    <label for="portfolio-url" class="text-sm font-bold">Portfolio Link*</label>
                    <input name="portfolio[link]" type="url" id="portfolio-url"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
                <div class="form-group mb-5">
                    <label for="github" class="text-sm font-bold">GitHub Link</label>
                    <input name="portfolio[github]" type="url" id="github"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
                </div>
                <div class="form-group w-full my-10 flex flex-row">
                    <span class="mr-5 font-bold text-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 font-bold w-4 text-primary-text" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                      </svg></span>
                    <label for="resume" class="underline text-xs font-medium text-primary-text">Attach additional documents</label>
                    <input type="file" id="resume" class="hidden">
                </div>
                <div class="form-group mt-14 mb-5">
                    <input type="submit" name="apply" value="Apply" class=" primary-btn py-3 block w-full px-10">
                </div>
            </div>
        </form>
    </main>
</body>
</html>