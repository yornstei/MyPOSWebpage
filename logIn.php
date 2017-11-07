<?php
$valid = array();
$valid[0] = array('user' => 'Joe', 'password' => '1234');
$valid[1] = array('user' => 'Mike', 'password' => '3334');
$valid[2] = array('user' => 'Emily', 'password' => '1204');
$valid[3] = array('user' => 'Zack', 'password' => '1288');
$valid[4] = array('user' => 'Dave', 'password' => '3234');

$validAccount = false;
foreach($valid as $v)
{
    if(array_key_exists ('userName', $_POST) && array_key_exists ('password', $_POST))
    {
    if($v['user'] == $_POST['userName'] && $v['password'] == $_POST['password'])
    {
        $validAccount = TRUE;
    }
    }
}

if($validAccount)
{
    setcookie('LoggedIn', 'TRUE');
    setcookie('userName', $_POST['userName']);
    header("Location:content.php");
    exit();
}
else
{
    setcookie('LoggedIn', 'FALSE');
    header( "refresh:5; url=index.php" ); 
    echo 'Incorrect User Name Or Password.';
}
?>


