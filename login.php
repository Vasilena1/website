<?php
    session_start();

    echo "<pre>";
    var_dump($_GET);
    echo "<pre>";

    $logMail = $_GET["email"];
    $logPass = $_GET["password"];

    echo "<pre>";
    $servername = "localhost";
    $username = "root";
    $password = "12345678";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=website",$username,$password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $PDOstatement = $connection->prepare("SELECT * FROM users");
        $PDOstatement -> execute();

        $PDOstatement -> setFetchMode(PDO::FETCH_ASSOC);
        $data = $PDOstatement -> fetchAll();

        for($i = 0; $i < count($data); $i++){
            $currentRow = $data[$i];
            $username = $currentRow["username"];
            $email = $currentRow["email"];
            $password = $currentRow["password"];

            if ($logMail == $email && $logPass == $password) {
                unset($_SESSION["loginSuccess"]);
                $_SESSION["loginSuccess"] = "loginSuccess";
                unset($_SESSION["username"]);
                $_SESSION["username"] = $username;
                header("Location: home.php");
                die();
            }
        }

    } catch(PDOException $e) {
        echo "Connection failed: ". $e -> getMessAge();
    }

    unset($_SESSION["loginError"]);
    $_SESSION["loginError"] = "loginError";
    header("Location: login.php");
?>