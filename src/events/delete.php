<?php
include("../config/database.php");

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login/login.php');

    die();
}

$uid = $_GET['uid'];

$sql = "SELECT * FROM event WHERE uniq_id = :uid";
$stmt = $pdo->prepare($sql);
$stmt->execute(['uid' => $uid]);
$student_event = $stmt->fetch();


$sql = "DELETE FROM event WHERE uniq_id = :uid";
$stmt = $pdo->prepare($sql);
$stmt->execute(['uid' => $uid]);
$student_event = $stmt->fetch();

header('Location: ./events.php');

?>