<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../../public/css/bootstrap/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/sidebar.css">
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
                <div class="mt-5 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        This is Home page
                    </h3>

                </div>

            </div>
        </div>
    </div>


    <script src="../../public\js\bootstrap\bootstrap.bundle.min.js"> </script>


</body>

</html>