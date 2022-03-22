
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets/js/lightbox.js')}}"></script>
    <script src="{{asset('assets/js/tabs.js')}}"></script>
    <script src="{{asset('assets/js/video.js')}}"></script>
    <script src="{{asset('assets/js/slick-slider.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <form  action="{{route('update_user',['id'=>$user->id])}}" method="post">
          @csrf
<div class=' row col-md-12 post'>

    <div id='ft' class="col-md-12">
    @if($user->deleted_at==null)
    <td ><a onclick="return confirm('Bạn có muốn xóa người dùng này?');" href="{{route('delete_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-danger " ><i class="bi bi-x fa-lg"></i></button></a></td>
                <td ><button type="button" class="staff_on_site btn btn-outline-primary"  ><i class="bi bi-gear fa-lg"></i></button></td>
                <td><a onclick="return confirm('Bạn có muốn đặt lại mật khẩu cho người dùng này?');" href="{{route('reset_password',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-warning"><i class="bi bi-key fa-lg"></i></button></a></td>
               <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người dùng này?');" href="{{route('send_mail_to_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
      
    @else
                <td colspan="4"><a onclick="return confirm('Bạn có muốn khôi phục người dùng này?');" href="{{route('backup_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-arrow-clockwise fa-lg"></i></button></a></td>
                @endif
                <hr>
    </div>

    <div id='ft2' class="col-md-12" style="display:none">
   
                <td><button type="submit" class="btn btn-outline-warning">Lưu</button></td>
                <td><button id="cance" type="button" class="btn btn-outline-secondary">Hủy</button></td>
        <hr>
    </div>
    
    <div class=" col-md-12 row">

                        <h6 class="col-md-2">
            Tư cách: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
                                <input disabled name="level" type="text" class="form-control" id="level" placeholder="Họ tên" required="" value="{{$user->level=='gv'?'Giáo viên':($user->level=='sv'?'Sinh viên':'Quản trị viên')}}">
                            </fieldset>
                        </div>
                    </div>
	<div class="col-md-12 row">

                        <h6 class="col-md-2">
            Họ tên: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
                                <input disabled name="name" type="text" class="form-control" id="name" placeholder="Họ tên" required="" value='{{$user->name}}'>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-2">
            Ngày sinh: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
                                <input disabled name="birthday" type="date" class="form-control" id="birthday" placeholder="Ngày sinh" required="" value="{{\Carbon\Carbon::parse($user->birthday)->format('Y')}}-{{\Carbon\Carbon::parse($user->birthday)->format('m')}}-{{\Carbon\Carbon::parse($user->birthday)->format('d')}}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-2">
            Giới tính: 
        </h6>
                        <div class="col-md-10">
                            <select name="sex" id="sex" disabled data-btn-class="btn-danger btn-block" class="form-control" >
                                <option  @if($user->sex=="Khác") selected @endif value="Khác">Khác</option>
                                <option @if($user->sex=="Nam") selected @endif value="Nam">Nam</option>
                                <option @if($user->sex=="Nữ") selected @endif value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-2">
            Email: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
                                <input disabled name="email" type="text" class="form-control" id="email" placeholder="Nhập mật khẩu cũ" required="" value='{{$user->email}}'>
                            </fieldset>
                        </div>
                    </div>
			</div> </form>
<script>
            $(document).ready(function(){

$('.staff_on_site').click(function(){
 
      $("#name").prop("disabled", false);
      $("#sex").prop("disabled", false);
      $("#birthday").prop("disabled", false);
      $("#email").prop("disabled", false);
      document.getElementById("ft").style.display = "none";
      document.getElementById("ft2").style.display = "block";
});
$('#cance').click(function(){
 
 $("#name").prop("disabled", true);
 $("#sex").prop("disabled", true);
 $("#birthday").prop("disabled", true);
 $("#email").prop("disabled", true);
 document.getElementById("ft").style.display = "block";
 document.getElementById("ft2").style.display = "none";
});
});
</script>