<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('product.index') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user-secret"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Quản lý</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('product.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            Giao diện
            </div>

            <!-- Nav Item - Banner   -->
            <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseImage" aria-expanded="true" aria-controls="collapseImage">
                <i class="fas fa-image"></i>
                <span>Ảnh nền</span>
            </a>
            <div id="collapseImage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ảnh:</h6>
                <a class="collapse-item" href="{{ route('product.index') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('product.index') }}">Thêm ảnh</a>
                </div>
            </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            Admin
            </div>


            <!-- Nav Item - News -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-newspaper"></i>
            <span>Tin Tức</span>
            </a>
            <div id="collapseNews" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tin Tức:</h6>
                <a class="collapse-item" href="{{ route('news.index') }}">Danh sách bài viết</a>
                <a class="collapse-item" href="{{  route('news.create')  }}">Bài viết mới</a>
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-trash"></i>Thùng rác</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Gắn thẻ:</h6>
                <a class="collapse-item" href="{{ route('productType.index') }}">Danh sách thẻ</a>
                <a class="collapse-item" href="{{  route('productType.create')  }}">Tạo thẻ mới</a>
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-trash"></i>Thùng rác</a>
            </div>
            </div>
        </li>

        <!-- Nav Item - Product -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-gift"></i>
                <span>Quản lý sản phẩm</span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sản Phẩm:</h6>
                        <a class="collapse-item" href="{{ route('product.index') }}">Danh sách sản phẩm</a>
                        <a class="collapse-item" href="{{ route('product.create') }}">Tạo mới sản phẩm</a>
                        <a class="collapse-item" href="{{ route('product.trash') }}"><i class="fas fa-fw fa-trash"></i>Thùng rác</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Loại Sản Phẩm:</h6>
                        <a class="collapse-item" href="{{ route('productType.index') }}">Danh sách loại</a>
                        <a class="collapse-item" href="{{  route('productType.create')  }}">Thêm loại mới</a>
                        <a class="collapse-item" href="{{  route('productType.trash')  }}"><i class="fas fa-fw fa-trash"></i>Thùng rác</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Bills -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBill" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-money-check"></i>
                    <span>Đơn hàng</span>
                </a>
                <div id="collapseBill" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Đơn hàng:</h6>
                    <a class="collapse-item" href="{{ route('bill.index') }}">Danh sách Đơn hàng</a>
                    <a class="collapse-item" href="{{ route('bill.trash') }}"><i class="fas fa-fw fa-trash"></i>Thùng rác</a>
                </div>
                </div>
            </li>

            <!-- Nav Item - Customer -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="true" aria-controls="collapseImage">
                    <i class="fas fa-users"></i>
                    <span>Quản lý Khách hàng</span>
                </a>
                <div id="collapseCustomer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Customer:</h6>
                        <a class="collapse-item" href="{{ route('customer.index') }}">Danh sách</a>
                        <a class="collapse-item" href="{{ route('customer.create') }}">Thêm khách hàng</a>
                        <a class="collapse-item" href="#">Thùng rác</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - User -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseImage">
                <i class="fas fa-user"></i>
                <span>Quản lý Người dùng</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User:</h6>
                    <a class="collapse-item" href="{{ route('user.index') }}">Danh sách</a>
                </div>
                </div>
            </li>

            <!-- Nav Item - Log out -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="fas fa-arrow-circle-left"></i>
                <span>Đăng xuất</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
