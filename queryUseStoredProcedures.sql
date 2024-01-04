use dbVoucher;
-- Discount
CALL AddDiscount(10.5, 'Discount for category A', 50.0);
CALL UpdateDiscount(5, 15.0, 'Updated discount for category A', 60.0);
CALL DeleteDiscount(5);
CALL GetListDiscounts();
-- Category
CALL AddCategory('Electronics', 'Electronic devices and accessories');
CALL UpdateCategory(5, 'Electronics & Gadgets', 'Electronic devices, accessories, and gadgets');
CALL DeleteCategory(5);
CALL GetListCategories();
-- Supplier
CALL AddSupplier('Supplier A', '123 Main Street, City X', 'logo_supplier_a.png');
CALL UpdateSupplier(1, 'TiKi', '789 Elm Street, City Z', 'new_logo_supplier_a.png');
CALL DeleteSupplier(5);
CALL GetListSuppliers();
CALL SearchSupplier('ti');
-- Post
CALL AddPost('New Post Title', 'image_path.jpg','abc', 1, 'Post content...', 'Post description...', 2, '2023-12-20','2023-12-20', 1);
CALL UpdatePost(34090, 'Updated Post Title', 'https://api.vuhuy.site/uploads/small_img_index_73bc26433c.png','abc', 2, 'Updated post content...', 'Updated post description...', 1, '2023-12-21','2023-12-21', 0);
CALL DeletePost(88316);
CALL GetListPosts();
CALL GetPostsByCategory(1);
CALL SearchPostByTitle('n');

-- Voucher
CALL AddVoucher('Voucher A', 1, 10, '2023-12-20', '2024-01-15', 'Condition A', 'Branch X', 'Description for Voucher A', 2, '2023-12-19', '2023-12-19', 1, 1, 1, 'Target Address A', 2);
-- id random --> select id change 
CALL UpdateVoucher(24305, 'Updated Voucher A', 2, 15, '2023-12-22', '2024-01-20', 'New Condition', 'Branch Y', 'Updated description for Voucher A', 3, '2023-12-21', '2023-12-21', 0, 2, 0, 'Updated Address', 1);
CALL DeleteVoucher(24305);
CALL GetListVouchers();
CALL GetTrendingVouchers(1);
CALL GetVouchersBySupplierId(2); 
CALL GetVouchersByCategoryId(2); 
CALL GetListVouchersWithDiscounts();
CALL SearchVoucherAndDiscountByKeyword('Sum');
-- used
CALL AddUsed(43107, 10); 
CALL UpdateUsed(3, 2, 15);
CALL DeleteUsed(4); 
CALL GetListUsed(); 
CALL GetUsedAndVoucherList();
-- Product
CALL AddProduct('Bồn ngâm chân massage cao cấp con lăn tự động SereneLife SL12 - Tự động làm nóng, đèn hồng ngoại, thác nước, có CO-CQ', 'link_hình_ảnh', 'https://shopee.vn/product/289338775/16393652444?utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_17372060085&utm_term=af2vyjn4d6mm', 10, 20);
CALL UpdateProduct(1, 'Tên sản phẩm mới', 'link_hình_ảnh_mới','link_sản_phẩm', 30 ,40);
CALL DeleteProduct(6);
CALL GetListProducts();
CALL SearchProduct('tên');
CALL GetProductWithPriceByLink('https://shopee.vn/product/289338775/16393652444?utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_17372060085&utm_term=af2vyjn4d6mm');
-- ProductPrice
CALL AddProductPrice(20230, '2023-12-31', 50.99);
CALL UpdateProductPrice(3, 2, '2023-12-30', 45.99);
CALL DeleteProductPrice(5);
select * from productprice;
-- Banner
CALL AddBanner('link_hình_ảnh');
CALL UpdateBanner(1, 'link_hình_ảnh_mới'); 
CALL DeleteBanner(5); 
CALL GetListBanners();
-- User 
CALL AddUser('username1', 'email1@example.com', 'password1');
CALL UpdateUser(58158, 'new_username', 'new_email@example.com', 'new_password');
CALL GetAllUsers();

