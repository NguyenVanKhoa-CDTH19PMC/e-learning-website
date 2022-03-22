<div class="col-md-12 post">
    <button type="button" class="btn btn-outline-success"  class="btn btn-outline-success"  data-toggle="modal" data-target="#create-student">Thêm sinh viên</button>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Email</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($users->where("level","sv") as $user )
            <tr>
                <th  onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" scope="row">{{ $loop->index+1 }}</th>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->name}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->sex}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->birthday->format('d-m-Y')}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->email}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->deleted_at==null?'Hoạt động':'Đã ẩn'}}</td>
                @if($user->deleted_at==null)
                <td ><a onclick="return confirm('Bạn có muốn xóa người dùng này?');" href="{{route('delete_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-danger " ><i class="bi bi-x fa-lg"></i></button></a></td>
                <td><button type="button" class="btn btn-outline-primary"><i class="bi bi-gear fa-lg"></i></button></td>
                <td><a onclick="return confirm('Bạn có muốn đặt lại mật khẩu cho người dùng này?');" href="{{route('reset_password',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-warning"><i class="bi bi-key fa-lg"></i></button></a></td>
                
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người dùng này?');" href="{{route('send_mail_to_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
                @else
                <td colspan="4"><a onclick="return confirm('Bạn có muốn khôi phục người dùng này?');" href="{{route('backup_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-arrow-clockwise fa-lg"></button></a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.create-student-modal')