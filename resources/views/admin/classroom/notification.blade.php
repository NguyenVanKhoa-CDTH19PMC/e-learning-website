<div class="col-md-12 post">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Mô tả</th>
                
				<th scope="col"></th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($classroom->Notifications->whereNull('deleted_at') as $notification )
            <tr >
                <th  onclick="window.location='{{route('post_details',['id'=>$notification->id])}}';" scope="row">{{ $loop->index+1 }}</th>
                <td  onclick="window.location='{{route('post_details',['id'=>$notification->id])}}';" >{{$notification->title}}</td>
                <td onclick="window.location='{{route('post_details',['id'=>$notification->id])}}';" >{{$notification->description}}</td>
                
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người tạo thông báo này?');" href="{{route('send_mail_to_post',['id'=>$notification->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
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