<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/posts.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
            require_once 'app/views/admin/posts/deleteModal.php';
            require_once 'lib/convertDate.php';
            require_once 'app/views/admin/posts/generalProcessing.php';
            require_once 'app/controllers/admin/PostController.php';
            $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
            $postController = new PostController();
            $post = $postController->getPostDetail($id);
            
            ?>

            <div class="col px-3 py-3 bg-light">
                <div class="mt-4">
                    <h3 class="mt-3 mb-3"><?php echo $post['title'] ?>
                    </h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="show" class="my-auto text-decoration-none back_home"><i
                                    class="bi bi-arrow-left mx-1"></i>Quay
                                lại</a>
                            <div>
                                <a class="btn btn-danger mx-1 drop-post" data-post-id='<?php echo $id ?>'
                                    data-bs-toggle='modal' data-bs-target='#deletePost'><i
                                        class='mx-1 bi bi-trash'></i>Xóa</a>
                                <a class="btn btn-primary" href="<?php echo 'edit?id='.$id ?>"><i
                                        class='mx-1 bi bi-pencil-square'></i>Sửa</a>
                            </div>

                        </div>
                        <div class="col-8">
                            <form class="bg-body rounded-3 px-3 pt-3 pb-5" id="formSubmit">

                                <div class="form-group">
                                    <label class="label_input" for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" value="<?php echo $post['title'] ?>"
                                        id="title" name="title" readonly>
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="description">Mô tả</label>
                                    <input type="text" value="<?php echo $post['description'] ?>" class="form-control"
                                        id="description" name="description" readonly>
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="slug">Slug</label>
                                    <input type="text" value="<?php echo $post['slug'] ?>" class="form-control"
                                        id="slug" name="slug" readonly>
                                </div>

                                <div class="form-group mt-2">
                                    <label class="label_input" for="content">Nội dung</label>
                                    <textarea id="editor" class="form-control" id="content" name="content"></textarea>
                                </div>

                                <div class="row form-group mt-2 d-flex">
                                    <div class="col">
                                        <label class="label_input" for="supp">Nhà cung cấp</label>
                                        <input type="text" value="<?php echo $listSupplier[ $post['supplierId']] ?>"
                                            class="form-control" id="supp" name="supp" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="label_input" for="cate">Danh mục</label>
                                        <input type="text" value="<?php echo $categories[ $post['categories_post']] ?>"
                                            class="form-control" id="cate" name="cate" readonly>
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
                                <div class="px-4 mb-5 wrap_img_detail">
                                    <img src="<?php echo $post['image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p class="label_right">Thông tin</p>
                                    <hr>
                                </div>
                                <div class="px-3">
                                    <p class="label_input">Thời gian tạo: <span
                                            class="float-end date_value"><?php echo convertDateFormat($post['createdAt']) ?></span>
                                    </p>
                                    <p class="label_input">Thời gian cập nhật: <span
                                            class="float-end date_value"><?php echo convertDateFormat( $post['updateAt']) ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form name="delete-post-form" method="POST"></form>

    </div>
    <script>
    const dataPost = {
        content: `<?php echo $post['content'] ?>`,
        image: "<?php echo $post['image'] ?>",
    }
    </script>
    <script src="/public/js/admin/posts/detail.js"> </script>
    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>


</body>

</html>