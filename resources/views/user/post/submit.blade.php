<div class="post " >
   <form action="{{route('create_submit',['id'=>$post->id])}}" method="post" class='row' enctype="multipart/form-data">
      @csrf
      <div class="col-md-12">
         Nộp bài 
         @if($post->Submits->where('posts_id',$post->id)->where('user_id',Auth::user()->id)->whereNull('deleted_at')->first()==null)
         @if(\Carbon\Carbon::now()>$post->deadline)
         <div>(Trễ hạn)</div>
         @else
         <div>(Chưa nộp)</div>
         @endif
         @else
         @if(\Carbon\Carbon::now()>$post->deadline)
         <div>(Đã nộp trễ)</div>
         @else
         <div>(Đã nộp)</div>
         @endif
         @endif
         <hr>
         @if($post->Submits->where('posts_id',$post->id)->where('user_id',Auth::user()->id)->whereNull('deleted_at')->first()==null)
      </div>
      <div class="upload-btn-wrapper col-md-12">
         <button class="btn">Tải file lên</button>
         <input id="files[]" type="file" class="" multiple name="files[]"/>
      </div>
      <hr>
      <div class='col-md-12 main-button'>
         <input  type='submit' value='Nộp'  ></input>
      </div>
   </form>
   @else
   <div class=' row'>
      @foreach($post->Submits->where('posts_id',$post->id)->where('user_id',Auth::user()->id)->whereNull('deleted_at')->first()->Attachments as $attachment)
      <div class='file  row'>
         <div class='type col-md-12 '>
            .{{strtoupper(explode('.',$attachment->attachment)[1])}}
         </div>
         <div class='name demo col-md-12 '>
            {{$attachment->attachment}}
         </div>
         <hr>
         <div class=' col-md-12 '>
            <a href="{{asset('assets/submits/'.$post->Submits->where('posts_id',$post->id)->where('user_id',Auth::user()->id)->first()->id.'/'.$attachment->attachment)}}" download>
            <i class="bi bi-arrow-down-square"></i>
            </a>
         </div>
      </div>
      @endforeach
   </div>
   <hr>
   @if($post->Submits->where('posts_id',$post->id)->where('user_id',Auth::user()->id)->whereNull('deleted_at')->first()->scores==null)
   <div class='col-md-12 main-button'>
      <a href="{{route('delete_submit',['id'=>$post->Submits->where('posts_id',$post->id)->where('user_id',Auth::user()->id)->whereNull('deleted_at')->first()->id])}}">
      Hủy nộp
      </a>
   </div>
   @else
   <h6>Điểm: {{$post->Submits->where('posts_id',$post->id)->where('user_id',Auth::user()->id)->whereNull('deleted_at')->first()->scores}}</h6>
   @endif
</div>
@endif
</div>