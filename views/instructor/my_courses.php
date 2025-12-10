<h2>Khóa học của tôi</h2>

<a href="index.php?controller=Course&action=create" class="btn">+ Thêm khóa học</a>

<table>
<tr>
    <th>Ảnh</th>
    <th>Tiêu đề</th>
    <th>Giá</th>
    <th>Cấp độ</th>
    <th>Hành động</th>
</tr>

<?php foreach($courses as $c): ?>
<tr>
    <td><img src="assets/uploads/courses/<?= $c['image'] ?>" width="80"></td>
    <td><?= $c['title'] ?></td>
    <td><?= $c['price'] ?></td>
    <td><?= $c['level'] ?></td>
    <td>
        <a href="?controller=Course&action=edit&id=<?= $c['id'] ?>">Sửa</a>
        <a href="?controller=Course&action=delete&id=<?= $c['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
        <a href="?controller=Lesson&action=manage&course_id=<?= $c['id'] ?>">Bài học</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
