<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        @can('isAdmin')
        <li><a href="{{url('admin_dashboard')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        @endcan
        @can('isSeller')
        <li><a href="{{url('seller_dashboard')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        @endcan
        @can('isBuyer')
        <li><a href="{{url('buyer_dashboard')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        @endcan
        <li><a><i class="fa fa-list"></i> Products <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            @can('isAdmin')
            <li><a href="{{url('category-datatable')}}">Categories</a></li>  
            <li><a href="{{url('product-datatable')}}">Products</a></li>              
            @endcan
            @can('isSeller')
            <li><a href="{{url('sellerproduct-datatable')}}">My Products</a></li>                
            @endcan
            @can('isBuyer')
            <li><a href="{{url('wishproduct-datatable')}}">My Wishlist</a></li>                
            @endcan
        </ul>
        </li>
        <li><a><i class="fa fa-tags"></i> Orders <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            @can('isAdmin')
            <li><a href="{{url('unprocessedorder-datatable')}}">Unprocessed Orders</a></li>
            <li><a href="{{url('processedorder-datatable')}}">Processed Orders</a></li>                
            @endcan
            @can('isBuyer')
            <li><a href="{{url('pendingorder-datatable')}}">Pending Orders</a></li>
            <li><a href="{{url('pastorder-datatable')}}">Past Orders</a></li>                
            @endcan
            @can('isSeller')
            <li><a href="{{url('unprocessedorder-datatable')}}">Unprocessed Orders</a></li>
            <li><a href="{{url('processedorder-datatable')}}">Processed Orders</a></li>                
            @endcan
        </ul>
        </li>
        @can('isAdmin')
        <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="{{url('user-datatable')}}">All Users</a></li>
            <li><a href="{{url('seller-datatable')}}">Sellers</a></li>
            <li><a href="{{url('buyer-datatable')}}">Buyers</a></li>
            <li><a href="{{url('client-datatable')}}">Clients</a></li>
        </ul>
        </li>
        <li><a><i class="fa fa-cogs"></i> Configurations <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="{{url('about-datatable')}}">About Us</a></li>
            <li><a href="{{url('contact-datatable')}}">Contact Us</a></li>
        </ul>
        </li>            
        @endcan

    </ul>
    </div>

</div>