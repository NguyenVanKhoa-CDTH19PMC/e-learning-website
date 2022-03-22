

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



  

  <!-- The Modal -->
  <div class="modal  " id="create-classroom">
    <div class="modal-dialog modal-dialog-centered">
      <div class="form modal-content">
        <h5 class="modal-title">Tạo lớp</h5>
        <form  action="{{route('create_classroom')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <fieldset>
                <input name="name" type="text" class="form-control" id="name" placeholder="Tên lớp" required="">
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
              <textarea name="subject" rows="6" class="form-control" id="subject" placeholder="Chủ đề" required=""></textarea>
              </fieldset>
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
        </form>
        
        
       
        
     
        
      </div>
    </div>
  </div>
  
