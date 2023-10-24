<?php
include("../config/database.php");

session_start();

// prevent creating event if not admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'ADMIN') {
    header('Location: /src/login/login.php');

    die();
}

date_default_timezone_set('ASIA/SINGAPORE');
$DATE_FORMAT = "Y-m-d H:i";
$min_date = date($DATE_FORMAT);
$max_date = date($DATE_FORMAT, strtotime($min_date . ' +1 year'));

$fields_error = "";
$end_date_error = "";
$img_url_error = "";
try {

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $maxSlot = $_POST['maxSlot'];
        $frontmatter = $_POST['frontmatter'];
        $description = $_POST['description'];
        $imgUrl = $_POST['imgUrl'];

        // check if all fields are filled
        if (empty($title) || empty($startDate) || empty($endDate) || empty($maxSlot) || empty($frontmatter) || empty($description)) {
            $fields_error = "Please fill in all fields.";
            throw new Exception($fields_error);
        }


        // check if end date is earlier than start date
        if (strtotime($endDate) < strtotime($startDate)) {
            $end_date_error = "End date must not be earlier than start date.";
            throw new Exception($end_date_error);
        }

        // check if image url is valid
        if (!preg_match("~^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$~i", $imgUrl)) {
            $img_url_error = "Please enter a valid image url.";
            throw new Exception($img_url_error);
        }

        // insert event into database
        $sql = "INSERT INTO event (title, start, end, maximum_slot, remaining_slot, frontmatter, description, image_url, uniq_id) VALUES (:title, :start, :end, :maximum_slot, :remaining_slot, :frontmatter, :description, :image_url, :uniq_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'title' => $title,
            'start' => $startDate,
            'end' => $endDate,
            'maximum_slot' => $maxSlot,
            'remaining_slot' => $maxSlot,
            'frontmatter' => $frontmatter,
            'description' => $description,
            'image_url' => $imgUrl,
            'uniq_id' => uniqid()
        ]);
        $event = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            echo "<script>
                alert('Event created successfully!');
                window.location.href = './events.php';
            </script>";
        }

    }

} catch (\Throwable $th) {

    if (isset($_ENV['env']) && $_ENV['env'] === 'dev') {
        echo $th->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Event</title>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="create.css">
</head>

<body>
    <?php include("../components/navbar.php") ?>
    <main class="main-wrapper">
        <article class="sections-wrapper">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                class="form left-section">
                <label for="title" class="form__title-label">Title <span class="error">*</span></label>
                <input type="text" id="title" class="form__title-input" name="title">
                <label for="startDate" class="form__startDate-label">Start Date <span class="error">*</span></label>
                <input type="datetime-local" id="startDate" class="form__startDate-input" min="<?php echo $min_date ?>"
                    max="<?php echo $max_date ?>" name="startDate">
                <label for=" endDate" class="form__endDate-label">End Date <span class="error">*</span></label>
                <input type="datetime-local" id="endDate" class="form__endDate-input" min="<?php echo $min_date ?>"
                    max="<?php echo $max_date ?>" name="endDate">
                <?php if (!empty($end_date_error))
                    echo "<span class='error'>{$end_date_error}</span>" ?>
                    <label for="maxSlot" class="form__maxSlot-label">Maximum Slot <span class="error">*</span></label>
                    <input type="number" id="maxSlot" class="form__maxSlot-input" name="maxSlot">
                    <label for="frontmatter" class="form__frontmatter-label">Frontmatter <span
                            class="error">*</span></label>
                    <textarea id="frontmatter" class="form__frontmatter-textarea" name="frontmatter"></textarea>
                    <label for="description" class="form__description-label">Description <span
                            class="error">*</span></label>
                    <textarea id="description" class="form__description-textarea" name="description"></textarea>
                    <label for="imgUrl" class="form__imgUrl-label">Image URL</label>
                    <input type="text" id="imgUrl" class="form__imgUrl-input" name="imgUrl">
                <?php if (!empty($img_url_error))
                    echo "<span class='error'>{$img_url_error}</span>" ?>
                <?php if (!empty($fields_error))
                    echo "<span class='error'>{$fields_error}</span>" ?>
                    <input type="submit" value="submit" name="submit">
                </form>
                <section class="right-section">
                    <h1 class="heading">Friendly note</h1>
                    <p>This is for you to easily create an event in one go without having to <strong>retype all</strong>
                        on failed submission.
                    </p>
                    <dl class="definition">
                        <dt><span class="error">*</span></dt>
                        <dd>Means it is required.</dd>
                    </dl>
                    <dl class="definition">
                        <dt>Start Date and End Date</dt>
                        <dd>End date must <mark><strong>not</strong></mark> be earlier than the start date.</dd>
                    </dl>
                    <dl class="definition">
                        <dt>Maximum Slot</dt>
                        <dd>Means the maximum number of people that can join the event.</dd>
                    </dl>
                    <dl class="definition">
                        <dt>Frontmatter</dt>
                        <dd>
                            A summary or the overview of the event.
                        </dd>
                    </dl>
                    <dl class="definition">
                        <dt>Image URL</dt>
                        <dd>The image preview for the event. Use a valid image url (webp,png,jpg, and etc.)</dd>
                    </dl>
                </section>
            </article>
        </main>
    </body>

    </html>