Create schema dbVoucher;
use dbVoucher;

-- table Discount
CREATE TABLE IF NOT EXISTS Discount (
    discountId INT PRIMARY KEY AUTO_INCREMENT,
    discountValue FLOAT(20),
    description NVARCHAR(255),
    maximumDiscount FLOAT(30)
);
-- table Category
CREATE TABLE IF NOT EXISTS Category (
    categoryId INT PRIMARY KEY AUTO_INCREMENT,
    categoryName NVARCHAR(255),
    description NVARCHAR(255)
);
-- table Supplier
CREATE TABLE IF NOT EXISTS Supplier (
    supplierId INT PRIMARY KEY AUTO_INCREMENT,
    supplierName NVARCHAR(255),
    address NVARCHAR(255),
    logoSupplier NVARCHAR(255)
);

-- table Post
CREATE TABLE IF NOT EXISTS Post (
    postId INT PRIMARY KEY AUTO_INCREMENT,
    title NVARCHAR(255),
    image NVARCHAR(255),
    slug NVARCHAR(255),
    supplierId INT,
    content TEXT,
    description NVARCHAR(1555),
    categories_post INT,
    createdAt DATE,
    updateAt DATE,
    status INT
);

-- table Voucher
CREATE TABLE IF NOT EXISTS Voucher (
    voucherId INT PRIMARY KEY AUTO_INCREMENT,
    voucherName NVARCHAR(55),
    discountId INT,
    quantity INT,
    expressAt DATE,
    expiresAt DATE,
    conditionOrder NVARCHAR(55),
    conditionBranch NVARCHAR(55),
    description NVARCHAR(255),
    categoryId INT,
    createdAt DATE,
    updatedAt DATE,
    is_trend TINYINT(1),
    supplierId INT,
    status INT,
    address_taget NVARCHAR(55),
    discountType INT
);

-- table Use
CREATE TABLE IF NOT EXISTS Used (
    voucherId INT,
    usedCount INT,
    usedId INT PRIMARY KEY AUTO_INCREMENT
);

-- table Product 
CREATE TABLE IF NOT EXISTS Product (
    productID INT PRIMARY KEY AUTO_INCREMENT,
    productName NVARCHAR(255),
    image NVARCHAR(255),
    link NVARCHAR(255),
    rateCount FLOAT(15),
    soldCount Float(15)
);

-- table ProductPrice
CREATE TABLE IF NOT EXISTS ProductPrice (
    productPriceID INT PRIMARY KEY AUTO_INCREMENT,
    productID INT,
    date DATE,
    currentPrice FLOAT(25)
);

-- table banner
CREATE TABLE IF NOT EXISTS Banner (
    bannerId INT PRIMARY KEY AUTO_INCREMENT,
    image NVARCHAR(255)
);
-- table user
CREATE TABLE IF NOT EXISTS User (
    userId INT PRIMARY KEY AUTO_INCREMENT,
    userName NVARCHAR(25),
    email NVARCHAR(25),
    password NVARCHAR(25)
);

-- FOREIGN KEY 
ALTER TABLE Post
ADD CONSTRAINT fk_supplier
FOREIGN KEY (supplierId)
REFERENCES Supplier(supplierId);

ALTER TABLE Voucher
ADD CONSTRAINT fk_discount
FOREIGN KEY (discountId)
REFERENCES Discount(discountId);

ALTER TABLE Voucher
ADD CONSTRAINT fk_category
FOREIGN KEY (categoryId)
REFERENCES Category(categoryId);

ALTER TABLE Voucher
ADD CONSTRAINT fk_supplier_voucher
FOREIGN KEY (supplierId)
REFERENCES Supplier(supplierId);

ALTER TABLE Used
ADD CONSTRAINT fk_voucher
FOREIGN KEY (voucherId)
REFERENCES Voucher(voucherId);

ALTER TABLE ProductPrice
ADD CONSTRAINT fk_product
FOREIGN KEY (productID)
REFERENCES Product(productID);

--  Trigger --
DELIMITER //

CREATE TRIGGER generate_random_number
BEFORE INSERT ON Voucher
FOR EACH ROW
BEGIN
    DECLARE random_number INT;
    SET random_number = FLOOR(RAND() * 90000) + 10000; -- Sinh số ngẫu nhiên từ 10000 đến 99999
    SET NEW.voucherId = random_number; -- Gán số ngẫu nhiên vào cột voucherId
END;
//

DELIMITER ;

DELIMITER //

CREATE TRIGGER generate_random_id_user
BEFORE INSERT ON User
FOR EACH ROW
BEGIN
    DECLARE random_number INT;
    SET random_number = FLOOR(RAND() * 90000) + 10000; -- Sinh số ngẫu nhiên từ 10000 đến 99999
    SET NEW.userId = random_number; -- Gán số ngẫu nhiên vào cột userId
END;
//

DELIMITER ;

DELIMITER //

CREATE TRIGGER generate_random_id_product
BEFORE INSERT ON Product
FOR EACH ROW
BEGIN
    DECLARE random_number INT;
    SET random_number = FLOOR(RAND() * 90000) + 10000; 
    SET NEW.productId = random_number; 
END;
//

DELIMITER ;

DELIMITER //

CREATE TRIGGER generate_random_id_post
BEFORE INSERT ON Post
FOR EACH ROW
BEGIN
    DECLARE random_number INT;
    SET random_number = FLOOR(RAND() * 90000) + 10000; 
    SET NEW.postId = random_number; 
END;
//

DELIMITER ;