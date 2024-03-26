
        <!-- banner -->
        <div class="my_maincontain my-3">
            <div class="container">
                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="view/assests/img/banner1.png" style="width:100%">
                    </div>
                
                    <div class="mySlides fade">
                        <img src="view/assests/img/banner2.png" style="width:100%">
                    </div>
                
                    <div class="mySlides fade">
                        <img src="view/assests/img/banner3.png" style="width:100%">
                    </div>
                
                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
        </div>

        <!-- danhmuc -->
        <div class="my_category my-3">
            <div class="container">
                <div class="cate-list">
                    <div class="title_category">
                        <span>DANH MỤC</span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-rauxanh.png" alt="" class="cate-img">
                                    <p class="cate-name">Nông sản</p>
                                </a>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-kingcrab.png" alt="" class="cate-img">
                                    <p class="cate-name">Hải sản</p>
                                </a>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-traicay.png" alt="" class="cate-img">
                                    <p class="cate-name">Trái cây</p>
                                </a>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-hangnhapkhau.png" alt="" class="cate-img">
                                    <p class="cate-name">Hàng nhập khẩu</p>
                                </a>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-giavi.png" alt="" class="cate-img">
                                    <p class="cate-name">Gia vị</p>
                                </a>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-nuocngot.png" alt="" class="cate-img">
                                    <p class="cate-name">Nước giải khác</p>
                                </a>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-keo.png" alt="" class="cate-img">
                                    <p class="cate-name">Bánh kẹo</p>
                                </a>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="cate-item">
                                <a href="#" class="cate_link">
                                    <img src="view/assests/img/icon-sua.png" alt="" class="cate-img">
                                    <p class="cate-name">Sữa</p>
                                </a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- san pham sale -->
        <div class="my_productsale my-3">
            <div class="container">
                <div class="productsale_list">
                    <div class="row">
                        <div class="col-md-10">
                            <img class="productsale_list-img d-flex" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/flashsale/fb1088de81e42c4e538967ec12cb5caa.png" alt="">
                        </div>
                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                            <a href="index.php?act=sanphamgiamgia" class="ms-5 text-decoration-none"><span class="pe-1">Xem tất cả</span></a>
                            <span class="mr_lr pt-1" style="font-size: 10px;"><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                    </div>
                    <div class="row row-col-1 row-cols-md-6 product-list-container d-flex flex-nowrap overflow-auto">
                        <?php
                            foreach ($sptop10 as $sp) {
                                extract($sp);
                                $linksp ="index.php?act=chitietsanpham&id=" .$id;
                                $hinh = $img_path.$img; //lấy đường dẫn hình 
                                $gia_formatted = number_format($gia, 0, ',', '.');
                                $giamoi_formatted = number_format($giamoi, 0, ',', '.');
                                $sanphamkhuyenmai = intval($sanphamkhuyenmai);
                                $gia_sanpham = ($sanphamkhuyenmai == 1) ? $giamoi : $gia;
                                echo '
                                    <div class="col">
                                        <a class="home-product__item border" href="'.$linksp.'">
                                            <div class="product-item__img"
                                            style="background-image: url('.$hinh.');">
                                            </div>
                                            <h4 class="product-item__name">'.$tensanpham.'</h4>
                                            <div class="product-item__price">
                                                <span class="product-item__price-oud">'.$gia_formatted.'đ</span>
                                                <span class="product-item__price-current">'.$giamoi_formatted.'đ</span>
                                            </div>
                                            <div class="product-item__origin">
                                                <span class="product-item__brand">Rau</span>
                                                <span class="product-item__origin-name">Đà Lạc</span>
                                            </div>

                                            <div class="product-item__favourite">
                                                <i class="fa-solid fa-check"></i>
                                                <span>Yêu thích</span>
                                            </div>

                                            <div class="product-item__sale-off">
                                                <span class="sale-off__prrcent">10%</span>
                                                <span class="sale-off__lable">GIẢM</span>
                                            </div>
                                            
                                            <form action="index.php?act=addtocart" method= "post">
                                                <div>
                                                    <input type="hidden" name="id" value="'.$id.'">
                                                    <input type="hidden" name="tensanpham" value="'.$tensanpham.'">
                                                    <input type="hidden" name="img" value="'.$hinh.'">
                                                    <input type="hidden" name="gia" value="'.$gia_formatted.'">
                                                    <input type="hidden" name="giamoi" value="'.$giamoi_formatted.'">
                                                    <input type="hidden" name="sanphamkhuyenmai" value="'.$sanphamkhuyenmai.'">
                                                    <input type="submit" class="product_mua" name="addtocart" value="Mua ngay">
                                                </div>
                                            </form>
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                 </div>
            </div>
        </div>

        <!-- san pham -->
        <section class="my_productbest py-2">
            <div class="container">
                <h4 class="my_productbest-title">SẢN PHẨM BÁN CHẠY</h4>
            </div>
        </section>

        <section class="my_product">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Danh sách sản phẩm -->
                        <div class="home-product">
                            <div class="row sm-gutter">
                                <!-- Hiển thị 5 sản phẩm trên cùng 1 hàng -->
                                <!-- product-item -->
                            <?php 
                                foreach ($spnew as $sp) {
                                    extract($sp); // lấy tối đa 25 sản phẩm load lên
                                    $hinh = $img_path.$img; //lấy đường dẫn hình 
                                    $linksp ="index.php?act=chitietsanpham&id=" .$id;
                                    $gia_formatted = number_format($gia, 0, ',', '.');
                                    $giamoi_formatted = number_format($giamoi, 0, ',', '.');
                                    echo '
                                        <div class="col-md-2">
                                            <a class="home-product__item border-top" href="'.$linksp.'">
                                                <div class="product-item__img"
                                                    style="background-image: url('.$hinh.');">
                                                </div>
                                                <h4 class="product-item__name">'.$tensanpham.'</h4>
                                                <div class="product-item__price">
                                                    <span class="product-item__price-current">'.$gia_formatted.'đ</span>
                                                </div>
                                                <div class="product-item__action">
                                                    <div class="product-item__rating">
                                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>

                                                    <span class="item-sold">'.$daban.' đã bán</span>
                                                </div>

                                                <div class="product-item__origin">
                                                    <span class="product-item__brand">Rau</span>
                                                    <span class="product-item__origin-name">Đà Lạc</span>
                                                </div>
                                            </a>
                                        </div> ';
                                }
                            ?>

                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="home-product__item" href="#">
                                        <div class="product-item__img"
                                            style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                        </div>
                                        <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                                        </h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-oud">100.00đ</span>
                                            <span class="product-item__price-current">89.00đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <div class="product-item__rating">
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="rating__star-gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>

                                            <span class="item-sold">88 đã bán</span>
                                        </div>

                                        <div class="product-item__origin">
                                            <span class="product-item__brand">Rau</span>
                                            <span class="product-item__origin-name">Đà Lạc</span>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <!-- Phân trang -->
                        <ul class="pagination home-product__pagination">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fa-solid fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="pagination-item pagination-item__active">
                                <a href="" class="pagination-item__link">1</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">2</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">3</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">4</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">5</a>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link pagination-link-no-page">...</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">14</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fa-solid fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </section>