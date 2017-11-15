<?php
        include "header.php";
        
        if($_POST['customerUserName'] == '' || $_POST['customerName'] == '' || $_POST['emailAddress'] == '' || $_POST['address'] == '' || $_POST['city'] == '' || $_POST['states'] == '' || $_POST['zip'] == '' || $_POST['passwordConf'] == '' || $_POST['password'] == '')
        {
            header( "refresh:5; url=signUp.php" ); 
            echo 'Enter All Fields Marked With *.';
            exit();
        }
        
        if($_POST['password'] != $_POST['passwordConf'])
        {
            header( "refresh:5; url=signUp.php" ); 
            echo 'Passwords Didn\'t Match.';
            exit();
        }
        
        
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'new_schema');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}

$sql = "insert into authorizedusers(role, user_name, password) values('user', '".$_POST['customerUserName']."', '". $_POST['passwordConf'] ."')";

$mysqli->query($sql);
        if($mysqli->affected_rows > 0)
        {
            $sql = "select * from authorizedusers where user_name = '".$_POST['customerUserName']."' and password = '". $_POST['passwordConf'] ."'";
            $result = $mysqli->query($sql);
            $userRec = $result->fetch_assoc();
            
            $sql = "insert into customers values(".$userRec['au_id'].", '".$_POST['customerName']."', '".$_POST['address']." ".$_POST['city']." ".$_POST['states']." ".$_POST['zip']."', '".$_POST['emailAddress']."', 0)";
            $mysqli->query($sql);
            if($mysqli->affected_rows>0)
            {
                header( "refresh:5; url=index.php" ); 
                echo 'Account Created Successfully. Log In.';
            }
        }
        else
            echo 'Error Creating Account. error: '. $mysqli->errno;
//        echo "Your name is " . $_POST['customerName'] . "<br>";
//        echo "Your email address is " . $_POST['emailAddress']  . "<br>";
//        echo "Your address is " . $_POST['address']. ", city: " . $_POST['city']. ", state: ".  $_POST['states'] .
//                ", zip: " .$_POST['zip']. "<br>";
//        echo "For gender you selected: ". $_POST['gender']."<br>";
//        
//        if (array_key_exists ('sendNews', $_POST))
//        {
//                 echo "You have requested our newsletter<br>";
//        } else {
//                echo "You have declined our newsletter<br>";
//        }
//        
//        echo "For occupation you selected: "."<br>";
//        print($_POST['occupations']."<br>");
//        echo "This is what you had to say about yourself: "."<br>". $_POST['about'];
        
        include "footer.php";
?>