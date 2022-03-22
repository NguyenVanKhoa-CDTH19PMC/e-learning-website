<!-- The Modal -->
<div class="modal  " id="create-document">
    <div class="modal-dialog " style="  min-width:90%; min-height:90%;
    margin-left: 80;">
      <div class="form modal-content">
        <h5 class="modal-title">Tạo tài liệu</h5>
        <form  action="{{route('create_post',['id'=>$classroom->id])}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="row">
          <div class="col-md-12 row">
          <div class="col-md-12">
              <fieldset>
                <input name="type"  class="form-control" id="type" placeholder="Tài liệu" value="tài liệu" type="hidden">
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
                <input name="title" type="text" class="form-control" id="title" placeholder="Tiêu đề" required="">
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
              <textarea name="description" rows="6" class="form-control" id="description" placeholder="Mô tả" required=""></textarea>
              </fieldset>
            </div>
            <div class="upload-btn-wrapper col-md-12">
  <button class="btn">Tải tài liệu lên</button>
  <input id="files[]" type="file" class="" multiple name="files[]"/>
  <br>
  <br>
</div>
            
            

            <div class="main-button-cancel col-md-6">
              <fieldset>
              <input type="submit" data-dismiss="modal" value="Hủy">
              </fieldset>
            </div>
            <div class=" main-button col-md-6">
              <fieldset>
                
              <input type="submit" value="Tạo">
              
              </fieldset>
            </div>
          </div>
        </div>
        </form>
        
        
       
        
     
        
      </div>
    </div>
  </div>
  

