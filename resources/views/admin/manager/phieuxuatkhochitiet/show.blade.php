@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Hóa Đơn Chi Tiết</dt></h3></div>
            <div class="col-md-10">

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tồn Kho</th>
                        <th>Phiếu Xuất Kho</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Thuế</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->tonkho->id_sanpham !!}</td>
                        <td>{!! $data->phieuxuatkho->ten_phieuxuatkho !!}</td>
                        <td>{!! $data->soluong !!}</td>
                        <td>{!! $data->dongia !!}</td>
                        <td>{!! $data->thue !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Date Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->created_at !!}</td>
                    </tr>
                    <tr>
                        <td>{!! $data->updated_at !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('phieuxuatkhochitiet.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                            <a href="{{route('phieuxuatkhochitiet.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil fa-2x"></span>Edit</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection