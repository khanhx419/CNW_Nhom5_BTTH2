<?php include_once "views/layouts/header.php"; ?>

<h2>Edit Lesson</h2>

<form action="index.php?controller=lesson&action=update&id=<?= $lesson['id'] ?>" method="POST">
    
    <input type="hidden" name="course_id" value="<?= $lesson['course_id'] ?>">

    <label>Lesson Title:</label>
    <input type="text" name="title" value="<?= $lesson['title'] ?>" required>

    <label>Content:</label>
    <textarea name="content" required><?= $lesson['content'] ?></textarea>

    <button type="submit">Update Lesson</button>
</form>

<a href="index.php?controller=lesson&action=manage&course_id=<?= $lesson['course_id'] ?>">Back</a>

<?php include_once "views/layouts/footer.php"; ?>
