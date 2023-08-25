<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //logic and functions
        function displayrequired($fieldname){
            echo "The field \"$fieldname\" is required.<br>";
        }

        function  validateinput($data,$fieldname){
            global $errorcount;
            if(empty($data)){
                displayrequired($fieldname);
                ++$errorcount;
                $retval= "";
            }else {
                $retval = trim($data);
            }
            return $retval;
        }
        //display echo
        function redisplayform($firstname, $lastname){
            ?>
                <form name="scholarship" action="process_scholarship.php" method="post">
                    <label>First Name: </label>
                    <input type="text" name="fname" id="first" value="<?php echo $firstname; ?>"/>
                    <br>
                    <label>Last Name: </label>
                    <input type="text" name="lname" id="last"value="<?php echo $lastname; ?>"/>
                    <br>
                    <br>
                    <p><input type="reset" name="" id="reset" value="Clear Form"></p>
                    <p><input type="submit" name="submit" id="submit" value="Send Form"></p>
                    &nbsp;
                </form>
                <?php
        }

        $errorcount = 0;
        $firstname = validateinput($_POST['fname'], "First Name");
        $lastname = validateinput($_POST['lname'], "Last Name");

        if($errorcount > 0 ) {
            redisplayform($firstname, $lastname);
            echo "<p style='color: red;'>Please Reenter information below!</p><br>";
        } else {
            echo "<h3>Thank you for filling out the scholarship form,  $firstname $lastname ! </h3>";
        }



    ?>
    
</body>
</html>