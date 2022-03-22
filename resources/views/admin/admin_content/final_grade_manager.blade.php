<div class="col-md-12 post">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">File</th>
                <th scope="col">Lớp</th>
                <th scope="col">Giáo viên</th>
                <th scope="col"></th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($classrooms as $classroom )
            <tr >
                <th   scope="row">{{ $loop->index+1 }}</th>
                <td  ><a href="{{asset('assets/grade_files/'.$classroom->grade_file)}}" download>
                {{$classroom->grade_file}}
								</a></td>
                <td  >{{$classroom->name}}</td>
                <td  > @forelse( $classroom->Teachers as  $key => $user)
                {{$user->name}}@if($key==$classroom->Teachers->count()-1&&$classroom->Teachers->count()>1), @endif</td>
                @endforeach</td>
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến giảng viên của bảng điểm này?');" href="{{route('send_mail_to_grade',['id'=>$classroom->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
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