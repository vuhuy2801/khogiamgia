<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<div class="container">
    <div class="mt-4">
        <a href="show.php">Quay lại</a>
        <h3 class="mt-3">Tạo bài viết</h3>

        <form method="POST" action="../../../posts/add">
            <div class="form-group">
                <label for="title">Tiêu đề bài viết</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="imageId">Hình ảnh bài viết</label>
                <input type="text" class="form-control" id="imageId" name="imageId">
            </div>

            <div class="form-group mt-3">
                <select class="form-select form-select-sm mb-3" name="supplierId" id="supplierId">
                    <option selected>Chọn nhà cung cấp</option>
                    <?php 
                        require_once '../../controllers/supplierController.php'; 
                        $supplierController = new supplierController();
                        $suppliers = $supplierController->getListOfSuppliers();
                        foreach ($suppliers as $index => $supplier) {
                            echo "<option value=".$supplier['supplierId'].">".$supplier['supplierName']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <div class="form-group mt-3">
                <select class="form-select form-select-sm mb-3" name="category_post" id="category_post">
                    <option selected>Loại bài viết</option>
                    <option value="1">Khuyến mại</option>
                    <option value="2">Hướng dẫn</option>
                    <option value="3">Kinh nghiệm mua sắm</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Thêm bài viết</button>
        </form>
    </div>
</div>