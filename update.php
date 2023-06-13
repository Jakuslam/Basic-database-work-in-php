<?php
//připojení databáze
    include "mysql/db.php";
    Connection();

//výběr dat z databáze 
    SelectFc();
    
    if(isset($_POST["submit"])){
        UpdateFC();
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
    
    <form action="update.php" method="post">
        <input type="text" name="usermame" placeholder="uživatelské jméno">
        <br>
        <input type="password" name="password" placeholder="Heslo">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <select name="id">
<?php 

while($row = mysqli_fetch_assoc($result)){
    $id = $row[id];
    echo '<option value="'.$id.'">'.$id.'</option>';
}

?>
        </select>
        <br>
        <input type="submit" name="submit" value="odeslat">
    </form>
    
</body>
</html>