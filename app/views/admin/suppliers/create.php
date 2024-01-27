<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/suppliers.css">

</head>


<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
        ?>

            <div class="col px-3 py-3 wrapContent">
                <div class="toast toast_create align-items-center text-bg-primary border-0 position-absolute start-50 translate-middle"
                    role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Thêm nhà cung cấp thành công ! <span></span>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="mt-3 mb-3">Thêm nhà cung cấp</h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="show" class="my-auto text-decoration-none back_home"><i
                                    class="bi bi-arrow-left mx-1 "></i>Quay
                                lại</a>
                            <button id="btnSubmit" class="btn btn-primary"><i class="bi bi-check2 mx-1"></i>Tạo</button>
                        </div>
                        <div class="col-8">
                            <form class="wrap_detail rounded-3 px-3 pt-3 pb-5" id="formSubmit" method="POST"
                                action="add">

                                <div class="form-group">
                                    <label class="label_input" for="supplierName">Tên nhà cung cấp</label>
                                    <input type="text" class="form-control" id="supplierName" name="supplierName">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="link_target">Link tham chiếu</label>
                                    <input type="text" class="form-control" id="link_target" name="link_target">
                                </div>
                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control" id="image" name="image">
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
                                        <form action="upload" class="dropzone text-center rounded-3" id="myDropzone"
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
                                            class="float-end date_value create_at"></span>
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




    <script src="/public/js/admin/suppliers/create.js"></script>
    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="
    https://cdn.jsdelivr.net/npm/dayjs@1.11.10/dayjs.min.js
    "></script>

    <script>
    const now = dayjs();
    const formattedTime = now.format('hh:mm A DD/MM/YY');
    document.querySelector('.create_at').textContent = formattedTime;
    document.querySelector('.update_at').textContent = formattedTime;
    </script>
    <script src="/public/js/jquery/jquery-3.6.3.min.js"> </script>



</body>