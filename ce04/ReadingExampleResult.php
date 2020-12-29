<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$CapName = htmlentities($_POST['CapName']);
$CapName = strtolower($CapName);
$CapName = ucwords($CapName);
$CapAge = $_POST['CapAge'];
$ShipName = $_POST['ShipName'];
?>
<html>
    <head>
        <title>Captain Results Page</title>
        <?php 
            include '../../include/design_head.php';
            include '../../include/nav.php';
        ?>
    </head>
    <body>
        <div class="container-fluid page-section bg-primary text-white mb-0">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <br>
                        <?php
                            $pos = 0;
                            print("<p class='title'>Captain $CapName at the Age of $CapAge took over the "
                                    . "ship $ShipName and here is some of their past</p>");
                            $EarlyFile = fopen("EarlyYears.txt", "r") or die ("Unable to open file!");
                            while(!feof($EarlyFile)){
                                $randomEarly[$pos] = fgets($EarlyFile);
                                $pos++;
                            }
                            fclose($EarlyFile);

                            shuffle($randomEarly);
                            print("<p>The early Career started with:<ul><li>" 
                                    . $randomEarly[0] . "</li><li>" . $randomEarly[1] . "</li></ul></p>");

                            if($CapAge > 25){
                                $tous = 4 + ($CapAge - 26);
                            } else {
                                $tours = floor(($CapAge - 17) / 2);
                            }
                            $randomTours = explode("\n",file_get_contents("Tours.txt"));
                            shuffle($randomTours);
                            print("<p>The career looks like this<ul>");
                            for($y = 0; $y < $tours; $y++){
                                print("<li>" . randomTours[$y] . "</li>");
                            }
                            print("</ul></p>")
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include '../../include/design_body.php';
            include '../../include/footer.php';
            include '../../include/contact_js.php';
        ?>
    </body>
</html>
