@extends('layouts.fontend-layouts.master')
@section('content')
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
<script>
    $(document).ready(function(){
         <?php for ($i=1;$i<1000;$i++) {?>
         $('#add-cart<?php echo $i;?>').on('click', function(){
            var idpro = $('#idsanpham<?php echo $i;?>').val();
            var namepro = $('#tensanpham<?php echo $i;?>').val();
            //alert(idpro);
            $.ajax({
                url: '<?php echo url('add/cart')?>/'+idpro,
                type: 'GET',
                dataType: 'html',
                data: "idpro="+idpro+"& namepro="+namepro,
                success: function(data){
                    alert('sản phẩm '+namepro+' đả được thêm vào giỏ hàng');
                }
            });
         });
        $('.modal<?php echo $i;?>').on('click', function(){
            var idsanpham = $('#idsanpham<?php echo $i;?>').val();
            var routeid = '<?php echo url('chitiet')?>/'+idsanpham;
            var addcart = '<?php echo url('cart')?>/'+idsanpham;
            var tensanpham = $('#tensanpham<?php echo $i;?>').val();
            var dongia = $('#dongia<?php echo $i;?>').val();
            var donvitinh = $('#donvitinh<?php echo $i;?>').val();
            var giamgia = $('#giamgia<?php echo $i;?>').val()*100;
            var giacu = $('#giacu<?php echo $i;?>').val();
            var format_giacu = number_format( giacu, 0, '.', ',' );
            var format_dongia = number_format( dongia, 0, '.', ',' );
            var image = $('#image<?php echo $i;?>').val();
            var chitietsanpham = $('#chitietsanpham<?php echo $i;?>').val();
            var imagelist = $('#imagelist<?php echo $i;?>').val();
            $('#tensanpham').html('<a href="'+routeid+'">'+tensanpham+'</a>');
            $('#donvitinh').html(donvitinh);
            if(giamgia == 0){
                $('#dongia').html(format_dongia+'₫/'+donvitinh);
                if(idsanpham > 40){
                    //top
                    $('#addoption').html(
                        '<div class="ribbon ribbon-quick-view new">'+
                            '<div class="theribbon">MỚI</div>'+
                            '<div class="ribbon-background"></div>'+
                        '</div>'
                    );
                }else{
                    //nomal
                }
                console.log('no');
            }else{
                
                $('#dongia').html(
                    '<span style="text-decoration:line-through">'+format_giacu+'</span> /'+
                    format_dongia+'₫/'+donvitinh
                );
                if(idsanpham >40){
                    //topsale
                    $('#addoption').html( 
                    '<div class="ribbon ribbon-quick-view sale">'+
                        '<div class="theribbon">GIẢM ' +giamgia+'%</div>'+
                        '<div class="ribbon-background"></div>'+
                    '</div>'+
                    '<div class="ribbon ribbon-quick-view new">'+
                        '<div class="theribbon">MỚI</div>'+
                        '<div class="ribbon-background"></div>'+
                    '</div>'
                    );
                }
                else{
                    //sale
                    $('#addoption').html(
                    '<div class="ribbon ribbon-quick-view sale">'+
                        '<div class="theribbon">GIẢM '+giamgia+'%</div>'+
                        '<div class="ribbon-background"></div>'+
                    '</div>'
                    );
                }
            }
            $('#idsp').html('<input type="hidden" id="idsanpham" name="id" value="'+idsanpham+'"/>');
            
            $('#image').html('<img src="/images/upload/'+image+'" class="img-responsive">');
            $('#chitietsanpham').html(chitietsanpham+
                '<a href="'+routeid+'">Đọc tiếp</a>'
            );
            $('#addcart').html('<a type="button" id="add-cart<?php echo $i;?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>')
            $('#add-cart<?php echo $i;?>').on('click', function(){
                var idpro = $('#idsanpham<?php echo $i;?>').val();
                var namepro = $('#tensanpham<?php echo $i;?>').val();
                //alert(idpro);
                $.ajax({
                    url: '<?php echo url('add/cart')?>/'+idpro,
                    type: 'GET',
                    dataType: 'html',
                    data: "idpro="+idpro,
                    success: function(data){
                        alert('sản phẩm đả được thêm vào giỏ hàng');
                    }
                });
            });
            //link
            
        });
        <?php } ;?>
    })
</script>

