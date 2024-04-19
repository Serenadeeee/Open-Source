@extends('layout')
@section('content')

<!---------- Slider ---------->
<div class="wrap-slider slick-slider">
    @foreach($slider as $key => $slide)
    <div class="col-xs-12">
        <img src="{{url('public/uploads/slider/'.$slide->slider_image)}}" width="100%" alt="{{$slide->slide_name}}">
    </div>
    @endforeach
</div> 

<!---------- Product ---------->
<div class="wrap-categories">
    <!-- @foreach($category_product as $key => $cate_pro)
    <div class="row">
        <div class="text-center mb-3">
            <a class="title-content" href="{{url('/danh-muc-san-pham/'.$cate_pro->category_id)}}">
                <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> {{$cate_pro->category_name}} <img src="{{url('public/client/img/dot-title-right.png')}}" alt="">
            </a>
            <h5 class="font-linotteBold">{{$cate_pro->category_desc}}</h5>
        </div>
        <div class="wrap-products slick-product">
            <form>
                <input type="hidden" name="category_id" value="{{$cate_pro->category_id}}">
            </form>
            @foreach($list_product as $key => $product)
            <div class="col-xs-12 col-sm-6 col-md-3 list-product">
                <div class="box-product">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <a href="{{url('chi-tiet-san-pham/'.$product->product_id)}}">
                            <img src="{{url('public/uploads/product/'.$product->product_image)}}" width="100%" alt="{{$product->product_name}}">
                        </a>
                        <div class="info-product text-center">
                            <h3><a href="{{url('chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h3>
                            <div class="price-product text-center">
                                <p>{{number_format($product->product_price,0,',','.')}} VNĐ</p>
                            </div>
                            @php
                                $customer_id = Session::get('customer_id');
                            @endphp
                            @if($customer_id)
                            <button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                            </button>
                            @else
                            <a href="{{url('/dang-nhap')}}">
                                <button type="button" class="buy-product form-control btn" name="add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                                </button>
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach -->
    <div class="row">
        <div class="text-center mb-3">
            <a class="title-content" href="{{url('/danh-muc-san-pham/30')}}">
                <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> Dell <img src="{{url('public/client/img/dot-title-right.png')}}" alt="">
            </a>
            <h5 class="font-linotteBold">Tốt nhất trong việc đổi mới</h5>
        </div>
        <div class="wrap-products slick-product">
            @foreach($product_viet as $key => $viet)
            <div class="col-xs-12 col-sm-6 col-md-3 list-product">
                <div class="box-product">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$viet->product_id}}" class="cart_product_id_{{$viet->product_id}}">
                        <input type="hidden" value="{{$viet->product_name}}" class="cart_product_name_{{$viet->product_id}}">
                        <input type="hidden" value="{{$viet->product_image}}" class="cart_product_image_{{$viet->product_id}}">
                        <input type="hidden" value="{{$viet->product_price}}" class="cart_product_price_{{$viet->product_id}}">
                        <input type="hidden" value="{{$viet->product_quantity}}" class="cart_product_quantity_{{$viet->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$viet->product_id}}">
                        <a href="{{url('chi-tiet-san-pham/'.$viet->product_id)}}">
                            <img src="{{url('public/uploads/product/'.$viet->product_image)}}" width="100%" alt="{{$viet->product_name}}">
                        </a>
                        <div class="info-product text-center">
                            <h3><a href="{{url('chi-tiet-san-pham/'.$viet->product_id)}}">{{$viet->product_name}}</a></h3>
                            <div class="price-product text-center">
                                <p>{{number_format($viet->product_price,0,',','.')}} VNĐ</p>
                            </div>
                            @php
                                $customer_id = Session::get('customer_id');
                            @endphp
                            @if($customer_id)
                            <button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$viet->product_id}}" name="add-to-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                            </button>
                            @else
                            <a onclick="add_to_cart()">
                                <button type="button" class="buy-product form-control btn" name="add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                                </button>
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="text-center mb-3">
            <a class="title-content" href="{{url('/danh-muc-san-pham/27')}}">
                <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> Asus <img src="{{url('public/client/img/dot-title-right.png')}}" alt="">
            </a>
            <h5 class="font-linotteBold">Thiết kế thân máy tốt nhất</h5>
        </div>
        <div class="wrap-products slick-product">
            @foreach($product_minhphuong as $key => $minh_pphuong)
            <div class="col-xs-12 col-sm-6 col-md-3 list-product">
                <div class="box-product">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$minh_pphuong->product_id}}" class="cart_product_id_{{$minh_pphuong->product_id}}">
                        <input type="hidden" value="{{$minh_pphuong->product_name}}" class="cart_product_name_{{$minh_pphuong->product_id}}">
                        <input type="hidden" value="{{$minh_pphuong->product_image}}" class="cart_product_image_{{$minh_pphuong->product_id}}">
                        <input type="hidden" value="{{$minh_pphuong->product_price}}" class="cart_product_price_{{$minh_pphuong->product_id}}">
                        <input type="hidden" value="{{$minh_pphuong->product_quantity}}" class="cart_product_quantity_{{$minh_pphuong->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$minh_pphuong->product_id}}">
                        <a href="{{url('chi-tiet-san-pham/'.$minh_pphuong->product_id)}}">
                            <img src="{{url('public/uploads/product/'.$minh_pphuong->product_image)}}" width="100%" alt="{{$minh_pphuong->product_name}}">
                        </a>
                        <div class="info-product text-center">
                            <h3><a href="{{url('chi-tiet-san-pham/'.$minh_pphuong->product_id)}}">{{$minh_pphuong->product_name}}</a></h3>
                            <div class="price-product text-center">
                                <p>{{number_format($minh_pphuong->product_price,0,',','.')}} VNĐ</p>
                            </div>
                            @php
                                $customer_id = Session::get('customer_id');
                            @endphp
                            @if($customer_id)
                            <button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$minh_pphuong->product_id}}" name="add-to-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                            </button>
                            @else
                            <a onclick="add_to_cart()">
                                <button type="button" class="buy-product form-control btn" name="add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                                </button>
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="text-center mb-3">
            <a class="title-content" href="{{url('/danh-muc-san-pham/23')}}">
                <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> Hp <img src="{{url('public/client/img/dot-title-right.png')}}" alt="">
            </a>
            <h5 class="font-linotteBold">Tốt nhất cho tính năng 2 trong 1</h5>
        <div class="wrap-products slick-product">
            @foreach($product_gio as $key => $gio_qua)
            <div class="col-xs-12 col-sm-6 col-md-3 list-product">
                <div class="box-product">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$gio_qua->product_id}}" class="cart_product_id_{{$gio_qua->product_id}}">
                        <input type="hidden" value="{{$gio_qua->product_name}}" class="cart_product_name_{{$gio_qua->product_id}}">
                        <input type="hidden" value="{{$gio_qua->product_image}}" class="cart_product_image_{{$gio_qua->product_id}}">
                        <input type="hidden" value="{{$gio_qua->product_price}}" class="cart_product_price_{{$gio_qua->product_id}}">
                        <input type="hidden" value="{{$gio_qua->product_quantity}}" class="cart_product_quantity_{{$gio_qua->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$gio_qua->product_id}}">
                        <a href="{{url('chi-tiet-san-pham/'.$gio_qua->product_id)}}">
                            <img src="{{url('public/uploads/product/'.$gio_qua->product_image)}}" width="100%" alt="{{$gio_qua->product_name}}">
                        </a>
                        <div class="info-product text-center">
                            <h3><a href="{{url('chi-tiet-san-pham/'.$gio_qua->product_id)}}">{{$gio_qua->product_name}}</a></h3>
                            <div class="price-product text-center">
                                <p>{{number_format($gio_qua->product_price,0,',','.')}} VNĐ</p>
                            </div>
                            @php
                                $customer_id = Session::get('customer_id');
                            @endphp
                            @if($customer_id)
                            <button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$gio_qua->product_id}}" name="add-to-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                            </button>
                            @else
                            <a onclick="add_to_cart()">
                                <button type="button" class="buy-product form-control btn" name="add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                                </button>
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="text-center mb-3">
            <a class="title-content" href="{{url('/danh-muc-san-pham/24')}}">
                <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> Lenovo <img src="{{url('public/client/img/dot-title-right.png')}}" alt="">
            </a>
            <h5 class="font-linotteBold">Được đánh giá tốt nhất</h5>
        </div>
        <div class="wrap-products slick-product">
            @foreach($product_hop as $key => $hop_qua)
            <div class="col-xs-12 col-sm-6 col-md-3 list-product">
                <div class="box-product">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$hop_qua->product_id}}" class="cart_product_id_{{$hop_qua->product_id}}">
                        <input type="hidden" value="{{$hop_qua->product_name}}" class="cart_product_name_{{$hop_qua->product_id}}">
                        <input type="hidden" value="{{$hop_qua->product_image}}" class="cart_product_image_{{$hop_qua->product_id}}">
                        <input type="hidden" value="{{$hop_qua->product_price}}" class="cart_product_price_{{$hop_qua->product_id}}">
                        <input type="hidden" value="{{$hop_qua->product_quantity}}" class="cart_product_quantity_{{$hop_qua->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$hop_qua->product_id}}">
                        <a href="{{url('chi-tiet-san-pham/'.$hop_qua->product_id)}}">
                            <img src="{{url('public/uploads/product/'.$hop_qua->product_image)}}" width="100%" alt="{{$hop_qua->product_name}}">
                        </a>
                        <div class="info-product text-center">
                            <h3><a href="{{url('chi-tiet-san-pham/'.$hop_qua->product_id)}}">{{$hop_qua->product_name}}</a></h3>
                            <div class="price-product text-center">
                                <p>{{number_format($hop_qua->product_price,0,',','.')}} VNĐ</p>
                            </div>
                            @php
                                $customer_id = Session::get('customer_id');
                            @endphp
                            @if($customer_id)
                            <button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$hop_qua->product_id}}" name="add-to-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                            </button>
                            @else
                            <a onclick="add_to_cart()">
                                <button type="button" class="buy-product form-control btn" name="add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                                </button>
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!---------- Banner ---------->
<div class="wrap-banner">
    <div class="wrap-img text-center">
        <img src="{{url('public/client/img/hanglaptop.png')}}" alt="NT Shop" title="NT Shop - Mua bán laptop chính hãng">
    </div>
    <div class="container text-center">
        <div class="title-content">
            <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> NT shop - prestigious laptop shop <img src="{{url('public/client/img/dot-title-right.png')}}" alt=""></div>
        <div class="descript-introduce">
            <ol>
                <li>&emsp;Bạn đang cần tìm một địa chỉ uy tín bán laptop chất lượng và an toàn?</li>
                <li>&emsp;Bạn ngại phải ra đường giữa trưa nắng hay trời mưa để lựa chọn những laptop chất lượng nhất phù hợp với túi tiền ?</li>
                <li>&emsp;Bạn phân vân không biết lựa chọn thế nào là đúng để tránh chọn nhầm laptop chất lượng kém ?</li>
                <li>&emsp;Bạn luôn lo lắng về vấn đề nguồn gốc xuất xứ của laptop?</li>
                <li>&emsp;Bạn đã biết gì về cấu hình máy chưa?</li>
                <li>&emsp;Ở Đà Nẵng bạn không biết nơi nào bán Laptop CHẤT LƯỢNG và AN TOÀN với giá cả hợp lý ?</li>
            </ol>
            <span class="text-uppercase"><i class="pr-3 fas fa-greater-than"></i>Hãy để <a href="{{url('/')}}">NT SHOP</a> giải quyết tất cả các vấn đề này cho bạn.</span>
        </div>
        <div class="wrap-program">
            <div class="col-md-6"><img src="{{url('public/client/img/banner-logoo.png')}}" width="100%" alt="NT SHOP" title="NT SHOP - Mua bán laptop chính hãng"></div>
            <div class="col-md-3">
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{url('public/client/img/quality.png')}}" alt="Uy tín chất lượng"></a>
                </div>
                <p class="program-title">Uy tín chất lượng</p>
                <div>
                    <p>Để chiếm được trái tim khách hàng cần có chữ tín. Thương hiệu mạnh nhờ chữ tín và cũng chính chữ tín làm nên thương hiệu.</p>
                </div>
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{url('public/client/img/best-price.png')}}" alt="Giá cả hợp lý"></a>
                </div>
                <p class="program-title">Giá cả hợp lý</p>
                <div>
                    <p>Giá có thể không tốt nhất nhưng NT Shop cam kết chất lượng luôn tương xứng với giá cả.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{url('public/client/img/best-price1.png')}}" alt="Bảo hành uy tín"></a>
                </div>
                <p class="program-title">Bảo hành uy tín</p>
                <div>
                    <p>Tất cả sản phẩm tại NT Shop đều có thể bảo hành và đổi trả khi máy gặp sự cố</p>
                </div>
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{url('public/client/img/free-ship.png')}}" alt="Nhanh chóng chính xác"></a>
                </div>
                <p class="program-title">Nhanh chóng chính xác</p>
                <div>
                    <p>NT Shop cam kết giao hàng tận tay cực nhanh cho các đơn hàng nội thành.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------- Message ---------->
