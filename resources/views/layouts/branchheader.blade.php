<div class="top-header">
		<div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                    <p class="phone-no"><i class="anm anm-phone-s"></i> +440 0(111) 044 833</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                	<div class="text-center"><p class="top-header_middle-text"> {{config('app.name')}} Shopping</p></div>
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
					@guest
						@if (Route::has('login'))
                        <li><a href="{{route('login')}}">Login</a></li>
						@endif
						@if (Route::has('register'))
                        <li><a href="{{route('register')}}">Create Account</a></li>
                        <li><a href="{{url('register-seller')}}">Become a Seller?</a></li>
						@endif
						@else
						@if(Auth::user()->role == 'admin')
						<a href="{{url('admin_dashboard')}}" title="Dashboard">
                        	<i class="anm anm anm-user-al"></i>
                        </a>
						@elseif (Auth::user()->role == 'seller')
						<a href="{{url('seller_dashboard')}}" title="Account">
                        	<i class="anm anm anm-user-al"></i>
                        </a>
						@else
						<a href="{{url('buyer_dashboard')}}" title="Account">
                        	<i class="anm anm anm-user-al"></i>
                        </a>
						@endif
						<li><a href="{{url('wishlist')}}">Wishlist</a></li>
					@endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap animated d-flex">
		<div class="container-fluid">        
				<div class="row align-items-center">
					<!--Desktop Logo-->
					<div class="logo col-md-2 col-lg-2 d-none d-lg-block">
						<a href="/">
							<!-- <img src="assets/images/logo.svg" alt="{{config('app.name')}} Logo" title="Logo" /> -->
						</a>
					</div>
					<!--End Desktop Logo-->
					<div class="col-2 col-sm-3 col-md-3 col-lg-8">
						<div class="d-block d-lg-none">
							<button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
								<i class="icon anm anm-times-l"></i>
								<i class="anm anm-bars-r"></i>
							</button>
						</div>
						<!--Desktop Menu-->
						<nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
							<ul id="siteNav" class="site-nav medium center hidearrow">
								<li class="lvl1"><a href="/"><b>Home</b> <i class="anm anm-angle-down-l"></i></a></li>
								<!-- <li class="lvl1 parent megamenu"><a href="#">Shop <i class="anm anm-angle-down-l"></i></a>
									<div class="megamenu style4">
										<ul class="grid grid--uniform mmWrapper">
											<li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Featured</a>
												<ul class="subLinks">
													@foreach ($featuredproducts as $product)
													<li class="lvl-2"><a href="{{url('single_product/'.$product->id)}}" class="site-nav lvl-2">{{$product->name}}</a></li>													
													@endforeach
												</ul>
											</li>
											<li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Best Selling</a>
												<ul class="subLinks">
													@foreach ($bestsellingproducts as $product)
													<li class="lvl-2"><a href="{{url('single_product/'.$product->id)}}" class="site-nav lvl-2">{{$product->name}}</a></li>													
													@endforeach   
												</ul>
											</li>
											<li class="grid__item lvl-1 col-md-6 col-lg-6">
												@foreach($featureimage as $image)
												<a href="#"><img src="{{Storage::url($image->image_path)}}" style="width:750px;height:auto;" alt="" title="" /></a>
												@endforeach
											</li>
										</ul>
									</div>
								</li> -->
								<li class="lvl1 parent megamenu"><a href="#">Products <i class="anm anm-angle-down-l"></i></a>
									<div class="megamenu style2">
										<ul class="grid mmWrapper">
											<li class="grid__item one-whole">
												<ul class="grid">
													<li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Pantry Staple</a>
														<ul class="subLinks">
															<li class="lvl-2"><a href="{{url('single_category/1')}}" class="site-nav lvl-2">Rice</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/2')}}" class="site-nav lvl-2">Pasta</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/3')}}" class="site-nav lvl-2">Flour</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/4')}}" class="site-nav lvl-2">Beans</a></li>															
														</ul>
													</li>
													<li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Fresh Produce</a>
														<ul class="subLinks">
															<li class="lvl-2"><a href="{{url('single_category/5')}}" class="site-nav lvl-2">Apples</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/6')}}" class="site-nav lvl-2">Bananas</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/7')}}" class="site-nav lvl-2">Carrots</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/8')}}" class="site-nav lvl-2">Tomatoes</a></li>															
														</ul>
													</li>
													<li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Dairy & Eggs</a>
														<ul class="subLinks">
															<li class="lvl-2"><a href="{{url('single_category/9')}}" class="site-nav lvl-2">Milk</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/10')}}" class="site-nav lvl-2">Yoghurt</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/11')}}" class="site-nav lvl-2">Butter</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/12')}}" class="site-nav lvl-2">Eggs</a></li>															
														</ul>
													</li>
													<li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Meat & Seafood</a>
														<ul class="subLinks">
															<li class="lvl-2"><a href="{{url('single_category/13')}}" class="site-nav lvl-2">Chicken</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/14')}}" class="site-nav lvl-2">Ground Beef</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/15')}}" class="site-nav lvl-2">Salmon</a></li>															
															<li class="lvl-2"><a href="{{url('single_category/16')}}" class="site-nav lvl-2">Shrimp</a></li>															
														</ul>
													</li>
												</ul>
											</li>
											<li class="grid__item large-up--one-whole imageCol"><a href="#"><img src="assets/images/megamenu-bg2.jpg" alt=""></a></li>
										</ul>
									</div>
								</li>
								<li class="lvl1"><a href="{{url('about')}}"><b>About Us</b> <i class="anm anm-angle-down-l"></i></a></li>
								<li class="lvl1"><a href="{{url('contact')}}"><b>Contact Us</b> <i class="anm anm-angle-down-l"></i></a></li>

							</ul>
						</nav>
						<!--End Desktop Menu-->
					</div>
					<!--Mobile Logo-->
					<div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
						<div class="logo">
							<a href="{{url('/')}}">
								<!-- <img src="assets/images/logo.svg" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" /> -->
							</a>
						</div>
					</div>
					<!--Mobile Logo-->
					<div class="col-4 col-sm-3 col-md-3 col-lg-2">
						<div class="site-cart">
							<a href="#;" class="site-header__cart" title="Cart">
								<i class="icon anm anm-bag-l"></i>
								<span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">{{ count((array) session('cart')) }}</span>
							</a>
							<!--Minicart Popup-->
							<div id="header-cart" class="block block-cart">
							<?php $total = 0 ?>
							@foreach((array) session('cart') as $id => $details)
								<?php $total += $details['price'] * $details['quantity'] ?>
							@endforeach
								<ul class="mini-products-list">
								@if(session('cart'))
                        		@foreach(session('cart') as $id => $details)
                                <li class="item">
                                	<a class="product-image" href="#">
                                    	<img src="{{Storage::url($details['image_path'])}}" alt="{{$details['name']}}" title="" />
                                    </a>
                                    <div class="product-details">
                                    	<a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href="#">{{$details['name']}}</a>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                            	<span class="label">Qty:</span>
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="{{ $details['quantity'] }}" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="priceRow">
                                        	<div class="product-price">
                                            	<span class="money">KSH{{$details['price']}}</span>
                                            </div>
                                         </div>
									</div>
                                </li>
								@endforeach
								@endif	
								</ul>
								<div class="total">
									<div class="total-in">
                                		<span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">KSH{{$total}}</span></span>
									</div>
									<div class="buttonSet text-center">
                                  	    <a href="{{url('cart')}}" class="btn btn-secondary btn--small">View Cart</a>
										<a href="checkout.html" class="btn btn-secondary btn--small">Checkout</a>
									</div>
								</div>
							</div>
							<!--EndMinicart Popup-->
						</div>
						<div class="site-header__search">
							<button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
    <!--End Header-->
    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
		<div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
        	<li class="lvl1 parent megamenu"><a href="/">Home <i class="anm anm-plus-l"></i></a></li>
        	<li class="lvl1 parent megamenu"><a href="#">Products <i class="anm anm-plus-l"></i></a>
				<ul>
					<li><a href="#" class="site-nav">Pantry Staple<i class="anm anm-plus-l"></i></a>
					<ul>
						<li><a href="{{url('single_category/1')}}" class="site-nav">Rice</a></li>
						<li><a href="{{url('single_category/2')}}" class="site-nav">Pasta</a></li>
						<li><a href="{{url('single_category/3')}}" class="site-nav">Flour</a></li>
						<li><a href="{{url('single_category/4')}}" class="site-nav">Beans</a></li>
					</ul>
					</li>
					<li><a href="#" class="site-nav">Fresh Produce<i class="anm anm-plus-l"></i></a>
					<ul>
						<li><a href="{{url('single_category/5')}}" class="site-nav">Apples</a></li>
						<li><a href="{{url('single_category/6')}}" class="site-nav">Bananas</a></li>
						<li><a href="{{url('single_category/7')}}" class="site-nav">Carrots</a></li>
						<li><a href="{{url('single_category/8')}}" class="site-nav">Tomatoes</a></li>
					</ul>
					</li>
					<li><a href="#" class="site-nav">Dairy & Eggs<i class="anm anm-plus-l"></i></a>
					<ul>
						<li><a href="{{url('single_category/9')}}" class="site-nav">Milk</a></li>
						<li><a href="{{url('single_category/10')}}" class="site-nav">Yoghurt</a></li>
						<li><a href="{{url('single_category/11')}}" class="site-nav">Butter</a></li>
						<li><a href="{{url('single_category/12')}}" class="site-nav">Eggs</a></li>
					</ul>
					</li>
					<li><a href="#" class="site-nav">Meat & Seafood<i class="anm anm-plus-l"></i></a>
					<ul>
						<li><a href="{{url('single_category/13')}}" class="site-nav">Chicken</a></li>
						<li><a href="{{url('single_category/14')}}" class="site-nav">Ground Beef</a></li>
						<li><a href="{{url('single_category/15')}}" class="site-nav">Salmon</a></li>
						<li><a href="{{url('single_category/16')}}" class="site-nav">Shrimp</a></li>

					</ul>
					</li>
					<li><a href="#" class="site-nav">Snacks & Beverages<i class="anm anm-plus-l"></i></a>
					<ul>
						<li><a href="{{url('single_category/17')}}" class="site-nav">Coffee</a></li>
						<li><a href="{{url('single_category/18')}}" class="site-nav">Chips</a></li>
						<li><a href="{{url('single_category/19')}}" class="site-nav">Soda</a></li>
						<li><a href="{{url('single_category/20')}}" class="site-nav">Juice</a></li>

					</ul>
					</li>
				</ul>
			</li>
			<li class="lvl1"><a href="{{url('about')}}"><b>About Us</b></a>
			<li class="lvl1"><a href="{{url('contact')}}"><b>Contact Us</b></a>
        </li>
      </ul>
	</div>