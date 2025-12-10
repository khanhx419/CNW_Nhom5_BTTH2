<?php include_once "views/layouts/header.php"; ?>

<h2>Lessons of Course #<?= $course_id ?></h2>

<a href="index.php?controller=lesson&action=create&course_id=<?= $course_id ?>">+ Add Lesson</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($lessons as $l): ?>
        <tr>
            <td><?= $l['id'] ?></td>
            <td><?= $l['title'] ?></td>

            <td>
                <a href="index.php?controller=lesson&action=edit&id=<?= $l['id'] ?>">Edit</a> |
                <a href="index.php?controller=lesson&action=delete&id=<?= $l['id'] ?>&course_id=<?= $course_id ?>" onclick="return confirm('delete?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once "views/layouts/footer.php"; ?>
