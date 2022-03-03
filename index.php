<?php

include 'config.php';

error_reporting(0);


if(isset($_POST['submit'])) {
            $firstName = $_POST['fName'];
            $lastName = $_POST['lName'];
            $username = $_POST['uname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);
            $number = $_POST['contactno'];

            if($password == $cpassword) {
              $sql = "SELECT * FROM userdata WHERE email = '$email'";
              $result = mysqli_query($conn, $sql);
                if(!result($result->num_rows > 0 )){
                  $sql = "INSERT INTO userdata (first_name,last_name,username,email,password,contact number)
                            VALUES ('$firstName','$lastName','$username','$email','$cpassword','$number')";
              $result = mysqli_query($conn, $sql);
              if($result) {
                  echo "<script>alert('user registered')</script>";
                  $firstName = "";
                  $lastName = "";
                  $username = "";
				          $email = "";
                  $_POST['password'] = "";
				          $_POST['cpassword'] = "";
                  $number = "";
              }   else {
                  echo "<script>alert('something went wrong')</script>";
              }
                } else {
                        echo "<script>alert('email already registered')</script>";               
                }
                                        
            } else {
              echo "<script>alert('password does not match')</script>";
            }


            
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                <form class="mx-1 mx-md-4" action="/login.php" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" placeholder="firstname"  name="fname" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" placeholder="lastname" name="lname" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" placeholder="username" name="uname" required/>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name=" email "placeholder="email  ex:email@email.com" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" placeholder="password" name="password" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" placeholder="confirm password" name="cpassword" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="form3Example4cd" class="form-control" placeholder="contact number" name="contactno" required/>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="button" name="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Already registered? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="draw1.webp" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>