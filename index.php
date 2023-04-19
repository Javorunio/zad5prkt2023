<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Zadanie 5 index</title>
</head>
<body style="font-family: 'Segoe UI';">
<?php
session_start();

if(isset($_SESSION['blad']))
{
    header('Location: login.php');
}
?>
<h3>
<?php
echo "Dzień dobry, ".$_SESSION['imie']." ".$_SESSION['nazwisko'];
?>
</h3>
</body>