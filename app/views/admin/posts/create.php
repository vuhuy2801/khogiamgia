<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="../../public/css/sidebar.css">
    <link rel="stylesheet" href="../../public/css/admin/posts.css">

</head>


<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
            require_once 'app/views/admin/posts/generalProcessing.php';
        ?>

            <div class="col px-3 py-3 bg-light">
                <div class="mt-4">
                    <h3 class="mt-3 mb-3">Thêm bài viết</h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="show" class="my-auto text-decoration-none "><i
                                    class="bi bi-arrow-left mx-1"></i>Quay
                                lại</a>
                            <button id="btnSubmit" class="btn btn-primary"><i class="bi bi-check2 mx-1"></i>Tạo</button>
                        </div>
                        <div class="col-8">
                            <form class="bg-body rounded-3 px-3 pt-3 pb-5" id="formSubmit" method="POST" action="add">

                                <div class="form-group">
                                    <label class="label_input" for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="description">Mô tả</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                </div>

                                <div class="form-group mt-2">
                                    <label class="label_input" for="content">Nội dung</label>
                                    <textarea id="editor" class="form-control" id="content" name="content"></textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" id="image" name="image">
                                </div>

                                <div class="row">
                                    <div class="form-group col mt-3">

                                        <select class="form-select form-select-sm mb-3" name="supplierId"
                                            id="supplierId">
                                            <option selected>Chọn nhà cung cấp</option>
                                            <?php 
                                                foreach ($suppliers as $index => $supplier) {
                                                    echo "<option value=".$supplier['supplierId'].">".$supplier['supplierName']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col mt-3">
                                        <select class="form-select form-select-sm mb-3" name="category_post"
                                            id="category_post">
                                            <option selected>Danh mục</option>
                                            <option value="1">Khuyến mại</option>
                                            <option value="2">Hướng dẫn</option>
                                            <option value="3">Kinh nghiệm mua sắm</option>
                                            <option value="4">Khác</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="card-text label_right"><small class="text-body-secondary">Hình ảnh</small>
                                    </p>
                                    <hr>
                                </div>
                                <div class="px-4 mb-5">
                                    <div class="dropzone-container">
                                        <form action="upload" class="dropzone text-center" id="myDropzone"
                                            enctype="multipart/form-data"></form>
                                        <button id="deleteImageBtn" style="display:none;"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </div>



                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p class="label_right">Thông tin</p>
                                    <hr>
                                </div>
                                <div class="px-3">
                                    <p class="label_input">Thời gian tạo: <span
                                            class="float-end date_value"><?php echo $currentDateTime ?></span>
                                    </p>
                                    <p class="label_input">Thời gian cập nhật: <span
                                            class="float-end date_value"><?php echo $currentDateTime ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../public/js/admin/posts/create.js"></script>
    <script src="../../public\js\bootstrap\bootstrap.bundle.min.js"> </script>

</body>