<?php
        include "header.php";
        
        echo "Your name is " . $_POST['customerName'] . "<br>";
        echo "Your email address is " . $_POST['emailAddress']  . "<br>";
        echo "Your address is " . $_POST['address']. ", city: " . $_POST['city']. ", state: ".  $_POST['states'] .
                ", zip: " .$_POST['zip']. "<br>";
        echo "For gender you selected: ". $_POST['gender']."<br>";
        
        if (array_key_exists ('sendNews', $_POST))
        {
                 echo "You have requested our newsletter<br>";
        } else {
                echo "You have declined our newsletter<br>";
        }
        
        echo "For occupation you selected: "."<br>";
        print($_POST['occupations']."<br>");
        echo "This is what you had to say about yourself: "."<br>". $_POST['about'];
        
        include "footer.php";
?>