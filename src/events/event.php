<?php
include('../config/database.php');
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: ../login/login.php');

    die();
}

$sql = "SELECT * FROM event WHERE uniq_id = :uniq_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['uniq_id' => $_GET['uid']]);
$event = $stmt->fetch();

$DEFAULT_IMG_URL = "../../public/events-default.jpg";

$title = $event->title;
$start_date = date("d/m/y-H:i A", strtotime($event->start));
$end_date = date("d/m/y-H:i A", strtotime($event->end));
$image_url = $event->image_url ?? $DEFAULT_IMG_URL;
$remaining_slot = $event->remaining_slot;
$maximum_slot = $event->maximum_slot;
$description = $event->description;

$has_slots = $remaining_slot > 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event</title>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="./event.css">
</head>

<body>
    <?php include("../components/navbar.php") ?>
    <main>
        <article class="main-wrapper">
            <aside>
                <button class="btn">
                    <a href="./events.php" class="btn-link"><- Go back</a>
                </button>
            </aside>
            <h1 class="heading event__title">
                <?php echo $title ?>
            </h1>
            <span class="event__date"> <time>
                    <?php echo $start_date ?>
                </time> || <time>
                    <?php echo $end_date ?>
                </time> </span>
            <div class="event__img-wrapper">
                <img src="<?php echo $image_url ?>" alt="event image" class="event__img">
                <span class="event__slots">slot:
                    <?php echo "$remaining_slot/$maximum_slot" ?>
                </span>
            </div>
            <p class="event__description">
                <?php echo $description ?>

            </p>
            <section style="display: flex; gap:1px;">
                <button class="btn" disabled="<?php echo $has_slots ? "false" : "true" ?>">
                    <?php if ($has_slots) {
                        echo "<a href='./register.php?uid={$event->uniq_id}' class='btn-link'>Register now</a>";
                    } else {
                        echo "<span style='color: var(--error)'>No slots left.</span>";
                    } ?>
                </button>
                <?php
                if ($_SESSION['role'] == 'ADMIN') {
                    echo "<button class='btn btn-link'onclick=onDelete()>Delete</button>";
                }
                ?>
            </section>
        </article>

    </main>
    <script>
        function onDelete() {
            if (confirm('Do you want to delete this event?')) {
                window.location.href = './delete.php?uid=<?php echo $event->uniq_id ?>';
            } else {
                alert("OK\n--ace")
            }
        }
    </script>
</body>

</html>