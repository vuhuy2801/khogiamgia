Create schema dbVoucher;
use dbVoucher;

-- table Category
CREATE TABLE IF NOT EXISTS CATEGORY (
    categoryId INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(255)
) ENGINE=InnoDB;

-- table Supplier
CREATE TABLE IF NOT EXISTS SUPPLIER (
    supplierId INT AUTO_INCREMENT PRIMARY KEY,
    supplierName VARCHAR(255),
    address_target VARCHAR(255),
    logoSupplier VARCHAR(255),
    createdAt DATETIME,
    updatedAt DATETIME
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS POST (
    postId INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    image VARCHAR(255),
    slug VARCHAR(255) UNIQUE,
    supplierId INT,
    content TEXT,
    description VARCHAR(1555),
    categories_post INT,
    createdAt DATETIME,
    updatedAt DATETIME,
    status INT,
    FOREIGN KEY (supplierId) REFERENCES Supplier(supplierId)
) ENGINE=InnoDB;

-- table Voucher
CREATE TABLE IF NOT EXISTS VOUCHER (
    voucherId VARCHAR(15) PRIMARY KEY NOT NULL,
    voucherName VARCHAR(255),
    quantity INT,
    expressAt DATE,
    expiresAt DATE,
    conditionsOfUse VARCHAR(255),
    categoryId INT,
    createdAt DATETIME,
    updatedAt DATETIME,
    is_trend TINYINT(1),
    supplierId INT,
    status INT,
    address_target VARCHAR(255),
    discountType INT,
    maximumDiscount VARCHAR(255),
    minimumDiscount VARCHAR(255),
    is_inWallet TINYINT(1),
    FOREIGN KEY (supplierId) REFERENCES Supplier(supplierId),
    FOREIGN KEY (categoryId) REFERENCES Category(categoryId)
) ENGINE=InnoDB;

-- table Use
CREATE TABLE IF NOT EXISTS USED (
    usedId INT AUTO_INCREMENT PRIMARY KEY,
    voucherId VARCHAR(15),
    usedCount INT,
    FOREIGN KEY (voucherId) REFERENCES Voucher(voucherId)
) ENGINE=InnoDB;


-- table Product 
CREATE TABLE IF NOT EXISTS PRODUCT (
    productID VARCHAR(255) PRIMARY KEY,
    productName VARCHAR(255),
    image VARCHAR(255),
    link TEXT,
    rateCount FLOAT,
    soldCount FLOAT,
    createdAt DATETIME,
    updatedAt DATETIME,
    status INT
) ENGINE=InnoDB;

-- table ProductPrice
CREATE TABLE IF NOT EXISTS PRODUCTPRICE (
    productPriceID INT AUTO_INCREMENT PRIMARY KEY,
    productID VARCHAR(255),
    date DATE,
    currentPrice FLOAT,
    FOREIGN KEY (productID) REFERENCES Product(productID)
) ENGINE=InnoDB;


-- table banner
CREATE TABLE IF NOT EXISTS BANNER (
    bannerId INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255),
    title VARCHAR(255),
    address_target VARCHAR(255),
    status INT,
    createdAt DATETIME,
    updatedAt DATETIME
) ENGINE=InnoDB;


-- table user
CREATE TABLE IF NOT EXISTS USER (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    fullName VARCHAR(255) NOT NULL,
    status INT NOT NULL,
    role INT NOT NULL,
    createdAt DATETIME,
    updatedAt DATETIME
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS USER_ACCESS_LOG (
    log_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_ip VARCHAR(45),
    visit_time DATETIME,
    page_url VARCHAR(2048),
    user_agent VARCHAR(512),
    referer_url VARCHAR(2048)
) ENGINE=InnoDB;


DELIMITER //

CREATE TRIGGER GENERATE_RANDOM_ID_USER
BEFORE INSERT ON USER
FOR EACH ROW
BEGIN
    DECLARE random_number INT;
    SET random_number = FLOOR(RAND() * 90000) + 10000; -- Sinh số ngẫu nhiên từ 10000 đến 99999
    SET NEW.userId = random_number; -- Gán số ngẫu nhiên vào cột userId
END;
//

DELIMITER ;



DELIMITER //

CREATE TRIGGER GENERATE_RANDOM_ID_POST
BEFORE INSERT ON POST
FOR EACH ROW
BEGIN
    DECLARE random_number INT;
    SET random_number = FLOOR(RAND() * 90000) + 10000; 
    SET NEW.postId = random_number; 
END;
//

DELIMITER ;