use dbVoucher;

INSERT INTO CATEGORY (categoryId, categoryName) VALUES
(1, 'Toàn sàn'),
(2, 'Shopee Mail'),
(3, 'Voucher Extra'),
(4, 'Thời trang'),
(5, 'Tiêu dùng'),
(6, 'Đời sống'),
(7, 'Điện tử');

INSERT INTO SUPPLIER (supplierName, address_target, logoSupplier) VALUES 
    ('Shopee', '/shopee', '/public/uploads/suppliers/27-01-2024/Shopee.svg.png'),
    ('Tiki', '/tiki', '/public/uploads/suppliers/27-01-2024/Logo_Tiki.png'),
    ('ShopeeFood', '/shopee-food', '/public/uploads/suppliers/28-01-2024/Shopee-Food-Logo.png'),
    ('Lazada', '/lazada' ,'/public/uploads/suppliers/27-01-2024/lazada-logo-freelogovectors.net_.png'),
    ('Grab','/grab', '/public/uploads/suppliers/27-01-2024/grab-logo.png');

INSERT INTO POST (title, image,slug, supplierId, content, description, categories_post, createdAt, updateAt,status)
VALUES 
    ('CUỘC THI VÔ ĐỊCH PHÁT TRIỂN WEB - WEB DEV CHAMPION 2023', 'https://api.vuhuy.site/uploads/small_img_index_73bc26433c.png',
    'couc-thi-vo-dich-phat-trien-web-web-dev-champion-2023', 1, 'Exciting news about the latest gadgets...', 'Introducing the newest electronic devices in the market...', 1, '2023-12-20','2023-12-20', 1);

