<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>


<body>
    <div class="container-fluid">


        <!-- end -->
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center mt-5 pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Logo</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start mt-5"
                        id="menu">
                        <li class="nav-item ">
                            <a href="#" class="nav-link align-middle px-0 text-dark">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Trang chủ</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="nav-link px-0 align-middle text-dark">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Quản lý nội
                                    dung</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle text-dark">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle text-dark">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                        </li>

                    </ul>


                </div>
            </div>

            <!-- end sidebar -->
            <div class="col px-3 py-3 bg-light">
                <div class="mt-5 d-flex justify-content-between">
                    <h3>
                        Danh sách nội dung
                    </h3>
                    <button class="mx-3 px-4"> <a href='create.php'>Thêm</a> </button>
                </div>
                <div class="mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu Đề</th>
                                <th scope="col">Nội Dung</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once '../../controllers/postController.php';

                                $postController = new PostController();
                                $posts = $postController->getListOfPosts();

                                foreach ($posts as $index => $post) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . ($index + 1) . "</th>";
                                    echo "<td>" . $post['title'] . "</td>";
                                    echo "<td>" . $post['content'] . "</td>";
                                    echo "<td>" . $post['description'] . "</td>";
                        
                                    echo "<td>
                                        <a href='#' class='px-2'>Xem</a>
                                        <a class='px-2' href='edit.php?i="  . $post['postId'] . "&t="  . $post['title'] . "&a="  . $post['image'] . "&s="  . $post['supplierId'] . "&c="  . $post['content'] . "&l="  . $post['categories_post'] . "' >Sửa</a>
                                        <a href=''class='delete-post px-2' data-post-id='" . $post['postId'] . "' data-bs-toggle='modal' data-bs-target='#deletePost'>Xóa</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>

                    </table>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="deletePost" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa bài viết</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xóa bài viết ?</p>
                            </div>
                            <div class="modal-footer">
                                <button id="btn-delete-course" type="button" class="btn btn-danger">Xóa</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <form name="delete-post-form" method="POST"></form>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnDeleteCourse = $("#btn-delete-course");
        let idPost;
        const deleteForm = document.forms['delete-post-form'];
        console.log(deleteForm);
        $('#deletePost').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            idPost = button.data('post-id')
        })
        btnDeleteCourse.click(function() {
            deleteForm.action = "../../../posts/delete/" + idPost;
            deleteForm.submit();
        })


    })
    </script>

</body>

</html>