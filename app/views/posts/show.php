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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/sidebar.css">
    <link rel="stylesheet" href="../../public/css/admin/posts.css">
</head>


<body>
    <div class="container-fluid">
        <!-- end -->
        <div class="row flex-nowrap">
            <?php
                require_once 'app/views/partials/sidebar.php';
             
            ?>

            <!-- end sidebar -->
            <div class="col px-3 py-3 wrap_dasboard">
                <div class="mt-5 d-flex justify-content-between">
                    <h3>
                        Danh sách bài viết
                    </h3>

                    <button id="btnAdd"> <a class="addLink  px-4 " href='create'>Thêm</a> </button>
                </div>
                <div class="mt-3 bg-light rounded-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th id="item_head_table" class="table_item" scope="col">ID BÀI VIẾT</th>
                                <th id="item_head_table" scope="col">TIÊU ĐỀ</th>
                                <th id="item_head_table" class="table_item" scope="col">HÌNH ẢNH</th>
                                <th id="item_head_table" class="table_item" scope="col">DANH MỤC</th>
                                <th id="item_head_table" class="table_item" scope="col">THỜI GIAN TẠO</th>
                                <th id="item_head_table" class="table_item" scope="col">THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once 'app/controllers/PostController.php';

                                $postController = new PostController();
                                $posts = $postController->getListOfPosts();

                                foreach ($posts as $index => $post) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $post['postId'] . "</th>";
                                    echo "<td>" . $post['title'] . "</td>";
                                    echo "<td> <img class='w-100 item_image' src='". $post['image'] ."' alt=''></td>";
                                    echo "<td>" . $post['categories_post'] . "</td>";
                                    echo "<td>" . $post['createdAt'] . "</td>";
                        
                                    echo "<td>
                                        <a class='px-2 action_detail' href='detail.php?i=" . urlencode($post['postId']) . "&t=" . urlencode($post['title']) . "&a=" . urlencode($post['image']) . "&s=" . urlencode($post['supplierId']) . "&c=" . urlencode($post['content']) . "&d=" . urlencode($post['description']) . "&l=" . urlencode($post['categories_post']) . "&at=" . urlencode($post['createdAt']) . "&status=" . urlencode($post['status']) . "'><i class='bi bi-eye-fill'></i></a>
                                        <a class='px-2 action_edit' href='edit?postId=" . urlencode($post['postId']) . "&description=" . urlencode($post['description']) . "&title=" . urlencode($post['title']) . "&image=" . urlencode($post['image']) . "&supplier=" . urlencode($post['supplierId']). "&category=" . urlencode($post['categories_post']) . "&status=" . urlencode($post['status']) ."'><i class='bi bi-pencil-square'></i></a>
                                        <a href='' class='delete-post px-2' data-post-id='" . urlencode($post['postId']) . "' data-bs-toggle='modal' data-bs-target='#deletePost'><i class='bi bi-trash'></i></a>
                                     </td>";
                                
                                     echo "</tr>" ; } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal delete post -->
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
                                <button id="btn-delete-post" type="button" class="btn btn-danger">Xóa</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
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
        const btnDeletePost = $("#btn-delete-post");
        let idPost;

        const deleteForm = document.forms['delete-post-form'];

        $('#deletePost').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            idPost = button.data('post-id')
            console.log(idPost);
        })

        btnDeletePost.click(function() {
            deleteForm.action = "../bai-viet/delete/" + idPost;
            deleteForm.submit();
        })
    })
    </script>

</body>

</html>