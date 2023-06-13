<?php

    include "mysql/db.php";
    Connection();

//výběr dat z databáze 
    $query = "SELECT * FROM users";
    
    $result = mysqli_query($connection, $query);
    
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
    
    <form action="infoOClv.php" method="post">
        <select name="id">
<?php
$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($result)){
    $id = $row[id];
    echo '<option value="'.$id.'">'.$id.'</option>';
}
?>
        </select>
        
         <input type="submit" name="submit" value="odeslat">
        
    </form>
    
<?php 
   
if(isset($_POST["submit"])){ //spustí se při zmáčknutí tlačítka
            
    $ids = $_POST["id"]; //zjistí id
    
    for($i = 0; $i >= 0; $i++){ //hledá odkoud má vzít informace
    
        $result = mysqli_query($connection, $query);
        $something = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $S1 = $something["$i"];
        $id = $S1["id"];
        
        if($id == $ids){ //pokud se shoduje zadané id s najitým, tak se vypíše celá buňka
            $S1 = $something["$i"];
            echo "<br> Id: ".$S1["id"]."<br> Uživatelské jméno: ".$S1["usermame"]."<br> Email: ".$S1["email"];
            break;
        } 
    }
            
}
?>    
</body>
</html>