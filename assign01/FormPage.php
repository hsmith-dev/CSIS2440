<!DOCTYPE html>
<html>
    <head>
        <title>Fantasy Character Generator</title>
        
        <?php
        include '../../include/design_head.php';
        include '../../include/nav.php';
        ?>
    </head>
    <body id="page-top">
        <div class="container-fluid page-section bg-primary text-white mb-0">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 mb-0">
                    <br>
                    <header class="h2">Character Creator</header>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <form method = "post" action = "ResultPage.php">
                        <div class="form-group">
                            <lable for="HeroName">Name</lable>
                            <input type="text" name="HeroName" id="HeroName"><br>
                            <lable for="Race">Race</lable>
                            <select name="Race" id="Race">
                                <option value ="Human">Human</option>
                                <option value ="Elf">Elf</option>
                                <option value ="Halfling">Halfling</option>
                                <option value ="Dwarf">Dwarf</option>
                            </select>
                            <br>
                            <lable for="Class">Class</lable>
                            <select name="Class" id="Class">
                                <option value ="Cleric">Cleric</option>
                                <option value ="Fighter">Fighter</option>
                                <option value ="Magic-User">Magic-User</option>
                                <option value ="Thief">Thief</option>
                            </select>
                            <br>
                            <lable for="Age">Age</lable>
                            <input type="text" name="Age" id="Age">
                            <br>
                            <lable for="Gender">Gender:</lable>
                            <div id="Gender" class="form-check form-check-inline">
                                <input type="radio" value="Male" name="gender" class="form-check-input" id="genderM"><lable for="genderM">Male</lable>  
                                <input type="radio" value="Female" name="gender" class="form-check-input" id="genderF"><lable for="genderF">Female</lable>
                            </div>
                            <br>
                            <lable for="KingdomName">Kingdom</lable>
                            <input type="text" name="KingdomName" id="KingdomName">
                            <br>
                            <input type="submit" name="Create" value="Create Me">              
                            
                        </div>
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        
        <?php
        include '../../include/design_body.php';
        include '../../include/footer.php';
        include '../../include/contact_js.php';
        ?>
    </body>
</html>
