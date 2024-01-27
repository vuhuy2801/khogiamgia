<section id="testimonials" class="testimonials pt-4">
    <div class="container" data-aos="fade-up">
        <hr class="custom-hr pt-4" />
        <div class="section-title">
            <h2>NHÀ CUNG CẤP NỔI BẬT</h2>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                <?php
                // $supplier =
                //  supplierId;supplierName;address_target;logoSupplier;createdAt;updatedAt
                //  1;Shopee;/shopee;https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Shopee.svg/2560px-Shopee.svg.png;\N;\N
                //  2;Tiki;/tiki;https://upload.wikimedia.org/wikipedia/commons/6/64/Logo_Tiki.png;\N;\N
                //  3;Tiktok Shop;/tiktok-shop;/public/uploads/suppliers/24-01-2024/tiktok.png;\N;2024-01-24 21:12:33
                //  4;Lazada;/lazada;/public/uploads/suppliers/24-01-2024/ladaza.png;\N;2024-01-24 21:12:47
                function renderSwiperSlide($supplier)
                {
                    return '<div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="profile mt-auto">
                            <a href="' . $supplier['address_target'] . '" target="_blank">
                                <img src="' . $supplier['logoSupplier'] . '" class="testimonial-img" alt="" />
                            </a>
                        </div>
                    </div>
                </div>';
                }

                // loop for render swiper slide
                $swiperSlide = '';
                foreach ($supplier as $key => $value) {
                    $swiperSlide .= renderSwiperSlide($value);
                }
                echo $swiperSlide;


                ?>


            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>