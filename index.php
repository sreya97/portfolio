<?php
require_once "config.php";

$username = $email = $msg = "";
$username_err = $email_err = $msg_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["name"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM contact WHERE Username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['name']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['name']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
      $email_err = "Email cannot be blank";
  }
  else{
      $sql = "SELECT id FROM contact WHERE Email = ?";
      $stmt = mysqli_prepare($conn, $sql);
      if($stmt)
      {
          mysqli_stmt_bind_param($stmt, "s", $param_email);

          // Set the value of param username
          $param_email = trim($_POST['email']);

          // Try to execute this statement
          if(mysqli_stmt_execute($stmt)){
              mysqli_stmt_store_result($stmt);
              if(mysqli_stmt_num_rows($stmt) == 1)
              {
                  $email_err = "This email is already taken"; 
              }
              else{
                  $email = trim($_POST['email']);
              }
          }
          else{
              echo "Something went wrong";
          }
      }
  }

  mysqli_stmt_close($stmt);


  // Check if username is empty
  if(empty(trim($_POST["msg"]))){
    $msg_err = "Message cannot be blank";
  }
  else{
    $msg = trim($_POST['msg']);
  }
}



if(empty($username_err) && empty($email_err) && empty($msg_err)) {
    $sql = "INSERT INTO contact (Username, Email, Message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_msg);

        // Set these parameters
        $param_username = $username;
        $param_email = $email;
        $param_msg = $msg;

        // Try to execute the query
        mysqli_stmt_execute($stmt);
        // header("location: welcome.html");
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);

?>




<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio | Responsive Website Design</title>
  </head>
  <body>
    <header>
      <a href="#" class="logo">Portfolio</a>
      <div class="toggle" onclick="toggleMenu();"></div>
      <ul class="menu">
        <li><a href="#home" onclick="toggleMenu();">Home</a></li>
        <li><a href="#about" onclick="toggleMenu();">About</a></li>
        <li><a href="#services" onclick="toggleMenu();">Service</a></li>
        <li><a href="#work" onclick="toggleMenu();">Work</a></li>
        <!-- <li><a href="#testimonial" onclick="toggleMenu();">Testimonial</a></li> -->
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
      </ul>
    </header>
    
    <section class="banner" id="home">
      <div class="textBx">
        <h2>Hi, I'm<br><span>Sreya Basu.</span></h2>
        <!-- <h3>I am a Web developer.</h3> -->
        <a href="#about" class="btn">About Me</a>
        </section>
      
      <section class="about" id="about">
        <div class="heading">
          <h2>About Me</h2>
        </div>
        <div class="content">
          <div class="contentBx w50">
            <h3>Oh, hi there!! This is Sreya.</h3>
            <h4>Developer in the making.</h4><br>
            <p>I am a student at Pondicherry University currently pursuing Masters in Computer Science. 
              I am a beginner at UI | UX Design and Web Development. This portfolio is to showcase my skills in web development as a beginner.
               Do not forget to give your views in the contact section.
            </p>
          </div>
          <div class="w50">
            <img src="images/profile.jpg" style="float: right; align-items: center;">
          </div>
        </div>
      </section>
      
      <section class="services" id="services">
          <div class="heading white">
          <h2>Services</h2>
            <p>These are all things that I can do.</p>       
        </div>
        <div class="content">
          <div class="servicesBx">
            <img src="https://www.flaticon.com/svg/static/icons/svg/2905/2905113.svg">
            <h2>UI | UX Design</h2>
            <p>Design does not only mean how it looks. But, if you dig deeper, it's really how it works.</p>
          </div>
          <div class="servicesBx">
            <img src="https://www.flaticon.com/svg/static/icons/svg/84/84471.svg">
            <h2>Web Development</h2>
            <p>Websites promote you 24/7. No one else will do that.</p>
          </div>
          <div class="servicesBx">
            <img src="https://www.flaticon.com/svg/static/icons/svg/2222/2222908.svg">
            <h2>App Development</h2>
            <p>With smart phones clearly becoming the leader in sharing real-time information, mobile apps bring the same or better user experience as they are "on the go".</p>
          </div>
          <div class="servicesBx">
            <img src="images/painting.png">
            <h2>Art</h2>
            <p>Art washes away from the soul, the dust of everyday life.</p>
          </div>
            <div class="servicesBx">
            <img src="https://www.flaticon.com/svg/static/icons/svg/1663/1663291.svg">
            <h2>Content Writing</h2>
            <p>Any project needs content. Web services, web development, applications, this applies to everything.</p>
          </div>
           <!-- <div class="servicesBx">
            <img src="https://www.flaticon.com/svg/static/icons/svg/3074/3074754.svg">
            <h2>Video Editing</h2>
            <p>Regular video will turn into high-quality material with good editing and high-quality special effects.</p>
          </div> -->
        </div>
      </section>
      
      <section class="work" id="work">
          <div class="heading">
          <h2>Latest Work</h2>
           <!-- <p>UI|UX. Colour. Content. Design.</p>-->
        </div>
        <div class="content">
          <div class="workBx">
            <!-- <img src="https://sun9-45.userapi.com/KwGQ8Bb6clcoOkbAPF7p1IrfeS2IWHn4C76E5Q/Sl555IEnwU4.jpg"> -->
            <img src="images/ui_ux.png" style = "height: 15rem;">
        </div>
          <div class="workBx">
            <!--<img src="https://sun9-50.userapi.com/R3PehVnJ5ozOUDYy6Jt_i4mpquLOVZVynnY9aA/ThV0zWCo9Ik.jpg"> -->
            <!--<img src="images/calc.png" style = "height: 25rem;"> -->
            <img src="images/cal.png" style = "height: 15rem;">

        </div>
          <div class="workBx">
            <!-- <img src="https://sun9-30.userapi.com/_cNxDWEDvEF9l-pLicT2bq2yR4CZy9UGxaewcA/SOiIPcMqvgk.jpg"> -->
            <img src="images/ama.jpeg" style = "height: 15rem;">
        </div>
          <div class="workBx">
            <!-- <img src="https://sun9-20.userapi.com/HWKn59nkstmFAuWW5bIBojXKQlH5mLPRA9ypPA/6MJg-HUGUek.jpg"> -->
            <img src="images/cw.jpeg" style = "height: 15rem;">
        </div>
        </div>
          <div class="heading">
            <a href="#" class="btn">View More</a>
          </div>
      </section>
      
        <!-- <section class="testimonial" id="testimonial">
          <div class="heading">
          <h2>Testimonial</h2>
            <p>A few words from clients</p>
        </div>
          <div class="content">
            <div class="testimonialBx">
              <p>Thank you very much for the work done. In your works, you can see the energy that you put into what you create. Your ideas are modern and attractive. Good luck to you.</p>
              <h3>A.A.Blaze<br><span>Creative Designer</span></h3>
            </div>
            <div class="testimonialBx">
              <p>For my project, I needed to make a beautiful and functional design. In search of a designer, I reviewed many different portfolios, until on one of the sites I accidentally saw the signature "Design
