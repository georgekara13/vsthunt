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
                    <li><a href="plugin_list.php">Browse plugins</a></li>
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
  
        <!-- periexomeno main page-->
        <div class="wholepage-border">
            <div class="hero-unit">
                <h1>Message sent successfully</h1><br>
                <p>Thanks for submitting your message using our form!</p>
            </div>
        </div>   
        <div class="site-bottom"><i class="fa fa-creative-commons fa-lg" aria-hidden="true"></i> 2017 made by Gorj 2025201200041.</div>

    </body>   
</html>

