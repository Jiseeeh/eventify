<?php
include('../config/database.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /src/login/login.php');

    die();
}

$currentTab = "upcoming";
$upcomingEventsMarkup;
$onGoingEventsMarkup;

$upcomingEventsMarkup = getUpcomingEventsArray($pdo);

if (isset($_POST['upcoming'])) {
    $currentTab = "upcoming";

    $upcomingEventsMarkup = getUpcomingEventsArray($pdo);
}

if (isset($_POST['ongoing'])) {
    $currentTab = "ongoing";

    $onGoingEventsMarkup = getOngoingEventsArray($pdo);
}

function getUpcomingEventsArray($pdo)
{
    $sql = "SELECT * FROM event WHERE start > CURDATE() ORDER BY start ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $upcomingEvents = $stmt->fetchAll();

    $upcomingEventsMarkupArray = [];

    foreach ($upcomingEvents as $event) {
        array_push($upcomingEventsMarkupArray, getUpcomingEventMarkup($event));
    }

    return $upcomingEventsMarkupArray;
}

function getOngoingEventsArray($pdo)
{
    $sql = "SELECT * FROM event WHERE start <= CURDATE() AND end >= CURDATE() ORDER BY start ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $ongoingEvents = $stmt->fetchAll();

    $ongoingEventsMarkupArray = [];

    foreach ($ongoingEvents as $event) {
        array_push($ongoingEventsMarkupArray, getOngoingEventMarkup($event));
    }

    return $ongoingEventsMarkupArray;
}

function getUpcomingEventMarkup($event)
{
    return "<div class='upcoming-events__card-wrapper' data-id=\"{$event->id}\">
    <section class='upcoming-events__card'>
        <span class='upcoming-events__card__heading'>{$event->title}</span>
        <p class='upcoming-events__card__frontmatter'>{$event->frontmatter}</p>
        <button class='btn upcoming-events__card__btn'><a href='./event.php?uid={$event->uniq_id}' class='btn-link'> Learn more -></a></button>
    </section>
</div>";
}

function getOngoingEventMarkup($event)
{
    return "<div class='ongoing-events__card-wrapper'>
    <section class='ongoing-events__card'>
        <span class='ongoing-events__card__heading'>{$event->title}</span>
        <p class='ongoing-events__card__frontmatter'>{$event->frontmatter}</p>
        <button class='btn ongoing-events__card__btn'><a href='./event.php?uid={$event->uniq_id}' class='btn-link'> Learn more -></a></button>
    </section>
</div>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="events.css">
</head>

<body>
    <?php include("../components/navbar.php") ?>
    <main>
        <form class="tabs" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <button class="tabs__item <?php if ($currentTab === 'upcoming')
                echo 'tabs__item--active' ?>" name="upcoming">Upcoming Events</button>
                <div></div>
                <button class="tabs__item <?php if ($currentTab === 'ongoing')
                echo 'tabs__item--active' ?>" name="ongoing">Ongoing Events</button>
            </form>
            <section class="upcoming-events">
                <?php
            if (!empty($upcomingEventsMarkup) && $currentTab === "upcoming") {
                foreach ($upcomingEventsMarkup as $markup) {
                    echo $markup;
                }
            } else if (!empty($onGoingEventsMarkup) && $currentTab === "ongoing") {
                foreach ($onGoingEventsMarkup as $markup) {
                    echo $markup;
                }
            } else {
                echo "<span style='font-weight: bold;'>No events to show.</span>";
            }
            ?>
        </section>

    </main>
</body>

</html>