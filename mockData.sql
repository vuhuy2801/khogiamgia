use dbVoucher;

INSERT INTO Discount (discountValue, description, maximumDiscount)
VALUES 
    (10.000, 'Discount for category A', 50.000),
    (70.000, 'Special offer for product B', 30.000),
    (15.205, 'Seasonal discount', 75.000),
    (5.000, 'Limited time offer', 20.000);

INSERT INTO Category (categoryName, description)
VALUES 
    ('Electronics', 'Electronic devices and accessories'),
    ('Clothing', 'Apparel for men, women, and children'),
    ('Home Decor', 'Furniture and decorative items for homes'),
    ('Beauty', 'Cosmetics and beauty products');

INSERT INTO Supplier (supplierName, address, logoSupplier)
VALUES 
    ('ABC Electronics', '123 Main Street, City A', 'abc_logo.png'),
    ('Fashion Trends Ltd.', '456 Oak Avenue, City B', 'fashion_logo.png'),
    ('HomeStyle Furnishings', '789 Elm Street, City C', 'homestyle_logo.png'),
    ('Beauty Haven', '101 Pine Street, City D', 'beauty_logo.png');

INSERT INTO Post (title, image,slug, supplierId, content, description, categories_post, createdAt, updateAt,status)
VALUES 
    ('CUỘC THI VÔ ĐỊCH PHÁT TRIỂN WEB - WEB DEV CHAMPION 2023', 'https://api.vuhuy.site/uploads/small_img_index_73bc26433c.png','cuoc-thi-vo-dich-phat-trien-web-web-dev-champion-2023', 1, 'Exciting news about the latest gadgets...', 'Introducing the newest electronic devices in the market...', 1, '2023-12-20','2023-12-20', 1);


INSERT INTO Voucher (
    voucherName, discountId, quantity, expressAt, expiresAt, conditionOrder, conditionBranch, description,
    categoryId, createdAt, updatedAt, is_trend, supplierId, status, address_taget, discountType
) VALUES 
    ('Summer Sale', 1, 100, '2024-06-01', '2024-06-30', 'Minimum order of $50', 'All branches', 'Big discounts for summer products!',
    2, '2023-12-21', '2023-12-21', 1, 1, 1, '123 Main St.', 1),
    ('Holiday Special', 2, 50, '2024-12-01', '2024-12-25', 'No conditions', 'Online orders only', 'Special discounts for the holiday season',
    3, '2023-12-22', '2023-12-22', 1, 2, 1, '456 Oak Ave.', 2);

INSERT INTO Used (voucherId, usedCount)
VALUES 
    (28193, 20),
    (76953, 10);

INSERT INTO Product (productName, image, link, rateCount, soldCount)
VALUES 
    ('Product 1', 'image_url_1', 'link_1', 60.100, 23.11),
    ('Product 2', 'image_url_2', 'link_2', 60.100, 23.11),
    ('Product 3', 'image_url_3', 'link_3', 60.100, 23.11),
    ('Product 4', 'image_url_4', 'link_4', 60.100, 23.11),
    ('Product 5', 'image_url_5', 'link_5', 60.100, 23.11);


INSERT INTO ProductPrice (productID, date, currentPrice)
VALUES 
    (1, '2023-12-20', 1200.0),
    (2, '2023-12-20', 25.99),
    (3, '2023-12-20', 899.0),
    (4, '2023-12-20', 12.5);

INSERT INTO Banner (image)
VALUES 
    ('banner_image1.jpg'),
    ('banner_image2.jpg'),
    ('banner_image3.jpg'),
    ('banner_image4.jpg');


INSERT INTO User (userName,email,password)
values
	('admin','admin@gmail.com','123'),
	('TienAnh','tienanhtch@gmail.com','Tienanh@123');