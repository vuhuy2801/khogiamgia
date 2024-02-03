<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/banners.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title> <?php echo $titlePage ?> </title>
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">

</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
            ?>

            <div class="col px-3 py-3 wrapContent">
                <div class="mt-4">
                    <h3 class="mt-3 mb-3"><?php echo $banner['title'] ?>
                    </h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="danh-sach" class="my-auto text-decoration-none back_home"><i
                                    class="bi bi-arrow-left mx-1"></i>Quay
                                lại</a>
                            <div>
                                <a class="btn btn-danger mx-1" data-banner-id='<?php echo $id ?>' data-bs-toggle='modal'
                                    data-bs-target='#deleteBanner'><i class='mx-1 bi bi-trash'></i>Xóa</a>
                                <a class="btn btn-primary" href="<?php echo 'cap-nhat?id=' . $id ?>"><i
                                        class='mx-1 bi bi-pencil-square'></i>Sửa</a>
                            </div>

                        </div>
                        <div class="col-8">
                            <form class="wrap_detail rounded-3 px-3 pt-3 pb-5" id="formSubmit">

                                <div class="form-group">
                                    <label class="label_input" for="address_target">Trang đích</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $banner['address_target'] ?>" id="address_target"
                                        name="address_target" readonly disabled>
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="title">Tiêu đề</label>
                                    <input type="text" value="<?php echo $banner['title'] ?>" class="form-control"
                                        id="title" name="title" readonly disabled>
                                </div>

                            </form>
                        </div>
                        <div class="col-4">
                            <div class="card mb-3 item-boxshadow">
                                <div class="card-body">
                                    <p class="card-text label_right"><small class="text-body-secondary">Hình ảnh</small>
                                    </p>
                                    <hr>
                                </div>
                                <div class="px-4 mb-5 wrap_img_detail">
                                    <img src="<?php echo $banner['image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="card item-boxshadow">
                                <div class="card-body">
                                    <p class="label_right">Thông tin</p>
                                    <hr>
                                </div>
                                <div class="px-3">
                                    <p class="label_input">Thời gian tạo: <span
                                            class="float-end date_value"><?php echo convertDateFormat($banner['createdAt']) ?></span>
                                    </p>
                                    <p class="label_input">Thời gian cập nhật: <span
                                            class="float-end date_value"><?php echo convertDateFormat($banner['updatedAt']) ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form name="delete-banner-form" method="POST"></form>

    </div>
    <script src="/public/js/admin/banners/detail.js"> </script>
    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>


</body>

</html>