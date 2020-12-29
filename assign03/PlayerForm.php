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

        <script>
          function validLogin() {
            var error = false;
            var nameExpression = /^[a-zA-Z]+$/;
            console.log("Validating");
            console.log(document.getEleemtnById("$Email").value);
            if (document.getElementById("FirstName").value == "" || !document.getElementById("FirstName").value.match(nameExpression)){
              cosole.log("FirstName");
              document.getElementById("FirstName").classList.add("is-invalid");
              error = true;
            }
            if (document.getElementById("LastName").value == "" || !document.getElementById("LastName").value.match(nameExpression)){
              cosole.log("LastName");
              document.getElementById("LastName").classList.add("is-invalid");
              error = true;
            }          
            if(error == true){
              return false;
            }
          }

          function checkFilled(){
            var error = false;
            var emailExpression = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            var passwordExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
            var phoneExpression = /^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/;
            var dobExpression = /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;
            
            if (document.getElementById("Email").value == "" || !emailExpression.test(document.getElementById("Email").value)){
              cosole.log("Email");
              document.getElementById("Email").classList.add("is-invalid");
              error = true;
            }
            if(document.getElementById("Password").value == "" || !document.getElementById("Password").value.match(passwordExpression)){
              cosole.log("Password");
              document.getElementById("Password").classList.add("is-invalid");
              error = true;
            }
            if(document.getElementById("Phone").value == "" || !document.getElementById("Phone").value.match(phoneExpression)){
              console.log("Phone");
              document.getElementId("Phone").classList.add("is-invalid");
              error = true;
            }
            if(document.getElementById("DOB").value == "" || !document.getElementById("DOB").value.match(dobExpression)){
              console.log("DOB");
              document.getElementId("DOB").classList.add("is-invalid");
              error = true;
            }
            if(error == true){
              return false;
            }
          }
        </script>

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
                                        $check = checkFilled();
                                        if($check != false){
                                          include 'Add.php';
                                        }
                                        break;
                                    case"Update":
                                        $check = checkFilled();
                                        if($check != false){
                                        include 'Amend.php';
                                        }
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
  </div>
</div>

<!-- Last Name input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="LastName">Last Name</label>  
  <div class="col-md-6">
  <input id="LastName" name="LastName" type="text" placeholder="Doe" class="form-control input-md" required="">
  </div>
</div>

<!-- Email input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="EMail">E-Mail</label>  
  <div class="col-md-6">
  <input id="EMail" name="EMail" type="text" placeholder="john@doe.com" class="form-control input-md">
  </div>
</div>

<!-- Birthdate input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="DOB">Birthdate</label>  
  <div class="col-md-6">
  <input name="DOB" type="text" id="DOB" placeholder="MM/DD/YYYY">
  </div>
</div>

<!-- Birthdate input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="Phone">Phone Number</label>  
  <div class="col-md-6">
  <input name="Phone" type="text" id="Phone" placeholder="5555551234">
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="Pass">Password</label>  
  <div class="col-md-6">
  <input id="Pass" name="Pass" type="password">
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
    <input id="submit" name="Submit" class="btn btn-primary" type="submit" onclick="return validLogin()"></input>
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
