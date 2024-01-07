use dbVoucher;
-- Category
CALL AddCategory('Electronics');
CALL UpdateCategory(5, 'Electronics & Gadgets');
CALL DeleteCategory(11);
CALL GetListCategories();
-- Supplier
CALL AddSupplier('Supplier A', 'abc.com', 'logo_supplier_a.png');
CALL UpdateSupplier(1, 'TiKi', '789 Elm Street, City Z', 'new_logo_supplier_a.png');
CALL DeleteSupplier(6);
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
CALL AddVoucher(
    'VOUCHER007','Voucher Name', 50, '2024-01-15', '2024-02-28', 
    'Order conditions here', 'Conditions of use here', 'Description here', 1, 
    '2024-01-06', '2024-01-06', 1, 1, 1, 'Target address here', 1,'50K', 1
);

CALL UpdateVoucher(
    'VOUCHER001', 'Voucher Updated Name', 75, '2024-02-15', '2024-03-31', 
    'New Order conditions', 'New Conditions of use', 3,'2024-01-06', 
    0, 2, 1, 'New Target address', 2, '500.000 VNĐ', 1
);

CALL DeleteVoucher('VOUCHER006');
CALL GetListVouchers();
CALL GetTrendingVouchers(1);
CALL GetVouchersBySupplierId(2); 
CALL GetVouchersByCategoryId(2); 
CALL SearchVoucherByKeyword('t');
-- used
CALL AddUsed('VOUCHER001', 10); 
CALL UpdateUsed(3, 2, 15);
CALL DeleteUsed(4); 
CALL GetListUsed(); 
CALL GetUsedAndVoucherList();
-- Product
CALL AddProduct('Bồn ngâm chân massage cao cấp con lăn tự động SereneLife SL12 - Tự động làm nóng, đèn hồng ngoại, thác nước, có CO-CQ', 'link_hình_ảnh', 'https://shopee.vn/product/289338775/16393652444?utm_campaign=-&utm_content=----&utm_medium=affiliates&utm_source=an_17372060085&utm_term=af2vyjn4d6mm', 10, 20, 1);
CALL UpdateProduct(10848, 'Tên sản phẩm mới', 'link_hình_ảnh_mới','link_sản_phẩm', 30 ,40,1);
CALL DeleteProduct(10848);
CALL GetListProducts();
CALL SearchProduct('s');
CALL GetProductWithPriceByLink('https://example.com/textbooks');
-- ProductPrice
CALL AddProductPrice(10627, '2023-12-30', 50.99);
CALL UpdateProductPrice(3, 2, '2023-12-30', 45.99);
CALL DeleteProductPrice(5);
select * from productprice;
-- Banner
CALL AddBanner(
    'banner_image.jpg',
    'New Banner Title',
    'https://example.com/banner_target',
    1,
    '2024-01-06',
    '2024-01-06'
);

CALL UpdateBanner(1, 'banner_image.jpg',
    'New Banner Title',
    'https://example.com/banner_target',
    1,
    '2024-01-06'); 
CALL DeleteBanner(5); 
CALL GetListBanners();
-- User 
CALL AddUser('username1', 'email1@example.com', 'password1');
CALL UpdateUser(58158, 'new_username', 'new_email@example.com', 'new_password');
CALL GetAllUsers();

