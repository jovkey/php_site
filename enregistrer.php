<?php
session_start();
include "connexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $username = mysqli_real_escape_string($Login, $_POST["username"]);
    $name     = mysqli_real_escape_string($Login, $_POST["name"]);
    $email    = mysqli_real_escape_string($Login, $_POST["email"]);
    $password = $_POST["password"];
    $password2= $_POST["password2"];

    if ($password !== $password2) {
        $_SESSION["error"] = "❌ Les mots de passe ne correspondent pas !";
        header("Location: interface.php");
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (Nom, Prenoms, email, mot_de_passe) 
            VALUES ('$username', '$name', '$email', '$passwordHash')";

    if (mysqli_query($Login, $sql)) {
        $user_id = mysqli_insert_id($Login);
        $_SESSION["user_id"] = $user_id;
        $_SESSION["username"] = $username;

        $_SESSION["success"] = "✅ Inscription réussie !";
        header("Location: index.php"); // Redirection après inscription
        exit();
    } else {
        $_SESSION["error"] = "Erreur : connexion echouer " . mysqli_error($Login);
        header("Location: interface.php");
        exit();
    }
}
?>
