<div class="col-md-12 post">
<div class=' col-md-12 row'>
    <h6 class="col-md-2">Nộp đúng hạn: {{$post->Submits->whereNull('deleted_at')->where('created_at',"<",$post->deadline)->count()}}</h6>
    <h6 class="col-md-2">Nộp trễ: {{$post->Submits->whereNull('deleted_at')->where('created_at',">",$post->deadline)->count()}}</h6>
    <h6 class="col-md-2">Chưa nộp: {{$post->Classroom->Students->count()-$post->Submits->whereNull('deleted_at')->count()}}</h6>
</div>
<br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Người nộp</th>
                <th scope="col">File</th>
                <th scope="col">Điểm</th>
                <th scope="col">Trạng thái</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($post->Submits->whereNull('deleted_at') as $submit )
            <tr >
                <th    scope="row">{{ $loop->index+1 }}</th>
                <td   >{{$submit->User->name}}</td>
                <td > <div class=' row'>@foreach($submit->Attachments->take(2) as $attachment)
                        <a href="{{asset('assets/submits/'.$attachment->attachment)}}" download>
                            <div class='file  row'>
                            <div class='name demo col-md-12 '>
                                {{$attachment->attachment}}
      
      </div>

             
              </div>
</a>
              @endforeach
            @if($submit->Attachments->count()>2)
            <div class='file  row'>
                            <div class='name demo col-md-12 '>
                            + {{$submit->Attachments->count()-2}}
      
      </div>

             
              </div>
            
            @endif
            </div></td>
                <td   >{{$submit->scores??"Chưa chấm"}}</td>
                <td   >{{$submit->created_at>$post->deadline?"Nộp trễ":"Đã nộp"}}</td>
                
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