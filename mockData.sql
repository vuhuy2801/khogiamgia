use dbVoucher;

INSERT INTO Category (categoryId, categoryName) VALUES
(1, 'Thời Trang'),
(2, 'Điện tử'),
(3, 'Nội trợ'),
(4, 'Khác');

INSERT INTO Supplier (supplierName, address_target, logoSupplier) VALUES 
    ('Shopee', 'https://shopee.vn/', '/public/uploads/suppliers/27-01-2024/Shopee.svg.png'),
    ('Tiki', 'https://tiki.vn/', '/public/uploads/suppliers/27-01-2024/Logo_Tiki.png'),
    ('ShopeeFood', 'https://shopeefood.vn/', '/public/uploads/suppliers/27-01-2024/shopeefood.png'),
    ('Lazada', 'https://www.lazada.vn/' ,'/public/uploads/suppliers/27-01-2024/lazada-logo-freelogovectors.net_.png'),
    ('Grab','https://www.grab.com/vn/', '/public/uploads/suppliers/27-01-2024/grab-logo.png');

INSERT INTO Post (title, image,slug, supplierId, content, description, categories_post, createdAt, updateAt,status)
VALUES 
    ('CUỘC THI VÔ ĐỊCH PHÁT TRIỂN WEB - WEB DEV CHAMPION 2023', 'https://api.vuhuy.site/uploads/small_img_index_73bc26433c.png','cuoc-thi-vo-dich-phat-trien-web-web-dev-champion-2023', 1, 'Exciting news about the latest gadgets...', 'Introducing the newest electronic devices in the market...', 1, '2023-12-20','2023-12-20', 0);

INSERT INTO Voucher (voucherId, voucherName, quantity, expressAt, expiresAt, conditionsOfUse, categoryId, createdAt, updatedAt, is_trend, supplierId, status, address_target, discountType, maximumDiscount, minimumDiscount, is_inWallet)
VALUES 
('VOUCHER0012', '60K', 100, '2024-01-25', '2024-02-28', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 1, 1, 'https://shopee.vn/', 1, '250K', '20K', 1),
('VOUCHER007', '20K', 100, '2024-01-25', '2024-02-28', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 2, 1, 'https://shopee.vn/', 1,'250K', '20K', 1),
('VOUCHER008', '30K', 100, '2024-01-25', '2024-02-28','Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 1, 1, 'https://shopee.vn/', 1,'250K', '20K', 1),
('VOUCHER09', '50K', 100, '2024-01-25', '2024-02-28','Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 3, 1, 'https://shopee.vn/', 1, '250K', '20K', 1),
('VOUCHER0045', 'Freeship', 100, '2024-01-25', '2024-02-28','Áp dụng cho học sinh, sinh viên', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 2, 1, 'https://shopee.vn/', 1,'250K', '20K', 1);

INSERT INTO Used (voucherId, usedCount)
VALUES 
('VOUCHER0012', 10);


INSERT INTO Product (productId,productName, image, link, rateCount, soldCount, status) VALUES 
    ('sp001','Samsung Galaxy S21', 'samsung_s21.jpg', 'https://example.com/samsung_s21', 4.5, 1000, 1),
    ('sp002','Asus Zenbook Pro', 'asus_zenbook_pro.jpg', 'https://example.com/asus_zenbook_pro', 4.7, 500, 1),
    ('sp003','Đồng hồ Nam Casio', 'casio_watch.jpg', 'https://example.com/casio_watch', 4.2, 800, 1),
    ('sp004','Bộ nồi từ Tefal', 'tefal_cookware.jpg', 'https://example.com/tefal_cookware', 4.8, 300, 0),
    ('sp005','Sách Giáo Khoa', 'textbooks.jpg', 'https://example.com/textbooks', 4.6, 1200, 1);

-- id sản phẩm tự động random nên muốn insert vào price thì select ra trước để có id insert 

INSERT INTO Banner (image, title, address_target, status, createdAt, updatedAt) VALUES 
    ('banner1.jpg', 'Khuyến mãi Đặc biệt', 'https://example.com/special_offer', 1, '2024-01-01', '2024-01-02'),
    ('banner2.jpg', 'Ưu đãi hấp dẫn', 'https://example.com/attractive_deal', 1, '2024-01-03', '2024-01-04'),
    ('banner3.jpg', 'Giảm giá lên đến 50%', 'https://example.com/up_to_50_off', 0, '2024-01-05', '2024-01-06');

INSERT INTO User (userName, email, password, fullName, status, role, createdAt, updatedAt)
VALUES
('admin1', 'admin1@example.com', '123', 'Admin', 1, 3, NOW(), NOW()),
('admin2', 'admin2@example.com', '123', 'Admin', 1, 3, NOW(), NOW());


