<?php 
if(empty($_SESSION['ske'])){
    session_destroy();
    header("Location:" .Inaki::path());
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Job Details</title>
</head>

<body class="h-full container">
    <a href="index.html" class="text-xl font-bold text-primary-text py-5 block">SkillsHub</a>
    <div class="text-center my-14">
        <h1 class="text-2xl md:text-4xl font-bold text-primary-text">The Hub for Employers</h1>
        <p class="text-sm">What’s your current talent need? Let’s find it</p>
    </div>
    <h1 class="text-xl font-bold text-primary-text text-center">JOB DETAILS</h1>
    <form action="#" method="POST">
    
        <?php 
    
if(isset($_POST['post'])){
   if(DB::check('job','jid',DB::grinder('jid')) > 0){
       global $link;
       $sd =  $link->prepare("delete from job where jid =:id limit 1");
       $fg = $sd->execute([':id' => DB::grinder('jid')]);
       $com = json_decode($_SESSION['ske'][0]['details'], true)['name'];
       $postJob = DB::insert('job',[
           'company' => ucwords($com),
           'title' => ucfirst(DB::grinder('title')),
           'summary' => DB::grinder('summary'),
           'details' => json_encode($_POST['job']),
            'deadline' => DB::grinder('deadline'),
            'jid' => DB::grinder('jid')
       ]);
       if($postJob){
           echo Inaki::alertSuccess('Job posted successfully');
       }else{
           echo Inaki::alertError('OOps, something went wrong. Please try again.');
       }
   }else{
    $com = json_decode($_SESSION['ske'][0]['details'], true)['name'];
    $postJob = DB::insert('job',[
        'company' => ucwords($com),
        'title' => ucfirst(DB::grinder('title')),
        'summary' => DB::grinder('summary'),
        'details' => json_encode($_POST['job']),
         'deadline' => DB::grinder('deadline'),
         'jid' => DB::grinder('jid'),
         'posted' => time(),
         'cid' => $_SESSION['ske'][0]['id']
    ]);
    if($postJob){
        echo Inaki::alertSuccess('Job posted successfully');
    }else{
        echo Inaki::alertError('OOps, something went wrong. Please try again.');
    }
   }
}


?>
      
        <div class="border py-5 md:py-10 px-5 md:px-14 my-10 md:w-3/4 mx-auto shadow-lg">
            <div class="form-group mb-5">
                <label for="job-title" class="text-sm font-bold">Job title*</label>
                <input name="title" type="text" id="job-title"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group w-full mb-5">
                <label for="job-summary" class="text-sm font-bold">Job summary*</label>
                <textarea name="summary" id="job-summary" rows="10" class="border block w-full border-gray-700 rounded"></textarea>
            </div>
            <div class="form-group mb-5">
                <label for="skills" class="text-sm font-bold">Core Skills required*</label>
                <div class="flex flex-wrap space-x-4 items-center justify-start h-14 w-full rounded-md border border-gray-700 bg-white px-5 text-sm font-medium">
                    <p class="bg-gray-50 py-1 px-2 shadow text-xs">Wordpress<button class="text-xs font-semibold ml-3">x</button></p>
                    <p class="bg-gray-50 py-1 px-2 shadow text-xs">JavaScript<button class="text-xs font-semibold ml-3">x</button></p>
                    <p class="bg-gray-50 py-1 px-2 shadow text-xs">HTML<button class="text-xs font-semibold ml-3">x</button></p>
                </div>
                
            </div>
            <div class="form-group mb-5">
                <label for="skills" class="text-sm font-bold">Other Skills*</label>
                <input name="job[skills]" type="text" id="skills"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group w-full mb-5">
                <label for="job-description" class="text-sm font-bold">Job description*</label>
                <textarea name="job[description]" id="job-description" rows="10" class="border block w-full border-gray-700 rounded"></textarea>
            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 items-center md:space-x-10 my-5">
                <div class="form-group w-full">
                    <label for="employment-level" class="text-sm font-bold">Employment level*</label>
                        <select name="job[level]" id="employment-level" class="block w-full h-14 border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium rounded-md">
                            <option value="Select type">Select level</option>
                            <option value="Level 1">Level 1</option>
                        </select>
                </div>
                <div class="form-group w-full">
                    <label for="employment-type" class="text-sm font-bold">Employment type*</label>
                        <select name="job[type]" id="employment-type" class="block w-full h-14 border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium rounded-md">
                            <option value="Select type">Select type</option>
                            <option value="type 1">type 1</option>
                        </select>
                </div>
            </div>
            <div class="form-group mb-5">
                <label for="Years-experience" class="text-sm font-bold">Years of experience*</label>
                <select name="job[experience]"  id="employment-type" class="block w-full h-14 border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium rounded-md">
                    <option value="Select years">Select years</option>
                    <option value="year 1">type 1</option>
                </select>
            </div>
            <input type="hidden" name="jid" value="<?= time().Inaki::token(8) ?>">
            <div class="form-group my-10">
                <h4 class="font-bold text-sm text-primary-text mb-5">Remote work?</h4>
                <div class="flex flex-row items-center space-x-16">
                    <span><input type="radio" id="yes" value="Yes" name="job[remote]"> <label for="yes" class="text-xs md:text-sm">Yes</label></span>
                    <span><input type="radio" id="no" value="No" name="job[remote]"> <label for="no" class="text-xs md:text-sm">No</label></span>
                </div>
            </div>
            <div class="form-group my-10">
                <h4 class="font-bold text-sm text-primary-text mb-5">Easy apply?</h4>
                <div class="flex flex-row items-center space-x-16">
                    <span><input type="radio" id="easy-apply-yes" value="Yes" name="job[easy]"> <label for="easy-apply-yes" class="text-xs md:text-sm">Yes</label></span>
                    <span><input type="radio" id="easy-apply-no" value="No" name="job[easy]"> <label for="easy-apply-no" class="text-xs md:text-sm">No</label></span>
                </div>
            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 items-center md:space-x-10 my-5">
                <div class="form-group w-full">
                    <label class="text-sm font-bold">Location*</label>
                    <input name="job[country]" type="text" id="country"
                        class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium" placeholder="country">
                </div>
                <div class="form-group w-full">
                    <label class="text-sm font-bold">State*</label>
                    <input name="job[state]" type="text" id="state"
                        class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium" placeholder="State">
                </div>
            </div>
            <div class="form-group mb-5">
                <label for="salary" class="text-sm font-bold">Salary range</label>
                <select name="job[salary]" id="salary" class="block w-full h-14 border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium rounded-md">
                    <option value="Select range">Salary range</option>
                    <option value="&#x20A6;100,000 -200,000">&#x20A6;100,000 - 200,000</option>
                    <option value="&#x20A6;200,000 -400,000">&#x20A6;200,000 - 400,000</option>
                    <option value="&#x20A6;600,000 -600,000">&#x20A6;400,000 - 600,000</option>
                </select>
            </div>
            <div class="form-group mb-5">
                <label for="job-deadline" class="text-sm font-bold">Deadline for this job*</label>
                <input name="deadline" type="date" id="job-deadline"
                    class="h-14 w-full rounded-md border focus:outline-none focus:shadow-outline-blue focus:border-blue-300 border-gray-700 bg-white px-4 text-sm font-medium">
            </div>
            <div class="form-group my-10">
                <h4 class="font-bold text-sm text-primary-text mb-5">How do you want to receive your applications?</h4>
                <div class="flex flex-row items-center space-x-16">
                    <span><input name="job[application]" type="checkbox" id="by-dashboard" name="receive-application"> <label for="by-dashboard" class="text-xs md:text-sm">Dashboard</label></span>
                    <span><input name="job[application]" type="checkbox" id="by-email" name="receive-application"> <label for="by-email" class="text-xs md:text-sm">Email address</label></span>
                </div>
            </div>
            <div class="form-group mt-8 mb-5 flex flex-col space-y-10 sm:space-y-0 sm:flex-row items-center justify-between">
                <!-- <a href="job-preview-employer.html" class="text-white bg-primary-color font-bold text-base border border-primary-b rounded py-3 px-10 w-full sm:w-auto text-center">Preview Job Post</a>
                 -->
                <button type="submit" name="post" class="text-white bg-primary-color font-bold text-base border border-primary-b rounded py-3 px-10 w-full sm:w-auto text-center">Post Job</button>
            </div>
        </div>
    </form>
</body>

</html>