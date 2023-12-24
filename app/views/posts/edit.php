<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<div class="container">
    <div class="mt-4">
        <a href="show.php">Quay lại</a>
        <h3 class="mt-3">Sửa bài viết</h3>

        <form method="POST" action="../../../posts/update">
            <div class="form-group">
                <input type="hidden" value="<?php echo isset($_GET['i']) ? htmlspecialchars($_GET['i']) : ''; ?>"
                    class="form-control" id="postId" name="postId">
            </div>

            <div class="form-group">
                <label for="title">Tiêu đề bài viết</label>
                <input type="text" value="<?php echo isset($_GET['t']) ? htmlspecialchars($_GET['t']) : ''; ?>"
                    class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="imageId">Hình ảnh bài viết</label>
                <input type="text" value="<?php echo isset($_GET['a']) ? htmlspecialchars($_GET['a']) : ''; ?>"
                    class="form-control" id="imageId" name="imageId">
            </div>
            <div class="form-group">
                <label for="supplierId">Nhà cung cấp</label>
                <input type="text" value="<?php echo isset($_GET['s']) ? htmlspecialchars($_GET['s']) : ''; ?>"
                    class="form-control" id="supplierId" name="supplierId">
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <input type="text" value="<?php echo isset($_GET['c']) ? htmlspecialchars($_GET['c']) : ''; ?>"
                    class="form-control" id="content" name="content">
            </div>
            <div class="form-group">
                <label for="category_post">Loại bài viết</label>
                <input type="text" value="<?php echo isset($_GET['l']) ? htmlspecialchars($_GET['l']) : ''; ?>"
                    class="form-control" id="category_post" name="category_post">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Sửa bài viết</button>
        </form>
    </div>
</div>