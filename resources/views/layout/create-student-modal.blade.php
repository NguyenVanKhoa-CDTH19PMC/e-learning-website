<!-- The Modal -->
<div class="modal  " id="create-student">
    <div class="modal-dialog modal-dialog-centered" >
      <div class="form modal-content"> 
        <h5 class="modal-title">Thêm sinh viên</h5>
        <form action="{{route('create_user')}}"  method="post" >
          @csrf
          
          <div class="row">
          <div class="col-md-12 row">
          <div class="col-md-12">
              <fieldset>
                <input name="level"  class="form-control" id="level" placeholder="Level" value="sv" type="hidden">
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
                <input name="name" type="text" class="form-control" id="name" placeholder="Họ tên" required="">
              </fieldset>
            </div>
            <div class="col-md-12 row">
              <h6 class="col-md-4">
Ngày sinh
</h6>
              <div class="col-md-8">
                <input name="birhday" type="datetime-local" class="form-control" id="birhday"  required="">
              </div>
            </div>
            <div class="col-md-12 row">

                        <h6 class="col-md-4">
            Giới tính: 
        </h6>
                        <div class="col-md-8">
                            <select name="sex" data-btn-class="btn-danger btn-block" class="form-control" >
                                <option   selected value="Khác">Khác</option>
                                <option   value="Nam">Nam</option>
                                <option    value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>
            <div class="col-md-12">
              <fieldset>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email" required="">
              </fieldset>
            </div>
            
            

            <div class="main-button-cancel col-md-6">
              <fieldset>
              <input type="submit" data-dismiss="modal" value="Hủy">
              </fieldset>
            </div>
            <div class=" main-button col-md-6">
              <fieldset>
                
              <input type="submit" value="Thêm">
              
              </fieldset>
            </div>
          </div>
        </div>
        </form>
        
        
       
        
     
        
      </div>
    </div>
  </div>


