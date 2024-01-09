use dbVoucher;

-- Category
DELIMITER //

CREATE PROCEDURE AddCategory(
    IN category_name NVARCHAR(255)
)
BEGIN
    INSERT INTO Category (categoryName)
    VALUES (category_name);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdateCategory(
    IN category_id INT,
    IN new_category_name NVARCHAR(255)
)
BEGIN
    UPDATE Category
    SET categoryName = new_category_name
    WHERE categoryId = category_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DeleteCategory(
    IN category_id INT
)
BEGIN
    DELETE FROM Category
    WHERE categoryId = category_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetListCategories()
BEGIN
    SELECT * FROM Category;
END;
//

DELIMITER ;

-- Supplier
DELIMITER //

CREATE PROCEDURE AddSupplier(
    IN supplier_name NVARCHAR(255),
    IN supplier_address_target NVARCHAR(255),
    IN supplier_logo NVARCHAR(255)
)
BEGIN
    INSERT INTO Supplier (supplierName, address_target, logoSupplier)
    VALUES (supplier_name, supplier_address_target, supplier_logo);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdateSupplier(
    IN supplier_id INT,
    IN new_supplier_name NVARCHAR(255),
    IN new_supplier_address_target NVARCHAR(255),
    IN new_supplier_logo NVARCHAR(255)
)
BEGIN
    UPDATE Supplier
    SET supplierName = new_supplier_name,
        address_target = new_supplier_address_target,
        logoSupplier = new_supplier_logo
    WHERE supplierId = supplier_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DeleteSupplier(
    IN supplier_id INT
)
BEGIN
    DELETE FROM Supplier
    WHERE supplierId = supplier_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetListSuppliers()
BEGIN
    SELECT * FROM Supplier;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SearchSupplier(
    IN in_supplierName NVARCHAR(255)
)
BEGIN
    SELECT *
    FROM Supplier
    WHERE supplierName LIKE CONCAT('%', in_supplierName, '%');
END;
//

DELIMITER ;

-- Post --
DELIMITER //

CREATE PROCEDURE AddPost(
    IN post_title NVARCHAR(255),
    IN post_image NVARCHAR(255),
    IN post_slug NVARCHAR(255),
    IN post_supplier_id INT,
    IN post_content TEXT,
    IN post_description NVARCHAR(1555),
    IN post_categories INT,
    IN post_created_at DATE,
    IN post_update_at DATE,
    IN post_status INT
)
BEGIN
    INSERT INTO Post (title, image,slug, supplierId, content, description, categories_post, createdAt,updateAt, status)
    VALUES (post_title, post_image,post_slug, post_supplier_id, post_content, post_description, post_categories, post_created_at,post_update_at, post_status);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdatePost(
    IN post_id INT,
    IN new_post_title NVARCHAR(255),
    IN new_post_image NVARCHAR(255),
    IN new_post_slug NVARCHAR(255),
    IN new_post_supplier_id INT,
    IN new_post_content TEXT,
    IN new_post_description NVARCHAR(1555),
    IN new_post_categories INT,
    IN new_post_update_at DATE,
    IN new_post_status INT
)
BEGIN
    UPDATE Post
    SET title = new_post_title,
        image = new_post_image,
        slug = new_post_slug,
        supplierId = new_post_supplier_id,
        content = new_post_content,
        description = new_post_description,
        categories_post = new_post_categories,
        updateAt = new_post_update_at,
        status = new_post_status,
        createdAt = IFNULL(createdAt, createdAt) -- Giữ nguyên giá trị createdAt
    WHERE postId = post_id;
END;
//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE DeletePost(
    IN post_id INT
)
BEGIN
    DELETE FROM Post
    WHERE postId = post_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetListPosts()
BEGIN
    SELECT * FROM Post;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SearchPostByTitle(
    IN in_title NVARCHAR(255)
)
BEGIN
    SELECT *
    FROM Post
    WHERE title LIKE CONCAT('%', in_title, '%');
END;
//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE GetPostsByCategory(
    IN category_id INT
)
BEGIN
    SELECT * FROM Post
    WHERE categories_post = category_id;
END;
//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE GetPostsBySupplierId(
    IN supplier_id_to_search INT
)
BEGIN
    SELECT *
    FROM Post
    WHERE supplierId = supplier_id_to_search 
        AND categories_post = 1
    ORDER BY createdAt DESC
    LIMIT 20;
END //

DELIMITER ;


DELIMITER //

CREATE PROCEDURE GetGuidancePostsBySupplierId(
    IN supplierIdParam INT
)
BEGIN
    SELECT * 
    FROM Post
    WHERE supplierId = supplierIdParam 
        AND (categories_post = 2 OR categories_post = 3)
    ORDER BY createdAt DESC
    LIMIT 20;
END //

DELIMITER ;


-- Voucher
DELIMITER //

