<?php
echo itemPromotion('Free Ship', '2023-12-22', '10%', '100,000vnđ', '20,000vnđ', 'Mã nhập tay', 99, 'Thời trang', 'Mã giảm giá sử dụng 1 lần', 'https://shopee.vn/', 'ABC123', false);
echo itemPromotion('Free Ship', '2023-12-23', '15%', '120,000vnđ', '25,000vnđ', 'Có sẵn trong ví', 80, 'Điện tử', 'Khuyến mãi đặc biệt', 'https://shopee.vn/', 'ABC123', true);
echo itemPromotion('Voucher extra', '2023-12-24', '20%', '150,000vnđ', '30,000vnđ', 'Mã nhập tay', 75, 'Đồ gia dụng', 'Giảm giá cuối năm', 'https://shopee.vn/', 'ABC123', false);
echo itemPromotion('Voucher extra', '2023-12-25', '25%', '200,000vnđ', '40,000vnđ', 'Mã nhập tay', 60, 'Thực phẩm', 'Khuyến mãi Noel', 'https://shopee.vn/', 'ABC123', false);
echo itemPromotion('shopee live', '2023-12-26', '30%', '250,000vnđ', '50,000vnđ', 'Có sẵn trong ví', 50, 'Điện lạnh', 'Bán hết cuối năm', 'https://shopee.vn/', 'ABC123', true);
echo itemPromotion('shopee live', '2023-12-27', '12%', '180,000vnđ', '35,000vnđ', 'Có Sẵn trong ví', 90, 'Thời trang', 'Mùa đông ấm áp', 'https://shopee.vn/', '2511EBV100K', true);
function itemPromotion($promotionType, $endDate, $discountValue, $minPrice, $maxDiscount, $promotionHashtag, $remaining, $category, $note, $link, $promotionCode, $isOpenApp)
{
    return '
    <div class="item-promotion">
        <div class="row promotion-card">
            <div class="col-5 text-center d-flex ">
            <div>
                <div class="item-promotion__img">
                    <img src="public\images\logo\logo-shopee-tron.png" alt="" />
                </div>
                <div class="promotion-type">' . $promotionType . '</div>
                <div class="end-date">
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                    ' . $endDate . '
                </div>
                </div>
                
            </div>
            <div class="col-7">
                <div class="discount-value">Giảm <span>' . $discountValue . '</span></div>
                <div class="min-price">Tối thiểu <span>' . $minPrice . '</span></div>
                <div class="max-discount">Tối đa <span>' . $maxDiscount . '</span></div>
                <div class="type">
                    <span class="badge badge-promotion"># ' . $promotionHashtag . '</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="remaining mt-2">còn lại:<span>' . $remaining . '</span></div>
            <div class="category mt-2">
                ngành hàng: <span>' . $category . '</span>
            </div>
            <div class="warning mt-2 mb-4"><span>Lưu ý:</span> ' . $note . '</div>
            <div class="d-flex justify-content-end">
                ' . renderTypeEvent($isOpenApp, $promotionCode, $link) . '
            </div>
        </div>
    </div>
    ';
}
function renderTypeEvent($isOpenApp, $promotionCode, $link)
{
    if ($isOpenApp) {
        return '<button type="button" class="btn badge-copy" onclick="openLink(\'' . $link . '\')">Mở App Ngay</button>';
    } else {
        return '<button type="button" class="btn badge-copy" onclick="copyCouponCode(event,\'' . $promotionCode . '\', \'' . $link . '\')">Sao chép ngay</button>';
    }
}

?>