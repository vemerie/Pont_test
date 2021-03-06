
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer(true);

if(isset($_POST['cont_btn'])){                           
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "mail.pontesmanies.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "admin@pontesmanies.com";                 
    $mail->Password = "Building better apps!";                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to
    $mail->Port = 587; 
    
    // 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $mail->From = $email;
    $mail->FromName = $first_name." ".$last_name;
    
    $mail->addAddress("vimeron2020@gmail.com", "Recepient Name");
    
    $bp = "First Name: ".$first_name ."<br> Last Name: ".$last_name ."<br> Email: ".$email. "<br> Message: ".nl2br($message);
    // $bodyParagraphs = ["First Name: {$first_name}", "Last Name: {$last_name}", "Email: {$email}", "Message:", nl2br($message)];
    $body = $bp;
    
    
    $mail->isHTML(true);
    
    $mail->Subject = "New message from your website";
    $mail->Body = $body;

    
    try {
        $mail->send();
        echo "Message has been sent successfully";
   
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
       
    }

}   



?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact | pontesmanies</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/ico">
    <link rel="icon" href="img/favicon.ico" type="image/ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,400;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/base.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>

<body class="">
    
    <header role="banner" class="preAuthHeader">
        <div class="container-fluid">
            <div class="navbarWrapper">
                <div class="navbarGroupItem navBarItemLeft">
                    <div class="brand_img">
                        <a href="index.html" class="logo_link">
                            <img src="img/logo.svg" alt="Front Edge Limited">
                        </a>
                    </div>
                </div>
                <div class="navbarGroupItem navBarItemRight">
                    <nav class="navMenu menuPrimary">
                        <div class="menuListItem">
                            <a href="index.html" class="menuLinkItem">Home</a>
                        </div>
                        <div class="menuListItem">
                            <a  href="index.html#about" name="about" class="menuLinkItem">About Us</a>
                        </div>
                        <div class="menuListItem">
                            <a  href="projects.html" class="menuLinkItem">Projects</a>
                        </div>
                        <div class="menuListItem subMenuContainer">
                            <a href="#" class="menuLinkItem">
                                <span class="subLinkHolder">
                                    Services <i class="dropdownMarker"></i>
                                </span>
                            </a>
                            <ul class="subMenu dropdown-menu">
                                <li class="subMenuItem">
                                    <a href="hydrocarbons.html" class="subMenuItem_link">Hydrocarbons</a>
                                </li>
                                <li class="subMenuItem">
                                    <a href="power.html" class="subMenuItem_link">Power &amp; Infrastructure</a>
                                </li>
                            </ul>
                        </div>
                       
                        <!-- <div class="menuListItem">
                            <a href="service.html" class="menuLinkItem">Services</a>
                        </div> -->
                        <div class="menuListItem active">
                            <a href="contact.php" class="menuLinkItem">Contact</a>
                        </div>
                    </nav>
                    <nav class="navMenu menuAlt">
                        <!-- <div class="controlBtn btn_user_act">
                            <a href="login.html" class="btn btn-sm btn-primary-outline">Log In</a>
                        </div> -->
                        <div class="controlBtn nav_trigger">
                            <a class="primary-nav-trigger" href="#">
                                <span class="menu-icon"></span>
                                <span class="menu-text">Menu</span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    
    <main class="mainContentArea">
        <header class="contactUsBanner">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6 mt-5">
                        <h2 class="title title_md font-bold text-white">Contact Us</h2>
                        <p class="text-white">Would you like to work with us or you have major suggestion?
                        </p>
                    </div>
                </div>
            </div>
        </header>
        <section class="section_block" >
            <div class="container">
                <div class="row">
                   <div class="col-md-12">
                    <div class="formPanel">
                      <div class="container">
                          <div class="col-md-8 offset-md-2">
                            <form method="POST" action="contact.php" id ="form">
                                <h3 class="title title_lg font-bold text-center">Mail Us</h3>

                                <div class="form-group ">
                                    <label for="" class="control-label text-style-italics">First Name*</label>
                                    <input required name="first_name" type="text" class="form-control inputRounded" placeholder="First Name">
                                </div>
                                <div class="form-group ">
                                    <label for="" class="control-label text-style-italics">Last Name*</label>
                                    <input required name="last_name" type="text" class="form-control inputRounded" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-style-italics">Email Address*</label>
                                    <input required name="email" type="email" class="form-control inputRounded" placeholder="Enter your Email Address">
                                </div>
                             
                                <div class="form-group">
                                    <label class="control-label text-style-italics">Comments</label>
                                    <textarea required name="message" class="form-control inputRounded" rows="10" placeholder="Add any other relevant information you wish to share"></textarea>
                                </div>
                                <!-- <div class="captcha">  
                                    <input type="text" id="txtCaptcha" style=" border: none !important; font-weight: bold; font-size: 30px; font-family: 'Brush Script MT', cursive;" />
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" id="txtCompare" />  
                                        </div>
                                        <div class="col-md-3">
                                            <input type="button" id="btnrefresh" value="Refresh" v-on:click="GenerateCaptcha();" />  
                                        </div>
                                    </div>                              
                                    <br />  
                                </div>   -->
                               
                                <div class="section_cto text-center">
                                    <button name="cont_btn" class="btn btn-primary btn-block" type="submit">SUBMIT</button>
                                </div>
                            </form>
                          </div>
                      </div>
                    </div>
                    <div class="mapouter mt-5"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=lekki phase 1&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.embedmymap.com/">Embed My Map</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
                   </div>
                </div>
            </div>
        </section>    
      
    </main>

    <footer role="contentinfo" class="footerArea">
        <div class="container">
            <div class="row">
                <div class="col-md-7 footerBlock">
                    <div class="brandBlock">
                        <div class="brand_media">
                            <a href="index.html">
                                <img  src="./img/pontes.png" alt="Front Edge Limited">
                            </a>
                        </div>
                    </div>
                    <div class="footerCrumbs">
                        <ul class="customTitleList margin_bottom_md margin_top_sm">
                            <li class="titleListItem">
                                <span class="listItem">19 Ichie Mike Ejezike off Emma Abimbola, Lekki Phase 1, Lagos Nigeria</span>
                            </li>
                            <li class="titleListItem">
                                <span class="listItem">+2348087187956 | +2349060001695</span>
                            </li>
                            <li class="titleListItem">
                                <span class="listItem">info@pontesmanies.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 brandNav">
                    <div class="mapouter mt-5"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=260&amp;hl=en&amp;q=lekki phase 1&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.embedmymap.com/">Embed My Map</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:260px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:260px;}.gmap_iframe {height:260px!important;}</style></div>
                </div>
            </div>
        </div>
    </footer>

	<script src="js/jquery.js"></script>
    <script src="js/base.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>