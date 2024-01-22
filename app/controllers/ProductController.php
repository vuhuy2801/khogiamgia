<?php
// File: controllers/ProductController.php
include_once 'scripts/InfoProductShopee.php';
include_once 'app/models/ProductModel.php';
include_once 'app/models/ProductPriceModel.php';
class ProductController
{
    private $InfoProductShopee;
    private $ProductModel;
    private $ProductPriceModel;
    public function __construct()
    {
        $this->InfoProductShopee = new InfoProductShopee();
        $this->ProductModel = new Product();
        $this->ProductPriceModel = new ProductPrice();
    }
    public function index()
    {
        echo "Theo dõi giá sản phẩm";

    }
    public function getCurrentPriceProduct()
    {
        // $InfoProductShopee = new InfoProductShopee();
        // productID| productName |image| link |rateCount |soldCount |status|
        // get current offset product form tem_offset-product.txt
        $offset = file_get_contents('tem_offset-product.txt');
        $offset = (int) $offset;
        // get list product from database
        $countProduct = $this->ProductModel->CountProduct();

        if ($countProduct - $offset < 10) {
            $offset = 0;
            file_put_contents('tem_offset-product.txt', $offset);
            return;
        }

        $listProduct = $this->ProductModel->GetLimitProduct($offset);
        try {
            foreach ($listProduct as $product) {
                $currentPrice = $this->InfoProductShopee->getBasicInfo($product['link']);
                echo $currentPrice->getID() . "<br>";
                $this->ProductPriceModel->setProductID($currentPrice->getId());
                $this->ProductPriceModel->setCurrentPrice($currentPrice->getPrice());
                $this->ProductPriceModel->setDate($currentPrice->getDate());
                $this->ProductPriceModel->Add();
            }
            echo "lấy giá thành công";
        } catch (Exception $e) {
            echo "lỗi  <br>";
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        // update offset
        $offset = $offset + 10;
        file_put_contents('tem_offset-product.txt', $offset);

    }
    // public function getCurrentPrice($id){
    //     $currentPrice = $this->InfoProductShopee->getCurrentPrice($id);
    // }
    public function getHistoryPriceProduct()
    {
        $sp_atk = isset($_GET['sp_atk']) ? $_GET['sp_atk'] : "";
        $xptdk = isset($_GET['xptdk']) ? $_GET['xptdk'] : "";

        $url = $_GET['link'] . ($sp_atk ? '&sp_atk=' . $sp_atk : "") . ($xptdk ? "&xptdk=" . $xptdk : "");
        header('Content-Type: application/json');
        if (!isset($url)) {
            // set code http
            http_response_code(400);
            echo "Vui lòng nhập link sản phẩm";
            return;
        }
        // check string is not url
        // Validate if a string is a valid URL format

        $url_validation_regex = "/^https?:\/\/(?:www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+(?:\/[^\/\s]*)?$/u
        ";
        if (!preg_match($url_validation_regex, $url)) {
            http_response_code(400);
            echo "Link không hợp lệ";
            return;
        }
        $labels = array();
        $values = array();
        // param link=link
        $this->InfoProductShopee->getBasicInfo($url);
        if ($this->InfoProductShopee->getId() == null) {
            http_response_code(400);
            echo "Link không hợp lệ";
            return;
        }
        // check id product exist in database
        $this->ProductModel->setProductID($this->InfoProductShopee->getId());
        if (!$this->ProductModel->isExist()) {
            // handle add new product
            $this->ProductModel->setProductName($this->InfoProductShopee->getName());
            $this->ProductModel->setImage($this->InfoProductShopee->getImage());
            $this->ProductModel->setLink($this->InfoProductShopee->getLink());
            $this->ProductModel->setRateCount($this->InfoProductShopee->getVoteRate());
            $this->ProductModel->setSoldCount($this->InfoProductShopee->getSold());
            $this->ProductModel->setStatus(1);
            $this->ProductModel->Add();
            // handle add new price
            $this->ProductPriceModel->setProductID($this->InfoProductShopee->getId());
            $this->ProductPriceModel->setCurrentPrice($this->InfoProductShopee->getPrice());
            $this->ProductPriceModel->setDate(date("Y-m-d"));
            $this->ProductPriceModel->Add();

            // // return error
            // http_response_code(400);
            // echo "Sản phẩm chưa được theo dõi trong hệ thống, vui lòng thử lại sau";
        }

        $this->ProductPriceModel->setProductID($this->InfoProductShopee->getId());
        // $this->InfoProductShopee->showInFo();
        $dataHistoryPrice = $this->ProductPriceModel->getHistoryPrice($this->InfoProductShopee->getId());

        // // if data < 2 return error
        // if (count($dataHistoryPrice) < 2) {
        //     http_response_code(400);
        //     echo "Sản phẩm chưa có lịch sử giá";
        //     return;
        // }

        usort($dataHistoryPrice, function ($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });

        foreach ($dataHistoryPrice as $key => $value) {
            $formattedDate = date('d-m-Y', strtotime($value['date']));
            // echo $formattedDate . " " . $value['currentPrice'] . "<br>";
            array_push($labels, $formattedDate);
            array_push($values, $value['currentPrice']);
        }
        // $labels = ($labels);
        // $values = json_encode($values);
        // return to api with json format
        // {
        //     "infoProduct":{
        //         "name":"",
        //         "price":"",
        //         "description":"",
        //         "image":"",
        //         "soldCount":"",
        //         "rateCount":"",
        //         "link":"",
        //         "currentPrice":"",
        //         "minPrice":"",
        //         "maxPrice":""

        //     },
        //     "dataChart":{
        //         "labels":"",
        //         "values":""
        //     }
        // }

        $infoProduct = array(
            "name" => $this->InfoProductShopee->getName(),
            "price" => $this->InfoProductShopee->getPrice(),
            "description" => $this->InfoProductShopee->getDescription(),
            "image" => $this->InfoProductShopee->getImage(),
            "soldCount" => $this->InfoProductShopee->getSold(),
            "rateCount" => $this->InfoProductShopee->getVoteRate(),
            "link" => $this->InfoProductShopee->getLink(),
            "currentPrice" => $this->InfoProductShopee->getPrice(),
            "minPrice" => $this->ProductPriceModel->getMinPrice(),
            "maxPrice" => $this->ProductPriceModel->getMaxPrice(),
        );
        $dataChart = array(
            "labels" => $labels,
            "values" => $values,
        );
        $data = array(
            "infoProduct" => $infoProduct,
            "dataChart" => $dataChart,
        );
        echo json_encode($data);
    }

    public function getAdviceProduct()
    {
        $_POST = json_decode(file_get_contents("php://input"), true);
        header('Content-Type: application/json');
        // get data post form user
        // {
        //     "description": "Dây cáp sạc nhanh Xiaomi USB Type-c 6A / 3A sạc nhanh Turbo cực chất VINNZY Bảo hành 1 đổi 1 trong vòng 6 tháng \n* khách hàng vui lòng đặt đúng cáp đúng công suất với củ sạc có sẵn , hoặc liên hệ để shop tư vấn \n \n \n \n- CÁP XIAOMI 6A ( LÕI CAM )  CÔNG SUẤT TỐI ĐA 120W ( PHÙ HỢP VỚI Sạc 33W, 67W , 120W ) Lên Được Sạc Tubro \n \n \n \n- CÁP XIAOMI 3A ( LÕI CAM )  CÔNG SUẤT TỐI ĐA 33W ( PHÙ HỢP VỚI 27W, 33W ) Lên Được Sạc Tubro \n \n \n \n- CÁP XIAOMI 2A  ( LÕI TRẮNG) CÔNG SUẤT TỐI ĐA 22.5W ( PHÙ HỢP VỚI CỦ SẠC 18W, 22.5W ) Sạc Nhanh\n \nDây sạc nhanh 3A,6A type C hỗ trợ sạc nhanh cho các dòng sạc Xiaomi: Mi 10, Mi11, Mi 10 Ultra, mi 11/ 11 pro/ 11 Ultra/ 11T/ 11T pro, K40, K40 gaming, Poco F3, F4/ pro, Black Shark 4/4s\n+ Dây chính hãng, mới 100%\n+ Hiển thị sạc max công suất cho củ sạc 33w, 55w, 67w, 120w\n+ Hoàn thiện cao cấp\n+ Đường kính dây 4.0 siêu bền, cứng cáp\n+ 2 đầu đúc đặc, chống gãy đứt\n+ Độ dài 1m\nTẤT CẢ SẢN PHẨM ĐƯỢC SHOP BẢO HÀNH 6 THÁNG DO LỖI NHÀ SẢN XUẤT\n \n* CHÍNH SÁCH BẢO HÀNH\n- Bảo hành chính hãng 7 ngày, lỗi 1 đổi 1\n- Yêu cầu sản phẩm vẫn còn mới, chưa qua sử dụng \n- Hoặc do sản phẩm bị lỗi hoặc hư hỏng do vận chuyển hoặc do VINZY\n \n* TRƯỜNG HỢP ĐƯỢC ĐỔI TRẢ \n- Hàng không đúng mẫu, màu sắc khi đặt\n- Không đủ số lượng, không đủ bộ như trong đơn hàng.\n \n* KHÔNG ĐƯỢC TRẢ LẠI HÀNG KHI \n- Khách hàng nhận hàng quá 07 ngày\n- Khách hàng gửi lại hàng không đúng mẫu mã, không phải sản phẩm của VINZY\n- Quý khách không thích, không hợp, đặt nhầm mã, nhầm màu,... \nSản phẩm có thể lệch màu lên đến 6%\n"
        // }
        $description = isset($_POST['description']) ? $_POST['description'] : "";
        // handle if description is short or null or not string return không có gợi ý
        if (strlen($description) < 100 || !is_string($description)) {
            echo "Không có gợi ý nào";
            return;
        }
        $adviceContent = $this->InfoProductShopee->getAdviceByGemini($description);
        echo $adviceContent;
    }

    public function addProduct()
    {
        // get list form list-link-product-shopee.txt is array
        // select 10 link in list-link-product-shopee.txt and remove selected 10 link in file
        $listLinkProduct = file_get_contents('list-link-product-shopee.txt');
        $listLinkProduct = explode("\n", $listLinkProduct);
        $selectedLinks = array_slice($listLinkProduct, 0, 10);
        $remainingLinks = implode("\n", array_slice($listLinkProduct, 10));
        file_put_contents('list-link-product-shopee.txt', $remainingLinks);
        // get info product from link
        if (is_array($selectedLinks)) {
            foreach ($selectedLinks as $link) {
                $this->InfoProductShopee->getBasicInfo($link);
                // $this->InfoProductShopee->showInFo();
                // check id product exist in database
                $this->ProductModel->setProductID($this->InfoProductShopee->getId());
                if (!$this->ProductModel->isExist()) {
                    // handle add new product
                    $this->ProductModel->setProductName($this->InfoProductShopee->getName());
                    $this->ProductModel->setImage($this->InfoProductShopee->getImage());
                    $this->ProductModel->setLink($this->InfoProductShopee->getLink());
                    $this->ProductModel->setRateCount($this->InfoProductShopee->getVoteRate());
                    $this->ProductModel->setSoldCount($this->InfoProductShopee->getSold());
                    $this->ProductModel->setStatus(1);
                    $this->ProductModel->Add();
                    // handle add new price
                    $this->ProductPriceModel->setProductID($this->InfoProductShopee->getId());
                    $this->ProductPriceModel->setCurrentPrice($this->InfoProductShopee->getPrice());
                    $this->ProductPriceModel->setDate(date("Y-m-d"));
                    $this->ProductPriceModel->Add();
                    echo "Thêm sản phẩm" . $this->InfoProductShopee->getName() . " thành công <br>";
                } else {
                    echo "Sản phẩm " . $this->InfoProductShopee->getName() . " đã tồn tại <br>";

                }
            }
        }

    }

    public function showHistoryPriceProduct()
    {
        include_once 'app/views/history-price/index.php';
    }
}

?>