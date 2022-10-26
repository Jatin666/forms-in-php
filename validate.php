<html>
    <head>
        <style>
            .error{color: antiquewhite;}

        </style>
    </head>
<body>
    
    
<?php
  $nameErr = $emailErr = $genderErr = $websiteErr =  "";
  $name = $email = $gender = $comment = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])){
        $nameErr ="Please enter a valid name";
    }else{
        $name = test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-z-']*$/",$name)){
            $nameErr ="Only letters are allowed";
        }
    }
}

if(empty($_POST["email"])){
    $emailErr ="Please enter valid email";
}
else{
    $email = test_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL){
        $emailErr = "The email is incorrect"; 
    }
}


if(empty($_POST["website"])){
    $website ="";
}
else{
    $website = test_input($_POST["website"]);
    if(!preg_match("/\b(?:(?:https|ftp):\/\/|www\.)[-a-z0-9+&@$\/%?=~_|!:,/;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
        $websiteErr = "The website is incorrect";
    }
}

if(empty($_POST["comment"])){
    $comment= "";

}
else{
    $comment = test_input($_POST["comment"]);
}
if(empty($_POST["gender"])){
    $gender ="Please select a gender";

}
else{
    $gender = test_input($_POST["gender"]);
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<h2>PHP FORM validation</h2>
<p><span class ="Errpr">* required field </span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
Full Name: <input type ="text" name ="name">
<br><br>
E-mail:  <input type  = "text" name = "email">
<br><br>
Number:  <input type  = "text" name = "number">
<br><br>
Age:  <input type  = "text" name = "age">
<br><br>
Comment:  <textarea name="comment" rows="10" cols="30"> </textarea>
<br><br>
Gender:  <input type  = "radio" name = "gender" value="female">Female
<input type  = "radio" name = "gender" value="Male">Male
<br><br>
<input type  = "submit" name = "Click here" value="click here">
</form>
<?php

echo "<h2>Your Input: </h2>";
echo $name;
echo "<br/>";
echo $email;
echo"<br/>";
echo $website;
echo"<br/>";
echo $comment;
echo"<br/>";
echo $gender;
echo"<br/>";

?>
</body>
</html>