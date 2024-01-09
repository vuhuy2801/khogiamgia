<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="col px-3 py-3 bg-light">
        <div class="mt-5 d-flex justify-content-between">
            <h3>
                Danh sách nhà cung cấp
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
                                require_once '../../controllers/PostController.php';

                                $postController = new PostController();
                                $posts = $postController->getListOfPosts();

                                foreach ($posts as $index => $post) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . ($index + 1) . "</th>";
                                    echo "<td>" . $post['title'] . "</td>";
                                    echo "<td>" . $post['content'] . "</td>";
                                    echo "<td>" . $post['description'] . "</td>";
                        
                                    echo "<td>
                                        <a class='px-2' href='detail.php?i="  . $post['postId'] . "&t="  . $post['title'] . "&a="  . $post['image'] . "&s="  . $post['supplierId'] . "&c="  . $post['content'] . "&d="  . $post['description']  . "&l="  . $post['categories_post'] . "&at="  . $post['createdAt'] . "&status="  . $post['status'] ." ' >Xem</a>
                                        <a class='px-2' href='edit.php?i="  . $post['postId'] . "&t="  . $post['title'] . "&a="  . $post['image'] . "&s="  . $post['supplierId'] . "&c="  . $post['content'] . "&l="  . $post['categories_post'] . "' >Sửa</a>
                                        <a href=''class='delete-post px-2' data-post-id='" . $post['postId'] . "' data-bs-toggle='modal' data-bs-target='#deletePost'>Xóa</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            ?>
                </tbody>

            </table>
        </div>
</body>

</html>