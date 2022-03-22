












  

  <!-- The Modal -->
  <div class="modal  " id="create-assignment">
    <div class="modal-dialog " style="  min-width:90%; min-height:90%;
    margin-left: 80;">
      <div class="form modal-content">
        <h5 class="modal-title">Tạo bài tập</h5>
        <form  action="{{route('create_post',['id'=>$classroom->id])}}" method="post">
          @csrf
          
          <div class="row">
          <div class="col-md-7 row">
            <div class="col-md-12">
              <fieldset>
                <input name="title" type="text" class="form-control" id="title" placeholder="Tiêu đề" required="">
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
              <textarea name="description" rows="6" class="form-control" id="description" placeholder="Hướng dẫn" required=""></textarea>
              </fieldset>
            </div>
            </div>
            <div class="col-md-5 row">
            <div class="col-md-12">
            <select name="type" data-btn-class="btn-danger btn-block" class="form-control" >
            <option value="bài tập">Bài tập</option>
              <option value="bài kiểm tra">Bài kiểm tra</option>
              <option value="bài thi">Bài thi</option>
  </select>
            <div>
              
            <div class="col-md-12 row">
              <h6 class="col-md-4">
Hạn nộp
</h6>
              <div class="col-md-8">
                <input min="{{date('Y-m-d').'T'.date('h:i')}}"name="deadline" type="datetime-local" class="form-control" id="deadline"  required="">
              </div>
            </div>
            <div class="upload-btn-wrapper col-md-12">
  <button class="btn">Tải file lên</button>
  <input id="files[]" type="file" class="" multiple name="files[]"/>
  <br>
  <br>
</div>

            <div class="col-md-12 row">
            <div class="main-button-cancel col-md-6">
              <fieldset>
              <input type="submit" data-dismiss="modal" value="Hủy"></input>
              </fieldset>
            </div>
            <div class=" main-button col-md-6">
              <fieldset>
                
              <input type="submit" value="Tạo"></input>
              
              </fieldset>
            </div>
            </div>
          </div>
          </div>
        </div>  </div>
        </form>
        
        
       
        
     
        
      </div>
    </div>
  </div>
  

