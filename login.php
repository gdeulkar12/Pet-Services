<?php
    // Database connection
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "practice";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(!$con) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    // Authentication process
    $username = $_POST['uname'];  
    $password = $_POST['pword'];  

    // Prepared statement to prevent SQL Injection
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();  

    // Verifying the hashed password
    if($row && password_verify($password, $row['password'])) {  
        echo "<h1><center>Login successful</center></h1>";  
    } else {  
        echo "<h1>Login failed. Invalid username or password.</h1>";  
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Services</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Additional styling for buttons */
        .btn:hover {
            background-color: #ff6b6b;
            color: #fff;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-paw"></i> Pet Services </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#shop">shop</a>
            <a href="#services">services</a>
            <a href="#plan">plan</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div class="fas fa-user" id="login-btn"></div>
        </div>

        <!-- Login Form -->
        <form action="login.php" class="login-form" method="post">
            <h3>sign in</h3>
            <input type="email" name="uname" placeholder="enter your email" class="box">
            <input type="password" name="pword" placeholder="enter your password" class="box">
            <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" value="sign in" class="btn">
        </form>
        <div class="links">
            <a href="#">forget password</a>
            <a href="#">sign up</a>
        </div>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3> <span class="s1">Hi,</span> Welcome to our Pet Services </h3>
            <a href="#" class="btn">Browse Services Now</a>
        </div>

        <img src="image/bottom_wave.png" class="wave" alt="">

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <div class="image">
            <img src="abt.jpg" class="pf" alt="">
        </div>

        <div class="content">
            <h3>Your Pet, <span>Our Responsibility</span> </h3>
            <p>We love pets, and we believe loving pets makes us better people. That’s one of the many reasons we do Anything for Pets
            - because they will do anything for us. Anything for Pets is our commitment to pet parents, it’s how we do business and
            who we are as pet lovers. As the leader in pet care, we make our decisions based on how we can bring pet parents closer
            to their pets.</p>
            <a href="#" class="btn">read more</a>
        </div>

    </section>

    <!-- about section ends -->

    <!-- footer section starts -->
    <section class="footer">

        <img src="image/top_wave.png" alt="">

        <div class="share">
            <a href="#" class="btn"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#" class="btn"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#" class="btn"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#" class="btn"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#" class="btn"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>

        <div class="credit"><span>Pet Services Pvt. Ltd.</span> | All Rights Reserved! </div>

    </section>
    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>


<!--

position: absolute;
  top: 120%;
  right: 2rem;
  width: 35rem;
  border-radius: 1rem;
  background: #fff;
  -webkit-box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
          box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
  padding: 2rem;
  display: none;

  login-form.active {
  display: block;
  -webkit-animation: fadeIn .4s linear;
          animation: fadeIn .4s linear;
}

 color: #130f40;
  font-size: 2.5rem;
  padding-bottom: .5rem;

  width: 100%;
  border-bottom: 0.2rem solid #130f40;
  border-width: .1rem;
  padding: 1.5rem 0;
  font-size: 1.6rem;
  color: #130f40;
  text-transform: none;
  margin: 1rem 0;

  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  gap: .5rem;
  padding: 1rem 0;

  font-size: 1.5rem;
  cursor: pointer;
  color: #666;

  width: 100%;
  text-align: center;
  margin: 1.5rem 0;

  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-top: 1rem;
-->