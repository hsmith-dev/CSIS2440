<!DOCTYPE html>
<?php
    $advName = $_POST['HeroName'];
    $advRace = $_POST['Race'];
    $advClass = $_POST['Class'];
    $advAge = $_POST['Age'];
    $advGender = $_POST['gender'];
    $advKingdom = $_POST['KingdomName'];
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Assignment 01 - Create a Character Generator">
        <meta name="author" content="Harrison Smith">
        
        <title>Adventurer Created</title>
        <style>
            img {
                height: 250px;
                padding: 3pt;
            }
            p{
                margin-left: 8px;
            }
        </style>
        
        <?php
            // includes the css info, and navigation bar
            include '../../include/design_head.php';
            include '../../include/nav.php';
        ?>
    </head>

    <body id="page-top">
        <!-- Header -->
        <div id="CharacterSheet" class="container-fluid page-section bg-primary text-white mb-0">
            <div class="row">
                <div class="col-md-5">
                    <br>
                    <?php
                    // prints out all variables from post
                    print_r($_POST);
                    ?>
                    <br>
                    <header class="h2">The Brave Adventurer</header>
                    <br>
                </div>
            </div>
            <!-- Character Stats section-->
            <div class="row">
                 <div class="col-md-3 text-center">
                    <?php
                        // prints randomly generated stats for the character
                        $stats = array("Str", "Con", "Dex", "Wis", "Int", "Cha");
                        for($i = 0; $i < 6; $i++){
                            print($stats[$i] . ": " . rand(3, 18) . "<br />");
                        }
                    ?>
                </div>
                
                <!-- Character Description -->
                <div class="col-md-5 text-center">
                    <?php
                        //prints character info
                        printf("<h3>".$advName ." from " . $advKingdom ."</h3>");
                        printf("<p><b>" . $advRace . " " . $advClass . " at the age of " . $advAge . "</b></p>");
                   
                        /**
                         * Reads in the contents for RaceInfo.txt and prints out the corresponding race.
                         */
                        // reads in the content from RaceInfo.txt and stores it in array seperated by '}'
                        $raceInfos = explode("}", file_get_contents("RaceInfo.txt"));
                        
                        // prints the appropriate information on race
                        if($advRace == "Human"){
                            print("<p>" . $raceInfos[0] . "</p>");
                        } else if($advRace == "Elf"){
                            print("<p>" . $raceInfos[1] . "</p>");
                        } else if($advRace == "Dwarf"){
                            print("<p>" . $raceInfos[2] . "</p>");
                        } else if($advRace == "Halfling"){
                            print("<p>" . $raceInfos[3] . "</p>");
                        }
                        
                        /**
                         * Reads in the contents from ClassInfo.txt and prints out the corresponding class.
                         */
                        // reads in the content from ClassInfo.txt and stores it in array seperated by '}'
                        $classInfos = explode("}", file_get_contents("ClassInfo.txt"));
                        // prints the appropriate information on class
                        if($advClass == "Fighter"){
                            print("<p>" . $classInfos[0] . "</p>");
                        } else if($advClass == "Cleric"){
                            print("<p>" . $classInfos[1] . "</p>");
                        } else if($advClass == "Theif"){
                            print("<p>" . $classInfos[2] . "</p>");
                        } else if($advClass == "Magic-User"){
                            print("<p>" . $classInfos[3] . "</p>");
                        }
                   ?>
                </div>
                
                <!-- Picture Section -->
                <div class="col-md-4 text-center">
                    <?php
                    // converts class, gender and race to format the images are named.
                    $classAbr = substr($advClass, 0, 2);
                    $genderAbr = substr($advGender, 0, 2);
                    $raceAbr = substr($advRace, 0, 2);
                    // prints image relating to the correct class, gender, race
                    print("<img src = 'images/$raceAbr$classAbr$genderAbr.jpg' alt='Character Image'/>");
                    ?>
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
