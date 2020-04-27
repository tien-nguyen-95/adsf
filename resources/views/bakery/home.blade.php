@extends('layouts.bakery')

@section('title', 'Mega Bread')

@section('content')

<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(/bakery/images/bg_bm1.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-2">Bánh mì Mega xin kính chào quý khách</h1>
            <h2 class="subheading mb-4">Rất hân hạnh được phục vụ</h2>
            <p><a href="#" class="btn btn-primary">Chi tiết</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(/bakery/images/bg_bm2.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-2">100% nguyên liệu sạch không lưu trữ qua ngày</h1>
            <h2 class="subheading mb-4">Đảm bảo an toàn vệ sinh thực phẩm</h2>
            <p><a href="#" class="btn btn-primary">Chi tiết</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
      <div class="container">
          <div class="row no-gutters ftco-services">
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-shipped"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Free Shipping</h3>
          <span>Trong vòng bán kính 3km</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-diet"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Nguyên liệu sạch</h3>
          <span>Đảm bảo sức khỏe</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-award"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Chất lượng</h3>
          <span>Thỏa mãn mọi khẩu vị</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-customer-service"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Đặt hàng</h3>
          <span>Đặt hàng dễ dàng</span>
        </div>
      </div>
    </div>
  </div>
      </div>
  </section>

  {{-- <section class="ftco-section ftco-category ftco-no-pt">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="row">
                      <div class="col-md-6 order-md-last align-items-stretch d-flex">
                          <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(bakery/images/category.jpg);">
                              <div class="text text-center">
                                  <h2>Mega Bread</h2>
                                  <p>Nhanh gọn - Tiện Lợi</p>
                                  <p><a href="#" class="btn btn-primary">Mua ngay</a></p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(bakery/images/category-1.jpg);">
                              <div class="text px-3 py-1">
                                  <h2 class="mb-0"><a href="#">Nổi bật</a></h2>
                              </div>
                          </div>
                          <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(bakery/images/category-2.jpg);">
                              <div class="text px-3 py-1">
                                  <h2 class="mb-0"><a href="#">Bánh mì</a></h2>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(bakery/images/category-3.jpg);">
                      <div class="text px-3 py-1">
                          <h2 class="mb-0"><a href="#">Đồ Uống</a></h2>
                      </div>
                  </div>
                  <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(bakery/images/category-4.jpg);">
                      <div class="text px-3 py-1">
                          <h2 class="mb-0"><a href="#">Combo</a></h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section> --}}

<section class="ftco-section">
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Sản Phẩm nổi bật</span>
      <h2 class="mb-4">Bánh mì - Đồ Uống</h2>
      <p>Sự hài lòng của quý khánh là niềm vinh dự của chúng tôi</p>
      <p><a href="{{ route('shop','all') }}" class="btn btn-primary">Mua ngay</a></p>
    </div>
  </div>
  </div>
  <div class="container">
      <div class="row">
        @foreach ( $products as $key=>$product )
        <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
                <a href="{{ route('detail_product' , $product->slug) }}" class="img-prod"><img src="images/product/{{ $product->image }}" height="202" width="253" alt="">
                    @if($product->sale)
                    <span class="status">{{ $product->promotion }} %</span>
                    @endif
                    <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="{{ route('detail_product' , $product->slug) }}">{{ $product->name }}</a></h3>
                    <div class="d-flex">
                        <div class="pricing">
                            <p class="price">
                                @if($product->sale)
                                <span class="mr-2 price-dc">{{ number_format($product->unit_price) }} VND</span><span class="price-sale">{{ $product->get_sale_price()  }} VND</span>
                                @else
                                <span class="price-sale">{{ number_format($product->unit_price) }} VND</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="bottom-area d-flex px-3">
                        <div class="m-auto d-flex">
                            <a href="{{ route('detail_product' , $product->slug) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                <span><i class="ion-ios-menu"></i></span>
                            </a>
                            <a href="{{ route('detail_product' , $product->slug) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                <span><i class="ion-ios-cart"></i></span>
                            </a>
                            <a href="{{ route('detail_product' , $product->slug) }}" class="heart d-flex justify-content-center align-items-center ">
                                <span><i class="ion-ios-heart"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      </div>
  </div>
</section>

  {{-- <section class="ftco-section img" style="background-image: url(bakery/images/bg_3.jpg);">
  <div class="container">
          <div class="row justify-content-end">
    <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
        <span class="subheading">Best Price For You</span>
      <h2 class="mb-4">Deal of the day</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      <h3><a href="#">Spinach</a></h3>
      <span class="price">$10 <a href="#">now $5 only</a></span>
      <div id="timer" class="d-flex mt-5">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                  </div>
    </div>
  </div>
  </div>
</section>

<section class="ftco-section testimony-section">
<div class="container">
  <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Testimony</span>
      <h2 class="mb-4">Our satisfied customer says</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
    </div>
  </div>
  <div class="row ftco-animate">
    <div class="col-md-12">
      <div class="carousel-testimony owl-carousel">
        <div class="item">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5" style="background-image: url(bakery/images/person_1.jpg)">
              <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
              </span>
            </div>
            <div class="text text-center">
              <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <p class="name">Garreth Smith</p>
              <span class="position">Marketing Manager</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5" style="background-image: url(bakery/images/person_2.jpg)">
              <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
              </span>
            </div>
            <div class="text text-center">
              <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <p class="name">Garreth Smith</p>
              <span class="position">Interface Designer</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5" style="background-image: url(bakery/images/person_3.jpg)">
              <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
              </span>
            </div>
            <div class="text text-center">
              <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <p class="name">Garreth Smith</p>
              <span class="position">UI Designer</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5" style="background-image: url(bakery/images/person_1.jpg)">
              <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
              </span>
            </div>
            <div class="text text-center">
              <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <p class="name">Garreth Smith</p>
              <span class="position">Web Developer</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="testimony-wrap p-4 pb-5">
            <div class="user-img mb-5" style="background-image: url(bakery/images/person_1.jpg)">
              <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
              </span>
            </div>
            <div class="text text-center">
              <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <p class="name">Garreth Smith</p>
              <span class="position">System Analyst</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<hr>

  <section class="ftco-section ftco-partner">
  <div class="container">
      <div class="row">
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="bakery/images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="bakery/images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="bakery/images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="bakery/images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="bakery/images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
      </div>
  </div> --}}
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
      <div class="row d-flex justify-content-center py-5">
        <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
            <span>Get e-mail updates about our latest shops and special offers</span>
        </div>
        <div class="col-md-6 d-flex align-items-center">
          <form action="#" class="subscribe-form">
            <div class="form-group d-flex">
              <input type="text" class="form-control" placeholder="Enter email address">
              <input type="submit" value="Subscribe" class="submit px-3">
            </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection
