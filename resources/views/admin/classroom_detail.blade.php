@extends('layout.master')
@section('logo')
CT
@endsection
@section('sub_logo')
E
@endsection
@section('subject')
| Quản trị viên | {{$classroom->name}}
@endsection
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   
<div class=" why-us" >
    <div class="row">
  <div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link tab active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-info-square"></i> Thông tin</a>
      <a class="nav-link tab" id="tb-tab" data-toggle="pill" href="#tb" role="tab" aria-controls="tb" aria-selected="false"><i class="bi bi-app-indicator"></i> Thông báo</a>
      <a class="nav-link tab" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="bi bi-easel3"></i> Bài giảng</a>
      <a class="nav-link tab" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-journal-check"></i> Bài tập</a>
<a class="nav-link tab" id="score-tab" data-toggle="pill" href="#score" role="tab" aria-controls="score-tab" aria-selected="false"><i class="bi bi-file-ruled"></i> Bảng điểm</a>
      <a class="nav-link tab" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-person-video2"></i> Thành viên</a>
      
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      @include("admin.classroom.infor")
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      @include("admin.classroom.assignment")
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      @include("admin.classroom.member")
      </div>
      <div class="tab-pane fade" id="score" role="tabpanel" aria-labelledby="score-tab">
      @include("admin.classroom.grade")
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      @include("admin.classroom.document")
      </div>
      <div class="tab-pane fade" id="tb" role="tabpanel" aria-labelledby="tb-tab">
      @include("admin.classroom.notification")
      </div>
    </div>
  </div>
</div>
  
</div>


@endsection


  
   
   
   


  





  

