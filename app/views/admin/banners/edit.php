<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
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
            require_once 'lib/convertDate.php';
            require_once 'app/controllers/admin/BannerController.php';
            $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
            $banner = $bannerData->Detail($id);
            ?>


            <div class="col px-3 py-3 wrapContent">
                <div class="toast toast_update align-items-center text-bg-primary border-0 position-absolute start-50 translate-middle"
                    role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Sửa banner thành công ! <span></span>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="mt-3 mb-3"><?php echo $banner['title'] ?>
                    </h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="danh-sach" class="my-auto text-decoration-none back_home"><i
                                    class="bi bi-arrow-left mx-1"></i>Quay
                                lại</a>
                            <div class="justify-content-center">
                                <a id="btnSubmit" class="btn btn-primary"><i class="mx-1 bi bi-save"></i>Lưu</a>
                            </div>

                        </div>
                        <div class="col-8">
                            <form class="wrap_detail rounded-3 px-3 pt-3 pb-5" id="formSubmit" method="POST"
                                action="update">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $banner['bannerId'] ?>" class="form-control"
                                        id="bannerId" name="bannerId">
                                </div>
                                <div class="form-group">
                                    <label class="label_input" for="address_target">Trang đích</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $banner['address_target'] ?>" id="address_target"
                                        name="address_target">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="title">Tiêu dề</label>
                                    <input type="text" value="<?php echo $banner['title'] ?>" class="form-control"
                                        id="title" name="title">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" id="image" name="image">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" value="<?php echo $banner['image'] ?>"
                                        id="fakeImage" name="fakeImage">
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
                                <div class="px-4 mb-5 ">
                                    <div class="dropzone-container">
                                        <form action="upload" class="dropzone text-center" id="myDropzone"
                                            enctype="multipart/form-data"></form>
                                        <button id="deleteImageBtn" style="display:block;"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card item-boxshadow">
                                <div class="card-body">
                                    <p class="label_right">Thông tin</p>
                                    <hr>
                                </div>
                                <div class="px-3">
                                    <p class="label_input">Thời gian tạo: <span
                                            class="float-end date_value"><?php  echo convertDateFormat($banner['createdAt'])  ?></span>
                                    </p>
                                    <p class="label_input">Thời gian cập nhật: <span
                                            class="float-end date_value update_at"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script>
    const dataBanner = {
        image: "<?php echo $banner['image'] ?>",
    }
    </script>

    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="/public/js/admin/banners/edit.js"> </script>
    <script src="
    https://cdn.jsdelivr.net/npm/dayjs@1.11.10/dayjs.min.js
    "></script>
    <script>
    const now = dayjs();
    const formattedTime = now.format('hh:mm A DD/MM/YY');
    document.querySelector('.update_at').textContent = formattedTime;
    </script>
</body>

</html>