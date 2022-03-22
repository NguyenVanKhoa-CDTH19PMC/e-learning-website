<div class="col-md-12 post">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Loại</th>
                <th scope="col">Hạn nộp</th>
				<th scope="col"></th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($classroom->All_Assignments->whereNull('deleted_at') as $assignment )
            <tr >
                <th  onclick="window.location='{{route('post_details',['id'=>$assignment->id])}}';" scope="row">{{ $loop->index+1 }}</th>
                <td onclick="window.location='{{route('post_details',['id'=>$assignment->id])}}';" >{{$assignment->title}}</td>
                <td  onclick="window.location='{{route('post_details',['id'=>$assignment->id])}}';">{{$assignment->description}}</td>
                <td  onclick="window.location='{{route('post_details',['id'=>$assignment->id])}}';">{{ucfirst($assignment->type)}}</td>
				<td  onclick="window.location='{{route('post_details',['id'=>$assignment->id])}}';">{{$assignment->deadline->format('H:m | d-m-Y')}}</td>
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người tạo bài tập này?');" href="{{route('send_mail_to_post',['id'=>$assignment->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
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