<?php
session_start();
include "connexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $email = mysqli_real_escape_string($Login, $_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
    $result = mysqli_query($Login, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user["mot_de_passe"])) {
            $_SESSION["user_id"] = $user["Id"];
            $_SESSION["username"] = $user["Nom"];

            header("Location: index.php"); // Redirection après connexion
            exit();
        } else {
            $_SESSION["error"] = "❌ Mot de passe incorrect.";
            header("Location: interface.php");
            exit();
        }
    } 
    
}else {
        $_SESSION["error"] = "❌ Aucun compte trouvé avec cet email.";
        // header("Location: interface.php");
        // exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- <body>
     <span style="color:red; background-color:black; font-size:50px; font-weight:bold;margin:50px" >aucun compte trouver avec cette email</span> <br>
    <span   style="color:green; background-color:black; font-size:50px; text-align:center">Enregistrez-vous</span>
</body>
</html> -->
