@extends('layout.master')
@section('logo')
CT
@endsection
@section('sub_logo')
E
@endsection
@section('subject')
| Quản trị viên 
@endsection
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   
<div class=" why-us" >
    <div class="row">
  <div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link tab active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-info-square"></i> Thông tin</a>
      @if($post->type=='bài tập'||$post->type=='bài kiểm tra'||$post->type=='bài thi')
      <a class="nav-link tab" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="bi bi-file-earmark-arrow-up-fill"></i> Bài nộp</a>
      @endif
      
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      @include("admin.post.infor")
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
     
      </div>
      <div class="tab-pane fade" id="score" role="tabpanel" aria-labelledby="score-tab">
     
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      @include("admin.post.submit")
      </div>
    </div>
  </div>
</div>
  
</div>


@endsection


  
   
   
   


  





  

