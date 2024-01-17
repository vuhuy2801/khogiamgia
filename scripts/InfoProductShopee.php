<?php

use RPurinton\GeminiPHP\GeminiClient;
use RPurinton\GeminiPHP\GeminiPrompt;

include_once('lib\simple_html_dom.php');
class InfoProductShopee
{
    private $date;
    private $id;
    private $name;
    private $price;
    private $vote_rate;
    private $sold;
    private $description;
    private $advice;
    private $image;
    private $link;


    public function __construct()
    {
        $this->date = "";
        $this->id = "";
        $this->name = "";
        $this->price = "";
        $this->vote_rate = "";
        $this->sold = "";
        $this->description = "";
        $this->advice = "";
        $this->image = "";
        $this->link = "";
    }
    public function getLink()
    {
        return $this->link;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getVoteRate()
    {
        return $this->vote_rate;
    }
    public function getSold()
    {
        return $this->sold;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getAdvice()
    {
        return $this->advice;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setVoteRate($vote_rate)
    {
        $this->vote_rate = $vote_rate;
    }
    public function setSold($sold)
    {
        $this->sold = $sold;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setAdvice($advice)
    {
        $this->advice = $advice;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setlink($link)
    {
        $this->link = $link;
    }

    public function getBasicInfo($linkProduct)
    {
        // mock json 
        // {
        //     "@context": "http://schema.org",
        //     "@type": "Product",
        //     "name": "Chuột game không dây Logitech G304 - nhẹ, 6 nút lập trình, onboard memory, pin 250h",
        //     "description": "\n- Thương hiệu Logitech\n- Sản xuất tại Trung Quốc\n- Bảo hành chính hãng 2 năm\n=======================\nTHÔNG TIN CHI TIẾT\n- Thiết kế nhỏ gọn, thao tác linh hoạt\n- Độ phân giải quang học 200 - 12000 DPI.\n- Tốc độ phản hồi 1ms, tốc độ xử lý tối đa 400 IPS\n- 6 nút lập trình tiện dụng\n- Công nghệ không dây Lightspeed\n- Cảm biến Hero thế hệ mới\nTHÔNG SỐ KỸ THUẬT THỰC TẾ\n- Chiều cao: 116,6 mm\n- Chiều rộng: 62,15 mm\n- Chiều dày: 38,2 mm\n- Trọng lượng: 99 g\n===========================\nG304 là chuột chơi game không dây LIGHTSPEED được thiết kế cho hiệu suất thực sự với các đột phá công nghệ mới nhất ở mức giá thành phù hợp. Đó là chơi game không dây thế hệ mới, hiện đã sẵn sàng cho mọi game thủ\nCẢM BIẾN HERO\nHERO là cảm biến quang học đổi mới được thiết kế bởi Logitech G để mang lại hiệu suất đẳng cấp dẫn đầu và tiết kiệm năng lượng tới 10 lần (so với hệ thệ trước). Cảm biến HERO mang lại hiệu suất ổn định và chính xác vượt trội với khả năng làm mượt, lọc và tăng tốc từ 200 tới 12.000 DPI. G304 có thể lưu tới 5 cấu hình với tối đa 5 cấp độ DPI trên bộ nhớ tích hợp.\nKHÔNG DÂY LIGHTSPEED\nThông qua chế tạo và thiết kế đầu cuối, Logitech G đã phát triển một giải pháp không dây mạnh mẽ để giải quyết vấn đề cơ bản của độ trễ, độ ổn định và khả năng kết nối. Kết quả cuối cùng là LIGHTSPEED, giải pháp không dây cấp độ chuyên gia đạt được hiệu suất như có dây.\nTHỜI GIAN SỬ DỤNG PIN SIÊU DÀI\nCảm biến HERO và công nghệ LIGHTSPEED không dây đem lại hiệu suất đỉnh cao cho phép bạn chơi game trong hàng tháng. Nó đem lại tới 250 giờ hoạt động chỉ trên một quả pin AA. Nó có thể được điều chỉnh để sử dụng trong tới 9 tháng ở mức thông thường trong chế độ Bền. Có thể chọn chế độ này qua Phần mềm Chơi game của Logitech.\nSIÊU NHẸ\nTại Logitech G, chuột chơi game không dây không cần thiết phải nặng. G304 rất nhẹ, chỉ có 99 gram, nhờ có thiết kế cơ học trọng lượng nhẹ và đặc điểm sử dụng pin siêu hiệu quả.\n6 NÚT CÓ THỂ LẬP TRÌNH\nCác phím chính của G304, cả ở bên trái và phải, được đánh giá 10 triệu lần nhấp. G304 cũng có nút giữa, nút DPI và hai nút bên có thể được lập trình tùy theo sở thích của bạn bằng G HUB của Logitech\nỨNG LỰC NÚT CƠ HỌC\nHệ thống ứng lực cho nút cơ học với các nút tách biệt nâng cao sự ổn định của các nút chuột trái, phải và giúp giảm lực cần thiết để nhấp chuột. Điều này tạo ra hiệu suất nút nhanh chóng, đáng tin cậy mà bạn có thể tin tưởng ngay cả ở những cuộc thi đấu căng thẳng nhất.\nCHƠI Ở BẤT CỨ ĐÂU\nThiết kế bền bỉ, trọng lượng nhẹ với kích thước nhỏ gọn và khoang chứa đầu thu nano USB tích hợp khiến cho G304 trở thành người bạn đồng hành tuyệt vời.\nChú ý \n- Mổi sản phẩm Logitech có 2 cấp độ số Serial khác nhau. 1 số trên bao bì (ngoài vỏ hộp) và 1 số bên trên sản phẩm. Hai số Serial này hoàn toàn khác nhau. Do chính sách quản lí riêng của - Logitech nên đây là vấn đề hoàn toàn bình thường\nLogitech bảo hành điện tử theo mã số đơn hàng (Ngoài ra còn bảo hành theo mã số seri từng sản phẩm) nên sẽ không có phiếu bảo hành đi kèm\n- Tất cả sản phẩm Logitech đều có thể còn hoặc không còn niêm phong của nhà sản xuất tùy vào từng đợt hàng, chính sách của các đơn vị nhập khẩu, phân phối và quá trình kiểm tra sản phẩm.",
        //     "url": "https://shopee.vn/Chuột-game-không-dây-Logitech-G304-nhẹ-6-nút-lập-trình-onboard-memory-pin-250h-i.52679373.4501796479",
        //     "productID": "4501796479",
        //     "image": "https://down-vn.img.susercontent.com/file/sg-11134201-22100-cishggrmcriv0c",
        //     "brand": "Logitech",
        //     "offers": {
        //         "@type": "Offer",
        //         "price": "799000.00",
        //         "priceCurrency": "VND",
        //         "seller": {
        //             "@context": "http://schema.org",
        //             "@type": "Organization",
        //             "name": "LOGITECH OFFICIAL SHOP",
        //             "url": "https://shopee.vn/logitech_officialshop?entryPoint=ShopByPDP",
        //             "image": "https://down-vn.img.susercontent.com/file/97e16ce2497766d89209dc6348283b5f",
        //             "aggregateRating": {
        //                 "@type": "AggregateRating",
        //                 "bestRating": 5,
        //                 "worstRating": 1,
        //                 "ratingCount": "138148",
        //                 "ratingValue": "4.91"
        //             }
        //         },
        //         "itemCondition": "NewCondition",
        //         "availability": "http://schema.org/InStock"
        //     },
        //     "aggregateRating": {
        //         "@type": "AggregateRating",
        //         "bestRating": 5,
        //         "worstRating": 1,
        //         "ratingCount": "3205",
        //         "ratingValue": "4.93"
        //     }
        // }

        // offers AggregateOffer
        // "offers": {
        //     "@type": "AggregateOffer",
        //     "lowPrice": "99000.00",
        //     "highPrice": "148000.00",
        //     "priceCurrency": "VND",
        //     "seller": {
        //         "@context": "http://schema.org",
        //         "@type": "Organization",
        //         "name": "GARUDA_OFFICIAL",
        //         "url": "https://shopee.vn/garuda_official",
        //         "image": "https://down-vn.img.susercontent.com/file/vn-11134216-7r98o-lq8l2pulx13m33",
        //         "aggregateRating": {
        //             "@type": "AggregateRating",
        //             "bestRating": 5,
        //             "worstRating": 1,
        //             "ratingCount": "1407",
        //             "ratingValue": "4.88"
        //         }
        //     },
        //     "itemCondition": "NewCondition",
        //     "availability": "http://schema.org/InStock"
        // },

        $this->link = $linkProduct;
        $dom = file_get_html($linkProduct);
        date_default_timezone_set('Asia/Bangkok');
        $this->date = date('Y-m-d H:i:s');
        // script[data-rh="true"][type="application/ld+json"]
        $script = $dom->find('script[data-rh="true"][type="application/ld+json"]', 1)->innertext;
        // if $script is null
        if ($script == null) {
            return false;
        }
        $script = json_decode($script, true);
        $this->id = $script['productID'];
        $this->name = $script['name'];
        //if AggregateOffer
        if ($script['offers']['@type'] == "AggregateOffer") {
            $this->price = $script['offers']['lowPrice'];
        } else {
            $this->price = $script['offers']['price'];
        }
        // 799000.00 to 799000
        $this->price = str_replace(['.00'], [''], $this->price);
        $this->image = $script['image'];
        $this->description = $script['description'];
        $this->vote_rate = $script['aggregateRating']['ratingValue'];
        $this->sold = $script['aggregateRating']['ratingCount'];
        // $this->advice = $this->getAdviceByGemini($this->description);
        return $this;

    }
    public function getCurrentPrice($link)
    {
        $dom = file_get_html($link);
        date_default_timezone_set('Asia/Bangkok');
        $this->date = date('Y-m-d H:i:s');
        $string_id = $dom->find('.ha5ReG a', 0)->href;
        $this->id = explode("/", $string_id)[4];
        if ($dom->find('.Ybrg9j', 0) != null) {
            $this->price = $dom->find('.Ybrg9j', 0)->plaintext;
        } else if ($dom->find('.jS-qN8', 0) != null) {
            $this->price = $dom->find('.jS-qN8', 0)->plaintext;
        } else {
            $this->price = $dom->find('.TVzooJ', 0)->plaintext;
        }
        $this->price = str_replace(['₫', '.', 'đ'], ['', '', ''], $this->price);


        return $this;
    }
    public function showCurrentPrice()
    {
        echo $this->id;
        echo $this->price;
        echo $this->date;
        return $this;
    }
    public function getAdviceByGemini($infoProduct)
    {
        $client = new GeminiClient([
            'projectId' => 'top-alliance-408808',
            'regionName' => 'asia-southeast1',
            'credentialsPath' => 'config\top-alliance-408808-ec7e07262b27.json',
            'modelName' => 'gemini-pro',
        ]);

        $prompt = new GeminiPrompt([
            'generation_config' => [
                'temperature' => 0.9,
                'topP' => 1,
                'topK' => 40,
                'maxOutputTokens' => 2048,
            ],
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        'text' => ' 
                        tôi có một đoạn mô tả sau:
                    - Thương hiệu Logitech
                    - Sản xuất tại Trung Quốc
                    - Bảo hành chính hãng 2 năm
                    =======================
                    THÔNG TIN CHI TIẾT
                    - Thiết kế nhỏ gọn, thao tác linh hoạt
                    - Độ phân giải quang học 200 - 12000 DPI.
                    - Tốc độ phản hồi 1ms, tốc độ xử lý tối đa 400 IPS
                    - 6 nút lập trình tiện dụng
                    - Công nghệ không dây Lightspeed
                    - Cảm biến Hero thế hệ mới
                    THÔNG SỐ KỸ THUẬT THỰC TẾ
                    - Chiều cao: 116,6 mm
                    - Chiều rộng: 62,15 mm
                    - Chiều dày: 38,2 mm
                    - Trọng lượng: 99 g
                    ===========================
                    G304 là chuột chơi game không dây LIGHTSPEED được thiết kế cho hiệu suất thực sự với các đột phá công nghệ mới nhất ở mức giá thành phù hợp. Đó là chơi game không dây thế hệ mới, hiện đã sẵn sàng cho mọi game thủ
                    CẢM BIẾN HERO
                    HERO là cảm biến quang học đổi mới được thiết kế bởi Logitech G để mang lại hiệu suất đẳng cấp dẫn đầu và tiết kiệm năng lượng tới 10 lần (so với hệ thệ trước). Cảm biến HERO mang lại hiệu suất ổn định và chính xác vượt trội với khả năng làm mượt, lọc và tăng tốc từ 200 tới 12.000 DPI. G304 có thể lưu tới 5 cấu hình với tối đa 5 cấp độ DPI trên bộ nhớ tích hợp.
                    KHÔNG DÂY LIGHTSPEED
                    Thông qua chế tạo và thiết kế đầu cuối, Logitech G đã phát triển một giải pháp không dây mạnh mẽ để giải quyết vấn đề cơ bản của độ trễ, độ ổn định và khả năng kết nối. Kết quả cuối cùng là LIGHTSPEED, giải pháp không dây cấp độ chuyên gia đạt được hiệu suất như có dây.
                    THỜI GIAN SỬ DỤNG PIN SIÊU DÀI
                    Cảm biến HERO và công nghệ LIGHTSPEED không dây đem lại hiệu suất đỉnh cao cho phép bạn chơi game trong hàng tháng. Nó đem lại tới 250 giờ hoạt động chỉ trên một quả pin AA. Nó có thể được điều chỉnh để sử dụng trong tới 9 tháng ở mức thông thường trong chế độ Bền. Có thể chọn chế độ này qua Phần mềm Chơi game của Logitech.
                    SIÊU NHẸ
                    Tại Logitech G, chuột chơi game không dây không cần thiết phải nặng. G304 rất nhẹ, chỉ có 99 gram, nhờ có thiết kế cơ học trọng lượng nhẹ và đặc điểm sử dụng pin siêu hiệu quả.
                    6 NÚT CÓ THỂ LẬP TRÌNH
                    Các phím chính của G304, cả ở bên trái và phải, được đánh giá 10 triệu lần nhấp. G304 cũng có nút giữa, nút DPI và hai nút bên có thể được lập trình tùy theo sở thích của bạn bằng G HUB của Logitech
                    ỨNG LỰC NÚT CƠ HỌC
                    Hệ thống ứng lực cho nút cơ học với các nút tách biệt nâng cao sự ổn định của các nút chuột trái, phải và giúp giảm lực cần thiết để nhấp chuột. Điều này tạo ra hiệu suất nút nhanh chóng, đáng tin cậy mà bạn có thể tin tưởng ngay cả ở những cuộc thi đấu căng thẳng nhất.
                    CHƠI Ở BẤT CỨ ĐÂU
                    Thiết kế bền bỉ, trọng lượng nhẹ với kích thước nhỏ gọn và khoang chứa đầu thu nano USB tích hợp khiến cho G304 trở thành người bạn đồng hành tuyệt vời.
                    Chú ý
                    - Mổi sản phẩm Logitech có 2 cấp độ số Serial khác nhau. 1 số trên bao bì (ngoài vỏ hộp) và 1 số bên trên sản phẩm. Hai số Serial này hoàn toàn khác nhau. Do chính sách quản lí riêng của - Logitech nên đây là vấn đề hoàn toàn bình thường
                    Logitech bảo hành điện tử theo mã số đơn hàng (Ngoài ra còn bảo hành theo mã số seri từng sản phẩm) nên sẽ không có phiếu bảo hành đi kèm
                    - Tất cả sản phẩm Logitech đều có thể còn hoặc không còn niêm phong của nhà sản xuất tùy vào từng đợt hàng, chính sách của các đơn vị nhập khẩu, phân phối và quá trình kiểm tra sản phẩm.
                    
                    tôi cần output tương tự như sau
                    Đánh giá chung:
                    
                    Chuột game không dây Logitech G304 là một lựa chọn tuyệt vời cho các game thủ muốn có một con chuột không dây nhẹ và có độ chính xác cao.
                    Chuột có thiết kế công thái học, vừa vặn thoải mái trong tay và có 6 nút lập trình có thể tùy chỉnh theo nhu cầu của người dùng.
                    Chuột cũng có bộ nhớ trong, cho phép bạn lưu các cài đặt của mình và sử dụng chúng trên nhiều máy tính khác nhau.
                    Tuổi thọ pin của chuột lên tới 250 giờ, vì vậy bạn có thể sử dụng nó trong nhiều ngày mà không cần phải sạc lại.
                    Ưu điểm:
                    
                    Thiết kế công thái học, thoải mái khi sử dụng
                    6 nút lập trình có thể tùy chỉnh
                    Bộ nhớ trong để lưu các cài đặt của người dùng
                    Tuổi thọ pin lên tới 250 giờ
                    Nhược điểm:
                    
                    Giá thành hơi cao so với một số loại chuột chơi game khác
                    Không có đèn nền RGB
                    Kết luận:
                    
                    Chuột game không dây Logitech G304 là một lựa chọn tuyệt vời cho các game thủ muốn có một con chuột không dây nhẹ và có độ chính xác cao. Mặc dù giá thành hơi cao, nhưng những tính năng và hiệu suất của chuột này xứng đáng với số tiền bạn bỏ ra.'
                    ],
                ],
                [
                    'role' => 'assistant',
                    'parts' => [
                        'text' => 'Đánh giá chung:
    
                    Chuột chơi game không dây Logitech G304 là một lựa chọn tuyệt vời cho các game thủ muốn có một con chuột không dây nhẹ và có độ chính xác cao. Chuột có thiết kế công thái học, vừa vặn thoải mái trong tay và có 6 nút lập trình có thể tùy chỉnh theo nhu cầu của người dùng. Chuột cũng có bộ nhớ trong, cho phép bạn lưu các cài đặt của mình và sử dụng chúng trên nhiều máy tính khác nhau. Tuổi thọ pin của chuột lên tới 250 giờ, vì vậy bạn có thể sử dụng nó trong nhiều ngày mà không cần phải sạc lại.
                    
                    Ưu điểm:
                    
                    * Thiết kế công thái học, thoải mái khi sử dụng
                    * 6 nút lập trình có thể tùy chỉnh
                    * Bộ nhớ trong để lưu các cài đặt của người dùng
                    * Tuổi thọ pin lên tới 250 giờ
                    
                    Nhược điểm:
                    
                    * Giá thành hơi cao so với một số loại chuột chơi game khác
                    * Không có đèn nền RGB
                    
                    Kết luận:
                    
                    Chuột game không dây Logitech G304 là một lựa chọn tuyệt vời cho các game thủ muốn có một con chuột không dây nhẹ và có độ chính xác cao. Mặc dù giá thành hơi cao, nhưng những tính năng và hiệu suất của chuột này xứng đáng với số tiền bạn bỏ ra.'
                    ],
                ],
                [
                    'role' => 'user',
                    'parts' => [
                        'text' => 'Tinh chất hàu biển  Goodhealth Oyster Plus tăng cường sinh lực phái mạnh, tăng cường sức khỏe, thể lực, chất lượng cuộc sống
    
                    GIỚI THIỆU SẢN PHẨM
    
                    Hàu là một trong những loài giàu kẽm nhất, và chứa nhiều protein, khoáng chất, axit béo. Nghiên cứu chứng minh rằng, hàu có tác động tích cực đến chức năng sinh lý của phái mạnh, tăng ham muốn, giảm khả năng vô sinh, hỗ trợ chứng rối loạn cương dương, tuyến tiền liệt. Bên cạnh đó, còn tăng cường năng lượng, tăng cường trao đổi chất, hỗ trợ gan thải độc, giảm tác hại của bia rượu,...
                    Tinh chất hàu Oyster Plus chứa các dưỡng chất thiết yếu như: Kẽm, các vitamin, khoáng chất và acid amin từ Hàu biển New Zealand trong lành nhất thế giới; giúp hỗ trợ tăng cường sức khỏe và sinh lực nam giới bền bỉ, dẻo dai.
                    Không những vậy, Oyster Plus còn giúp tăng cường Testosterone nội sinh; cải thiện chất lượng tinh trùng tăng khả năng thụ thai, kéo dài thời gian mãn dục nam giới.  
                    THÀNH PHẦN
                    
                    Thành phần cho 1 viên:
                    
                    - Bột chiết thịt hàu biển
                    - Kẽm Oxid
                    CÔNG DỤNG
                    - Tăng cường sinh lực đàn ông, tăng cường sức khỏe sinh lý nam giới một cách tự nhiên,kích thích sản xuất nội tiết tố Testosterone.
                    - Cải thiện và tăng số lượng ,chất lượng tinh trùng, giảm tỷ lệ vô sinh , tỷ lệ dị tật tinh trùng.
                    
                    - Chứa Acid Amin Taurine tốt cho người mắc chứng người suy giảm miễn dịch, tim mạch, huyết áp, mỡ máu và choleterol cao.
                    
                    - Bổ sung tinh chất từ con hàu, giúp tăng cường năng lực sinh lý cho đàn ông.
                    
                    - Tăng cường sinh lực đàn ông, hỗ trợ vấn đề sinh lý yếu.
                    
                    - Tăng khoái cảm tình dục, kéo dài thời gian giao hợp. Kích thích sản xuất nội tiết tố nam trong cơ thể 1 cách tự nhiên, kéo dài thời gian mãn dục nam giới.
                    
                    - Giảm tỷ lệ vô sinh do tăng chất lượng, số lượng tinh trùng.
                    
                    
                    
                    HƯỚNG DẪN SỬ DỤNG
                    
                    - Ngày uống 2v chia 2 lần sau ăn trưa và ăn tối khoảng 30\'.
                    
                    
                    
                    LƯU Ý
                    
                    - Sản phẩm không phải là thuốc và không thể thay thế thuốc chữa bệnh
                    
                    - Người bị dị ứng với hải sản nên thận trọng khi sử dụng sản phẩm
                    
                    - Bảo quản nơi khô ráo (<30 độ C), tránh xa tầm tay trẻ em
                    
                    
                    
                    Xuất xứ: New Zealand
                    
                    NSX/HSD: 36 tháng kể từ ngày sản xuất, ngày sản xuất được in trên nhãn sản phẩm'
                    ],
                ],
                [
                    'role' => 'assistant',
                    'parts' => [
                        'text' => '
                    **Đánh giá chung:**
    
                    Tinh chất hàu biển Goodhealth Oyster Plus là một sản phẩm hỗ trợ sức khỏe sinh lý nam giới được chiết xuất từ hàu biển New Zealand. Sản phẩm chứa các dưỡng chất thiết yếu như kẽm, vitamin, khoáng chất và acid amin, giúp tăng cường sinh lực, cải thiện chất lượng tinh trùng và hỗ trợ các v��n đề về sinh lý nam giới.
                    
                    **Ưu điểm:**
                    
                    * Chiết xuất từ hàu biển New Zealand nguyên chất
                    * Chứa các dưỡng chất thiết yếu cho sức khỏe sinh lý nam giới
                    * Giúp tăng cường sinh lực, cải thiện chất lượng tinh trùng
                    * Hỗ trợ các vấn đề về sinh lý nam giới như rối loạn cương dương, xuất tinh sớm, mãn dục nam...
                    
                    **Nhược điểm:**
                    
                    * Sản phẩm không phải là thuốc, không có tác dụng thay thế thuốc chữa bệnh
                    * Người bị dị ứng với hải sản nên thận trọng khi sử dụng
                    
                    **Kết luận:**
                    
                    Tinh chất hàu biển Goodhealth Oyster Plus là một sản phẩm hỗ trợ sức khỏe sinh lý nam giới an toàn và hiệu quả. Sản phẩm được chiết xuất từ hàu biển New Zealand nguyên chất, chứa các dưỡng chất thiết yếu cho sức khỏe nam giới. Tuy nhiên, sản phẩm không phải là thuốc, không có tác dụng thay thế thuốc chữa bệnh. Người bị dị ứng với hải sản nên thận trọng khi sử dụng.'
                    ],
                ],
                // [
                //     'role' => 'user',
                //     'parts' => [
                //         'text' => ' hãy chỉ sáng tạo thông tin đúng với mô tả sản phẩm'
                //     ],
                // ],
                // [
                //     'role' => 'assistant',
                //     'parts' => [
                //         'text' => 'không có lời khuyên nào cho sản phẩm này.'
                //     ],
                // ],
                [
                    'role' => 'user',
                    'parts' => [
                        'text' => $infoProduct,
                    ],
                ]
            ],
        ]);
        $response = $client->getResponse($prompt->toJson());
        $Parsedown = new Parsedown();

        return $Parsedown->text($response->getText());
    }

    public function showInFo()
    {
        echo "id:" . $this->id;
        echo "<br>";
        echo "ảnh:" . $this->image;
        echo "<br>";
        echo "<img src='$this->image' alt='ảnh sản phẩm' width='200' height='200'>";
        echo "<br>";
        echo "date:" . $this->date;
        echo "<br>";
        echo "tên sản phẩm:" . $this->name;
        echo "<br>";
        echo "giá:" . $this->price;
        echo "<br>";
        echo "vote rate:" . $this->vote_rate;
        echo "<br>";
        echo "Lượt bán:" . $this->sold;
        echo "<br>";
        // echo "mô tả:" . $this->description;

        echo "<br>";
        // echo "lời khuyên" . $this->getAdviceByGemini($this->description);
        // echo "<br>";
    }



}

// <!-- $link =
// "https://shopee.vn/5SE.Gi%C3%A1-si%C3%AAu-r%E1%BA%BB.m%C3%A1y-nh%E1%BB%8F-g%E1%BB%8Dn-c%E1%BA%A5u-h%C3%ACnh-6s-t%E1%BA%B7ng-k%C3%A8m-ph%E1%BB%A5-ki%E1%BB%87n-.-c%C3%B3-b%E1%BA%A3o-h%C3%A0nh.-i.459344212.19489656104";
// date_default_timezone_set('Asia/Bangkok'); // Set the time zone to UTC+7 (Asia/Bangkok)
// $date = date('Y-m-d H:i:s');
// echo $date;
// echo "<br>";
// include_once('simple_html_dom.php');
// $dom = file_get_html($link);
// $string_id = $dom->find('.ha5ReG a', 0)->href;
// echo "id:" . explode("/", $string_id)[4];
// echo "<br>";
// echo "tên sản phẩm:" . $dom->find('._5f9gl5 span', 0)->plaintext;
// echo "<br>";
// if ($dom->find('.Ybrg9j', 0) != null) {
// echo "giá:" . $dom->find('.Ybrg9j', 0)->plaintext;
// } else if ($dom->find('.jS-qN8', 0) != null) {
// echo "giá:" . $dom->find('.jS-qN8', 0)->plaintext;
// } else {
// echo "giá:" . $dom->find('.TVzooJ', 0)->plaintext;
// }

// echo "<br>";
// echo "vote rate:" . $dom->find('.sbAxkj', 0)->plaintext;
// echo "<br>";
// echo "Lượt bán:" . $dom->find('.product-review__sold-count', 0)->plaintext;
// echo "<br>";
// $arr_mota = $dom->find('._3cIWQC');
// $strMoTa = "";
// // echo "mô tả:" . $dom->find('._46g+V7', 0)->plaintext;
// foreach ($arr_mota as $mota) {
// $strMoTa .= $mota->plaintext . "\n";
// }
// echo "lời khuyên" . getAdvice($strMoTa); -->


?>