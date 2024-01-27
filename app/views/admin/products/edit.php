<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/products.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
        //    error_reporting(0); 
            
            require_once 'app/views/partials/sidebar.php';
            require_once 'lib/convertDate.php';
            require_once 'app/views/admin/products/generalProcessing.php';
            require_once 'app/controllers/admin/ProductController.php';
            $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
            $ProductController = new ProductController();
            $product= $ProductController->getDetail($id);
            ?>


            <div class="col px-3 py-3 wrapContent">
                <div class="toast toast_update align-items-center text-bg-primary border-0 position-absolute start-50 translate-middle"
                    role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Sửa sản phẩm thành công ! <span></span>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="mt-3 mb-3"><?php echo $product['productName'] ?>
                    </h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="show" class="my-auto text-decoration-none back_home"><i
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
                                    <label class="label_input" for="link">Link sản phẩm</label>
                                    <input type="text" class="form-control" id="link"
                                        value="<?php echo $product['link'] ?>" name="link">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="productName">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="productName"
                                        value="<?php echo $product['productName'] ?>" name="productName">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="productId">ID sản phẩm</label>
                                    <input type="text" class="form-control" id="productId"
                                        value="<?php echo $product['productID'] ?>" name="productId">
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="soldCount">Lượt bán</label>
                                        <input type="text" class="form-control" id="soldCount"
                                            value="<?php echo $product['soldCount'] ?>" name="soldCount">
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="rateCount">Lượt đánh giá</label>
                                        <input type="text" class="form-control" id="rateCount"
                                            value="<?php echo $product['rateCount'] ?>" name="rateCount">
                                    </div>
                                </div>
                                <div class="form-group col mt-3">
                                    <select class="form-select form-select-sm mb-3" name="status" id="status">
                                        <?php
                                                foreach ($statusTwoProduct as $key => $status) {
                                                    $selected = ($key == $product['status']) ? 'selected' : '';
                                                    echo "<option value=$key $selected>$status</option>";
                                                }
                                            ?>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" id="image" name="image">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" value="<?php echo $product['image'] ?>"
                                        id="fakeImage" name="fakeImage">
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
                                    <div class="dropzone-container">
                                        <form action="upload" class="dropzone text-center" id="myDropzone"
                                            enctype="multipart/form-data"></form>
                                        <button id="deleteImageBtn" style="display:block;"><i
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
                                            class="float-end date_value"><?php  echo convertDateFormat($product['createdAt'])  ?></span>
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
    //data post php to json format
    const dataProduct = {
        image: "<?php echo $product['image'] ?>",
    }
    </script>

    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="/public/js/admin/products/edit.js"> </script>
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