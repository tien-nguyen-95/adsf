<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Mega Bread</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Trang chủ</a></li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Cửa hàng</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="{{ route('shop','all') }}">Tất cả</a>
                @foreach ($productType as $type)
                    <a class="dropdown-item" href="{{ route('shop', $type->slug) }}">{{ $type->name }}</a>
                @endforeach
                <a class="dropdown-item" href="{{ route('checkout') }}">Thanh Toán</a>
            </div>
            </li>
          <li class="nav-item"><a href="#" class="nav-link">Giới thiệu</a></li>
          <li class="nav-item"><a href="{{ route('new') }}" class="nav-link">Tin tức</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Liên hệ</a></li>
          <li class="nav-item cta cta-colored"><a href="{{ route('cart.index') }}" class="nav-link"><span class="icon-shopping_cart"></span>[{{ Cart::getContent()->count() }}]</a></li>
          <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link">Đăng nhập</a></li>
        </ul>
      </div>
    </div>
  </nav>
  @stack('index-toastr')
