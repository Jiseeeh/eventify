<?php
include("../config/database.php");

session_start();

use chillerlan\QRCode\QRCode;

require_once("../../vendor/autoload.php");

$DOMAIN = "http://localhost:3000/src/events/verify.php?uid=";

$notice = "Here is your generated QR Code";
$note = "Take a screenshot of your QR Code.";
$has_slots = true;
try {
    $uid = $_GET['uid'];
    $username = $_SESSION['username'];

    // check if there is really a remaining slot
    $remaining_slot_sql = "SELECT remaining_slot FROM event WHERE uniq_id = :uniq_id";
    $stmt = $pdo->prepare($remaining_slot_sql);
    $stmt->execute(['uniq_id' => $uid]);
    $event = $stmt->fetch();

    if ($event->remaining_slot <= 0) {
        $has_slots = false;
        throw new PDOException("No more remaining slot for this event.");
    }


    // get event id from database using the uid
    $event_id_sql = "SELECT * FROM event WHERE uniq_id = :uniq_id";
    $stmt = $pdo->prepare($event_id_sql);
    $stmt->execute(['uniq_id' => $uid]);
    $event = $stmt->fetch();

    // get user id from db using session username
    $user_id_sql = "SELECT id FROM user WHERE username = :username";
    $stmt = $pdo->prepare($user_id_sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    // insert into student_event table
    $student_event_uniq_id = uniqid();
    $student_event_sql = "INSERT INTO student_events (user_id, event_id, uniq_id) VALUES (:user_id, :event_id, :uniq_id)";
    $stmt = $pdo->prepare($student_event_sql);
    $stmt->execute(['user_id' => $user->id, 'event_id' => $event->id, 'uniq_id' => $student_event_uniq_id]);

    // decrement remaining slot
    $update_event_slot_sql = "UPDATE event SET remaining_slot = remaining_slot - 1 WHERE id = :id";
    $stmt = $pdo->prepare($update_event_slot_sql);
    $stmt->execute(['id' => $event->id]);

    $qrcode = (new QRCode)->render($DOMAIN . $student_event_uniq_id);
} catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        // get uniq_id of the event the user has already registered for
        $notice = "You have already registered for this event";
        $sql = "SELECT uniq_id FROM student_events WHERE user_id = :user_id AND event_id = :event_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $user->id, 'event_id' => $event->id]);
        $student_event = $stmt->fetch();
        $qrcode = (new QRCode)->render($DOMAIN . $student_event->uniq_id);

    } else {
        $note = $e->getMessage();
    }

    if (isset($_ENV['env']) && $_ENV['env'] === 'dev') {
        echo $e->getMessage();
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $event->title ?? "Event" ?>
    </title>
    <link rel="stylesheet" href="/global.css">
    <style>
        .qrcode-wrapper {
            padding: 1rem;
            display: grid;
            place-items: center;
        }

        .qrcode-notice {
            text-align: center;
        }

        .qrcode {
            width: 100%;
            max-width: 30rem;

        }

        .qrcode__note {
            font-weight: bold;
            text-align: center;
        }

        .qrcode__nav {
            width: 100%;
        }

        .qrcode__back-btn {
            background: transparent;
            color: #020403;
        }

        .qrcode__back-btn:hover {
            background: #020403;
            transform: scale(1);
            font-weight: bold;
            color: #F5F5F5
        }
    </style>
</head>

<body>
    <main class="main-wrapper">
        <?php include("../components/navbar.php") ?>
        <article class="qrcode-wrapper">
            <aside class="qrcode__nav">
                <button class="btn qrcode__back-btn">
                    <a href="./event.php?uid=<?php echo $uid ?>" class="btn-link"><- Go back</a>
                </button>
            </aside>
            <?php
            if ($has_slots) {
                echo "<span class='qrcode-notice'>{$notice}</span>";
                echo "<img class='qrcode' src='{$qrcode}' alt='QR Code'/>";
                echo "<span class='error qrcode__note'>{$note}</span>";
            } else {
                echo "<span class='error qrcode__note'>{$note}</span>";
            }
            ?>

        </article>
    </main>
</body>