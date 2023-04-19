<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Zadanie 5 PHP</title>
</head>
<body style="font-family: 'Segoe UI';">
    <h1 style="size: 64px;" >Login panel</h1>
        <form style="font-size: 16px;" method="post">
            <label>Użytkownik:</label>
            <br/>
            <input type="text" name="username">
            <br/>
            <label>Hasło:</label>
            <br/>
            <input type="password" name="password">
            <br/>
            <input type="submit" value="Zaloguj">
            <br/>
        </form>
<div style="size: 20px;">

<?PHP

    if(isset($_POST['password']))
    {

    require_once "config.php";

    $polaczenie = @new mysqli("$host","$dbuser","$dbpass","$db");
    if($polaczenie->connect_errno!=0)
    echo "Błąd: ".$polaczenie->errno;

    else
    {      
        $login = "SELECT * FROM userinfo WHERE username='$_POST[username]' AND password='$_POST[password]'";

        if($rekord = @$polaczenie->query($login))
        {
            $ile = $rekord->num_rows;
            if($ile>0)
            {
                echo "Zalogowano pomyślnie.";

                $pole = $rekord->fetch_assoc();
                $_SESSION['imie'] = $pole['imie'];
                $_SESSION['nazwisko'] = $pole['nazwisko'];
                header('Location: index.php');
                unset($_SESSION['blad']);
            }
            else
            {
                $_SESSION['blad'] = '<span style="color: crimson">Niepoprawne hasło lub login, spróbuj jeszcze raz.</span>';
                echo $_SESSION['blad'];
            }
        }
        $polaczenie->close();
    }
}
?>
</div>
</body>
</html>