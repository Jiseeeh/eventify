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
            max-width: 80rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .nav__img {
            height: 100%;
            width: 150px;
            object-fit: cover;
        }
        
        .nav__btn-svg {
            height: 2rem;
            width: 2rem;
            margin-left: .5rem;
        }

        .hero {
            display: flex;
            flex-direction: column;
            color: #f5f5f5;
            padding: 3rem;
            max-width: 80rem;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero__heading {
            font-size: clamp(1.5rem, 5vw, 3rem);
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .hero__desc {
            font-size: 1rem;
            line-height: 1.5;
        }
        
        .hero__btn {
            align-self: start;
            margin-top: 1rem;
            padding: .5rem;
        }
        
        .hero__btn-svg {
            height: 1.5rem;
            width: 1.5rem;
            margin-left: .5rem;
        }
    </style>
</head>
<body>
<main>
    <nav>
        <img class="nav__img" src="/public/eventify-clear.png" alt="eventify logo">
        <button class="btn">
            <a class="btn-link" href="/index.php">Secure a Spot </a>
            <svg class="nav__btn-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
    </nav>
    <article class="hero">
        <h1 class="hero__heading">Effortless Registrations</h1>
        <p class="hero__desc">Eventify is a web application that allows you to register for events in a breeze.See
            owner, run in terror get away from me stupid dog dont wait for the storm to pass, dance in the rain. Ooooh
            feather moving feather! i could pee on this if i had the energy yet cat mojo purr like a car engine oh yes,
            there is my human slave woman she does best pats ever that all i like about her hiss meow . Cats are the
            world kitty ipsum dolor sit amet, shed everywhere shed everywhere stretching attack your ankles chase the
            red dot, hairball run catnip eat the grass sniff hate dog, yet sniff sniff while happily ignoring when being
            called stare at owner accusingly then wink. Meowzer meowsiers cat dog hate mouse eat string barf pillow no
            baths hate everything so mark territory. Murf pratt ungow ungow always hungry for licks your face for run
            outside as soon as door open for meow loudly just to annoy owners for open the door, let me out, let me out,
            let me-out, let me-aow, let meaow, meaow! loved it, hated it, loved it, hated it. </p>
        <button class="btn hero__btn"><a class="btn-link" href="">Get Started</a><svg class="hero__btn-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12.089 3.634a2 2 0 0 0 -1.089 1.78l-.001 2.586h-6.999a2 2 0 0 0 -2 2v4l.005 .15a2 2 0 0 0 1.995 1.85l6.999 -.001l.001 2.587a2 2 0 0 0 3.414 1.414l6.586 -6.586a2 2 0 0 0 0 -2.828l-6.586 -6.586a2 2 0 0 0 -2.18 -.434l-.145 .068z" stroke-width="0" fill="currentColor"></path>
            </svg></button>
    </article>
</main>
</body>
</html>
