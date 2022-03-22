<div class="col-md-12 post">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Lớp</th>
                <th scope="col">Mã Lớp</th>
                <th scope="col">Giáo viên</th>
                <th scope="col"></th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($classrooms as $classroom )
            <tr >
                <th  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';" scope="row">{{ $loop->index+1 }}</th>
                <td  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';">{{$classroom->name}}</td>
                <td  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';">{{$classroom->code}}</td>
                <td  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';">
                @forelse( $classroom->Teachers as  $key => $user)
                {{$user->name}}@if($key==$classroom->Teachers->count()-1&&$classroom->Teachers->count()>1), @endif</td>
                @endforeach
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến giảng viên của lớp này?');" href="{{route('send_mail_to_classroom',['id'=>$classroom->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>