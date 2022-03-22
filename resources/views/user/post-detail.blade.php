@extends('layout.master')
@section('logo')
CT
@endsection
@section('sub_logo')
E
@endsection
@section('content')

<div class=" why-us" >
    <div class="row">
  <div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link tab active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-info-square"></i> Nội dung</a>
      @if($post->type!="thông báo"&&$post->type!="tài liệu")
      @if(Auth::user()->level=='gv')
      <a class="nav-link tab" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-pen"></i> Chấm bài</a>
      @else<a class="nav-link tab" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="bi bi-file-earmark-arrow-up-fill"></i> Nộp bài</a>
      @endif
      @endif
      <a class="nav-link tab" id="v-pills-messages-tab " data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-chat-dots"></i> Bình luận</a>
      
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      @include("user.post.detail")
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      @include("user.post.submit")
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      @include("user.post.marking")
      </div>     
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      @include("user.post.comment")
      </div>
    </div>
  </div>
</div>
  
</div>


@endsection
