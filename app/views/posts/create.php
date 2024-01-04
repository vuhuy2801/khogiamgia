<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/sidebar.css">
</head>


<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
                require_once 'app/views/partials/sidebar.php';
             
            ?>

            <div class="col px-3 py-3 bg-light">
                <div class="mt-4">
                    <h3 class="mt-3 mb-3">Thêm bài viết</h3>


                    <form class="mt-4" method="POST" action="../bai-viet/add">
                        <div class="d-flex justify-content-between">
                            <a href="show">Quay lại</a>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2 mx-1"></i>Tạo</button>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="image">Hình ảnh bài viết</label>
                            <input type="text" class="form-control" id="image" name="image">
                        </div>

                        <div class="form-group mt-3">
                            <select class="form-select form-select-sm mb-3" name="supplierId" id="supplierId">
                                <option selected>Chọn nhà cung cấp</option>
                                <?php 
                        require_once 'app/controllers/SupplierController.php';
                        $supplierController = new SupplierController();
                        $suppliers = $supplierController->getListOfSuppliers();
                        foreach ($suppliers as $index => $supplier) {
                            echo "<option value=".$supplier['supplierId'].">".$supplier['supplierName']."</option>";
                        }
                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Mô tả</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="form-group mt-3">
                            <select class="form-select form-select-sm mb-3" name="category_post" id="category_post">
                                <option selected>Loại bài viết</option>
                                <option value="1">Khuyến mại</option>
                                <option value="2">Hướng dẫn</option>
                                <option value="3">Kinh nghiệm mua sắm</option>
                                <option value="4">Khác</option>
                            </select>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</body>