<div id="index-main">
    <!--<div id="intro">
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="carousel-caption">
                        <h1>Mario Shop<br>Cung cấp thực phẩm trực tuyến.</h1>
                        <h3>Thực phẩm bẩn hiện nay đang trở thành nỗi lo thường trực của nhiều gia đình. Thông tin liên tiếp về thực phẩm nhiễm khuẩn, không đạt chất lượng vệ sinh an toàn thực phẩm đã gây tâm lý hoang mang tới người tiêu dùng.</h3>

                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
        <li data-target="#bs-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item slides active">
            <div class="slide-1"></div>
            <div class="hero">
                <hgroup>
                    <h1>MARIO VU NGUYEN</h1>
                    <h3>cửa hàng thực phẩm sạch</h3>
                </hgroup>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2"></div>
            <div class="hero">
                <hgroup>
                    <h1>MARIO VU NGUYEN</h1>
                    <h3>chuyên cung cấp các loại thực phẩm từ khấp nơi</h3>
                </hgroup>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3"></div>
            <div class="hero">
                <hgroup>
                    <h1>MARIO VU NGUYEN</h1>
                    <h3>chất lượng hàng đầu đáng tin cậy</h3>
                </hgroup>
            </div>
        </div>
    </div>
</div>
    <!-- *** INTRO IMAGE END *** -->

    <div id="all">
        <!-- *** ADVANTAGES ***__________________ -->

        <div id="advantages">

            <div class="container">

                <div class="col-md-12">

                    <div class="box text-center">
                        <div class="same-height-row row">
                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-heart-o"></i>
                                    </div>
                                    <h4><a href="#">KHÁCH HÀNG HÀI LÒNGs</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-tags"></i>
                                    </div>
                                    <h4><a href="#">Giá cả hợp lý</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-send-o"></i>
                                    </div>
                                    <h4><a href="#">Giao hàng nhanh chóng</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-refresh"></i>
                                    </div>
                                    <h4><a href="#">Phương thức đổi trả mới</a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>

                </div>


            </div>
            <!-- /.container -->

        </div>
        <!-- /#advantages -->

        <!-- *** ADVANTAGES END *** -->
        <!-- *** CONTENT ***_______________________________-->
        <div id="content">
            <div class="container">
                <div class="col-sm-12">
                    <div class="box text-center">
                        <h3 class="text-uppercase">Sản Phẩm Mới</h3>

                        <h4 class="text-muted"><span class="accent">Miễn phí giao hàng </span>tất cả hóa đơn</h4>
                    </div>
                    <div class="row products">
                    <?php $count = 1; ?>
                        @foreach($product_full as $data)

                        @if($data->tonkho["soluong"] == 0)
                        @else
                        <input class="tokens" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idsanpham" id="idsanpham<?php echo $count;?>" value="{!!$data->id !!}"/>
                        <input type="hidden" name="ten_sampham" id="tensanpham<?php echo $count;?>" value="{!!$data->ten_sanpham !!}"/>
                        <input type="hidden" name="donvitinh" id="donvitinh<?php echo $count;?>" value="{!! $data->donvitinh !!}"/>
                        <input type="hidden" name="dongia" id="dongia<?php echo $count;?>" value="{!! $data->dongia !!}"/>
                        <input type="hidden" name="giamgia" id="giamgia<?php echo $count;?>" value="{!! $data->giamgia !!}"/>
                        <input type="hidden" name="giacu" id="giacu<?php echo $count;?>" value="{!! $data->giacu !!}"/>
                        <input type="hidden" name="image" id="image<?php echo $count;?>" value="{!! $data->image !!}"/>
                        @if(isset($data->sanphamchitiet))
                        <input type="hidden" name="chitietsanpham" id="chitietsanpham<?php echo $count;?>" value="{!! str_limit($data->sanphamchitiet['mieuta'],150,'....') !!}"/>
                            <?php $count1 = 1; ?>
                            @foreach($data->sanphamchitiet->imagelist as $image)
                            @if(isset($image))
                            <input type="hidden" name="imagelist" id="imagelist<?php echo $count1;?>" value="{!! $image->duongdan !!}"/>
                            @else
                            <input type="hidden" name="imagelist" id="imagelist<?php echo $count1;?>" value="Chưa có thông tin chi tiết"/>
                            @endif
                            <?php $count1++; ?>
                            @endforeach
                        @else
                        <input type="hidden" name="chitietsanpham" id="chitietsanpham<?php echo $count;?>" value="Chưa có thông tin chi tiết"/>
                        @endif
                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <!-- /.image -->

                                            <div class="image">
                                                <a href="{{route('product_detail',[$data->id])}}">
                                                    <img class="img-responsive" src="/images/upload/{!! $data->image !!}" alt="...">
                                                </a>
                                                <div class="quick-view-button">
                                                    <div class="col-md-6">
                                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal" class="modal<?php echo $count;?> btn-none btn btn-default">
                                                        <span class="sr-only">Chi tiết</span>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a type="button" id="add-cart<?php echo $count;?>" class="btn-none btn btn-default">
                                                            <span class="sr-only">add cart</span>
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                    @if($data->giamgia == 0)
                                        @if($data->id > 40)
                                            <!-- top -->
                                            <div class="text">
                                                <h3><a href="{{route('product_detail',[$data->id])}}">{{$data->ten_sanpham}}</a></h3>
                                                <p class="price"> {!! number_format($data->dongia,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</p>
                                            </div>
                                            <!-- /.text -->
                                            <!-- /.ribbon -->

                                            <div class="ribbon new">
                                                <div class="theribbon">MỚI</div>
                                                <div class="ribbon-background"></div>
                                            </div>
                                            <!-- /.ribbon -->
                                        @else
                                        <!--nomal -->
                                            <div class="text">
                                                <h3><a href="{{route('product_detail',[$data->id])}}">{{$data->ten_sanpham}}</a></h3>
                                                <p class="price">
                                                {!! number_format($data->dongia,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</p>
                                            </div>
                                            <!-- /.text -->
                                        @endif
                                    @else
                                        @if($data->id > 40)
                                            <!-- top sale -->

                                            <div class="text">
                                                <h3><a href="{{route('product_detail',[$data->id])}}">{{$data->ten_sanpham}}</a></h3>
                                                <p class="price"><del>{!! number_format($data->giacu,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</del> {!! number_format($data->dongia,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</p>
                                            </div>
                                            <!-- /.text -->

                                            <div class="ribbon sale">
                                                <div class="theribbon">GIẢM {!! $data->giamgia*100 !!}%</div>
                                                <div class="ribbon-background"></div>
                                            </div>
                                            <!-- /.ribbon -->

                                            <div class="ribbon new">
                                                <div class="theribbon">MỚI</div>
                                                <div class="ribbon-background"></div>
                                            </div>
                                            <!-- /.ribbon -->
                                        @else
                                            <!--sale -->

                                            <div class="text">
                                                <h3><a href="{{route('product_detail',[$data->id])}}">{{$data->ten_sanpham}}</a></h3>
                                                <p class="price"><del>{!! number_format($data->giacu,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</del> {!! number_format($data->dongia,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</p>
                                            </div>
                                            <!-- /.text -->

                                            <div class="ribbon sale">
                                                <div class="theribbon">GIẢM {!! $data->giamgia*100 !!}%</div>
                                                <div class="ribbon-background"></div>
                                            </div>
                                            <!-- /.ribbon -->
                                        @endif
                                    @endif
                                </div>
                                <!-- /.product -->
                            </div>
                             <!-- modal -->
                            <!--detail -->
                            <!-- top -->
                            <div class="modal fade" id="product-quick-view-modal" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                            <div class="row quick-view product-main">
                                                <div class="col-sm-6">
                                                    <div class="quick-view-main-image" id="image">
                                                    </div>
                                                    <div id="addoption"></div>
                                                </div>
                                                <div class="col-sm-6">

                                                    <h2 id="tensanpham" ></h2>
                                                    <p id="chitietsanpham" class="text-muted text-small text-center"></p>

                                                    <div class="box">

                                                        <form >
                                                        <div id="idsp"></div>
                                                        
                                                            <div class="sizes">
                                                                <h3>Đơn giá</h3>
                                                                <h4 id="giamgia"></h4>
                                                            </div>

                                                            <p class="price" id="dongia">
                                                                
                                                            </p>
                                                        </form>
                                                            <p class="text-center" id="addcart">
                                                            </p>
                                                    </div>
                                                    <!-- /.box -->

                                                    <div class="quick-view-social">
                                                        <h4>Chia sẽ</h4>
                                                        <p>
                                                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.modal-dialog-->
                            </div>
                            <!-- /.modal -->
                            <?php $count++?>
                            @endif
                        @endforeach
                        <!-- /.col-md-4 -->

                    </div>
                    <!-- /.products -->

                </div>
                <!-- /.col-sm-12 -->
         <!-- phan trang -->
    {!! $product_full->links() !!}

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->

</div>
@endsection