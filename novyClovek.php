<?php 

    include "mysql/db.php";
    Connection();
    
    if(isset($_POST["submit"])){
        AddFc();
    }
    
?>

<!DOCTYPE html>
<html lang="cz-cs">
<head>
    <meta carset="utf=8">
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    
    <title></title>
    
    <link rel="stylesheet" href="">
    
</head>

<body>
    
    <form action="novyClovek.php" method="post">
        
        <input type="text" name="usermame" placeholder="uživatelské jméno">
        <br>
        <input type="password" name="password" placeholder="Heslo">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="submit" name="submit" value="odeslat">
        
    </form>
    
</body>
</html>