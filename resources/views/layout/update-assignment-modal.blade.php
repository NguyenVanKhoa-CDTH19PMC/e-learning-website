












  

  <!-- The Modal -->
  <div class="modal  " id="update_assignment">
    <div class="modal-dialog " style="  min-width:90%; min-height:90%;
    margin-left: 80;">
      <div class="form modal-content">
        <h5 class="modal-title">Cập nhật bài tập</h5>
        <form  action="{{route('update_post',['id'=>$post->id])}}" method="post">
          @csrf
          
          <div class="row">
          <div class="col-md-7 row">
          <div class="col-md-12 row">

<h6 class="col-md-4">
Tiêu đề: 
</h6>
<div class="col-md-8">
    <fieldset>
    <input name="title" type="text" class="form-control" id="title" value={{$post->title}} required="">
    </fieldset>
</div>
</div>
<div class="col-md-12 row">

<h6 class="col-md-4">
Hướng dẫn: 
</h6>
<div class="col-md-8">
    <fieldset>
    <textarea name="description" rows="6" class="form-control" id="description" required="">{{$post->description}}</textarea>
    </fieldset>
</div>
</div>

            
            
            </div>
            <div class="col-md-5 row">
            <div class="col-md-12">
            <select name="type" data-btn-class="btn-danger btn-block" class="form-control" >
            <option  @if($post->type=="bài tập") selected @endif value="bài tập">Bài tập</option>
              <option @if($post->type=="bài kiểm tra") selected @endif value="bài kiểm tra">Bài kiểm tra</option>
              <option @if($post->type=="bài thi") selected @endif value="bài thi">Bài thi</option>
  </select>
            
            <div class="col-md-12 row">
              <h6 class="col-md-4">
Hạn nộp
</h6>
              <div class="col-md-8">
                <input name="deadline" type="datetime-local" class="form-control" id="deadline" placeholder="Tiêu đề" required="" value="{{\Carbon\Carbon::parse($post->deadline)->format('Y')}}-{{\Carbon\Carbon::parse($post->deadline)->format('m')}}-{{\Carbon\Carbon::parse($post->deadline)->format('d')}}T{{\Carbon\Carbon::parse($post->deadline)->format('H')}}:{{\Carbon\Carbon::parse($post->deadline)->format('s')}}">
              </div>
            </div>
            </div>

            <div class="col-md-12 row">
              <div class="main-button-cancel col-md-6">
                <fieldset>
                <input type="submit" data-dismiss="modal" value="Hủy"></input>
                </fieldset>
              </div>
              <div class=" main-button col-md-6">
                <fieldset>
                  
                <input type="submit" value="Lưu"></input>
                
                </fieldset>
              </div>
              </div>
          </div>
          </div>
        
        </form>
        
        
       
        
     
        
      </div>
    </div>
  </div>
  

