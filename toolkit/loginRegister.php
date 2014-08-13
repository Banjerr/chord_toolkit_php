<?php
/* Program: loginRegister.php
*  Desc: Contains the code for dealing with user attempts to login or register.
*  It first checks to make sure the user isn't already logged in and redirects if necessary.
*  It uses a UserDB object which provides funtionality for checking login/registration info against 
*  the database and returns relevant information to the user based on the info supplied/POSTed from elsewhere.
*  It aslo has some JavaScript to redirect when required.
*/
include('checkUserLogged.php');
include('UserDB.class.php');
include('dbConfig.php');

if(isset($_POST['submit']))
{
    $loginRegDB = new UserDB($host, $user, $password, $database);
    
    switch ($_POST['submit'])
    {
        case 'Log in':
            
            $checkUserName = $_POST['username'];
            $checkPassword = $_POST['password'];

            echo $loginRegDB->checkLogin($checkUserName, $checkPassword) . '</br>';
            echo '<p>You will be redirected in <span id="counter">5</span> second(s).</p>

            <script type="text/javascript">

                function countdown() 
                {
                    var i = document.getElementById("counter");
                
                    if (parseInt(i.innerHTML)<=0) 
                    {
                        location.href = "index.php";
                    }
                
                    i.innerHTML = parseInt(i.innerHTML)-1;
                }
            
                setInterval(function(){ countdown(); },1000);

            </script>';

            echo '<a href="index.php">Home</a></br>';
            //check if logged in so can go music page
            if(isset($_SESSION['logName']))
            {
                echo '<a href="musicTheory.php">MusicTheory</a></br>';
            }
    
        break;
 
        case 'Register':
            
            $regUserName = $_POST['username'];
            $regUserEmail = $_POST['email'];
            $regPasswordOne = $_POST['password1'];
            $regPasswordTwo = $_POST['password2'];

            echo $loginRegDB->register($regUserName, $regUserEmail, $regPasswordOne, $regPasswordTwo) . '</br>';
            echo '<p>You will be redirected in <span id="counter">5</span> second(s).</p>
            
            <script type="text/javascript">
            
                function countdown() 
                {
                    var i = document.getElementById("counter");
                    
                    if (parseInt(i.innerHTML)<=0) 
                    {
                        location.href = "index.php";
                    }
                    
                    i.innerHTML = parseInt(i.innerHTML)-1;
                }

                setInterval(function(){ countdown(); },1000);
                
            </script>';

            echo '<a href="index.php">Home</a></br>';

        break;
    }
}
else
{
    echo '<p>Invalid URL. You will be redirected in <span id="counter">5</span> second(s).</p>
    
    <script type="text/javascript">
    
        function countdown() 
        {
            var i = document.getElementById("counter");
            
            if (parseInt(i.innerHTML)<=0) 
            {
                location.href = "index.php";
            }
            
            i.innerHTML = parseInt(i.innerHTML)-1;
        }
        setInterval(function(){ countdown(); },1000);
        
    </script>';
} 
?>