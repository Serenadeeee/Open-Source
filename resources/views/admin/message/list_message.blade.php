@extends('admin.layout')
@section('admin_content')
<h1 class="h3 mb-4 text-gray-800">Tin nhắn liên hệ</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary">Danh sách tin nhắn liên hệ</h5>
            <div style="text-align: right;" class="col-md-6">
                <a class="btn btn-sm btn-grape" href="{{url('/admin/chinh-sua-mail')}}">Thay đổi nội dung email</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Tên người liên hệ</th>
                        <th class="text-center">Số điện thoại liên hệ</th>
                        <th>Email liên hệ</th>
                        <th>Nội dung liên hệ</th>
                        <th>Tình trạng</th>
                        <th class="text-center">Gửi mail phản hồi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach($message as $key => $mess)
                    @php $i++; @endphp
                    @if($mess->mess_status == 1)
                    <tr>
                        <th class="text-center">{{$i}}</th>
                        <th>{{$mess->name_mess}}</th>
                        <th class="text-center">{{$mess->phone_mess}}</th>
                        <th>{{$mess->email_mess}}</th>
                        <th>{{$mess->content_mess}}</th>
                        <th>Liên hệ mới</th>
                        <th class="text-center"><a href="{{url('/admin/gui-mail-phan-hoi/'.$mess->mess_id)}}"><button class="btn btn-sm btn-grape">Gửi mail</button></a></th>
                    </tr>
                    @else
                    <tr>
                        <th class="text-center">{{$i}}</th>
                        <td>{{$mess->name_mess}}</td>
                        <td class="text-center">{{$mess->phone_mess}}</td>
                        <td>{{$mess->email_mess}}</td>
                        <td>{{$mess->content_mess}}</td>
                        <td>
                            @if($mess->mess_status == 2)
                                <a href="{{url('/admin/cap-nhat-tin-nhan/'.$mess->mess_id)}}" title="Click vào để cập nhật nếu bạn đã liên hệ vs người này rồi!">Chưa liên hệ</a>
                            @else
                                Đã liên hệ
                            @endif
                        </td>
                        <th class="text-center">Đã phản hồi</th>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection