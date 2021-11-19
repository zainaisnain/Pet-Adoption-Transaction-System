<?php
include_once 'dbh/dbh_conn.php';
?>

<!DOCTYPE html>
<html>
<body>
<head>
    <meta charset = "UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta  name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Francois+One&family=Patua+One&family=Press+Start+2P&family=Secular+One&display=swap');
        @import url("https://fonts.googleapis.com/css?family=Poppins");

        body {
            background: #333;
        }

        .signBox * {
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;

        }

        .forms-link {
            color: inherit;
            text-decoration: none;
        }

        .signBox {
            color: rgb(255, 255, 255);
            width: 100%;
            margin: auto;
            max-width: 526px;
            min-height: 590px;
            position: relative;
            margin-top: 100px;
            background: url(pexels-blue-bird-7210698.jpg)
            no-repeat center;
            background-size: cover;
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24),
            0 17px 50px 0 rgba(0, 0, 0, 0.2);
            animation: hueRot 3s ease-in-out infinite;
        }

        .signBox-inner {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 70px 70px 50px 70px;
            background: linear-gradient(
                    45deg,
                    rgba(31,34,102, 0.91),
                    rgba(255, 203, 46, 0.219)
            );
        }
        .Login-form,
        .Signup-form {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            transform: rotateY(180deg);
            backface-visibility: hidden;
            transition: all 0.4s linear;
            margin-top: 20px;
            display: inline-block;
        }

        .Login-btn,
        .Signup-btn{
            display: none;
        }
        .tab,
        .label,
        .button {
            text-transform: uppercase;
        }
        .tab {
            font-size: 22px;
            margin-right: 15px;
            padding-bottom: 5px;
            margin: 0 15px 10px 0;
            display: inline-block;
            border-bottom: 2px solid transparent;
            cursor: pointer;
            font-family: 'Francois One', sans-serif;
        }
        .Login-btn:checked + .tab,
        .Signup-btn:checked + .tab {
            color: rgb(0, 0, 0);
            border-color: #ffffff;

        }
        .forms-wrap {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
            margin-top: -12px;
            border-top: 2px solid rgba(255, 255, 255, 0.2);
        }
        .group {
            margin-bottom: 15px;
        }
        .group span{
            display: block;
            padding: 5px 5px;
            color: #FD1C03;
            text-shadow: 1px 1px #000000;
            font-weight:bold;
            font-size:11px;

        }

        .label,
        .input,
        .button {
            width: 100%;
            color: rgb(0, 0, 0);
            display: block;
        }

        .label {
            color: rgb(253, 253, 253);
            font-size: 12px;
            margin: 0px 0px 5px 0px;
            font-style: bold;
        }

        .button {
            background: #FEC10B;
            transition: 200ms ease-in-out;
            cursor: pointer;
        }
        .button:hover {
            box-shadow: 0px 4px 10px rgba(30, 30, 30, 0.2);
        }

        .checkbox {
            width: 15px;
            height: 15px;
            border-radius: 2px;
            position: relative;
            display: inline-block;
            background: rgba(246, 246, 246, 0.678);
        }

        .checkbox:before {
            left: 3px;
            width: 5px;
            bottom: 6px;
            transform: scale(0) rotate(0);
        }
        .checkbox:after {
            top: 6px;
            right: 0;
            transform: scale(0) rotate(0);
        }

        .Login-btn:checked + .tab + .Signup-btn + .tab + .forms-wrap .Login-form {
            transform: rotate(0);
        }
        .Signup-btn:checked + .tab + .forms-wrap .Signup-form {
            transform: rotate(0);
        }

        .hr {
            height: 2px;
            margin: 10px 0px 15px 0px;
            background: rgba(255, 255, 255, 0.2);
        }
        .foot-lnk {
            text-align: center;
        }

        .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
        }

        .input {
            border: none;
            padding: 10px 10px;
            border-radius: 25px;
            background: linear-gradient(
                    90deg,
                    rgba(243, 232, 232, 0.739),
                    rgba(255, 255, 255, 0.52) 50%
            );
            background-position-x: 50%;
            background-size: 200% 100%;
            animation: gradBack 300ms ease-in-out forwards;
        }

        .button:focus {
            outline: none;
        }

        .input:focus {
            outline: none;
            animation: gradForw 300ms ease-in-out forwards;
        }

        @keyframes gradForw {
            0% {
                background-position-x: 50%;
            }
            100% {
                background-position-x: 0%;
            }
        }
        @keyframes gradBack {
            0% {
                background-position-x: 0%;
            }
            100% {
                background-position-x: 50%;
            }
        }

        @keyframes hueRot {
            0% {
                filter: hue-rotate(0deg);
            }
            50% {
                filter: hue-rotate(-25deg);
            }
            100% {
                filter: hue-rotate(0deg);
            }
        }
        /* separate the text box */
        .input-w label, .input-w input {
            justify-content: space-between;
            float: none; /* if you had floats before? otherwise inline-block will behave differently */
            display: inline-block;
            vertical-align: middle;
            border: none;
            width:190px;
            padding: 5px 5px;
            border-radius: 25px;
            background: linear-gradient(
                    90deg,
                    rgba(243, 232, 232, 0.739),
                    rgba(255, 255, 255, 0.52) 50%
            );
            background-position-x: 20%;
            background-size: 200% 100%;
            animation: gradBack 300ms ease-in-out forwards;
        }
        .input-w input:focus {
            outline: none;
            animation: gradForw 300ms ease-in-out forwards;
        }

        /* --------------------------------------------------------------- */

        .select-w select, .select-w option, .select-w input  {
            float: none;
            display: inline-block;
            vertical-align: middle;
            border: none;
            padding: 15px 18px ;
            width:190px;
            padding: 5px 5px;
            border-radius: 25px;
            background: linear-gradient(
                    90deg,
                    rgba(243, 232, 232, 0.739),
                    rgba(255, 255, 255, 0.52) 50%
            );
            background-position-x: 20%;
            background-size: 200% 100%;
            animation: gradBack 300ms ease-in-out forwards;
        }
        .select-w input:focus {
            outline: none;
            animation: gradForw 300ms ease-in-out forwards;
        }
        .term label{
            color:rgb(255, 255, 255);
            font-size:10px;
            text-align: right;
        }
        .select-w select:focus {
            outline: none;
            animation: gradForw 300ms ease-in-out forwards;
        }

    </style>
