             
<!-- The Modal -->
<div class="modal  " id="clone_post"> 
    <div class="modal-dialog modal-dialog-centered">
      <div class="form modal-content">
        <h5 class="modal-title">Chuyển tiếp đến:</h5>
        <form class='' action="{{route('clone_post',['id'=>$post->id])}}" method="post">
          @csrf
          <div class="row">
          <div class="col-md-12">
                            <select name="class_id" data-btn-class="btn-danger btn-block" class="form-control" >
                              @foreach(Auth::user()->Classrooms->where('id','<>',$post->classroom_id) as $classroom)
                              <option   value={{$classroom->id}}>{{$classroom->name}}</option>
                              @endforeach
                                
                            </select>
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
                
              <input type="submit" value="Xác nhận"></input>
              
              </fieldset>
            </div>
          </div>
        </form>
        
       
        
     
        
      </div>
    </div>
  </div>
  

