<?php

function Connection(){
     //připojení k databázi
     
    global $connection;
    $connection = mysqli_connect("localhost", "slamaj", "PesLes23", "joukkouz");
    
    if($connection){
        echo"funguje";
    }
    else{
        die("nefunguje ti to");
    }
    
}

function UpdateFC(){
        global $connection;
        $usermame = $_POST["usermame"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $id = $_POST["id"];
        
        mysqli_real_escape_string($connection, $usermame);
        mysqli_real_escape_string($connection, $password);
        mysqli_real_escape_string($connection, $email);
        
        $query2 = "UPDATE users SET usermame='$usermame', password='$password', email='$email' WHERE id = '$id'";
    
        $result2 = mysqli_query($connection, $query2);
        
        if(!$result2){
            die("query selhalo".mysqli_error());
        }
}

function AddFc(){
    global $connection;
    $usermame = $_POST["usermame"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    
    //escapování inputů
    $usermame = mysqli_real_escape_string($connection, $usermame);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);
    
    
    //hashování hesla
    $hashFormat = "$2y$10$";
    $salt = "D5dfg7HNA1Plje69wz4MBw";
    $hasFormat_salt = $hashFormat.$salt;
    $password = cript($password, $hasFormat_salt);
    
    
    //do mysqli
    $query = "INSERT INTO users(usermame, password, email) VALUES('$usermame','$password','$email')";
    $result = mysqli_query($connection, $query);
    
    if(!$result){
        die("něco ti nefunguje");
    }
}

function SelectFc(){
    
    global $connection;
    global $result;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
}


function DeleteFC(){
        global $connection;
        $usermame = $_POST["usermame"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $id = $_POST["id"];
        
        $query2 = "DELETE FROM users WHERE id = $id";
    
        $result2 = mysqli_query($connection, $query2);
        
        if(!$result2){
            die("query selhalo".mysqli_error());
        }
}
   
?>
