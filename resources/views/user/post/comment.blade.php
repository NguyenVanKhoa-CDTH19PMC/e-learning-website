<div class="col-md-12">
    <div class="form">
   <form class=" " action="{{route('create_comment',['id'=>$post->id])}}" method="post">
      @csrf
      <div class='row'>
         <img  style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.Auth::user()->avatar)}}" alt="">
         <input class='col-md-9' name="content" rows="6" class="form-control" id="content" placeholder="Bình luận..." required=""></input>
         <div class='col-md-2 main-button'>
            <input type='submit' value='Đăng'></input>
         </div>
   </form></div>
   </div>
   <br>
   <div class='post col-md-12 '>
      @if($post->Comments->whereNull('deleted_at')->count()==0)
      <div class="col-md-12 " style=" text-align: center;">
         <h6>(Chưa có bình luận nào!)</h6>
      </div>
      @endif
      @foreach($post->Comments->whereNull('deleted_at') as $comment)
      <div class=' col-md-12 row'>
         <img style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.$comment->User->avatar)}}" alt="">
         <div class="col-md-11 row">
            <div class=" title col-md-12">
               {{$comment->User->name}}
            </div>
            <div class="col-md-12">
               {{$comment->created_at}}
            </div>
            <div class="col-md-12">
               {{$comment->content}}
            </div>
         </div>
         <hr class=' col-md-12'>
      </div>
      @endforeach
   </div>
</div>