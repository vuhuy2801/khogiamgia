<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/vouchers.css">
    <link rel="stylesheet" href="/public/css/promotion.css">
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
            require_once 'app/views/component/itemPromotion.php';

            ?>

            <div class="col px-3 py-3 wrapContent">

                <div class="mt-4">
                    <h3 class="mt-3 mb-3">Thêm mã giảm giá</h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="danh-sach" class="my-auto text-decoration-none back_home"><i
                                    class="bi bi-arrow-left mx-1 "></i>Quay
                                lại</a>
                            <button id="btnSubmit" class="btn btn-primary"><i
                                    class="bi bi-check2 mx-1 btnAdd"></i>Tạo</button>
                        </div>
                        <div class="col-8">
                            <form class="bg-body rounded-3 px-3 pt-3 pb-5" id="formSubmit" method="POST" action="add">


                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="voucherId">ID mã giảm giá</label>
                                        <input type="text" class="form-control" id="voucherId" name="voucherId">
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="supplierId">Nhà cung cấp</label>
                                        <select class="form-select form-select-sm selectInput" name="supplierId"
                                            id="supplierId">
                                            <option disabled selected>Chọn nhà cung cấp</option>
                                            <?php
                                            foreach ($suppliers as $index => $supplier) {
                                                echo "<option value=" . $supplier['supplierId'] . ">" . $supplier['supplierName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="voucherName">Tên mã giảm giá</label>
                                        <input type="text" class="form-control" id="voucherName" name="voucherName">
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="discountType">Loại mã giảm giá</label>
                                        <select class="form-select form-select-sm selectInput" name="discountType"
                                            id="discountType">
                                            <option selected disabled>Chọn loại mã giảm giá</option>
                                            <option value='1'>FreeShip</option>
                                            <option value='2'>Mua Hàng</option>
                                            <option value='3'>Shop</option>
                                            <option value='4'>Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="quantity">Số lượng</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity">
                                    </div>

                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="categoryId">Nghành hàng</label>
                                        <select class="form-select form-select-sm selectInput"
                                            aria-placeholder="Chọn nghành hàng" name="categoryId" id="categoryId">
                                            <option selected disabled>Chọn nghành hàng</option>
                                            <?php
                                            foreach ($categories as $index => $category) {
                                                echo "<option value=" . $category['categoryId'] . ">" . $category['categoryName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="minimumDiscount">Đơn tối thiểu</label>
                                        <input type="text" class="form-control" id="minimumDiscount"
                                            name="minimumDiscount">
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="maximumDiscount">Giảm tối đa</label>
                                        <input type="text" class="form-control" id="maximumDiscount"
                                            name="maximumDiscount">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="conditionsOfUse">Lưu ý</label>
                                        <input type="text" class="form-control" id="conditionsOfUse"
                                            name="conditionsOfUse">
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="address_target">Link tiếp thị liên kết</label>
                                        <input type="text" class="form-control" id="address_target"
                                            name="address_target">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="expressAt">Ngày bắt đầu</label>
                                        <input type="date" class="form-control" id="expressAt" name="expressAt">
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="expiresAt">Ngày hết hạn</label>
                                        <input type="date" class="form-control" id="expiresAt" name="expiresAt">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="is_trend">Đang thịnh hành</label>
                                        <select class="form-select form-select-sm selectInput" name="is_trend"
                                            id="is_trend">
                                            <option value='1'>Đúng</option>
                                            <option selected value='0'>Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="is_inWallet">Có sẵn trong ví người dùng</label>
                                        <select class="form-select form-select-sm selectInput" name="is_inWallet"
                                            id="is_inWallet">
                                            <option value='1'>Có</option>
                                            <option selected value='0'>Không</option>
                                        </select>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-4">
                            <div class=''>
                                <div class="mb-3 row justify-content-center align-items-center">
                                    <div class="item-promotion">
                                        <div class="row promotion-card">
                                            <div class="col-5 text-center d-flex ">
                                                <div>
                                                    <div class="item-promotion__img">
                                                        <img id="imageLogo"
                                                            src="/public/images/logo/round-logo/default.png" alt="" />
                                                    </div>
                                                    <div class="promotion-type" id="typeDiscount">Loại mã</div>
                                                    <div class="end-date" id="endDate">
                                                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_223_1138)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M4 7.5C4.92826 7.5 5.8185 7.13125 6.47487 6.47487C7.13125 5.8185 7.5 4.92826 7.5 4C7.5 3.07174 7.13125 2.1815 6.47487 1.52513C5.8185 0.868749 4.92826 0.5 4 0.5C3.07174 0.5 2.1815 0.868749 1.52513 1.52513C0.868749 2.1815 0.5 3.07174 0.5 4C0.5 4.92826 0.868749 5.8185 1.52513 6.47487C2.1815 7.13125 3.07174 7.5 4 7.5ZM8 4C8 5.06087 7.57857 6.07828 6.82843 6.82843C6.07828 7.57857 5.06087 8 4 8C2.93913 8 1.92172 7.57857 1.17157 6.82843C0.421427 6.07828 0 5.06087 0 4C0 2.93913 0.421427 1.92172 1.17157 1.17157C1.92172 0.421427 2.93913 0 4 0C5.06087 0 6.07828 0.421427 6.82843 1.17157C7.57857 1.92172 8 2.93913 8 4Z"
                                                                    fill="black" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M3.75 1.5C3.8163 1.5 3.87989 1.52634 3.92678 1.57322C3.97366 1.62011 4 1.6837 4 1.75V4.355L5.624 5.283C5.6799 5.31672 5.72039 5.37097 5.73682 5.43414C5.75325 5.49732 5.74431 5.56442 5.71192 5.6211C5.67954 5.67778 5.62626 5.71954 5.56349 5.73746C5.50072 5.75538 5.43343 5.74804 5.376 5.717L3.626 4.717C3.58774 4.69514 3.55593 4.66356 3.5338 4.62545C3.51168 4.58735 3.50001 4.54407 3.5 4.5V1.75C3.5 1.6837 3.52634 1.62011 3.57322 1.57322C3.62011 1.52634 3.6837 1.5 3.75 1.5Z"
                                                                    fill="black" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_223_1138">
                                                                    <rect width="8" height="8" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        Ngày hết hạn

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-7">
                                                <div class="discount-value">Giảm <span class="px-2"
                                                        id="discountValue"></span></div>
                                                <div class="min-price">Đơn tối thiểu: <span id="minPrice"></span></div>
                                                <div class="max-discount">Tối đa: <span id="maxDiscount"></span></div>
                                                <div class="type">
                                                    <span class="badge badge-promotion" id="hastag"># mã nhập tay</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="remaining mt-2">Còn lại: <span id="remaining"></span></div>
                                            <div class="category mt-2">
                                                Ngành hàng: <span id="category"></span>
                                            </div>
                                            <div class="warning mt-2 mb-4 " id="note"><span>Lưu ý: </span>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn badge-copy">#<span
                                                        id="voucherCode"></span></button>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class='bg-body py-3 rounded-4 boxInfo'>
                                    <div class="card-body px-3">
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

    </div>




    <script src="/public/js/admin/vouchers/create.js"></script>
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