INSERT INTO VOUCHER (voucherId, voucherName, quantity, expressAt, expiresAt, conditionsOfUse, categoryId, createdAt, updatedAt, is_trend, supplierId, status, address_target, discountType, maximumDiscount, minimumDiscount, is_inWallet)
VALUES 
('SPPBAYTET1', '60K', 100, '2024-01-25', '2024-02-28', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 2, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 1, 1, 'https://shopee.vn/B%C3%B4ng-t%E1%BA%A9y-trang-Tetra-600m-i.512108408.23987692290?utm_campaign=-&utm_content=PING----&utm_medium=affiliates&utm_source=an_17383630066&utm_term=akao6i1y3w6f', 1, '250K', '20K', 1),
('WCP2412', '20K', 100, '2024-01-25', '2024-02-28', 'Áp dụng cho học sinh, sinh viên', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 2, 1, 'https://shopee.vn/product/37251700/17998941445?utm_campaign=-&utm_content=LRP----&utm_medium=affiliates&utm_source=an_17383630066&utm_term=akao875henmu', 1,'250K', '20K', 1),
('SPPBAYTET2', '30K', 100, '2024-01-25', '2024-02-28','Áp dụng cho học sinh, sinh viên', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 1, 1, 'https://shopee.vn/B%C3%B4ng-t%E1%BA%A9y-trang-Tetra-600m-i.512108408.23987692290?utm_campaign=-&utm_content=PING----&utm_medium=affiliates&utm_source=an_17383630066&utm_term=akao9hn2cm27', 1,'250K', '20K', 1),
('SPPBAYTET5', '50K', 100, '2024-01-25', '2024-02-28','Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 3, 1, 'https://shopee.vn/product/279658061/19039255620?utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_17350340019&utm_term=akaoaasd7huq', 1, '250K', '20K', 1),
('SPPBAYTET9', 'Freeship', 100, '2024-01-25', '2024-02-28','Áp dụng cho học sinh, sinh viên', 3, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 2, 1, 'https://shopee.vn/product/512108408/24702677246?utm_campaign=-&utm_content=PING----&utm_medium=affiliates&utm_source=an_17383630066&utm_term=akaobm7mpfcs', 1,'250K', '20K', 1),
('SPPBAYTET6', '50K', 100, '2024-01-25', '2024-02-28','Áp dụng cho học sinh, sinh viên', 2, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 2, 1, 'https://shopee.vn/product/512108408/24702677246?utm_campaign=-&utm_content=PING----&utm_medium=affiliates&utm_source=an_17383630066&utm_term=akaobm7mpfcs', 1,'250K', '20K', 1),
('TKBDAY11MO', '70K', 100, '2024-01-25', '2024-02-28','Áp dụng ngành hàng sức khỏe làm đẹp', 2, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 2, 1, 'https://tiki.vn/cua-hang/remax-viet-nam?utm_source=tiki-aff&utm_medium=tiki-aff&utm_campaign=AFF_NBR_TIKIAFF_UNK_TIKIVN-MGGCOM_ALL_VN_ALL_UNK_UNK_TAPX.5d3a2911-3159-4631-a660-393ae8b9e8c0_TAPU.d638b9fc-397c-4267-b133-fd9e76e780d8&utm_term=TAPO.TIKI&utm_content=MAGIAMGIA-SEARCH---&tclid=3bd8fc36-5eef-4cf9-96a3-5ef9e3b77fa4&fsl=true&isOpenStore=false&trackId=65b59b393ff6d26694b21e9a&osName=Windows&deepLink=tikivn%3A%2F%2Fevents%3Furl%3Dhttps%253A%252F%252Ftiki.vn%252Fcua-hang%252Fremax-viet-nam%253Futm_source%253Dtiki-aff%2526utm_medium%253Dtiki-aff%2526utm_campaign%253DAFF_NBR_TIKIAFF_UNK_TIKIVN-MGGCOM_ALL_VN_ALL_UNK_UNK_TAPX.5d3a2911-3159-4631-a660-393ae8b9e8c0_TAPU.d638b9fc-397c-4267-b133-fd9e76e780d8%2526utm_term%253DTAPO.TIKI%2526utm_content%253DMAGIAMGIA-SEARCH---%2526tclid%253D3bd8fc36-5eef-4cf9-96a3-5ef9e3b77fa4&clickId=42604132-ac8d-4afb-9b15-2f038a13b213&fullUrl=https%3A%2F%2Fti.ki%2FGMUM6C9v%2FMGGCOM%3FTIKI_URI%3Dhttps%253A%252F%252Ftiki.vn%252Fcua-hang%252Fremax-viet-nam%26utm_term%3DTAPO.TIKI%26utm_source%3Dan_17392880000%26utm_medium%3Daffiliates%26utm_campaign%3D-%26utm_content%3DMAGIAMGIA-SEARCH---&isFBApp=false&deepLinkData=&hash=MGGCOM', 1,'250K', '20K', 1);

INSERT INTO USED (voucherId, usedCount)
VALUES 
('WCP2412', 10);

-- id sản phẩm tự động random nên muốn insert vào price thì select ra trước để có id insert 
INSERT INTO BANNER (image, title, address_target, status, createdAt, updatedAt) VALUES 
    ('banner1.jpg', 'Khuyến mãi Đặc biệt', 'https://example.com/special_offer', 1, '2024-01-01', '2024-01-02'),
    ('banner2.jpg', 'Ưu đãi hấp dẫn', 'https://example.com/attractive_deal', 1, '2024-01-03', '2024-01-04'),
    ('banner3.jpg', 'Giảm giá lên đến 50%', 'https://example.com/up_to_50_off', 0, '2024-01-05', '2024-01-06');

INSERT INTO USER (userName, email, password, fullName, status, role, createdAt, updatedAt)
VALUES
('tienanh', 'admin1@example.com', '$2y$10$PleVryyyTqAyocQpHSRP/OtT7c9BB8Q43sFIaD/.2gPqz0Wp5mXH.', 'Admin', 1, 3, NOW(), NOW()),
('admin2', 'admin2@example.com', '123', 'Admin', 1, 3, NOW(), NOW());


