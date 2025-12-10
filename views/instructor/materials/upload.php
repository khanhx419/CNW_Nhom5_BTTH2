<?php include_once "views/layouts/header.php"; ?>

<h2>Upload Material for Course #<?= $course_id ?></h2>

<form action="index.php?controller=material&action=store" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="course_id" value="<?= $course_id ?>">

    <label>File name:</label>
    <input type="text" name="title" required>

    <label>Choose file:</label>
    <input type="file" name="file" required>

    <button type="submit">Upload</button>
</form>

<a href="index.php?controller=course&action=manage">Back</a>

<?php include_once "views/layouts/footer.php"; ?>