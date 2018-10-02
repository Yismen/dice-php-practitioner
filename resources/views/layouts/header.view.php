<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dice App</title>
    <link rel="stylesheet" href="/public/css/bulma/css/bulma.css">
</head>
<body>

<?php
    if (! isset($navigation) || $navigation !== false) {
        view('layouts.navigation');
    }
?>