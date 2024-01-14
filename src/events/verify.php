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

    // get user details
    $sql = "SELECT * FROM user WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $student_event->user_id]);
    $user = $stmt->fetch();

    // check if current date is still within the start date and end date of the event
    $start_date = strtotime($event->start);
    $end_date = strtotime($event->end);
    $current_date = strtotime(date($DATE_FORMAT, time()));

    if ($current_date >= $start_date && $current_date < $end_date) {
        // check if the user is already verified and will be verifying for the time out 
        if ($student_event->verified == 0) {
            $notice = "{$user->username} is now verified for {$event->title}.";
            $sql = "UPDATE student_events SET verified = verified + 1, time_in = :current_date WHERE uniq_id = :uid";
            $stmt = $pdo->prepare($sql);
            $current_date = date($DATE_FORMAT, $current_date);
            $stmt->execute(['current_date' => $current_date, 'uid' => $uid]);

        } else if ($student_event->verified == 1) {
            $notice = "{$user->username} is already verified for {$event->title}'s time out";
            $sql = "UPDATE student_events SET verified = verified + 1, time_out = :current_date WHERE uniq_id = :uid";
            $stmt = $pdo->prepare($sql);
            $current_date = date($DATE_FORMAT, $current_date);
            $stmt->execute(['current_date' => $current_date, 'uid' => $uid]);
        } else {
            $notice = "{$user->username} is already verified for {$event->title}'s time in and out";
        }

    } else if ($current_date < $start_date) {
        $notice = "You are not allowed to verify yet.";
    } else if ($current_date > $end_date) {
        $notice = "You are not allowed to verify anymore.";
    } else {
        $notice = "{$event->title} has ended.";
    }

} catch (PDOException $e) {
    $notice = $e->getMessage();

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