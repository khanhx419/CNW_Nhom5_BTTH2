<?php include_once "views/layouts/header.php"; ?>

<h2>Create Lesson</h2>

<form action="index.php?controller=lesson&action=store" method="POST">

    <input type="hidden" name="course_id" value="<?= $course_id ?>">

    <label>Lesson Title:</label>
    <input type="text" name="title" required>

    <label>Content:</label>
    <textarea name="content" required></textarea>

    <button type="submit">Create Lesson</button>
</form>

<a href="index.php?controller=lesson&action=manage&course_id=<?= $course_id ?>">Back to lessons</a>

<?php include_once "views/layouts/footer.php"; ?>
