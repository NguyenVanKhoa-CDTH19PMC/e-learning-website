



<!-- The Modal -->
<div class="modal  " id="join-classroom"> 
    <div class="modal-dialog modal-dialog-centered">
      <div class="form modal-content">
        <h5 class="modal-title">Tham gia</h5>
        <form class='' action="{{route('join_classroom')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <fieldset>
                <input name="code" type="text" class="form-control" id="name" placeholder="Mã lớp" required="">
              </fieldset>
            </div>
            @if(session('alert'))

            <script> alert('{{session('alert')}}');</script>

@endif
            <div class="main-button-cancel col-md-6">
              <fieldset>
                <input type="submit" data-dismiss="modal" value="Hủy"></input>
              </fieldset>
            </div>
            <div class=" main-button col-md-6">
              <fieldset>
                
              <input type="submit" value="Tham gia"></input>
              
              </fieldset>
            </div>
          </div>
        </form>
        
       
        
     
        
      </div>
    </div>
  </div>
  