CREATE PROCEDURE AddVoucher(
	In voucher_id NVARCHAR(15),
    IN voucher_name NVARCHAR(55),
    IN voucher_quantity INT,
    IN voucher_expressAt DATE,
    IN voucher_expiresAt DATE,
    IN voucher_conditionOrder NVARCHAR(155),
    IN voucher_conditionOfUse NVARCHAR(155),
    IN voucher_categoryId INT,
    IN voucher_createdAt DATE,
    IN voucher_updatedAt DATE,
    IN voucher_is_trend TINYINT,
    IN voucher_supplierId INT,
    IN voucher_status INT,
    IN voucher_address_target NVARCHAR(55),
    IN voucher_discountType INT,
    IN voucher_maximumDiscount NVARCHAR(55),
    IN voucher_is_inWallet TINYINT
)
BEGIN
    INSERT INTO Voucher (
        voucherId,voucherName, quantity, expressAt, expiresAt, orderConditions,
        conditionsOfUse, categoryId, createdAt, updatedAt, is_trend,
        supplierId, status, address_target, discountType,maximumDiscount, is_inWallet
    ) VALUES (
        voucher_id,voucher_name, voucher_quantity, voucher_expressAt, voucher_expiresAt, voucher_conditionOrder,
        voucher_conditionOfUse, voucher_categoryId, voucher_createdAt, voucher_updatedAt, voucher_is_trend,
        voucher_supplierId, voucher_status, voucher_address_target, voucher_discountType,voucher_maximumDiscount, voucher_is_inWallet
    );
END;
//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE UpdateVoucher(
    In new_voucher_id NVARCHAR(15),
    IN new_voucher_name NVARCHAR(55),
    IN new_voucher_quantity INT,
    IN new_voucher_expressAt DATE,
    IN new_voucher_expiresAt DATE,
    IN new_voucher_conditionOrder NVARCHAR(155),
    IN new_voucher_conditionOfUse NVARCHAR(155),
    IN new_voucher_categoryId INT,
    IN new_voucher_updatedAt DATE,
    IN new_voucher_is_trend TINYINT,
    IN new_voucher_supplierId INT,
    IN new_voucher_status INT,
    IN new_voucher_address_target NVARCHAR(55),
    IN new_voucher_discountType INT,
    IN new_voucher_maximumDiscount NVARCHAR(55),
    IN new_voucher_is_inWallet TINYINT
)
BEGIN
    UPDATE Voucher
    SET voucherName = new_voucher_name,
        quantity = new_voucher_quantity,
        expressAt = new_voucher_expressAt,
        expiresAt = new_voucher_expiresAt,
        orderConditions = new_voucher_conditionOrder,
        conditionsOfUse = new_voucher_conditionOfUse,
        categoryId = new_voucher_categoryId,
        updatedAt = new_voucher_updatedAt,
        is_trend = new_voucher_is_trend,
        supplierId = new_voucher_supplierId,
        status = new_voucher_status,
        address_target = new_voucher_address_target,
        discountType = new_voucher_discountType,
        maximumDiscount = new_voucher_maximumDiscount, 
        is_inWallet = new_voucher_is_inWallet,
        createdAt = IFNULL(createdAt, createdAt)
    WHERE voucherId = new_voucher_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DeleteVoucher(
    IN voucher_id NVARCHAR(15)
)
BEGIN
    DELETE FROM Voucher
    WHERE voucherId = voucher_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetListVouchers()
BEGIN
    SELECT * FROM Voucher;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetTrendingVouchers(IN trend_id INT)
BEGIN
    SELECT * FROM Voucher WHERE is_trend = trend_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetVouchersBySupplierId(
    IN supplier_id INT
)
BEGIN
    SELECT * FROM Voucher WHERE supplierId = supplier_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetVouchersByCategoryId(
    IN category_id INT
)
BEGIN
    SELECT * FROM Voucher WHERE categoryId = category_id;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SearchVoucherByKeyword(
    IN search_keyword NVARCHAR(255)
)
BEGIN
    SELECT V.*
    FROM Voucher V
    LEFT JOIN Supplier S ON V.supplierId = S.supplierId
    LEFT JOIN Category PC ON V.categoryId = PC.categoryId
    WHERE S.supplierName LIKE CONCAT('%', search_keyword, '%')
        OR V.voucherName LIKE CONCAT('%', search_keyword, '%')
        OR PC.categoryName LIKE CONCAT('%', search_keyword, '%');
END;
//

DELIMITER ;

-- used

DELIMITER //

CREATE PROCEDURE AddUsed(
    IN in_voucherId NVARCHAR(15),
    IN in_usedCount INT
)
BEGIN
    INSERT INTO Used (voucherId, usedCount)
    VALUES (in_voucherId, in_usedCount);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdateUsed(
    IN in_usedId INT,
    IN in_voucherId NVARCHAR(15),
    IN in_usedCount INT
)
BEGIN
    UPDATE Used
    SET voucherId = in_voucherId, usedCount = in_usedCount
    WHERE usedId = in_usedId;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DeleteUsed(
    IN in_usedId INT
)
BEGIN
    DELETE FROM Used WHERE usedId = in_usedId;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetListUsed()
BEGIN
    SELECT * FROM Used;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetUsedAndVoucherList()
