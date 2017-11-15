<?php 
if(array_key_exists ('userName', $_POST) && array_key_exists ('password', $_POST))
{
    $user = $_POST['userName'];
    $pass = $_POST['password'];
}


$mysqli = new mysqli('127.0.0.1', 'root', '', 'mypossystem');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}

$sql = "SELECT * FROM authorizedusers WHERE user_name = '$user'";
if (!$result = $mysqli->query($sql)) {
    
    echo "Sorry, the website is experiencing problems.";

    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

if ($result->num_rows === 0) {
    echo "We could not find a match for ID $user, sorry about that. Please try again.";
    exit;
}

$userRec = $result->fetch_assoc();
//echo "we found " . $actor['first_name'] . " " . $actor['last_name'] . " on TV.";
if ($userRec['password'] == $pass)
{
    setcookie('LoggedIn', 'TRUE');
    setcookie('userName', $_POST['userName']);
    
    if($userRec['role'] == 'admin')
    {
        setcookie('role', 'admin');
        header("Location:admin.php");
    }
    else
    {
        setcookie('role', 'user');
        header("Location:content.php");
    }
    exit();
}
else
{
    setcookie('LoggedIn', 'FALSE');
    header( "refresh:5; url=index.php" ); 
    echo 'Incorrect User Name Or Password.';
}


$result->free();
$mysqli->close();
?>


