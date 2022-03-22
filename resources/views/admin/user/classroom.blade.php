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
            @forelse($user->Classrooms->whereNull('deleted_at') as $classroom )
            <tr >
                <th  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';" scope="row">{{ $loop->index+1 }}</th>
                <td  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';">{{$classroom->name}}</td>
                <td  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';">{{$classroom->code}}</td>
                <td  onclick="window.location='{{route('classroom_detail',['id'=>$classroom->id])}}';">{{$classroom->Teachers->first()->name}}</td>
                <td ><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></button></td>
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