<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<!-- The Modal -->
<div class="modal  " id="profile">
    <div class="modal-dialog modal-dialog-centered">
        <div class="form modal-content">
            <h5 class="modal-title">Đổi thông tin</h5>
            <form action="{{route('change_profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                
                    <div class=" col-md-12">
                        <img alt="Avatar" style="width:200px;height:200px" id='avatar_demo'  src="{{asset('assets/images/avatars/'.Auth::user()->avatar)}}">

                    </div>

                    <div class="form-group">
       
        <div class="upload-btn-wrapper col-md-12">
  <button class="col-md-12 btn">Thay ảnh</button>
  <input onchange="showPreview(event);" id="avatar" type="file" class="" accept="image/*" name="avatar"/>
</div>
           
          
       
    </div>


                    <div class="col-md-12">
                        <br>

                    </div>

                    <div class="col-md-12 row">

                        <h6 class="col-md-4">
            Họ tên: 
        </h6>
                        <div class="col-md-8">
                            <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Họ tên" required="" value='{{Auth::user()->name}}'>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-4">
            Ngày sinh: 
        </h6>
                        <div class="col-md-8">
                            <fieldset>
                                <input name="birthday" type="date" class="form-control" id="birthday" placeholder="Ngày sinh" required="" value="{{\Carbon\Carbon::parse(Auth::user()->birthday)->format('Y')}}-{{\Carbon\Carbon::parse(Auth::user()->birthday)->format('m')}}-{{\Carbon\Carbon::parse(Auth::user()->birthday)->format('d')}}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-4">
            Giới tính: 
        </h6>
                        <div class="col-md-8">
                            <select name="sex" data-btn-class="btn-danger btn-block" class="form-control" >
                                <option  @if(Auth::user()->sex=="Khác") selected @endif value="Khác">Khác</option>
                                <option @if(Auth::user()->sex=="Nam") selected @endif value="Nam">Nam</option>
                                <option @if(Auth::user()->sex=="Nữ") selected @endif value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-4">
            Email: 
        </h6>
                        <div class="col-md-8">
                            <fieldset>
                                <input name="email" type="text" class="form-control" id="email" placeholder="Nhập mật khẩu cũ" required="" value='{{Auth::user()->email}}'>
                            </fieldset>
                        </div>
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



<!-- The Modal -->
<div class="modal  " id="change_password">
    <div class="modal-dialog modal-dialog-centered">
        <div class="form modal-content">
            <h5 class="modal-title">Đổi mật khẩu</h5>
            <form action="{{route('change_password')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <input minlength="8" name="password_old" type="password" class="form-control  @error('password') is-invalid @enderror" id="password_old" placeholder="Nhập mật khẩu cũ" required="">
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <input minlength="8" name="password_new" type="password" class="form-control  @error('password') is-invalid @enderror" id="password_new" placeholder="Nhập mật khẩu mới" required="">
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <input minlength="8" name="password_retype" type="password" class="form-control  @error('password') is-invalid @enderror" id="password_retype" placeholder="Nhập lại mật khẩu" required="">
                        </fieldset>
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
   function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("avatar_demo");
    preview.src = src;
    
  }
}
</script>



















