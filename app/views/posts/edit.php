<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<div class="container">
    <div class="mt-4">
        <a href="show">Quay lại</a>
        <h3 class="mt-3">Sửa bài viết</h3>

        <form method="POST" action="../bai-viet/update">
            <div class="form-group">
                <input type="hidden"
                    value="<?php echo isset($_GET['postId']) ? htmlspecialchars($_GET['postId']) : ''; ?>"
                    class="form-control" id="postId" name="postId">
            </div>

            <div class="form-group">
                <label for="title">Tiêu đề bài viết</label>
                <input type="text" value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : ''; ?>"
                    class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh bài viết</label>
                <input type="text" value="<?php echo isset($_GET['image']) ? htmlspecialchars($_GET['image']) : ''; ?>"
                    class="form-control" id="image" name="image">
            </div>
            <div class="form-group mt-3">
                <select class="form-select form-select-sm mb-3" name="supplierId" id="supplierId">
                    <?php 
                        require_once 'app/controllers/SupplierController.php';
                        $supplierController = new SupplierController();
                        $suppliers = $supplierController->getListOfSuppliers();
                        $supplierList = []; 

                        foreach ($suppliers as $index => $supplier) {
                            $supplierList[$supplier['supplierId']] = htmlspecialchars($supplier['supplierName'], ENT_QUOTES, 'UTF-8');
                        }

                        foreach ($supplierList as $value => $label) {
                            $selected = '';
                            if (isset($_GET['supplier']) && $_GET['supplier'] == $value) {
                                $selected = 'selected';
                            }
                            echo "<option value='" . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . "' $selected>$label</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <input type="text"
                    value="<?php echo isset($_GET['description']) ? htmlspecialchars($_GET['description']) : ''; ?>"
                    class="form-control" id="description" name="description">
            </div>
            <div class="form-group mt-3">
                <select class="form-select form-select-sm mb-3" name="category_post" id="category_post">
                    <?php
                    $categories = [
                        '1' => 'Khuyến mại',
                        '2' => 'Hướng dẫn',
                        '3' => 'Kinh nghiệm mua sắm',
                        '4' => 'Khác'
                    ];

                    foreach ($categories as $value => $label) {
                        $selected = ($_GET['category'] == $value) ? 'selected' : '';
                        echo "<option value='$value' $selected>$label</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="category_post">Trạng thái bài viết</label>
                <input type="text"
                    value="<?php echo isset($_GET['status']) ? htmlspecialchars($_GET['status']) : ''; ?>"
                    class="form-control" id="status" name="status">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Sửa bài viết</button>
        </form>
    </div>
</div>