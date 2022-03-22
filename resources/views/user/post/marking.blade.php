@if($post->Submits->whereNull('deleted_at')->count()==0)
<div class='post'>Chưa có bài nộp nào!</div>
@else 
<div class=' col-md-12 row'>
   <h6 class="col-md-2">Nộp đúng hạn: {{$post->Submits->whereNull('deleted_at')->where('created_at',"<",$post->deadline)->count()}}</h6>
   <h6 class="col-md-2">Nộp trễ: {{$post->Submits->whereNull('deleted_at')->where('created_at',">",$post->deadline)->count()}}</h6>
   <h6 class="col-md-2">Chưa nộp: {{$post->Classroom->Students->count()-$post->Submits->whereNull('deleted_at')->count()}}</h6>
</div>
<br>
@foreach($post->Submits->whereNull('deleted_at') as $submit)
<div class=' col-md-12'>
   <div class=' post row'>
      <div class=' col-md-10 row'>
         <img style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.$submit->User->avatar)}}" alt="">
         <div class="col-md-11 row">
            <div class=" title col-md-12">
               {{$submit->User->name}}
            </div>
            <div class="col-md-12">
               @if($submit->created_at>$post->deadline)
               <div>(Đã nộp trễ)</div>
               @else
               <div>(Đã nộp)</div>
               @endif
            </div>
            @foreach($submit->Attachments as $attachment)
            <a href="{{asset('assets/submits/'.$attachment->attachment)}}" download>
               <div class='file  row'>
                  <div class='name demo col-md-12 '>
                     {{$attachment->attachment}}
                  </div>
               </div>
            </a>
            @endforeach
         </div>
      </div>
      <div class='col-md-2 row'>
         <div style=" text-align: center;" class='col-md-12'>
            Điểm
            <br>
         </div>
         @if($submit->scores!=null)
         <div class='col-md-12  '>
            <h4 style=" text-align: center;">{{$submit->scores}}</h4>
         </div>
         @else
         <form action="{{route('marking_submit',['id'=>$submit->id])}}"  method="post" >
            @csrf
            <div class='col-md-12  ' >
               <input name="scores" min=0  class="form-control" id="scores" placeholder="" value="gv" type="number">
            </div>
            <div class=" main-button col-md-12">
               <input type="submit" value="Lưu">
            </div>
         </form>
         @endif
      </div>
   </div>
   <br>
</div>
@endforeach
@endif