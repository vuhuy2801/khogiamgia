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


INSERT INTO Voucher (
    voucherId,
    voucherName,
    quantity,
    expressAt,
    expiresAt,
    orderConditions,
    conditionsOfUse,
    categoryId,
    createdAt,
    updatedAt,
    is_trend,
    supplierId,
    status,
    address_target,
    discountType,
    maximumDiscount,
    is_inWallet
) VALUES 
    ('VOUCHER001', 'Giảm 20%', 100, '2024-01-15', '2024-02-28', 'Áp dụng cho điện thoại Samsung', 'Chỉ áp dụng khi đặt hàng online', 1, '2024-01-01', '2024-01-05', 1, 1, 1, '123 Đường ABC, TP.HCM', 1, '200.000 VNĐ', 1),
    ('VOUCHER002', 'Giảm 50K', 50, '2024-01-10', '2024-03-15', 'Áp dụng cho laptop Asus', 'Áp dụng cho tất cả các đơn hàng', 2, '2024-01-02', '2024-01-06', 0, 2, 1, '456 Đường DEF, Hà Nội', 2, '300.000 VNĐ', 0),
    ('VOUCHER003', 'Giảm 20K', 80, '2024-01-20', '2024-03-10', 'Áp dụng cho đồng hồ dành cho nam', 'Chỉ áp dụng khi mua trên 2 sản phẩm', 4, '2024-01-03', '2024-01-07', 1, 3, 1, '789 Đường GHI, Đà Nẵng', 1, '150.000 VNĐ', 1),
    ('VOUCHER004', 'Giảm 60K', 30, '2024-01-25', '2024-02-28', 'Áp dụng cho bộ nồi đun nấu', 'Chỉ áp dụng khi mua trên 1.000.000 VNĐ', 5, '2024-01-04', '2024-01-08', 0, 4, 0, '321 Đường MNO, Hải Phòng', 2, '250.000 VNĐ', 0),
    ('VOUCHER005', 'Freeship', 60, '2024-01-30', '2024-03-20', 'Áp dụng cho sách giáo khoa', 'Áp dụng cho học sinh, sinh viên', 10, '2024-01-05', '2024-01-09', 1, 5, 1, '654 Đường STU, Cần Thơ', 1, '100.000 VNĐ', 1);


INSERT INTO Used (voucherId, usedCount) VALUES 
    ('VOUCHER001', 25),
    ('VOUCHER002', 10),
    ('VOUCHER003', 30),
    ('VOUCHER004', 5),
    ('VOUCHER005', 20);


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


INSERT INTO Role (roleName) VALUES
('Admin'),
('User'),
('Guest');


INSERT INTO User (userName, email, password, fullName, status, role, createdAt, updatedAt)
VALUES
('user1', 'user1@example.com', 'password1', 'John Doe', 1, 1, NOW(), NOW()),
('user2', 'user2@example.com', 'password2', 'Jane Smith', 1, 2, NOW(), NOW()),
('user3', 'user3@example.com', 'password3', 'Bob Johnson', 1, 2, NOW(), NOW()),
('admin1', 'admin1@example.com', 'adminpass1', 'Admin One', 1, 3, NOW(), NOW()),
('admin2', 'admin2@example.com', 'adminpass2', 'Admin Two', 1, 3, NOW(), NOW());