<div class="wrap-message px-2">
    <div class="container">
        <div class="row col-md-7 m-left">
            <div class="frame-message">
                <div class="text-center mb-2">
                    <div class="title-content mb-0">
                        <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> Liên hệ với chúng tôi <img src="{{url('public/client/img/dot-title-right.png')}}" alt=""></div>
                    <span class="subTitle-message mb-2">Vui lòng nhập thông tin vào để chúng tôi liên hệ với bạn sớm nhất có thể!</span>
                </div>
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2"><input type="text" name="name_mess" class="form-control name_mess" placeholder="Họ và tên" /></div>
                        <div class="col-md-4 mb-2"><input type="text" name="phone_mess" class="form-control phone_mess" placeholder="Số điện thoại" /></div>
                        <div class="col-md-4 mb-2"><input type="email" name="email_mess" class="form-control email_mess" placeholder="Email" /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-2"><textarea name="content_mess" class="form-control content_mess" cols="60" rows="2" placeholder="Nội dung"></textarea></div>
                        <div class="col-md-4 mb-2"><input type="button" name="submit_mess" class="btn btn-danger form-control submit_mess" value="Gửi"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------- Post-Video ---------->
<div class="wrap-news">
    <div class="container text-center">
        <div class="title-content">
            <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> Tin tức - Video <img src="{{url('public/client/img/dot-title-right.png')}}" alt=""></div>
    </div>
    <div class="row">
        <div class="col-xs 12 col-md-6 list-new mb-4">
            @foreach($post as $key => $pos)
            <div class="box-new clearfix">
                <a href="{{url('bai-viet/'.$pos->post_slug)}}">
                    <img src="{{url('public/uploads/post/'.$pos->post_image)}}" width="270px" alt="{{$pos->post_title}}">
                </a>
                <div class="info-new">
                    <p style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" class="mb-0"><a href="{{url('bai-viet/'.$pos->post_slug)}}">{{$pos->post_title}}</a></p>
                    <div style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;" class="text-new">{{$pos->post_desc}}</div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-xs 12 col-md-5">
            <ul id="imageGallery">
                @foreach($video as $key => $vid)
                <li data-thumb="{{url('public/uploads/video_image/'.$vid->video_image)}}" data-src="{{url('public/uploads/video_image/'.$vid->video_image)}}">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{$vid->video_link}}" title="YouTube video player"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!---------- Partner ---------->
<div class="wrap-partner">
    <div class="text-center mb-3">
        <div class="title-content">
            <img src="{{url('public/client/img/dot-title-left.png')}}" alt=""> Đối tác - Khách hàng <img src="{{url('public/client/img/dot-title-right.png')}}" alt="">
        </div>
    </div>
    <div class="wrap-partner slick-partner">
        @foreach($partner as $key => $part)
        <div class="col-xs-12 col-sm-6 col-md-2 list-partner">
            <div class="box-partner">
                <p>
                    <a href="@if($part->partner_link != '') {{$part->partner_link}} @else # @endif">
                        <img src="{{url('public/uploads/partner/'.$part->partner_image)}}" width="100%" alt="{{$part->partner_name}}">
                    </a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection