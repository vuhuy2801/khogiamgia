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
    <link rel="stylesheet" href="/public/css/admin/suppliers.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
            require_once 'app/views/admin/suppliers/deleteModal.php';
            require_once 'lib/convertDate.php';
            require_once 'app/controllers/admin/SupplierController.php';
            $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
            $supplier = $supplierData->Detail($id);
           
            ?>

            <div class="col px-3 py-3 wrapContent">
                <div class="mt-4">
                    <h3 class="mt-3 mb-3"><?php echo $supplier['supplierName'] ?>
                    </h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="show" class="my-auto text-decoration-none back_home"><i
                                    class="bi bi-arrow-left mx-1"></i>Quay
                                lại</a>
                            <div>
                                <a class="btn btn-danger mx-1" data-supplier-id='<?php echo $id ?>'
                                    data-bs-toggle='modal' data-bs-target='#deleteSupplier'><i
                                        class='mx-1 bi bi-trash'></i>Xóa</a>
                                <a class="btn btn-primary" href="<?php echo 'edit?id='.$id ?>"><i
                                        class='mx-1 bi bi-pencil-square'></i>Sửa</a>
                            </div>

                        </div>
                        <div class="col-8">
                            <form class="wrap_detail rounded-3 px-3 pt-3 pb-5" id="formSubmit">

                                <div class="form-group">
                                    <label class="label_input" for="supplierName">Tên nhà cung cấp</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $supplier['supplierName'] ?>" id="supplierName"
                                        name="supplierName" readonly>
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="link_target">Link tham chiếu</label>
                                    <input type="text" value="<?php echo $supplier['address_target'] ?>"
                                        class="form-control" id="link_target" name="link_target" readonly>
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
                                <div class="px-4 mb-5 wrap_img_detail">
                                    <img src="<?php echo $supplier['logoSupplier'] ?>" alt="">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p class="label_right">Thông tin</p>
                                    <hr>
                                </div>
                                <div class="px-3">
                                    <p class="label_input">Thời gian tạo: <span
                                            class="float-end date_value"><?php echo convertDateFormat($supplier['createdAt']) ?></span>
                                    </p>
                                    <p class="label_input">Thời gian cập nhật: <span
                                            class="float-end date_value"><?php echo convertDateFormat( $supplier['updatedAt']) ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form name="delete-supplier-form" method="POST"></form>

    </div>
    <script src="/public/js/admin/suppliers/detail.js"> </script>
    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>


</body>

</html>