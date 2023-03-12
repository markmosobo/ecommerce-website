@extends('layouts.main')

@section('title', 'Home')

@section('content')                 

        <!--Home slider-->
    	<div class="slideshow slideshow-wrapper pb-section sliderFull">
        	<div class="home-slideshow">
            	<div class="slide">
                	<div class="blur-up lazyload bg-size">
                        <img class="blur-up lazyload bg-img" data-src="assets/images/slideshow-banners/mobile.jpg" src="assets/images/slideshow-banners/mobile.jpg" alt="Shop Our New Collection" title="Shop Our New Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Shop Our New Collection</h2>
										<span class="mega-subtitle slideshow__subtitle">Save up to 50% off this weekend only</span>
                                        <span class="btn">Shop now</span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                	<div class="blur-up lazyload bg-size">
                        <img class="blur-up lazyload bg-img" data-src="assets/images/slideshow-banners/imac.png" src="assets/images/slideshow-banners/imac.png" alt="Summer Bikini Collection" title="Summer Bikini Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                    <h2 class="h1 mega-title slideshow__title">Electronics Collection</h2>
									<span class="mega-subtitle slideshow__subtitle">From High to low, classic or modern. We have you covered</span>
                                    <span class="btn">Shop now</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Home slider-->
        
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
        @if ($message = Session::get('success'))
            <div class="alert alert-success text-uppercase" role="alert">
                <i class="icon anm anm-bag-l"></i> &nbsp;<strong>Success!</strong> {{ $message }}
            </div>
        @endif
        </div>  

        <!--Collection Tab slider-->
        <div class="tab-slider-product section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">New Arrivals</h2>
                            <p>Browse the huge variety of our products</p>
                        </div>
                        <div class="tabs-listing">
                            <ul class="tabs clearfix">
                                <li class="active" rel="tab1">Women</li>
                                <li rel="tab2">Men</li>
                                <li rel="tab3">Sale</li>
                            </ul>
                            <div class="tab_container">
                                <div id="tab1" class="tab_content grid-products">
                                    <div class="productSlider">
										@foreach ($womennewarrivals as $womenarrival)
										@if($womenarrival->category->sex == 'F')
										<div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="{{url('single_product/'.$womenarrival->id)}}">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" data-src="{{Storage::url($womenarrival->image_path)}}" src="{{Storage::url($womenarrival->image_path)}}" alt="image" title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload" data-src="{{Storage::url($womenarrival->image_path)}}" src="{{Storage::url($womenarrival->image_path)}}" alt="image" title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->
                                                
                                                <!-- countdown start -->
                                        		<div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                        		<!-- countdown end -->
        
                                                <!-- Start product button -->
                                                <form class="variants add" action="#" onclick="window.location.href='{{url('add-to-cart/'.$womenarrival->id)}}'"method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->
                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="#">{{$womenarrival->name}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <!-- <span class="old-price">$500.00</span> -->
                                                    <span class="price">KSH{{$womenarrival->price}}</span>
                                                </div>
                                                <!-- End product price -->
                                                
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                                <!-- Variant -->
                                                <!-- <ul class="swatches">
                                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant1.jpg" alt="image" /></li>
                                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant2.jpg" alt="image" /></li>
                                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant3.jpg" alt="image" /></li>
                                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant4.jpg" alt="image" /></li>
                                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant5.jpg" alt="image" /></li>
                                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant6.jpg" alt="image" /></li>
                                                </ul> -->
                                                <!-- End Variant -->
                                            </div>
                                            <!-- End product details -->
                                        </div>
										@endif
										@endforeach
                                    </div>
                                </div>
                                <div id="tab2" class="tab_content grid-products">
									<div class="productSlider">
											@foreach ($mennewarrivals as $menarrival)
											@if($menarrival->category->sex == 'M')
											<div class="col-12 item">
												<!-- start product image -->
												<div class="product-image">
													<!-- start product image -->
													<a href="{{url('single_product/'.$menarrival->id)}}">
														<!-- image -->
														<img class="primary blur-up lazyload" data-src="{{Storage::url($menarrival->image_path)}}" src="{{Storage::url($menarrival->image_path)}}" alt="image" title="product">
														<!-- End image -->
														<!-- Hover image -->
														<img class="hover blur-up lazyload" data-src="{{Storage::url($menarrival->image_path)}}" src="{{Storage::url($menarrival->image_path)}}" alt="image" title="product">
														<!-- End hover image -->
														<!-- product label -->
														<div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
														<!-- End product label -->
													</a>
													<!-- end product image -->
													
													<!-- countdown start -->
													<div class="saleTime desktop" data-countdown="2022/03/01"></div>
													<!-- countdown end -->
			
													<!-- Start product button -->
													<form class="variants add" action="#" onclick="window.location.href='{{url('add-to-cart/'.$menarrival->id)}}'"method="post">
														<button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
													</form>
													<div class="button-set">
														<a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
															<i class="icon anm anm-search-plus-r"></i>
														</a>
														<div class="wishlist-btn">
															<a class="wishlist add-to-wishlist" href="wishlist.html">
																<i class="icon anm anm-heart-l"></i>
															</a>
														</div>
														<div class="compare-btn">
															<a class="compare add-to-compare" href="compare.html" title="Add to Compare">
																<i class="icon anm anm-random-r"></i>
															</a>
														</div>
													</div>
													<!-- end product button -->
												</div>
												<!-- end product image -->
												<!--start product details -->
												<div class="product-details text-center">
													<!-- product name -->
													<div class="product-name">
														<a href="#">{{$menarrival->name}}</a>
													</div>
													<!-- End product name -->
													<!-- product price -->
													<div class="product-price">
														<!-- <span class="old-price">$500.00</span> -->
														<span class="price">KSH{{$menarrival->price}}</span>
													</div>
													<!-- End product price -->
													
													<div class="product-review">
														<i class="font-13 fa fa-star"></i>
														<i class="font-13 fa fa-star"></i>
														<i class="font-13 fa fa-star"></i>
														<i class="font-13 fa fa-star-o"></i>
														<i class="font-13 fa fa-star-o"></i>
													</div>
													<!-- Variant -->
													<!-- <ul class="swatches">
														<li class="swatch medium rounded"><img src="assets/images/product-images/variant1.jpg" alt="image" /></li>
														<li class="swatch medium rounded"><img src="assets/images/product-images/variant2.jpg" alt="image" /></li>
														<li class="swatch medium rounded"><img src="assets/images/product-images/variant3.jpg" alt="image" /></li>
														<li class="swatch medium rounded"><img src="assets/images/product-images/variant4.jpg" alt="image" /></li>
														<li class="swatch medium rounded"><img src="assets/images/product-images/variant5.jpg" alt="image" /></li>
														<li class="swatch medium rounded"><img src="assets/images/product-images/variant6.jpg" alt="image" /></li>
													</ul> -->
													<!-- End Variant -->
												</div>
												<!-- End product details -->
											</div>
											@endif
											@endforeach
										</div>
									</div>
                                <div id="tab3" class="tab_content grid-products">
                                    <div class="productSlider">
										@foreach ($newarrivals as $arrival)
										@if($arrival->category->sex == 'U')
										<div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="{{url('single_product/'.$arrival->id)}}">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" data-src="{{Storage::url($arrival->image_path)}}" src="{{Storage::url($arrival->image_path)}}" alt="image" title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload" data-src="{{Storage::url($arrival->image_path)}}" src="{{Storage::url($arrival->image_path)}}" alt="image" title="product">
                                                    <!-- End hover image -->
                                                </a>
                                                <!-- end product image -->
        
                                                <!-- Start product button -->
                                                <form class="variants add" action="#" onclick="window.location.href='{{url('add-to-cart/'.$arrival->id)}}'"method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->
        
                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="#">{{$arrival->name}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">KSH{{$arrival->price}}</span>
                                                </div>
                                                <!-- End product price -->
                                                
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
										@endif
										@endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
        <!--Collection Tab slider-->
        
        <!--Collection Box slider-->
        <div class="collection-box section">
        	<div class="container-fluid">
				<div class="collection-grid">
					@foreach ($topcategories as $category)
						<div class="collection-grid-item">
                            <a href="collection-page.html" class="collection-grid-item__link">
                                <img data-src="{{Storage::url($category->image_path)}}" src="{{Storage::url($category->image_path)}}" alt="Image" class="blur-up lazyload"/>
                                <div class="collection-grid-item__title-wrapper">
                                    <h3 class="collection-grid-item__title btn btn--secondary no-border">{{$category->name}}</h3>
                                </div>
                            </a>
                        </div>
					@endforeach
                    </div>
            </div>
        </div>
        <!--End Collection Box slider-->
        
        <!--Featured Product-->
        <div class="product-rows section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
        				<div class="section-header text-center">
                            <h2 class="h2">Featured collection</h2>
                            <p>Our most popular products based on sales</p>
                        </div>
            		</div>
                </div>
                <div class="grid-products">
	                <div class="row">
						@foreach($featuredproducts as $product)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        	<div class="grid-view_image">
                                <!-- start product image -->
                                <a href="product-accordion.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="grid-view-item__image primary blur-up lazyload" data-src="{{Storage::url($product->image_path)}}" src="{{Storage::url($product->image_path)}}" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="grid-view-item__image hover blur-up lazyload" data-src="{{Storage::url($product->image_path)}}" src="{{Storage::url($product->image_path)}}" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details hoverDetails text-center mobile">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-accordion.html">{{$product->name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <!-- <span class="old-price">$500.00</span> -->
                                        <span class="price">KSH{{$product->price}}</span>
                                    </div>
                                    <!-- End product price -->
                                    
                                    <!-- product button -->
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <!-- Start product button -->
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                            <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                        </form>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                        <div class="compare-btn">
                                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                <i class="icon anm anm-random-r"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- Variant -->
                                <!-- <ul class="swatches text-center">
                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant1.jpg" alt="image" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant2.jpg" alt="image" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant3.jpg" alt="image" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant4.jpg" alt="image" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant5.jpg" alt="image" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/product-images/variant6.jpg" alt="image" /></li>
                                </ul> -->
                                <!-- End Variant -->
                                <!-- End product details -->
                            </div>
                        </div>
						@endforeach
                	</div>
                </div>
           </div>
        </div>	
        <!--End Featured Product-->
    
        
        <!--Store Feature-->
        <div class="store-feature section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<ul class="display-table store-info">
                        	<li class="display-table-cell">
                            	<i class="icon anm anm-truck-l"></i>
                            	<h5>Free Shipping &amp; Return</h5>
                            	<span class="sub-text">Free shipping on all US orders</span>
                            </li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-dollar-sign-r"></i>
                                <h5>Money Guarantee</h5>
                                <span class="sub-text">30 days money back guarantee</span>
                          	</li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-comments-l"></i>
                                <h5>Online Support</h5>
                                <span class="sub-text">We support online 24/7 on day</span>
                            </li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-credit-card-front-r"></i>
                                <h5>Secure Payments</h5>
                                <span class="sub-text">All payment are Secured and trusted.</span>
                        	</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Store Feature-->

@endsection