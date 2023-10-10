<?php
include('../config/database.php');

$MIN_USERNAME_LENGTH = 6;
$MAX_USERNAME_LENGTH = 12;

$username = $password = $repeatPassword = "";
$usernameErr = $passwordErr = '';

if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $repeatPassword = filter_input(INPUT_POST, 'repeatPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (strlen($username) > $MAX_USERNAME_LENGTH) {
        $usernameErr = "Username is too long.";
    } elseif (strlen($username) < $MIN_USERNAME_LENGTH) {
        $usernameErr = "Username is too short.";
    }

    if ($password !== $repeatPassword) {
        $passwordErr = "Passwords do not match.";
    }

    // hash password only if there are no errors
    if (empty($usernameErr) && empty($passwordErr)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username, 'password' => $hashedPassword]);
            header('Location: /src/login/login.php');
        } catch (PDOException $e) {
            // check if message contains username_uniq
            if (strpos($e->getMessage(), 'username_uniq') !== false) {
                $usernameErr = "Username already exists.";
            }

            if ($_ENV['env'] === 'dev') echo $e->getMessage();
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <main class="sections-wrapper">
        <section class="left-section">
            <img src="/public/eventify-clear-black.png" alt="eventify logo" class="logo left-section__img" onclick="window.location = '/index.html'">
            <h1 class="left-section__heading">Create an Account</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="left-section__form">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
                <?php if ($usernameErr) echo "<span class='error'>{$usernameErr}</span>" ?>
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
                <label for="repeatPassword">Repeat Password</label>
                <input id="repeatPassword" name="repeatPassword" type="password">
                <?php if ($passwordErr) echo "<span class='error'>{$passwordErr}</span>" ?>
                <span>Already have an account? <a class="left-section__form__login-link" href="/src/login/login.php">Login</a></span>
                <button class="left-section__form__btn" type="submit" name="submit">Sign Up</button>
            </form>
        </section>
        <section class="right-section">
            <section class="right-section__content">
                <h1 class="right-section__content__heading">Welcome to the Underworld</h1>
                <p class="right-section__content__description">Zombie ipsum brains reversus ab cerebellum viral inferno,
                    brein nam rick mend grimes malum cerveau cerebro. De carne cerebro lumbering animata cervello corpora
                    quaeritis. Summus thalamus brains sit​​, morbo basal ganglia vel maleficia? De braaaiiiins apocalypsi
                    gorger omero prefrontal cortex undead survivor fornix dictum mauris. Hi brains mindless mortuis limbic
                    cortex soulless creaturas optic nerve, imo evil braaiinns stalking monstra hypothalamus adventus resi
                    hippocampus dentevil vultus brain comedat cerebella pitiutary gland viventium. Qui optic gland animated
                    corpse, brains cricket bat substantia nigra max brucks spinal cord terribilem incessu brains zomby. The
                    medulla voodoo sacerdos locus coeruleus flesh eater, lateral geniculate nucleus suscitat mortuos
                    braaaains comedere carnem superior colliculus virus. Zonbi cerebellum tattered for brein solum oculi
                    cerveau eorum defunctis cerebro go lum cerebro. Nescio brains an Undead cervello zombies. Sicut thalamus
                    malus putrid brains voodoo horror. Nigh basal ganglia tofth eliv ingdead.

                </p>
            </section>
        </section>
    </main>
</body>

</html>