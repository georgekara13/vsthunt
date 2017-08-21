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
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script src="https://use.fontawesome.com/64340464e8.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
        <style type="text/css">
            a.fancybox img {
                border: none;
                box-shadow: 0 1px 7px rgba(0,0,0,0.6);
                -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
            } 
            a.fancybox:hover img {
                position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
            }
        </style>
         <!--<script src="js/jquery/jquery.js"></script>-->
        <script src="http://code.jquery.com/jquery.js"></script>
        <!--<script src="js/bootstrap.js"></script>-->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body>
        <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">Error Logging In!</p>';
            }
        ?>
        <!--modal window gia login-->
        <div class="modal fade hide" id="loginModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" align="center">User sign in</h5>
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>-->
                      </div>
                         
                    <form id="loginform" class="form-horizontal" role="form" method="post" action="includes/process_login.php">
                      <div class="modal-body">
                        <!--<form id="loginform" class="form-horizontal" role="form">-->
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                        <input id="username" class="form-control" name="username" value="" placeholder="username" type="text">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>&nbsp;
                                        <input id="password" class="form-control" name="password" placeholder="password" type="password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" name="remember" value="1" type="checkbox"> Remember me
                                        </label>
                                      </div>
                                    </div>


                      


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                            Don't have an account? 
                                        <a href="#" onclick="$('#loginModal').hide(); $('#signupModal').show();">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>   
                            <!--</form>-->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="formhash(this.form, this.form.password);">Login</button>
                      </div>
                    </form>
                    </div>
                  </div>
        </div>
        <?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            //echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        //echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
        ?> 
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <!--modal window gia sign up-->
        <div class="modal fade hide" id="signupModal"  role="dialog" aria-labelledby="signupmodallabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="signupmodallabel" align="center">User sign up</h5>
                    
                      </div>
                      <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="registration_form">  
                      <div class="modal-body">
                        <!--<form class="form-horizontal" action='' method="POST">-->
                          <fieldset>
                            <!--<div id="legend">
                              <legend class="">Register</legend>
                            </div>-->
                            <div class="control-group">
                              <!-- first name -->
                              <label class="control-label"  for="firstname">First name</label>
                              <div class="controls">
                                <input type="text" id="firstname" name="firstname" placeholder="Input your first name" class="input-xlarge">
                                
                              </div>
                            </div>
                            <div class="control-group">
                              <!-- last name -->
                              <label class="control-label"  for="lastname">Last name</label>
                              <div class="controls">
                                <input type="text" id="lastname" name="lastname" placeholder="Input your last name" class="input-xlarge">
                                
                              </div>
                            </div>    
                            <div class="control-group">
                              <!-- Username -->
                              <label class="control-label"  for="username">Username</label>
                              <div class="controls">
                                <input type="text" id="username" name="username" placeholder="Can only contain alphanumeric characters" class="input-xlarge">
                                <!--<p class="help-block">Username can contain any letters or numbers, without spaces</p>-->
                              </div>
                            </div>

                            <div class="control-group">
                              <!-- E-mail -->
                              <label class="control-label" for="email">E-mail</label>
                              <div class="controls">
                                <input type="text" id="email" name="email" placeholder="Input your e-mail" class="input-xlarge">
                                <!--<p class="help-block">Please provide your E-mail</p>-->
                              </div>
                            </div>

                            <div class="control-group">
                              <!-- Password-->
                              <label class="control-label" for="password">Password</label>
                              <div class="controls">
                                <input type="password" id="password" name="password" placeholder="Password should be at least 6 characters" class="input-xlarge">
                                <!--<p class="help-block">Password should be at least 4 characters</p>-->
                              </div>
                            </div>

                            <div class="control-group">
                              <!-- Password -->
                              <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                              <div class="controls">
                                <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your password" class="input-xlarge">
                                <!--<p class="help-block">Please confirm password</p>-->
                              </div>
                            </div>

                            <!--<div class="control-group">
                              
                              <div class="controls">
                                <button class="btn btn-success">Register</button>
                              </div>
                            </div>-->
                          </fieldset>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button"  onclick="return regformhash(this.form,this.form.firstname,this.form.lastname,this.form.username,this.form.email,this.form.password,this.form.password_confirm);" class="btn btn-primary">Sign up</button>
                      </div>
                      </form>      
                    </div>
                  </div>
        </div> 
        <!--clear to textfield twn modal sto kleisimo-->
        <script>$('#loginModal').on('hidden.bs.modal', function (e) {
            $(this)
              .find("input,textarea,select")
                 .val('')
                 .end()
              .find("input[type=checkbox], input[type=radio]")
                 .prop("checked", "")
                 .end();
        });</script>
        <script>$('#signupModal').on('hidden.bs.modal', function (e) {
            $(this)
              .find("input,textarea,select")
                 .val('')
                 .end()
              .find("input[type=checkbox], input[type=radio]")
                 .prop("checked", "")
                 .end();
        });</script>
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
                    <li><a href="index.php">Index</a></li>
                    <li class="divider-vertical"></li>
                    <li class="active"><a href="plugin_list.php">Browse plugins</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="vendors_map.php">Vendors map</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="contact_form.php">Contact me</a></li>
                    <li class="divider-vertical"></li>
                  </ul>
          
                  <ul class="nav pull-right">
                    <li><button type="button" class="btn" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user-circle" aria-hidden="true"></i>  Sign in</button></li>
                    <li class="divider-vertical"></li>
                    <li><button type="button" class="btn" data-toggle="modal" data-target="#signupModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</button></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
        
        <div class="wholepage-border">
            <div class="hero-unit">
                <h1>Plugin list</h1><br>
     
                    <div class="btn-group pull-right">
                        ::before
                            <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
                              Show plugins by category
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Show All Plugins</a></li>
                                <li><a href="#">Digital synths only</a></li>
                                <li><a href="#">Mixer effects only</a></li>
                            </ul>
                        ::after
                    </div>
                <br><br>
                <table class="table table-responsive table-hover">
                    <thead>
                      <tr>
                        <th>Ranking</th>
                        <th>&nbsp;&nbsp;&nbsp;Name</th>
                        <th>Category</th>
                        <th>Image thumbnail</th>
                        <th>Rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      </tr>
                    </thead>  
                    <!-- ta thumbs na ta 8etw 20% resizing-->
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td><a href="https://www.xferrecords.com/products/serum" target="_blank"/>Xfer Serum</td>
                        <td>Digital synth</td>
                        <td><img class="fancybox" src="img/xfer-serum-thumb.jpg" data-big="img/xfer-serum.jpg" alt="Xfer Serum preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="1star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="1star-5"></label>
                                        <input class="star star-4" id="1star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="1star-4"></label>
                                        <input class="star star-3" id="1star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="1star-3"></label>
                                        <input class="star star-2" id="1star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="1star-2"></label>
                                        <input class="star star-1" id="1star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="1star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td><a href="https://www.native-instruments.com/en/products/komplete/synths/massive/" target="_blank"/>NI Massive</td>
                        <td>Digital synth</td>
                        <td><img class="fancybox" src="img/ni-massive-thumb.jpg" data-big="img/ni-massive.jpg" alt="NI massive preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                      <input class="star star-5" id="2star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="2star-5"></label>
                                        <input class="star star-4" id="2star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="2star-4"></label>
                                        <input class="star star-3" id="2star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="2star-3"></label>
                                        <input class="star star-2" id="2star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="2star-2"></label>
                                        <input class="star star-1" id="2star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="2star-1"></label>
                                    </form>
                            </div>
                        </td>  
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td><a href="https://www.izotope.com/en/products/create-and-design/trash.html" target="_blank"/>izotope trash 2</td>
                        <td>Mixer effect</td>
                        <td><img class="fancybox" src="img/izotope-trash2-thumb.jpg" data-big="img/izotope-trash2.jpg" alt="izotope trash 2 preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="3star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="3star-5"></label>
                                        <input class="star star-4" id="3star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="3star-4"></label>
                                        <input class="star star-3" id="3star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="3star-3"></label>
                                        <input class="star star-2" id="3star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="3star-2"></label>
                                        <input class="star star-1" id="3star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="3star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td><a href="https://www.tone2.com/html/gladiator%202%20vsti%20au%20synthesizer.html" target="_blank"/>Tone2 Gladiator2</td>
                        <td>Digital synth</td>
                        <td><img class="fancybox" src="img/tone2-gladiator-thumb.jpg" data-big="img/tone2-gladiator.jpg" alt="Tone2 Gladiator 2 preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="4star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="4star-5"></label>
                                        <input class="star star-4" id="4star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="4star-4"></label>
                                        <input class="star star-3" id="4star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="4star-3"></label>
                                        <input class="star star-2" id="4star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="4star-2"></label>
                                        <input class="star star-1" id="4star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="4star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td><a href="http://www.fabfilter.com/products/pro-q-2-equalizer-plug-in" target="_blank"/>Fabfilter Pro-Q 2</td>
                        <td>Mixer effect</td>
                        <td><img class="fancybox" src="img/fabfilter-proq2-thumb.jpg" data-big="img/fabfilter-proq2.jpg" alt="Fabfilter Pro-Q 2 preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="5star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="5star-5"></label>
                                        <input class="star star-4" id="5star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="5star-4"></label>
                                        <input class="star star-3" id="5star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="5star-3"></label>
                                        <input class="star star-2" id="5star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="5star-2"></label>
                                        <input class="star star-1" id="5star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="5star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                       <tr>
                        <th scope="row">6</th>
                        <td><a href="http://illformed.com/glitch/" target="_blank"/>dblue Glitch 2</td>
                        <td>Mixer effect</td>
                        <td><img class="fancybox" src="img/dblue-glitch2-thumb.jpg" data-big="img/dblue-glitch2.jpg" alt="dblue Glitch 2 preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="6star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="6star-5"></label>
                                        <input class="star star-4" id="6star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="6star-4"></label>
                                        <input class="star star-3" id="6star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="6star-3"></label>
                                        <input class="star star-2" id="6star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="6star-2"></label>
                                        <input class="star star-1" id="6star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="6star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td><a href="https://www.lennardigital.com/sylenth1/" target="_blank"/>Lennar Digital Sylenth1</td>
                        <td>Digital synth</td>
                        <td><img class="fancybox" src="img/lennardigital-sylenth1-thumb.jpg" data-big="img/lennardigital-sylenth1.jpg" alt="Lennar digital Sylenth1 preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="7star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="7star-5"></label>
                                        <input class="star star-4" id="7star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="7star-4"></label>
                                        <input class="star star-3" id="7star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="7star-3"></label>
                                        <input class="star star-2" id="7star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="7star-2"></label>
                                        <input class="star star-1" id="7star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="7star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td><a href="https://www.refx.com/nexus/" target="_blank"/>refx Nexus 2</td>
                        <td>Digital synth</td>
                        <td><img class="fancybox" src="img/refx-nexus2-thumb.jpg" data-big="img/refx-nexus2.jpg" alt="refx Nexus 2 preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="8star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="8star-5"></label>
                                        <input class="star star-4" id="8star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="8star-4"></label>
                                        <input class="star star-3" id="8star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="8star-3"></label>
                                        <input class="star star-2" id="8star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="8star-2"></label>
                                        <input class="star star-1" id="8star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="8star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td><a href="https://valhalladsp.com/shop/reverb/valhalla-room/" target="_blank"/>ValhallaDSP Valhalla Room</td>
                        <td>Mixer effect</td>
                        <td><img class="fancybox" src="img/valhalladsp-valhallaroom-thumb.jpg" data-big="img/valhalladsp-valhallaroom.jpg" alt="valhallaDSP valhalla room preview" /></td>
                        <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="9star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="9star-5"></label>
                                        <input class="star star-4" id="9star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="9star-4"></label>
                                        <input class="star star-3" id="9star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="9star-3"></label>
                                        <input class="star star-2" id="9star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="9star-2"></label>
                                        <input class="star star-1" id="9star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="9star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td><a href="http://www.fabfilter.com/products/saturn-multiband-distortion-saturation-plug-in/" target="_blank"/>Fabfilter Saturn</td>
                        <td>Mixer effect</td>
                        <td><img class="fancybox" src="img/fabfilter-saturn-thumb.jpg" data-big="img/fabfilter-saturn.jpg" alt="Fabfilter Saturn preview" /></td>
                       <td>
                            <div class="stars">
                                    <form action="">
                                        <input class="star star-5" id="10star-5" type="radio" name="star"/>
                                        <label class="star star-5" for="10star-5"></label>
                                        <input class="star star-4" id="10star-4" type="radio" name="star"/>
                                        <label class="star star-4" for="10star-4"></label>
                                        <input class="star star-3" id="10star-3" type="radio" name="star"/>
                                        <label class="star star-3" for="10star-3"></label>
                                        <input class="star star-2" id="10star-2" type="radio" name="star"/>
                                        <label class="star star-2" for="10star-2"></label>
                                        <input class="star star-1" id="10star-1" type="radio" name="star"/>
                                        <label class="star star-1" for="10star-1"></label>
                                    </form>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                </table>
                
            </div>
        </div>   
        <div class="site-bottom"><i class="fa fa-creative-commons fa-lg" aria-hidden="true"></i> 2017 made by Gorj 2025201200041.</div>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
        <script type="text/javascript">
            $(function($){
                var addToAll = false;
                var gallery = true;
                var titlePosition = 'inside';
                $(addToAll ? 'img' : 'img.fancybox').each(function(){
                    var $this = $(this);
                    var title = $this.attr('title');
                    var src = $this.attr('data-big') || $this.attr('src');
                    var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
                    $this.wrap(a);
                });
                if (gallery)
                    $('a.fancybox').attr('rel', 'fancyboxgallery');
                $('a.fancybox').fancybox({
                    titlePosition: titlePosition
                });
            });
            $.noConflict();
        </script>
    </body>   
</html>
