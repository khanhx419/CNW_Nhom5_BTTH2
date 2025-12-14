<?php
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/instr_course_create.css">';

include __DIR__ . '/../../layouts/header.php';
?>
<h2>Edit Course</h2>

<form action="index.php?controller=course&action=update&id=<?= $course['id'] ?>" method="POST">

    <label>Course Name:</label>
    <input type="text" name="name" value="<?= $course['name'] ?>" required>

    <label>Description:</label>
    <textarea name="description" required><?= $course['description'] ?></textarea>

    <label>Category:</label>
    <input type="text" name="category" value="<?= $course['category'] ?>">

    <button type="submit">Update Course</button>
</form>

<a href="index.php?controller=course&action=manage">Back to Manage</a>

<?php include __DIR__ . '/../../layouts/footer.php';
?>