<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Classroom Exercise 02">
        <meta name="author" content="Harrison Smith">
        <title>Random Page</title>
        
        <link rel="icon" href="/img/favicon.svg">
    </head>
    <body>
        <?php
        $score = 0;
        print("<table><tr><th>Player</th><th>Computer</th><th>Rounds</th></tr>\n");
        // this for loop should run ten round and compare the player scores to computer scores
        for($round = 0; $round < 10; $round++){
            $playerscore = rand(1, 100);
            $compscore = rand(1,100);
            //this if statement will check the player and computer score and ajust $score
            if($playerscore < $compscore){
                print("<td>Player lost this round</td></tr>\n");
                $score--;
            }
            elseif ($playerscore > $compscore){
                print("<td>PLayer won this round</td></tr>\n");
                $score++;
            }
            else{
                print("<td>PLayer tied this round</td></tr>\n");
            }
        }
        print("<tr><td colspan=2>$score</td><td>Player Score</td></tr><table>\n");
        ($score>0)?Print("Good Job :)"):Print("Sorry, you lost :(");
        
        //Year of the---
        $year = date("Y");
        print("<p>It is the year of the:<br>");
        //here is a switch which will use a modulos of 12 to print out the year of the (animal here)
        switch($year % 12){
            case 0:
                echo 'Monkey</p>';
                break;
            case 1:
                echo 'Rooster</p>';
                break;
            case 2:
                echo 'Dog</p>';
                break;
            case 3:
                echo 'Boar</p>';
                break;
            case 4: 
                echo 'Rat</p>';
                break;
            case 5:
                echo 'Ox</p>';
                break;
            case 6:
                echo 'Tiger</p>';
                break;
            case 7:
                echo 'Rabbit</p>';
                break;
            case 8:
                echo 'Dragon</p>';
                break;
            case 9:
                echo 'Snake</p>';
                break;
            case 10:
                echo 'Horse</p>';
                break;
            case 11:
                echo 'Lamb</p>';
                break;
            default:
                echo 'Something broke</p>';
        }
        ?>
    </body>
</html>