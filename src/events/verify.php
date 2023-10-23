<?php
include("../config/database.php");

session_start();

try {

    // prevent verification if the role on session is not admin
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'ADMIN') {
        throw new PDOException("You are not allowed to verify.");
    }

    $notice = "";
    $uid = $_GET['uid'];
    $DATE_FORMAT = "Y-m-d H:i:s";

    $sql = "SELECT * FROM student_events WHERE uniq_id = :uid";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['uid' => $uid]);
    $student_event = $stmt->fetch();

    // get event details
    $sql = "SELECT * FROM event WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $student_event->event_id]);
    $event = $stmt->fetch();


    // check if the event is already verified
    if ($student_event->verified == 1) {
        throw new PDOException("You are already verified.");
    }

    // check if current date is still within the start date and end date of the event
    $start_date = strtotime($event->start);
    $end_date = strtotime($event->end);
    $current_date = strtotime(date($DATE_FORMAT));

    if ($current_date >= $start_date && $current_date <= $end_date) {
        $notice = "You are now verified!";
        $sql = "UPDATE student_events SET verified = 1, verified_at = :current_date WHERE uniq_id = :uid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['current_date' => date($DATE_FORMAT), 'uid' => $uid]);
    } else if ($current_date < $start_date) {
        $notice = "You are not allowed to verify yet.";
    } else if ($current_date > $end_date) {
        $notice = "You are not allowed to verify anymore.";
    } else {
        $notice = "Event has ended";
    }

} catch (PDOException $e) {
    $notice = $e->getMessage();

    if ($_ENV['env'] === 'dev') {
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
        Verify
    </title>
    <link rel="stylesheet" href="/global.css">
    <style>
        span {
            text-align: center;
            margin-top: 50px;
            display: block;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <main class="main-wrapper">
        <?php include("../components/navbar.php") ?>
        <span>
            <?php echo $notice ?>
        </span>
    </main>
</body>