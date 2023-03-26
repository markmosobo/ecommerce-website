@extends('layouts.branch')


@section('title', $singleproduct->name)

@section('content')

    <!--MainContent-->
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
        @if ($message = Session::get('success'))
            <div class="alert alert-success text-uppercase" role="alert">
                <i class="icon anm anm-bag-l"></i> &nbsp;<strong>Success!</strong> {{ $message }}
            </div>
        @endif
    </div> 


    <div id="MainContent" class="main-content" role="main">

        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>{{$singleproduct->name}}</span>
            </div>
        </div>
        <!--End Breadcrumb-->
        
        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="product-thumb">
                                <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                    <a data-image="{{Storage::url($singleproduct->image_path)}}" data-zoom-image="{{Storage::url($singleproduct->image_path)}}" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{Storage::url($singleproduct->image_path)}}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img class="zoompro blur-up lazyload" data-zoom-image="{{Storage::url($singleproduct->image_path)}}" alt="" src="{{Storage::url($singleproduct->image_path)}}" />
                                </div>
                                <div class="product-labels"><span class="lbl on-sale">Sale</span><span class="lbl pr-label1">new</span></div>
                            </div>
                            <div class="lightboximages">
                                <a href="{{Storage::url($singleproduct->image_path)}}" data-size="1462x2048"></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-single__meta">
                                <h1 class="product-single__title">{{$singleproduct->name}}</h1>
                                <div class="product-nav clearfix">	
                                    @if($products->where('id',$singleproduct->id+1)->first())
                                    <a href="{{url('single_product/'.$singleproduct->id +1)}}" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a> 
                                    @else                                       
                                    @endif				
                                </div>
                                <div class="prInfoRow">
                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                    <!-- <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                    <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div> -->
                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    <!-- <s id="ComparePrice-product-template"><span class="money">$600.00</span></s> -->
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">KSH{{$singleproduct->price}}</span></span>
                                    </span>
                                </p>
                                @if($singleproduct->sold >= 1)
                                <div class="orderMsg" data-user="23" data-time="24">
                                    <img src="{{asset('assets/images/order-icon.jpg')}}" alt="" /> <strong class="items">{{$singleproduct->sold}}</strong> sold</div>
                                </div>
                                @else
                                @endif
                            <div class="product-single__description rte">
                                <p>{{$singleproduct->description}}</p>
                            </div>
                            <div id="quantity_message">Hurry! Only  <span class="items">{{$singleproduct->quantity}}</span>  left in stock.</div>
                            <form method="post" action="#" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                                <!-- Product Action -->
                                <div class="product-action clearfix">
                                    <div class="product-form__item--quantity">
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="product-form__item--submit">
                                        <button type="button" onclick="window.location.href='{{url('add-to-cart/'.$singleproduct->id)}}'"method="post" name="add" class="btn product-form__cart-submit">
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Product Action -->
                            </form>
                        </div>
                </div>
            </div>
            <!--End-product-single-->
            <!--Product Fearure-->
            <div class="prFeatures">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{asset('assets/images/credit-card.png')}}" alt="Safe Payment" title="Safe Payment" />
                        <div class="details"><h3>Safe Payment</h3>Pay with the world's most payment methods.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{asset('assets/images/shield.png')}}" alt="Confidence" title="Confidence" />
                        <div class="details"><h3>Confidence</h3>Protection covers your purchase and personal data.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{asset('assets/images/worldwide.png')}}" alt="Worldwide Delivery" title="Worldwide Delivery" />
                        <div class="details"><h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp; regions.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="{{asset('assets/images/phone-call.png')}}" alt="Hotline" title="Hotline" />
                        <div class="details"><h3>Hotline</h3>Talk to help line for your question on 4141 456 789, 4125 666 888</div>
                    </div>
                </div>
            </div>
            <!--End Product Fearure-->
            
            <!--Related Product Slider-->
            @if(count($relatedproducts)>=1)
            <div class="related-product grid-products">
                <header class="section-header">
                    <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                    <p class="sub-heading">You can shop for similar products in our store.</p>
                </header>
                <div class="productPageSlider">
                    @foreach ($relatedproducts as $product)
                    <div class="col-12 item">
                        <!-- start product image -->
                        <div class="product-image">
                            <!-- start product image -->
                            <a href="{{url('single_product/'.$product->id)}}">
                                <!-- image -->
                                <img class="primary blur-up lazyload" data-src="{{Storage::url($product->image_path)}}" src="{{Storage::url($product->image_path)}}" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="hover blur-up lazyload" data-src="{{Storage::url($product->image_path)}}" src="{{Storage::url($product->image_path)}}" alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->

                            <!-- Start product button -->
                            <form class="variants add" action="#" onclick="window.location.href='{{url('add-to-cart/'.$product->id)}}'"method="post">
                                <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                            </form>
                            <div class="button-set">
                                <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                    <i class="icon anm anm-search-plus-r"></i>
                                </a>

                            </div>
                            <!-- end product button -->
                        </div>
                        <!-- end product image -->
                        <!--start product details -->
                        <div class="product-details text-center">
                            <!-- product name -->
                            <div class="product-name">
                                <a href="{{url('single_product/'.$product->id)}}">{{$product->name}}</a>
                            </div>
                            <!-- End product name -->
                            <!-- product price -->
                            <div class="product-price">
                                <!-- <span class="old-price">$500.00</span> -->
                                <span class="price">KSH{{$product->price}}</span>
                            </div>
                            <!-- End product price -->
                            
                        </div>
                        <!-- End product details -->
                    </div>  
                    @endforeach
                </div>
            </div>
            @endif
            <!--End Related Product Slider-->
            
            </div>
        <!--#ProductSection-product-template-->
    </div>
    <!--MainContent-->    

@endsection