BEGIN
    SELECT V.*, SUM(U.usedCount) AS totalUsedCount
    FROM Voucher V
    LEFT JOIN Used U ON V.voucherId = U.voucherId
    GROUP BY V.voucherId;
END;
//

DELIMITER ;


-- Product
DELIMITER //

CREATE PROCEDURE AddProduct(
    IN in_productName NVARCHAR(255),
    IN in_image NVARCHAR(255),
    IN in_link NVARCHAR(255),
	IN in_rateCount FLOAT(15),
	IN in_soldCount FLOAT(15),
    IN in_status INT
)
BEGIN
    INSERT INTO Product (productName, image, link, rateCount, soldCount, status)
    VALUES (in_productName, in_image, in_link, in_rateCount, in_soldCount, in_status);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdateProduct(
    IN in_productID INT,
    IN in_productName NVARCHAR(255),
    IN in_image NVARCHAR(255),
	IN in_link NVARCHAR(255),
	IN in_rateCount FLOAT(15),
	IN in_soldCount FLOAT(15),
	IN in_status INT
)
BEGIN
    UPDATE Product
    SET productName = in_productName, image = in_image, link = in_link, rateCount = in_rateCount, soldCount = in_soldCount, status = in_status
    WHERE productID = in_productID;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DeleteProduct(
    IN in_productID INT
)
BEGIN
    DELETE FROM Product WHERE productID = in_productID;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetListProducts()
BEGIN
    SELECT P.*, PP.date, PP.currentPrice
    FROM Product P
    LEFT JOIN ProductPrice PP ON P.productID = PP.productID;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SearchProduct(
    IN in_productName NVARCHAR(255)
)
BEGIN
    SELECT *
    FROM Product
    WHERE productName LIKE CONCAT('%', in_productName, '%');
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetProductWithPriceByLink(
    IN in_productLink NVARCHAR(255)
)
BEGIN
    SELECT P.*, PP.currentPrice
    FROM Product P
    LEFT JOIN ProductPrice PP ON P.productID = PP.productID
    WHERE P.link = in_productLink;
END;
//

DELIMITER ;


-- ProductPrice
DELIMITER //

CREATE PROCEDURE AddProductPrice(
    IN in_productID INT,
    IN in_date DATE,
    IN in_currentPrice FLOAT(25)
)
BEGIN
    INSERT INTO ProductPrice (productID, date, currentPrice)
    VALUES (in_productID, in_date, in_currentPrice);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdateProductPrice(
    IN in_productPriceID INT,
    IN in_productID INT,
    IN in_date DATE,
    IN in_currentPrice FLOAT(25)
)
BEGIN
    UPDATE ProductPrice
    SET productID = in_productID, date = in_date, currentPrice = in_currentPrice
    WHERE productPriceID = in_productPriceID;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DeleteProductPrice(
    IN in_productPriceID INT
)
BEGIN
    DELETE FROM ProductPrice WHERE productPriceID = in_productPriceID;
END;
//

DELIMITER ;

-- Banner

DELIMITER //

CREATE PROCEDURE AddBanner(
    IN in_image NVARCHAR(255),
    IN in_title NVARCHAR(255),
    IN in_address_target NVARCHAR(55),
    IN in_status INT,
    IN in_createdAt DATE,
    IN in_updateAt DATE
)
BEGIN
    INSERT INTO Banner (image,title,address_target,status,createdAt,updatedAt)
    VALUES (in_image,in_title,in_address_target,in_status,in_createdAt,in_updateAt);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdateBanner(
    IN in_bannerId INT,
    IN in_image NVARCHAR(255),
	IN in_title NVARCHAR(255),
    IN in_address_target NVARCHAR(55),
    IN in_status INT,
    IN in_updateAt DATE
)
BEGIN
    UPDATE Banner
    SET image = in_image,
    title = in_title,
    address_target = in_address_target,
    status = in_status,
    updatedAt = in_updateAt,
    createdAt = IFNULL(createdAt, createdAt)
    WHERE bannerId = in_bannerId;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DeleteBanner(
    IN in_bannerId INT
)
BEGIN
    DELETE FROM Banner WHERE bannerId = in_bannerId;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetListBanners()
BEGIN
    SELECT * FROM Banner;
END;
//

DELIMITER ;

-- user -- 

DELIMITER //

CREATE PROCEDURE AddUser(
    IN in_userName NVARCHAR(25),
    IN in_email NVARCHAR(25),
    IN in_password NVARCHAR(25)
)
BEGIN
    INSERT INTO User (userName, email, password)
    VALUES (in_userName, in_email, in_password);
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE UpdateUser(
    IN in_userId INT,
    IN in_userName NVARCHAR(25),
    IN in_email NVARCHAR(25),
    IN in_password NVARCHAR(25)
)
BEGIN
    UPDATE User
    SET userName = in_userName, email = in_email, password = in_password
    WHERE userId = in_userId;
END;
//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetAllUsers()
BEGIN
    SELECT * FROM User;
END;
//

DELIMITER ;
