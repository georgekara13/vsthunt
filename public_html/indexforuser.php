<?php
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';

    //sec_session_start();

    if (login_check($mysqli) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
		//header('Location: memberprotected.php');
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
                    <li class="active"><a href="indexforuser.php">Index</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="plugin_listforuser.php">Browse plugins</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="vendors_mapforuser.php">Vendors map</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="contact_formforuser.php">Contact me</a></li>
                    <li class="divider-vertical"></li>
                  </ul>  
                  <ul class="nav pull-right">
                      
                    <li><button type="button" class="btn" data-toggle="modal" data-target="#usercontrolpanel"><i class="fa fa-home" aria-hidden="true"></i>Welcome user</button></li>
                    <li class="divider-vertical"></li>
                    <form style="float: right; margin-bottom: 0px; padding-bottom: 0px;" method="post" action="includes/logout.php">  
                      <li><button type="submit" name="signout" id="signout"  class="btn"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign out</button></li>
                    </form>   
                  </ul>                    
                </div>
              </div>
            </div>
        </div>
  
        <!-- periexomeno main page-->
        <div class="wholepage-border">
            <div class="hero-unit">
                <h1>VST hunt</h1><br>
                <img class="indexpic" src="img/indexpic.jpg" alt="Some digital synths"/><br>
                <p>Welcome to VST hunt!This sites' main goal is to build a massive community of electronic music producers.Here you can find reviews of plugins(from digital synths to mixer effects).Also you can upload your own reviews,helping me expanding the site!Also you can find retailers near your location for most of these plugins by using the embedded map.For any inquiries,ideas for the website,requests or even if you feel alone and just want to talk,feel free to use my contact form!I am looking forward for your messages.Happy navigating!</p>
            </div>
        </div>   
        <div class="site-bottom"><i class="fa fa-creative-commons fa-lg" aria-hidden="true"></i> 2017 made by Gorj 2025201200041.</div>

    </body>   
</html>
