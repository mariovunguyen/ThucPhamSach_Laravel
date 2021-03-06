@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 style="text-align: center">Cửa Hàng Cung Cấp {!! $data->ten_loai !!}</h1>
        <div class="row">
            @if(count($data))
                @include('flashmessage.flashmessage')
                    @foreach($data->sanpham as $product)
                    @if($product->tonkho["soluong"] == 0)
                    {{--  <h4 style="text-align:center;">Hết Hàng</h4>  --}}
                    @else
                    <div class="col-md-3 col-sm-6">
                        <span class="thumbnail">
                            <div>
                                <img class="img-responsive" src="/images/upload/{!! $product->image !!}" alt="...">
                                <figcaption>
                                    <div>
                                        @if($product->giamgia == 0)
                                        @else
                                            <img class="img-responsive" src="/images/sale.png" alt="...">
                                        @endif
                                    </div>
                                </figcation>
                            </div>
                            <h4><a href="{{route('product_detail',[$product->id])}}">{!! $product->ten_sanpham !!}</a></h4>
                            <div class="ratings">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </div>
                            @if(isset($product->sanphamchitiet))
                            <p>{!! str_limit($product->sanphamchitiet["mieuta"],50,'....') !!}</p>
                            @else
                            <p>Chưa có thông tin chi tiết</p>
                            @endif
                            <hr class="line">
                            <div class="row">
                                @if($product->tonkho["soluong"] == 0)
                                    {{--  <h4 style="text-align:center;">Hết Hàng</h4>  --}}
                                @else
                                    <div class="col-md-12 col-sm-12">
                                        <p class="price" style="text-align: center;">
                                            @if($product->giamgia == 0)
                                                {!! number_format($product->dongia,0,",","." ) !!} 
                                                ₫/{!! $product->donvitinh !!}
                                            @else
                                                <span style="text-decoration:line-through">
                                                    {!! number_format($product->giacu,0,",","." ) !!} 
                                                    ₫/{!! $product->donvitinh !!}
                                                </span>
                                                {!! number_format($product->dongia,0,",","." ) !!}
                                                ₫/{!! $product->donvitinh !!}
                                            @endif
                                        </p>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                        <div class="col-md-6 col-sm-6">
                                            <a class="btn btn-sm green" href="{{route('product_detail',[$product->id])}}">
                                                <span class="fa fa-info-circle"></span>
                                                Chi Tiết
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <a class="btn btn-sm red" href="{{route('cart',[$product->id])}}">
                                                <span class="fa fa-cart-plus"></span>
                                                Mua
                                            </a>
                                        </div>
                                </div>
                                    @endif

                            </div>
                        </span>
                    </div>
                    @endif
                    @endforeach
            @else
                <p>You have no items </p>
            @endif
        </div>
    </div>
@endsection