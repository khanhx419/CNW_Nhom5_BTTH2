<?php
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/instr_course_create.css">';

include __DIR__ . '/../../layouts/header.php';
?>

<h2>Tạo khóa học</h2>

<form method="POST" enctype="multipart/form-data" action="index.php?controller=Course&action=store">
    <label>Tiêu đề</label>
    <input type="text" name="title" required>

    <label>Mô tả</label>
    <textarea name="description"></textarea>

    <label>Danh mục</label>
    <input type="number" name="category" required>

    <label>Giá</label>
    <input type="number" name="price" required>

    <label>Thời lượng (tuần)</label>
    <input type="number" name="duration" required>

    <label>Cấp độ</label>
    <select name="level">
        <option>Beginner</option>
        <option>Intermediate</option>
        <option>Advanced</option>
    </select>

    <label>Ảnh khóa học</label>
    <input type="file" name="image">

    <button type="submit">Lưu</button>
</form>
<?php include __DIR__ . '/../../layouts/footer.php';
?>