web service Murat Toimet ".

As a result of joint work, Murat invented and drew the design for the main and internal pages of the service. I was not mistaken in choosing a designer, I am more than satisfied with the result.</p>
              <h3>Malika<br><span>Art Director</span></h3>
            </div>
          </div>
        </section> -->
        
      <section class="contact" id="contact">
          <div class="heading white">
          <h2>Contacts</h2>
            <p>Questions? Get into contact with me.</p>
        </div>
        <div class="content">
          <div class="contactInfo">
            <h3>Contact Info</h3>
            <div class="contactInfoBx">
              <!-- <div class="box">
                <div class="icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                  <div class="text">
                     <h3>Address</h3>
                      <p>20/2 Merkurii Street,<br>Shymkent, Kazakhstan,<br>160000</p>
                </div>
              </div> -->
              <div class="box" style = "float: left; align-items: center; margin-top: 50px;">
                <div class="icon">
                  <i class="fa fa-phone"></i> 
                </div>
                  <div class="text">
                     <h3>Phone</h3>
                      <p>+91 8017837449</p>
                </div>
              </div><br><br><br><br><br><br>
              <div class="box" style = "float: right; align-items: center; margin-right: 100px">
                <div class="icon">
                  <i class="fa fa-envelope"></i> 
                </div>
                  <div class="text">
                     <h3>Email</h3>
                      <p><a href = "mailto:sreya.1897@gmail.com" style = "color: white; text-decoration: none;">sreya.1897@gmail.com</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="formBx" >
            <form action = "" method = "post">
              <h3>Message Me</h3>
              <input type="text" name="name" placeholder="Full Name" required>
              <input type="email" name="email" placeholder="E-mail" required>
              <textarea placeholder="Your Message" name="msg" required></textarea>
              <input type="submit" value="Send">
            </form>
          </div>
        </div>
      </section>
      <div class="copyright">
        <p>&copy; 2020 Sreya Basu. All Right Reserved.</p>
      </div>
      <script src="main.js"></script>
  </body>
</html>
