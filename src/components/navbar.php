<?php
$btn_content = "Logout";
$btn_link = "/src/logout.php";

if (!isset($_SESSION['username'])) {
    $btn_content = "Login";
    $btn_link = "/src/login/login.php";
}

?>


<style>
    nav {
        height: 120px;
        max-width: 80rem;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
    }

    .nav__img {
        width: 150px;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .nav__btn {
        background-color: #2A9F5D;
        color: #fff;
    }

    .nav__btn:hover {
        background: hsl(146, 58%, 25%);
        transform: scale(1.1);
    }
</style>
<nav>
    <img class="nav__img" src="/public/eventify-clear-black.png" alt="eventify logo" class="logo"
        onclick="window.location = '/index.html'">
    <button class="btn nav__btn"><a href="<?php echo $btn_link ?>" class="btn-link">
            <?php echo $btn_content ?>
        </a></button>
</nav>