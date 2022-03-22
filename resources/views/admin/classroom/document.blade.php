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
            @forelse($classroom->Documents->whereNull('deleted_at') as $document )
            <tr >
                <th onclick="window.location='{{route('post_details',['id'=>$document->id])}}';"  scope="row">{{ $loop->index+1 }}</th>
                <td onclick="window.location='{{route('post_details',['id'=>$document->id])}}';" >{{$document->title}}</td>
                <td onclick="window.location='{{route('post_details',['id'=>$document->id])}}';" >{{$document->description}}</td>
                
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người tạo tài liệu này?');" href="{{route('send_mail_to_post',['id'=>$document->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
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