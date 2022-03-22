<div class="col-md-12">
   <div class="container">
      <div class="row">
         @if($classroom->Teachers->find($user->id))
         <div class=" main-button">
            <input type="submit" data-toggle="modal" data-target="#create-document" value="Tạo"/>
         </div>
         @endif
         <div class="col-md-12">
            <br>
            @if($classroom->Documents->whereNull('deleted_at')->count()==0)
            <div class="col-md-12 post">
               <h6>(Chưa có bài giảng nào!)</h6>
            </div>
            @endif
            <!-- Danh sách bài tập-->
            @forelse($classroom->Documents->whereNull('deleted_at') as $document)
            <div class="post row col-md-12">
               <div class='row col-md-11'>
                  <div class="col-md-12 title">
                     <a href="{{route('post_detail',['id'=>$document->id])}}" class='title'>{{ucfirst($document->type)}}: {{$document->title}}</a>
                  </div>
                  <hr>
                  <div class="col-md-12">
                     {{$document->description}}
                  </div>
               </div>
               @if($classroom->Teachers->find($user->id))
               <!-- more option Button  -->
               <div class="dropup col-md-1">
                  <div class="dropbtn">...</div>
                  <div class="dropup-content">
                     <a onclick="return confirm('Bạn có muốn xóa bài này?');" href="{{route('delete_post',['id'=>$document->id])}}">Xóa</a>
                  </div>
               </div>
               @endif
            </div>
            <br> @endforeach
         </div>
      </div>
   </div>
</div>
@include('layout.create-document-modal')