</head>
<body>
<div class="signBox" id="signBox">
    <div class="signBox-inner">
        <input id="tab-1" type="radio" name="tab" class="Login-btn" checked>
        <label for="tab-1" class="tab">Log In</label>
        <input id="tab-2" type="radio" name="tab" class="Signup-btn">
        <label for="tab-2" class="tab">Sign up</label>
        <div class="forms-wrap">


            <form method="post" action="#">
                <div class="Login-form">
                    </br></br>
                    <div class="group">
                        <input id="username" name="username" type="text" class="input" placeholder="Username" required>

                    </div>
                    <div class="group">
                        <input id="login_password" type="password" class="input" data-type="password" name="login_password" placeholder="Password" required>

                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="checkbox" name="remember-me">
                        <label for="remember-me">&nbsp Remember me</label>
                    </div>
                    <div class="group">
                        <input style="padding-top:2%;" type="submit" class="button" name="login" value="Login">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a class="forms-link" href="#">Forgot Password?</a>
                    </div>
                </div>
            </form>



            <form method="POST">
                <div class="Signup-form">
                    <div class="group">
                        <div class="input-w">
                            <input type="text" id="firstname"  placeholder="First name" name="firstname" required >
                            <input type="text" id="lastname" placeholder="Last name " name="lastname" required >
                        </div>
                    </div>
                    <div class="group">
                        <div class="select-w">
                            <label for="birthday" class="label">Date of Birth</label>
                            <input type="date" id="birthday" name="birthday" required >
                            <select name="gender" id="gender" required>
                                <option value="gender" disabled selected hidden>Gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="group" >
                        <input style="padding: 5px 5px" id="address" type="text" class="input" placeholder="Address" name="address" required>
                    </div>
                    <div class="group">
                        <div class="input-w">
                            <input type="text" id="phone_number" name="phone_number" placeholder="Contact Number" required>
                            <input type="text" id="email" name="email" placeholder="Email" required >
                        </div>
                    </div>
                    <div class="group" >
                        <input style="padding: 5px 5px" id="username" type="text" class="input" placeholder="Username" name="username" required>
                    </div>
                    <div class="group" >
                        <input style="padding: 5px 5px" id="password" type="password" class="input" placeholder="Enter your password" name="password" required>
                    </div>
                    <div class="group" >
                        <input style="padding: 5px 5px" id="confirm_password"  type="password" class="input"  placeholder="Confirm Password" name="confirm_password" required>
                        <span>Password do not match</span>
                    </div>
                    <div class="group">
                        <input style="padding: 5px 5px;" type="submit" name="signup" class="button" value="SIGN UP">
                    </div>

                    <div class="term">
                        <input type="checkbox" id="terms" name="terms" value="terms" required>
                        <label for="terms">I accept the terms and codition for signing up to this service, and hereby &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp confirm I have read the privacy polociy</label><br>
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1" style="color:#fff">Already Member?</label>
                    </div>
                </div>
            </form>

            <?php
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            // INSERTING VALUES TO DB
            if(isset($_POST['signup'])) {

                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $birthday = $_POST['birthday'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $email= $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];


                //TODO: display error message when username already exists
                $userCheck = $conn -> query("select username from user_info where username = '$username';");
                if($userCheck->num_rows == 0) {

                    $sql = "INSERT INTO user_info (firstname, lastname, birthday, gender, address, phone_number, email, username, user_password)
                        VALUES ('$fname', '$lname', '$birthday', '$gender', '$address', '$phone_number', '$email', '$username', '$password');";


                    if($conn->query($sql)==TRUE) {
                        echo "SUCCESSFULY SIGNED UP!";
                    }
                    else {
                        echo "Error: ".$sql.$conn->error;
                    }
                }

            }

            if(isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['login_password'];

                if($username !='' && $password!=''){
                    $query="select * from user_info where username='".$username."' and user_password='".$password."'";

                    $result=mysqli_query($conn,$query);

                    if(!$result)
                        die("Query Failed: " .  mysqli_error($conn));
                    else{
                        if(mysqli_num_rows($result)>0) {
                            echo "succesfully logged in";
                        }
                        else {?>
                            <script>
                                alert("Invalid Username or Password");
                            </script>
                            <?php
                        }
                    }
                }
            }



            ?>

            <script>
                var $password = $("#password");
                var $confirmPassword = $("#confirm_password");
                //Hide hints
                $("span").hide();
                function arePasswordsMatching() {
                    return $password.val() === $confirmPassword.val();
                }
                function canSubmit() {
                    return isPasswordValid() && arePasswordsMatching();
                }
                function passwordEvent(){
                    //Find out if password is valid
                    if(isPasswordValid()) {
                        //Hide hint if valid
                        $password.next().hide();
                    } else {
                        //else show hint
                        $password.next().show();
                    }
                }
                function confirmPasswordEvent() {
                    //Find out if password and confirmation match
                    if(arePasswordsMatching()) {
                        //Hide hint if match
                        $confirmPassword.next().hide();
                    } else {
                        //else show hint
                        $confirmPassword.next().show();
                    }
                }
                function enableSubmitEvent() {
                    $("#sigin").prop("disabled", !canSubmit());
                }
                //When event happens on password input
                $password.focus(passwordEvent).keyup(passwordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);
                //When event happens on confirmation input
                $confirmPassword.focus(confirmPasswordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);
                enableSubmitEvent();
            </script>
        </div>
    </div>
</div>
</body>
</html>