@extends('layouts.branch')

@section('title', $categoryId->name)

@section('content')
    <!--Body Content-->
    <div id="page-content">
        
        <div class="container">
        	<div class="row">
            	<!--Sidebar-->
            	<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                	<div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                	<div class="sidebar_tags">
                    	<!--Categories-->
                    	<div class="sidebar_widget categories filter-widget">
                            <div class="widget-title"><h2>Categories</h2></div>
                            <div class="widget-content">
                                <ul class="sidebar_categories">
									@foreach ($categories as $category)
									@if ($category->sex == 'M' && $category->sex == 'F')
                                    <li class="level1 sub-level"><a href="#;" class="site-nav">{{$category->name}}</a>
                                    	<ul class="sublinks">
											@if ($category->sex == 'M')
                                        	<li class="level2"><a href="#;" class="site-nav">Men</a></li>
											@elseif ($category->sex == 'F')	
											<li class="level2"><a href="#;" class="site-nav">Women</a></li>											
											@endif
                                            <li class="level2"><a href="#;" class="site-nav">View All Clothing</a></li>
                                        </ul>
                                    </li>	
									@elseif ($category->sex !== 'M' && $category->sex !== 'F')	
									<li class="lvl-1"><a href="{{url('single_category/'.$category->id)}}" class="site-nav">{{$category->name}}</a></li>																		
									@endif

									@endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Categories-->
                        <!--Popular Products-->
						@if (count($popularproducts) >=1)
						<div class="sidebar_widget">
                        	<div class="widget-title"><h2>Popular Products</h2></div>
							<div class="widget-content">
                                <div class="list list-sidebar-products">
                                  <div class="grid">
									@foreach ($popularproducts as $product)
                                    <div class="grid__item">
                                      <div class="mini-list-item">
                                        <div class="mini-view_image">
                                            <a class="grid-view-item__link" href="{{url('single_product/'.$product->id)}}">
                                                <img class="grid-view-item__image" src="{{Storage::url($product->image_path)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="details"> <a class="grid-view-item__title" href="{{url('single_product/'.$product->id)}}">{{$product->name}} </a>
                                          <div class="grid-view-item__meta"><span class="product-price__price"><span class="money">KSH{{$product->price}}</span></span></div>
                                        </div>
                                      </div>
                                    </div>										
									@endforeach

                                  </div>
                                </div>
                          	</div>
						</div>
						@endif
                        <!--End Popular Products-->
                    </div>
                </div>
                <!--End Sidebar-->
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col shop-grid-5">
				@if(count($products)>=1) 
                	<div class="productList">
                    	<!-- <div class="category-description">
                            <h3>Category Description</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                        </div> -->
                        <hr>
                    	<!--Toolbar-->
                        <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    	<div class="toolbar">
                        	<div class="filters-toolbar-wrapper">
                            	<div class="row">
                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row">
								@foreach ($products as $product)
								<div class="col-6 col-sm-6 col-md-4 col-lg-2 item">
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
                    </div>
                    <div class="infinitpaginOuter">
                        <div class="infinitpagin">	
							{!! $products->links() !!}
						</div>
                    </div>
				@else
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">	
        			<div class="empty-page-content text-center">
                        <h1>Oops! Products Not Found</h1>
                        <p>The products for this category do not exist.</p>
                        <p><a href="{{url('/')}}" class="btn btn--has-icon-after">Continue shopping <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                      </div>
        		</div>
				@endif
                </div>
                <!--End Main Content-->
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
  
@endsection        