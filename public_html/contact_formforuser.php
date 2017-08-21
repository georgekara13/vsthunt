<?php
include_once 'includes/db_connect.php';
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
//sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href='//fonts.googleapis.com/css?family=Covered By Your Grace' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
        <link rel="shortcut icon" type="image/png" href="img/favicon-16x16.png">
        <link href='//fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Carme' rel='stylesheet'>
        <title>VST hunt</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
        <script src="https://use.fontawesome.com/64340464e8.js"></script>
         <!--<script src="js/jquery/jquery.js"></script>-->
        <script src="http://code.jquery.com/jquery.js"></script>
        <!--<script src="js/bootstrap.js"></script>-->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body>
         <!--modal window gia to user panel me ta stoixeia tou,stats klp-->
        <div class="modal fade hide" id="usercontrolpanel"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <!-- gia melontikh epektash,kanoniko profile,me profile picture,emfanish olwn twn posts tou xrhsth,epiloges gia customisation-->  
                        <h5 class="modal-title" id="exampleModalLabel" align="center">User panel</h5>
                      </div>
                    <form style="margin-bottom: 0px; padding-bottom: 0px;" method="post" action="includes/logout.php">  
                      <div class="modal-body">
                         
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></span>
                                                                               
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></span>&nbsp;
                                       
                                    </div>
                                    

                                
                           
                            <!--</form>-->
                      </div>
                      <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" >Log in</button>
                      </div>-->
                    </form>
                    </div>
                  </div>
        </div>
   
        <!-- h navbar-->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
              <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <a class="brand brand-font" href="#">VST hunt</a>
                <div class="nav-collapse">
                  <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li><a href="indexforuser.php">Index</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="plugin_listforuser.php">Browse plugins</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="vendors_mapforuser.php">Vendors map</a></li>
                    <li class="divider-vertical"></li>
                    <li class="active"><a href="contact_formforuser.php">Contact me</a></li>
                    <li class="divider-vertical"></li>
                  </ul>  
                  <ul class="nav pull-right">
                      
                    <li><button type="button" class="btn" data-toggle="modal" data-target="#usercontrolpanel"><i class="fa fa-home" aria-hidden="true"></i>Welcome User</button></li>
                    <li class="divider-vertical"></li>
                    <form style="float: right; margin-bottom: 0px; padding-bottom: 0px;" method="post" action="includes/logout.php">  
                      <li><button type="submit" name="signout" id="signout"  class="btn"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign out</button></li>
                    </form>   
                  </ul>                    
                </div>
              </div>
            </div>
        </div>
        
        <div class="wholepage-border">
            <div class="hero-unit">
                <h1>Contact me</h1><br>
                <p>Having any questions?Want to help me expanding the website?Or just want to chit-chat?If any of these is the case,just hit me up,by using any of the icons below,or fill in the contact form.
                    
                    
                </p>
                <br><br>
                <table>
                        <tr>
                          <td><a href="mailto:george_kara_13@hotmail.com"><i class="fa fa-envelope-o fa-5x" aria-hidden="true"></i></a></td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td><a href="https://www.facebook.com/gorj808" target="_blank"><i class="fa fa-facebook-official fa-5x" aria-hidden="true"></i></a></td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td><a href="https://www.den-exw-twitter.com/as-poume-oti-eixa" target="_blank"><i class="fa fa-twitter-square fa-5x" aria-hidden="true"></i></a></td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td><a href="https://github.com/georgekara13" target="_blank"><i class="fa fa-github fa-5x" aria-hidden="true"></i></a></td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td><a href="https://plus.google.com/u/0/115741594354053639744" target="_blank"><i class="fa fa-google-plus-official fa-5x" aria-hidden="true"></i></td>
                        </tr>
                </table> 
             
                <br><br>
                
                <h2>Contact form</h2>
                <form id="contact-form" method="post" action="includes/thankyouforuser.php">
                        <div class="form-group">
                          <label for="exampleInputEmail1">*Email address</label>
                          <input type="email" class="form-control"  name="Email" aria-describedby="emailHelp" placeholder="Enter email">
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Phone number</label>
                          <input type="text" class="form-control" name="Phonenumber" placeholder="Enter a phone number(optional)">
                        </div>
                  
                        <div class="form-group">
                          <label for="exampleTextarea">*Message</label>
                          <textarea class="form-control"  rows="3" name="Message" placeholder="Leave your message..."></textarea>
                        </div>
               
                        
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
                <div><a href="https://cymatics.fm/" target="_blank"><img src="img/cymatics-ad.jpg" alt="https://cymatics.fm/"/></a></div>
            </div>
        </div>   
        <div class="site-bottom"><i class="fa fa-creative-commons fa-lg" aria-hidden="true"></i> 2017 made by Gorj 2025201200041.</div>
        <script>

            var elements = document.getElementsByTagName("input");
            for (var ii=0; ii < elements.length; ii++) {
              if (elements[ii].type === "text"  || elements[ii].type === "email") {
                elements[ii].value = "";
              }
            }
            
        </script>    
        
    </body>   
</html>
