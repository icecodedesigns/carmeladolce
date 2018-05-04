<?php
    
    define("TITLE", "Carmela Dolce | Debut Novel - The Fire Within Available Now | Romance Author");
    
    

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Carmela Dolce | Debut Novel - The Fire Within Available Now | Romance Author</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- Font Awesome Stylesheet -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Niconne" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #639e8c;">
      <div class="container">
          <div class="row">
        <a class="navbar-brand" href="/"><img src="/img/carmela.png" class="d-inline-block align-top"></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav navbar-right ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/books">Books<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
              </li>
              <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item dropdownText" href="#">Domains</a>
                  <a class="dropdown-item dropdownText" href="#">Web Design</a>
                  <a class="dropdown-item dropdownText" href="#">SEO</a>
                </div>
              </li>-->
            </ul>
        </div>
              
              <div class="social">
              <ul>
                  <li>
                    <a href="https://www.facebook.com/CarmelaDolceAuthor/">
                        <i class="fab fa-facebook fa-2x socialIcon"></i>
                    </a>
                  </li>
                    
                  <li>
                    <a href="https://twitter.com/ContactDolce">
                        <i class="fab fa-twitter fa-2x socialIcon"></i>
                    </a>
                  </li>
                  
                  <li>
                    <a href="https://www.amazon.com/Carmela-Dolce/e/B07B3X33KX/ref=ntt_dp_epwbk_0">
                        <i class="fab fa-amazon fa-2x socialIcon"></i>
                    </a>
                  </li>
                  
                
              </ul>
          </div>
          
        </div>
        </div>
    </nav>

            
            
            
      <div class="container">
    <div class="row">
      
      
       <?php
                    
                    //Check for header injections
                    function has_header_injection($str){
                        return preg_match("/[\r\n]/", $str);
                    }
                    
                        if(isset ($_POST['contact_submit'])) {
                            $name = trim($_POST['name']);
                            $email = trim($_POST['email']);
                            $message = $_POST['message'];
                            
                            //check to see if name or email have header injections
                            
                            if (has_header_injection($name) || has_header_injection($email)) {
                                die(); //if true, kill the script
                            }
                            
                            if(!$name || !$email || !$message){
                                
                                echo '<h4 class="error"> All fields required!</h4><a href="contact.php" class="button block"> Go Back and Try Again</a>';
                                exit;
                            }
                            
                            // Add the recipient email to a variable
                            $to = "cjromanos@gmail.com";
                            
                            //Create Subject
                            $subject = "$name sent you a message via your contact form";
                            
                            //Construct the message
                                    $finalmessage = '<html><body>';
                                    $finalmessage .= '<img src="http://carmeladolce.com/img/carmela.png" style="width: auto; height: 100px;" />';
                                    $finalmessage .= '<h1 style="color:#f40;">Name:' . $name .'</h1>';
                                    $finalmessage .= '<p style="color:#080;font-size:18px;">Email: '. $email.'</p>';
                                    $finalmessage .= '<p style="color:#080;font-size:20px;">Message: '. $message.'</p>';
                                    $finalmessage .= '</body></html>';
                            
                            // $finalmessage     =   "Name: $name\r\n";
                            // $finalmessage    .=   "Email: $email\r\n";
                            // $finalmessage    .=   "Message: \r\n $message";
                            
                            //if subscribed checkbox was checked
                            if(isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {
                                //Add new line to the message
                                $finalmessage .= "\r\n\r\nPlease add $email to the mailing list\r\n";
                            }
                            
                            $finalmessage = wordwrap($finalmessage, 72);
                            
                            $headers = "MIME-Version: 1.0\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            //$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                            $headers .= 'From: '.email."\r\n".
                                        'Reply-To: '.email."\r\n" .
                                        'X-Mailer: PHP/' . phpversion();
                            $headers .= "From: $name <$email> \r\n";
                            $headers .= "X-Priority: 1\r\n";
                            $headers .= "X-MSMail-Priority: High\r\n\r\n";
                            
                            //Send the email!
                            mail($to, $subject, $finalmessage, $headers);
                            
                        
                    ?>
                    <h5>Thanks for contacting Carmela Dolce!</h5>
                    <p>Please allow 24-48 hours for a response.</p>
                    <p><a href="/" class="button block">&laquo; Go to Home Page</a></p>
       
        
               
               <?php }else { ?>
               <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <div class="col-md-8 formitem">
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 formitem">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 formitem">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message for Carmela here. She will get back to you as soon!" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg" name="contact_submit">Send</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    
    
    
    
    
    <footer id="myFooter">
        <div class="container">
            <div class="row">
               
               <div class="col-sm-4 info">
                    <div class="logo"><h5><a href="/"><img src="/img/carmela.png"></a></h5></div>
                </div>
                
                
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/books">Books</a></li>
                        <li><a href="/about">About</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="/contact">Contact Me</a></li>
                        <li><a href="/books/where-to-buy">Where to Buy</a></li>
                        <li><a href="/newsletter">Newsletter</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h5>Subscribe to my Newsletter</h5>
                    <ul>
                        <li><input type="text" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="basic-addon2"></li>
                        <li><button style="margin-top: 5px;" type="button" class="btn btn-outline-light">Subscribe</button></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="second-bar">
           <div class="container">
              
                <h2 class="icd" style="line-height:30px">Developed by <a href="http://www.icecodedesigns.com"><img src="/img/icdlong.png"></a></h2>
                <div class="social-icons">
                    <a href="https://www.facebook.com/CarmelaDolceAuthor/" class="facebook"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/ContactDolce" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.amazon.com/Carmela-Dolce/e/B07B3X33KX/ref=ntt_dp_epwbk_0" class="amazon"><i class="fab fa-amazon"></i></a>
                </div>
            
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
