<?php
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/add_khoahoc.css">';
include 'views/layouts/header.php';

/*
|--------------------------------------------------
| Danh mục mẫu (dùng khi chưa load từ DB)
|--------------------------------------------------
*/
$sampleCategories = [
    ['id' => 1, 'name' => 'Lập trình Web'],
    ['id' => 2, 'name' => 'Java'],
    ['id' => 3, 'name' => 'Ngoại ngữ'],
    ['id' => 4, 'name' => 'Học máy'],
    ['id' => 5, 'name' => 'Trí tuệ nhân tạo']
];

// Nếu controller chưa truyền $categories thì dùng danh mục mẫu
$categories = $categories ?? $sampleCategories;
?>

<div class="container mt-4">
    <h2>➕ Thêm khóa học mới</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Tiêu đề khóa học</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Chọn danh mục --</option>

                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>">
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mức độ</label>
            <select name="level" class="form-control">
                <option value="Cơ bản">Cơ bản</option>
                <option value="Nâng cao">Nâng cao</option>
            </select>
        </div>

        <button class="btn btn-success">Lưu</button>
        <a href="/CNW_Nhom5_BTTH2/admin/courses" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include 'views/layouts/footer.php'; ?>
