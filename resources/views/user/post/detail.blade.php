<div class="post ">
                    <div class="col-md-12 ">
                        <div class='row' >
                        <img style="width:50px;height:50px"  src="{{asset('assets/images/avatars/'.$post->User->avatar)}}" alt="">
                        <div class="col-md-10 row">
                            <div class="title col-md-12">
                            {{$post->User->name}}
</div>
                            <div class="col-md-12">
                        {{$post->created_at}}
                        </div>
                        </div>

                        @if($post->User->id==Auth::user()->id)
                        <!-- more option Button  -->
              <div  class="dropup " >
                <div  class="dropbtn">...</div>
                <div style="top: 22px;bottom: auto;" class=" dropup-content">
                  <a onclick="return confirm('Bạn có muốn xóa bài này?');" href="{{route('delete_post',['id'=>$post->id])}}">Xóa</a>
                  <a href="#" data-toggle="modal"  @if($post->type=="tài liệu") data-target="#update_document" @elseif($post->type=="bài tập"||$post->type=="bài kiểm tra"||$post->type=="bài thi") data-target="#update_assignment" @elseif($post->type=="thông báo") data-target="#update_notification" @endif  >Sửa</a>
                  <a href="#"  data-toggle="modal" data-target="#clone_post">Chuyển tiếp</a>
                </div>
              </div>
                  @endif
                  
                    </div >
                    <hr>
                   
                        <div class='title'>{{$post->title}}</div>
                        @if($post->type=="bài tập"||$post->type=="bài kiểm tra"||$post->type=="bài thi")
                    <div>Hạn nộp: {{$post->deadline}}</div>
                    @endif
                        <div>{{$post->description}}</div>
                        
                        </div>
                        <hr>
                        <div class=' row'>
                        @foreach($post->Attachments as $attachment)
                        <div class='file  row'>
                        <div class='type col-md-12 '>
                          .{{strtoupper(explode('.',$attachment->attachment)[1])}}

</div>

<div class='name demo col-md-12 '>
                          {{$attachment->attachment}}

</div>
<hr>
<div class=' col-md-12 '>
<a href="{{asset('assets/attachments/'.$post->id.'/'.$attachment->attachment)}}" download>
<i class="bi bi-arrow-down-square"></i>
                          </a>
</div>

                        </div>
                        
                        
                        @endforeach
                        </div>
                         <!-- <a href="{{asset('assets/attachments/27/27_1.pdf')}}" download>s</a> -->
                        <!-- <object width="500" height="500" type="application/pdf" data="{{asset('assets/attachments/27/27_1.pdf')}}">
    <p>File không khả dụng.</p>
</object>
                        <video src="{{asset('assets/dm.mp4')}}" controls></video> -->
                        
                        </div>
                       
                        @include('layout.clone-post-modal')
                        @include('layout.update-assignment-modal')
                        @include('layout.update-document-modal')
                        @include('layout.update-notification-modal')