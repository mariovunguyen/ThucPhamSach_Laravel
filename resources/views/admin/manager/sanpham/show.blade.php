@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Sản Phẩm</dt></h3></div>
            <div class="col-md-10">

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Đơn Vị Tính</th>
                        <th>Giảm Giá</th>
                        <th>Giá Củ</th>
                        <th>Hình ảnh</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->ten_sanpham !!}</td>
                        <td>{!! $data->loaisanpham->ten_loai !!}</td>
                        <td>{!! $data->dongia !!}</td>
                        <td>{!! $data->donvitinh !!}</td>
                        <td>{!! $data->giamgia * 100 !!}%</td>
                        <td>{!! $data->giacu !!}</td>
                        <td><img src="/images/upload/{!! $data->image !!}" class="img-responsive"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Ngày Tháng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ngày Thêm: {!! $data->created_at !!}</td>
                    </tr>
                    <tr>
                        <td>Ngày Cập Nhật{!! $data->updated_at !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('sanpham.index') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Trở về</a>
                            <a href="{{route('sanpham.edit',[$data->id]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span>Chỉnh Sửa</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection