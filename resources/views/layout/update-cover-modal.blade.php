
<!-- The Modal -->
<div class="modal  " id="update_cover">
<div class="modal-dialog modal-dialog-centered">
        <div class="form modal-content">
            <h5 class="modal-title">Đổi thông tin</h5>
            <form action="{{route('update_cover',['id'=>$classroom->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                
                    <div class=" col-md-12">
                        <img alt="Avatar" style="width:200px;height:200px" id='cover_demo'  src="{{asset('assets/images/covers/'.$classroom->cover)}}">

                    </div>

                    <div class="form-group">
       
        <div class="upload-btn-wrapper col-md-12">
  <button class="col-md-12 btn">Thay ảnh</button>
  <input onchange="showPreviews(event);" id="cover" type="file" class="" accept="image/*" name="cover"/>
</div>
           
          
       
    </div>


                    <div class="col-md-12">
                        <br>

                    </div>

                    


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
            </form>





        </div> 
    </div>
</div>

<script>
   function showPreviews(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("cover_demo");
    preview.src = src;
    
  }
}
</script>