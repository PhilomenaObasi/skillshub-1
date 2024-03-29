<?php 
Inaki::head('Employer');

?>
<body>
     <!-- Header -->
     <header class="py-5 container relative flex flex-row justify-between items-center">
        <a href="/" class="text-xl text-primary-text brand font-bold">SkillsHub</a>

        <ul
            class="nav hidden z-50 shadow-lg md:shadow-none bg-white  px-5 md:px-0 py-10 md:py-0 md:flex flex-col md:flex-row justify-between space-y-5 md:space-y-0 absolute top-0 h-64 md:h-auto  md:top-0 md:relative w-full md:w-auto md:space-x-10 text-sm font-medium left-0 right-0">
            <li><a href="<?= Inaki::path() ?>job-post-employer" class="hover:text-blue-700">Post a Job</a></li>
            <li><a href="<?= Inaki::path() ?>" class="hover:text-blue-700">For Candidates</a></li>
            <li><a href="<?= Inaki::path() ?>signin-employer" class="hover:text-blue-700">Sign In</a></li>
            <li>
                <a href="<?= Inaki::path() ?>signup-employer" class="primary-btn rounded py-3 px-5 mt-10 block md:inline w-full">Sign Up</a>
            </li>
            <span class="absolute md:hidden toggle-close top-0 right-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
            </span>
        </ul>
        <span class="block md:hidden toggle-open">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </span>
    </header>
    <main>
        <section class="hero container md:my-10 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mt-14">
                <h1 class="text-5xl font-extrabold text-primary-text">Hire top tech <br> talents easily.</h1>
                <p class="text-sm pt-8 pb-10 md:w-3/4">Find your company’s next perfect tech talent addition. Post jobs, review resumes and hire the best candidates without any hassle. </p>
                <a href="<?= Inaki::path() ?>job-post-employer" class="primary-btn py-4 px-5 w-auto md:mb-7 font-extrabold text-2xl rounded-md">Post a Job</a>
                <a href="<?= Inaki::path() ?>signin-employer" class="border-b-2 text-xs my-14 w-44 md:w-48 md:text-sm ab-1 border-primary-b text-primary-text font-semibold block">Already a
                    member? Log In</a>
            </div>
                <div class="h-full md:mt-14 lg:mt-auto my-10">
                    <img src="./assets/img/Mask Group.png" alt=""
                        class="object-cover w-full">
                </div>
        </section>
        <section class="bg-light-blue my-5 py-14">
            <div class="container">
                <div class="text-center">
                    <h1 class="text-2xl md:text-4xl font-extrabold text-primary-text">SkillsHub for Employers</h1>
                    <p class="text-sm mt-3 w-3/4 text-center mx-auto">Hiring tech talent has never been easier! With SkillsHub, you have access to world class tech talent, easy application and interview management, all done with zero paperwork!</p>
                </div>
            </div>
            <div
                class="cards container space-y-10 md:space-y-0 md:space-x-10 flex flex-col md:flex-row items-stretch justify-center my-14">
                <div
                    class="w-full md:w-1/3 rounded shadow-lg py-10 px-5 bg-white flex flex-col justify-between items-start">
                   
                    <h4 class="font-bold">Post Jobs</h4>
                    <p class="text-sm py-10">Let competent professionals know your talent needs. Post new jobs with a few clicks</p>
                <a href="signup-employer.html" class="border-b-2 font-semibold text-sm border-primary-b text-primary-text ">Get Started</a>
                </div>
                <div
                    class="w-full md:w-1/3 rounded shadow-lg py-10 px-5 bg-white flex flex-col justify-between items-start">
                    <h4 class="font-bold">Schedule Interviews</h4>
                    <p class="text-sm py-10">Get in touch with applicants on the go. No need to wait a minute before you get to know your applicants.</p>
                <a href="<?= Inaki::path() ?>signup-employer" class="border-b-2 font-semibold text-sm border-primary-b text-primary-text ">Get Started</a>
                </div>
                <div
                class="w-full md:w-1/3 rounded shadow-lg py-10 px-5 bg-white flex flex-col justify-between items-start">
                <h4 class="font-bold">Hire Top Talent</h4>
                <p class="text-sm py-10">Choose your preferred candidate and hit the ground running.</p>
            <a href="<?= Inaki::path() ?>signup-employer" class="border-b-2 font-semibold text-sm border-primary-b text-primary-text ">Get Started</a>
            </div>
            </div>
        </section>
        <section class="py-5">
            <div class="flex flex-col md:flex-row justify-between items-center md:space-x-10 container">
                <div>
                    <h1 class="text-primary-text text-2xl font-extrabold md:text-4xl">How we can help you</h1>
                    <h4 class="font-bold text-xl md:text-2xl text-primary-text py-5">Discover the best candidates</h4>
                    <p>Our employer solutions take away the burden of long futile searches and present you the best candidates to hire in a short time. Here are a few reasons why SkiilsHub is ideal for you:</p>
                    <ul class="list-disc flex flex-col space-y-5 my-5 ml-5">
                        <li>You as an employer will get more visibility</li>
                        <li>You are assured of finding quality candidates</li>
                        <li>You have the ability to verify their capabilities</li>
                        <li>We recommend top talent to you through a job match</li>
                    </ul>
                    <div class="my-14">
                        <a href="<?= Inaki::path() ?>signup-employer" class="primary-btn py-4 px-5 w-auto md:mb-7 font-extrabold text-2xl rounded-md">Get Started</a>
                    </div>
                </div>
                <div class="relative -mt-14 md:-mt-32"
                style="background: url(./assets/img/Hero\ Image2.png)bottom center/contain no-repeat;">
                <div class="h-full">
                    <img src="./assets/img/pexels2-kampus-production-5940856-removebg-preview 2.png" alt=""
                        class="object-cover w-full">
                </div>
            </div>
            </div>
        </section>
        <section class="mt-5">
            <div class="bg-light-blue">
                <div
                    class="container flex space-y-4 md:space-y-0 flex-col md:flex-row items-center md:space-x-10 justify-center h-36">
                    <h1 class="font-bold text-xl md:text-2xl text-center md:text-left">Begin your Journey with us.</h1>
                    <a href="<?= Inaki::path() ?>signup-employer" class="primary-btn py-4 px-5 w-auto md:mb-7 font-extrabold text-2xl rounded-md">Get Started</a>
                </div>
            </div>
            <div class="py-10 bg-dark-blue">
                <div class="container md:px-24 flex flex-col md:flex-row items-center justify-center">
                    <div class="md:w-1/3">
                        <div class="text-center md:text-left mb-10">
                            <h1 class="text-2xl md:text-5xl font-bold leading-none text-white">Be the first to Know</h1>
                            <p class="text-white mt-3">Join our news letter</p>
                        </div>
                    </div>
                    <form class="md:px-14 flex-1">
                        <div class="flex flex-row space-x-5 md:space-x-10">
                            <input type="text" placeholder="First Name" class="h-12 w-full mb-5 rounded px-5 text-sm">
                            <input type="text" placeholder="Last Name" class="h-12 w-full  rounded px-5 text-sm">
                        </div>
                        <input type="email" placeholder="Email address" class="h-12 my-5 rounded px-5 w-full text-sm">
                        <div class="text-sm">
                            <p class="text-white">can we email you?</p>
                            <input type="checkbox" id="email-me" class="mt-5">
                            <label for="email-me" class="text-white">Yes, I’d like to receive marketing emails from
                                SkillsHub</label>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="bg-darker-blue py-10">
               <div class="container flex flex-col space-y-7 lg:space-y-0 lg:flex-row justify-between lg:space-x-24 text-xs">
                <div>
                    <h1 class="font-bold text-2xl text-white">SkillsHub</h1>
                    <p class="text-white py-4">Connect with us on:</p>
                    <div class="icons">
                        <ul class="flex space-x-10">
                            <li><a href="#"><svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.08618 18.5032C3.08798 26.0872 8.60288 32.5447 16.0932 33.7333V22.9586H12.182V18.5032H16.0978V15.1115C15.9228 13.5044 16.4717 11.9027 17.5958 10.7408C18.7199 9.57888 20.3025 8.97723 21.9146 9.09901C23.0716 9.11769 24.2258 9.22074 25.3679 9.40734V13.1983H23.4192C22.7484 13.1104 22.0739 13.332 21.5858 13.8006C21.0978 14.2692 20.8489 14.934 20.9094 15.6079V18.5032H25.1813L24.4984 22.9601H20.9094V33.7333C29.01 32.4531 34.6905 25.0549 33.8355 16.8984C32.9805 8.74191 25.8894 2.68248 17.6994 3.10991C9.50932 3.53733 3.08748 10.302 3.08618 18.5032Z"
                                            fill="white" />
                                    </svg>
                                </a></li>
                            <li><a href="#"><svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M30.8258 10.3106C32.2078 9.48441 33.2418 8.18347 33.7349 6.65069C32.4363 7.42122 31.0154 7.964 29.5339 8.25557C27.4797 6.08263 24.2251 5.55384 21.5887 6.96466C18.9523 8.37549 17.5867 11.3767 18.255 14.2912C12.9357 14.0241 7.97976 11.5114 4.62052 7.37836C2.8674 10.4022 3.76328 14.2677 6.66785 16.2121C5.61753 16.1783 4.5905 15.894 3.6724 15.3827C3.6724 15.4104 3.6724 15.4382 3.6724 15.4659C3.673 18.6158 5.89297 21.329 8.98035 21.9533C8.00612 22.2183 6.98421 22.2573 5.9926 22.0674C6.86087 24.7611 9.3435 26.6065 12.1731 26.6615C9.82955 28.5009 6.9353 29.4984 3.95606 29.4936C3.428 29.4943 2.90035 29.464 2.37585 29.4026C5.40121 31.3467 8.92234 32.3786 12.5185 32.3749C17.5216 32.4093 22.3297 30.4369 25.8674 26.899C29.405 23.361 31.377 18.5527 31.3422 13.5496C31.3422 13.2629 31.3355 12.9777 31.3222 12.694C32.6179 11.7576 33.7362 10.5976 34.6244 9.26844C33.4173 9.8035 32.1369 10.1548 30.8258 10.3106Z"
                                            fill="white" />
                                    </svg>
                                </a></li>
                            <li><a href="#"><svg width="40" height="39" viewBox="0 0 40 39" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.6667 34.125H15V14.625H21.6667V17.875C23.0877 16.1123 25.2427 15.0614 27.5417 15.0101C31.676 15.0325 35.012 18.3127 35 22.3438V34.125H28.3333V23.1562C28.0667 21.3405 26.4696 19.9933 24.5883 19.9972C23.7655 20.0226 22.9887 20.3739 22.4374 20.97C21.8861 21.5661 21.6077 22.3556 21.6667 23.1562V34.125ZM11.6667 34.125H5V14.625H11.6667V34.125ZM8.33333 11.375C6.49238 11.375 5 9.91993 5 8.125C5 6.33007 6.49238 4.875 8.33333 4.875C10.1743 4.875 11.6667 6.33007 11.6667 8.125C11.6667 8.98695 11.3155 9.8136 10.6904 10.4231C10.0652 11.0326 9.21739 11.375 8.33333 11.375Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p class="text-white mt-4 text-xs">2021 SkillsHub</p>
                </div>
                <div class="flex flex-col space-y-7 md:space-y-0 md:flex-row md:space-x-24 justify-between text-xs">
                    <div>
                        <h1 class="text-base md:text-xl font-bold text-white mb-5">Contact</h1>
                        <ul class="text-white flex flex-col space-y-2 text-xs">
                            <li><a href="#">hello@skillshub.com</a></li>
                            <li><a href="#">+234 703 467 7166</a></li>
                            <li><a href="#">Innovation Hub Wuse,Abuja.</a></li>
                        </ul>
                    </div>
                    <div>
                        <h1 class="text-base md:text-xl font-bold text-white mb-5">About Us</h1>
                        <ul class="text-white flex flex-col space-y-2 text-xs">
                            <li><a href="#">How it Works</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div>
                        <h1 class="text-base md:text-xl font-bold text-white mb-5">Help Centre</h1>
                        <ul class="text-white flex flex-col space-y-2 text-xs">
                            <li><a href="#">Complaints</a></li>
                            <li><a href="#">support@skillshub.com</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
               </div>
               </div>
            </footer>
        </section>
    </main>
    <script src="js/main.js"></script>
</body>
</html>