@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'sanphamchitiet.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('id_sanpham', 'Sản Phẩm:') !!}
            {!! Form::select('id_sanpham',$sanpham, null,
                ['id' => 'sanpham', 'class' => 'form-control', 'placeholder' => 'Chọn Sản Phẩm']) !!}

            {!! Form::label('mieuta', 'Miêu Tả:') !!}
            {!! Form::textarea('mieuta', null, array('class'=>'form-control')) !!}

            {!! Form::label('danhgia', 'Đánh Giá:') !!}
            {!! Form::textarea('danhgia', null, array('class'=>'form-control')) !!}

            {!! Form::label('chebien', 'Chế Biến:') !!}
            {!! Form::textarea('chebien', null, array('class'=>'form-control')) !!}

            {!! Form::label('thanhphan', 'Thành Phần:') !!}
            {!! Form::textarea('thanhphan', null, array('class'=>'form-control')) !!}

            <a href="{{route('sanphamchitiet.index') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-primary', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection