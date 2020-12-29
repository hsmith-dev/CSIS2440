<!DOCTYPE html>
<?php
//get post and connect to DB

require_once 'DataBaseConnection.php';
//print_r($_POST);
$sneaky = $_POST['sneaky'];
$firstName = $_POST['FirstName'];
$lastName = $_POST['LastName'];
$email = $_POST['EMail'];
$dob = $_POST['DOB'];
$pass = $_POST['Pass'];
$action = $_POST['Action'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Player Form</title>
        <?php 
            include 'Header.php';
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6"><header class="h2">Player Account Info</header></div>
                <div class="col-sm-2"></div>
            </div>
                <div class="col-sm-8">
                    <form method = "post" action = "PlayerForm.php" class="form-horizontal">
                        <div class="form-group">
                            <?php
                            if (isset($_POST['Submit']) || $sneaky == 1) {
                                //do the task we need to do using a switch
                                print("<fieldset>");
                                switch ($action) {
                                    case "Insert":
                                        include 'Add.php';
                                        break;
                                    case"Update":
                                        include 'Amend.php';
                                        break;
                                    case"Search":
                                        include 'Search.php';
                                        break;
                                    default: print("Something is wrong");
                                }
                                print<<<HTML
                                <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="UnSubmit">Submit</label>
  <div class="col-md-4">
    <input id="submit" name="UnSubmit" class="btn btn-primary" type="submit"></input>
  </div>
</div>
    <input type='hidden' value=0 name='sneaky'></input></fieldset>
HTML;
                            } else {
                                //show the form
                                print <<<HTML
<fieldset>

<!-- Form Name -->
<legend>Player Form</legend>

<!-- First Name input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="FirstName">First Name</label>  
  <div class="col-md-6">
  <input id="FirstName" name="FirstName" type="text" placeholder="John" class="form-control input-md" required="">
  <span class="help-block">First name of player</span>  
  </div>
</div>

<!-- Last Name input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="LastName">Last Name</label>  
  <div class="col-md-6">
  <input id="LastName" name="LastName" type="text" placeholder="Doe" class="form-control input-md" required="">
  <span class="help-block">Last Name of player</span>  
  </div>
</div>

<!-- Email input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="EMail">E-Mail</label>  
  <div class="col-md-6">
  <input id="EMail" name="EMail" type="text" placeholder="john@doe.com" class="form-control input-md">
  <span class="help-block">Email of player</span>  
  </div>
</div>

<!-- Birthdate input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="DOB">Birthdate</label>  
  <div class="col-md-6">
  <input name="DOB" type="text" id="DOB" placeholder="MM/DD/YYYY">
  <span class="help-block">Select player birthdate</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="Pass">Password</label>  
  <div class="col-md-6">
  <input id="Pass" name="Pass" type="password">
  <span class="help-block">Enter password</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-6 control-label" for="Action">Select One</label>
  <div class="col-md-6">
    <select id="Action" name="Action" class="form-control">
      <option value="Insert">Add</option>
      <option value="Update">Update</option>
      <option value="Search">Search</option>
    </select>
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-6 control-label" for="Submit"></label>
  <div class="col-md-6">
    <input id="submit" name="Submit" class="btn btn-primary" type="submit"></input>
  </div>
</div>                                
<input type="hidden" value=1 name="sneaky"></input>
</fieldset>
HTML;

                            }
                            ?>
                        </div>
                    </form>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
            <?php
            if(isset($_SESSION['badPass'])){
                echo "<br>Username or password does not match";
            }
                include 'Footer.php';
            ?>
    </body>
</html>
