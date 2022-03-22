












  

  <!-- The Modal -->
  <div class="modal  " id="update_notification">
    <div class="modal-dialog " style="  min-width:90%; min-height:90%;
    margin-left: 80;">
      <div class="form modal-content">
        <h5 class="modal-title">Cập nhật thông báo</h5>
        <form  action="{{route('update_post',['id'=>$post->id])}}" method="post">
          @csrf
          
          <div class="row">
          <div class="col-md-12 row">
          <div class="col-md-12 row">

<h6 class="col-md-2">
Tiêu đề: 
</h6>
<div class="col-md-10">
    <fieldset>
    <input name="title" type="text" class="form-control" id="title" value={{$post->title}} required="">
    </fieldset>
</div>
</div>
<div class="col-md-12 row">

<h6 class="col-md-2">
Nội dung: 
</h6>
<div class="col-md-10">
    <fieldset>
    <textarea name="description" rows="6" class="form-control" id="description" required="">{{$post->description}}</textarea>
    </fieldset>
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
  

