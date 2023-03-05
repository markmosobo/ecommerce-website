<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{config('app.name')}}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                @if(Auth::user()->role == 'admin')
                <a class="nav-link" href="{{url('admin_dashboard')}}">
                @elseif (Auth::user()->role == 'seller')  
                <a class="nav-link" href="{{url('seller_dashboard')}}">
                @else
                <a class="nav-link" href="{{url('buyer_dashboard')}}">
                @endif
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configurations
            </div>

            <!-- Nav Item - About -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('about-datatable')}}">
                    <i class="fas fa-fw fa-circle"></i>
                    <span>About Us</span></a>
            </li>

            <!-- Nav Item - Contact -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('contact-datatable')}}">
                    <i class="fas fa-fw fa-circle"></i>
                    <span>Contact Us</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Products
            </div>

            <!-- Nav Item - Categories -->
            <li class="nav-item">
                <a class="nav-link" href="{{('category-datatable')}}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Categories</span></a>
            </li>

            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('product-datatable')}}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Products</span></a>
            </li>

            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="{{('order-datatable')}}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Orders</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage Users
            </div>

            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="{{('user-datatable')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>All Users</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>