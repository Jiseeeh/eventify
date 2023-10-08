<?php
//include "inc/navbar/navbar.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventify</title>
    <link rel="stylesheet" href="global.css">
    <style>
        body {
            min-height: 100vh;
            background: url("public/cvsu.webp") no-repeat;
            background-size: cover;
        }

        main {
            min-height: 100vh;
            backdrop-filter: brightness(0.2);
        }

        nav {
            height: 100px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            position: fixed;
            top: 0;
            left: 0;
        }

        .nav__img {
            height: 100%;
            width: 150px;
            object-fit: cover;
        }

        .nav__btn {
            background: rgba(107, 176, 139, 0.2);
            border: 0;
            padding: .5rem;
            border-radius: 5px;
            color: #93FFC5;
            display: flex;
            align-items: center;
            transition: all .3s ease-in-out;
        }
        
        .nav__btn:hover {
            background: rgba(107, 176, 139, 0.4);
            transform: scale(1.1);
        }

        .nav__btn-link {
            font-weight: bold;
        }

        .nav__btn-svg {
            height: 2rem;
            width: 2rem;
            margin-left: .5rem;
        }
    </style>
</head>
<body>
<main>
    <nav>
        <img class="nav__img" src="/public/eventify-clear.png" alt="eventify logo">
        <button class="nav__btn">
            <a class="nav__btn-link" href="/index.php">Secure a Spot </a>
            <svg class="nav__btn-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
    </nav>

</main>
</body>
</html>
