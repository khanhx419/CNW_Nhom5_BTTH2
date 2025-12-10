<?php include_once "views/layouts/header.php"; ?>

<h2>Manage Courses</h2>

<a href="index.php?controller=course&action=create">+ Create New Course</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($courses as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['name'] ?></td>
            <td><?= $c['category'] ?></td>

            <td>
                <a href="index.php?controller=course&action=edit&id=<?= $c['id'] ?>">Edit</a> |
                <a href="index.php?controller=course&action=delete&id=<?= $c['id'] ?>"
                    onclick="return confirm(' delete? ')">Delete</a> |
                <a href="index.php?controller=lesson&action=manage&course_id=<?= $c['id'] ?>">Lessons</a> |
                <a href="index.php?controller=material&action=upload&course_id=<?= $c['id'] ?>">Materials</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once "views/layouts/footer.php"; ?>