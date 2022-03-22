@extends('layout.master')
@section('title')
	Lớp học
@endsection

@section('content')
  
<div class="classrooms" >
  <h6>{{Auth::user()->level=='gv'?"Lớp đang dạy":"Lớp đang học"}} ( {{Auth::user()->Classrooms->count()}} lớp)</h6>
<!-- List Classroom Is student -->

    <div class="row ">
         @forelse(Auth::user()->Classrooms as $classroom)
     
    
        <div class="item col-md-3 mb-2" >
            
            <img class="theme_demo" src="assets/images/covers/{{$classroom->cover}}" alt="">
            <div class="down-content">
           
            <a href="{{route('classroom',['id'=>$classroom->id])}}"><h4>{{$classroom->name}}</h4></a>           
             <!-- demo ds giao vien-->
             <p>GV: @foreach($classroom->Teachers as $teacher)
               {{$teacher->name}},
              @endforeach</p>
              <div class="author-image">
                <!-- demo ds sinh viên-->
                <a href="#">
              @foreach($classroom->Students->take(4) as $student)
                    <img src="assets/images/avatars/{{$student->avatar}}" alt="">
                    @endforeach
                    @if($classroom->Students->count()>4)
                    <span>+ {{$classroom->Students->count()-4}}</span>
                   
                    @endif
                </a>
              </div>
              <div class="text-button-free">
                  <!-- more option Button  -->
              <div class="dropup">
                <div class="dropbtn">...</div>
                <div class="dropup-content">
                  <a href="#">Rời lớp</a>
                  <a href="#">Di chuyển lớp</a>
                </div>
              </div>
              </div>
            </div>
          </div>
         
          @empty
        <tr>
            <td colspan="5">Bạn chưa tham gia lớp nào</td>
        </tr>
        
    @endforelse

    </div>
    

    </div>
</div>
 
@endsection	
