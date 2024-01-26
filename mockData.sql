use dbVoucher;

INSERT INTO Category (categoryName) VALUES 
    ('Điện thoại di động'),
    ('Laptop và Máy tính bảng'),
    ('Thời trang nam'),
    ('Thời trang nữ'),
    ('Đồ gia dụng'),
    ('Đồ chơi và Trò chơi điện tử'),
    ('Thể thao và Dã ngoại'),
    ('Sức khỏe và Làm đẹp'),
    ('Ô tô và Xe máy'),
    ('Nhà sách và Văn phòng phẩm');


INSERT INTO Supplier (supplierName, address_target, logoSupplier) VALUES 
    ('Shopee', 'https://shopee.vn/', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Shopee.svg/2560px-Shopee.svg.png'),
    ('Tiki', 'https://tiki.vn/', 'https://upload.wikimedia.org/wikipedia/commons/6/64/Logo_Tiki.png'),
    ('Tiktok Shop', 'Số 789 Đường GHI, Quận JKL, Thành phố Đà Nẵng', 'logo_lotte.png'),
    ('Lazada', 'Số 321 Đường MNO, Quận PQR, Thành phố Hải Phòng', 'logo_fptshop.png'),
    ('Thế giới di động', 'Số 654 Đường STU, Quận VWX, Thành phố Cần Thơ', 'logo_thegioididong.png');


INSERT INTO Post (title, image,slug, supplierId, content, description, categories_post, createdAt, updateAt,status)
VALUES 
    ('CUỘC THI VÔ ĐỊCH PHÁT TRIỂN WEB - WEB DEV CHAMPION 2023', 'https://api.vuhuy.site/uploads/small_img_index_73bc26433c.png','cuoc-thi-vo-dich-phat-trien-web-web-dev-champion-2023', 1, 'Exciting news about the latest gadgets...', 'Introducing the newest electronic devices in the market...', 1, '2023-12-20','2023-12-20', 0);



INSERT INTO Voucher (voucherId, voucherName, quantity, expressAt, expiresAt, orderConditions, conditionsOfUse, categoryId, createdAt, updatedAt, is_trend, supplierId, status, address_target, discountType, discount, maximumDiscount, minimumDiscount, is_inWallet, is_manually)
VALUES 
('VOUCHER0012', 'Giảm 60K', 100, '2024-01-25', '2024-02-28', 'Áp dụng cho bộ nồi đun nấu', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 1, 1, '321 Đường MNO, Hải Phòng', 1, '10%', '250.000 VNĐ', '20,000vnđ', 1, 1),
('VOUCHER007', 'Giảm 20K', 100, '2024-01-25', '2024-02-28', 'Áp dụng cho bộ nồi đun nấu', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 5, 1, '321 Đường MNO, Hải Phòng', 1, '10%', '250.000 VNĐ', '20,000vnđ', 1, 1),
('VOUCHER008', 'Giảm 30K', 100, '2024-01-25', '2024-02-28', 'Áp dụng cho bộ nồi đun nấu', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 4, 1, '321 Đường MNO, Hải Phòng', 1, '10%', '250.000 VNĐ', '20,000vnđ', 1, 1),
('VOUCHER09', 'Giảm 50K', 100, '2024-01-25', '2024-02-28', 'Áp dụng cho bộ nồi đun nấu', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 3, 1, '321 Đường MNO, Hải Phòng', 1, '10%', '250.000 VNĐ', '20,000vnđ', 1, 1),
('VOUCHER0045', 'Freeship', 100, '2024-01-25', '2024-02-28', 'Áp dụng cho bộ nồi đun nấu', 'Áp dụng cho học sinh, sinh viên', 1, '2024-01-26 10:00:00', '2024-01-26 10:00:00', 1, 2, 1, '321 Đường MNO, Hải Phòng', 1, '10%', '250.000 VNĐ', '20,000vnđ', 1, 1);

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
('user1', 'user1@example.com', 'password1', 'John Doe', 1, 1, NOW(), NOW()),
('user2', 'user2@example.com', 'password2', 'Jane Smith', 1, 2, NOW(), NOW()),
('user3', 'user3@example.com', 'password3', 'Bob Johnson', 1, 2, NOW(), NOW()),
('admin1', 'admin1@example.com', 'adminpass1', 'Admin One', 1, 3, NOW(), NOW()),
('admin2', 'admin2@example.com', 'adminpass2', 'Admin Two', 1, 3, NOW(), NOW());


