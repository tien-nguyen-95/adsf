@extends('layouts.bakery')

@section('title', 'Thanh Toán')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('bakery/images/bg_bm1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
          <h1 class="mb-0 bread">Thanh toán</h1>
        </div>
      </div>
    </div>
</div>
<section class="ftco-section ftco-cart">
          <div class="container">
<div class="row top-15">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{Cart::getContent()->count()}}</span>
      </h4>
        <ul class="list-group mb-3">
            @foreach(Cart::getContent() as $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">{{$product->name}}</h6>
                    <small class="text-muted">{{$product->quantity . ' x ' . $product->price}}</small>
                </div>
                <span class="text-muted">{{$product->price * $product->quantity}}</span>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (VND)</span>
                <strong>{{Cart::getSubTotal()}}</strong>
            </li>
        </ul>
        <form action="{{route('cart.clear')}}" method="POST" class="card p-2">
            @csrf
            <div class="input-group">
                <div class="input-group">
                    <button type="submit" class="btn btn-danger">Clear Cart</button>
                </div>
            </div>
        </form>
        <form class="card p-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-8 order-md-1">
        @if (session('success'))

            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h4 class="mb-3">Nhập thông tin</h4>
        {{-- <form class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="28 Nguyễn Tri Phương" required>
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">PayPal</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                        Name on card is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                    <div class="invalid-feedback">
                        Credit card number is required
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                    <div class="invalid-feedback">
                        Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-cvv">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
            </div>
            <hr class="mb-4">
           <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form> --}}
        <form action="{{ action('CartController@confirmCheckout') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Tên</label>
                @error('name')
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @enderror
                <input type="text" class="form-control" name="name" placeholder="Nhập tên...">
            </div>

            <div class="form-group">
                <label for="title">Giới tính: </label>
                @error('gender')
                    <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                @enderror
                <select name="gender">
                    <option value="1"selected>Nam</option>
                    <option value="0" >Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Email</label>
                @error('email')
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @enderror
                <input type="text" class="form-control" name="email" placeholder="Nhập mail...">
            </div>

            <div class="form-group">
                <label for="title">Địa chỉ</label>
                @error('address')
                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                @enderror
                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ...">
            </div>

            <div class="form-group">
                <label for="title">Số điện thoại</label>
                @error('phone')
                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                @enderror
                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại...">
            </div>

            <div class="form-group">
                <label for="title">Ghi chú</label>
                @error('note')
                    <div class="alert alert-danger">{{ $errors->first('note') }}</div>
                @enderror
                <input type="text" class="form-control" name="note" placeholder="Nhập ghi chú...">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Tiếp tục thanh toán</button>
        </form>
    </div>
</div>
</section>
@endsection
