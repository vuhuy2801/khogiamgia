<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="../../public/css/sidebar.css">
    <link rel="stylesheet" href="../../public/css/admin/posts.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
            require_once 'app/views/admin/component/convertDate.php';
            require_once 'app/controllers/SupplierController.php';
            require_once 'app/views/admin/posts/generalProcessing.php';
            ?>


            <div class="col px-3 py-3 bg-light">
                <div class="mt-4">
                    <h3 class="mt-3 mb-3"><?php echo $title ?>
                    </h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="show" class="my-auto text-decoration-none "><i
                                    class="bi bi-arrow-left mx-1"></i>Quay
                                lại</a>
                            <div class="justify-content-center">
                                <a id="btnSubmit" class="btn btn-primary"><i class="mx-1 bi bi-save"></i>Lưu</a>
                            </div>

                        </div>
                        <div class="col-8">
                            <form class="bg-body rounded-3 px-3 pt-3 pb-5" id="formSubmit" method="POST"
                                action="update">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $id ?>" class="form-control" id="postId"
                                        name="postId">
                                </div>
                                <div class="form-group">
                                    <label class="label_input" for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" value="<?php echo $title ?>" id="title"
                                        name="title">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="description">Mô tả</label>
                                    <input type="text" value="<?php echo $description ?>" class="form-control"
                                        id="description" name="description">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="slug">Slug</label>
                                    <input type="text" value="<?php echo $slug ?>" class="form-control" id="slug"
                                        name="slug">
                                </div>

                                <div class="form-group mt-2">
                                    <label class="label_input" for="content">Nội dung</label>
                                    <textarea id="editor" class="form-control" id="content" name="content"></textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" id="image" name="image">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" value="<?php echo $image ?>"
                                        id="fakeImage" name="fakeImage">
                                </div>

                                <div class="row form-group mt-2 d-flex">
                                    <div class="form-group col mt-3">
                                        <label class="label_input" for="supplierId">Nhà cung cấp</label>
                                        <select class="form-select form-select-sm mb-3" name="supplierId"
                                            id="supplierId">
                                            <?php
                                                foreach ($suppliers as $index => $supplier) {
                                                    $selected = ($supplier['supplierId'] == $supplierId) ? 'selected' : '';
                                                    echo "<option value=".$supplier['supplierId']." $selected>".$supplier['supplierName']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col mt-3">
                                        <label class="label_input" for="category_post">Danh mục</label>
                                        <select class="form-select form-select-sm mb-3" name="category_post"
                                            id="category_post">

                                            <?php
                                                foreach ($categories as $key => $category) {
                                                    $selected = ($key == $categoryId) ? 'selected' : '';
                                                    echo "<option value=$key $selected>$category</option>";
                                                }
                                            ?>
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
                                <div class="px-4 mb-5 ">
                                    <form action="upload" class="dropzone text-center" id="myDropzone"
                                        enctype="multipart/form-data">

                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p class="label_right">Thông tin</p>
                                    <hr>
                                </div>
                                <div class="px-3">
                                    <p class="label_input">Thời gian tạo: <span
                                            class="float-end date_value"><?php  echo convertDateFormat($createdAt)  ?></span>
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
    <script src="../../public\js\bootstrap\bootstrap.bundle.min.js"> </script>
    <script>
    const phpContentValue = "<?php echo $content ?>";
    const srcImg = "<?php echo $image ?>";
    </script>
    <script src="../../public/js/admin/posts/edit.js"> </script>

</body>

</html>