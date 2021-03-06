@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'tramtrungchuyen.store']) !!}

            {!! Form::label('ten_tram', 'Tên Trạm:') !!}
            {!! Form::text('ten_tram', null, array('class'=>'form-control')) !!}

            {!! Form::label('diachi', 'Địa Chỉ:') !!}
            {!! Form::text('diachi', null, array('class'=>'form-control', 'id'=>'searchmap')) !!}

            <div id="map-canvas"></div>

            {!! Form::label('dienthoai', 'Điện Thoại:') !!}
            {!! Form::text('dienthoai', null, array('class'=>'form-control')) !!}

            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, array('class'=>'form-control')) !!}

            {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

            {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}

            <a href="{{route('tramtrungchuyen.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
        <script type="text/javascript" src="{{ asset('js/map.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                type="text/javascript"></script>
@endsection