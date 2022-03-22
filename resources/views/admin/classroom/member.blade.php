

<div class="col-md-12 post">
    
<div class="col-md-12">
				<h5>Giảng viên ( {{$classroom->Teachers->whereNull('deleted_at')->count()}} )</h5>
			</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Email</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($classroom->Teachers as $user )
            
            <tr id="{{$loop->index}}" onclick="readvalues(this);">
                <th  onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';"  scope="row">{{ $loop->index+1 }}</th>
                <td  style="display:none;">{{$user->id}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->name}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->sex}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->birthday->format('d-m-Y')}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->email}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->deleted_at==null?'Hoạt động':'Đã ẩn'}}</td>
                @if($user->deleted_at==null)
                <td ><a onclick="return confirm('Bạn có muốn xóa người dùng này?');" href="{{route('delete_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-danger " ><i class="bi bi-x fa-lg"></i></button></a></td>
                <td ><a href="{{route('user_detail',['id'=>$user->id])}}';"><button id="column" type="button" class="update-user btn btn-outline-primary"  ><i class="bi bi-gear fa-lg"></i></button></a></td>
                <td><a onclick="return confirm('Bạn có muốn đặt lại mật khẩu cho người dùng này?');" href="{{route('reset_password',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-warning"><i class="bi bi-key fa-lg"></i></button></a></td>
               
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người dùng này?');" href="{{route('send_mail_to_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
                @else
                <td colspan="4"><a onclick="return confirm('Bạn có muốn khôi phục người dùng này?');" href="{{route('backup_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-arrow-clockwise fa-lg"></button></a></td>
                @endif
            </tr>

            @endforeach
        </tbody>
       
    </table>
	<hr>
	<div class="col-md-12">
				<h5>Sinh viên ( {{$classroom->Students->whereNull('deleted_at')->count()}} )</h5>
			</div>
			@if($classroom->Students->whereNull('deleted_at')->count()!=0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Email</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($classroom->Students as $user )
            
            <tr id="{{$loop->index}}" onclick="readvalues(this);">
                <th  onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';"  scope="row">{{ $loop->index+1 }}</th>
                <td  style="display:none;">{{$user->id}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->name}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->sex}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->birthday->format('d-m-Y')}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->email}}</td>
                <td onclick="window.location='{{route('user_detail',['id'=>$user->id])}}';" >{{$user->deleted_at==null?'Hoạt động':'Đã ẩn'}}</td>
                @if($user->deleted_at==null)
                <td ><a onclick="return confirm('Bạn có muốn xóa người dùng này?');" href="{{route('delete_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-danger " ><i class="bi bi-x fa-lg"></i></button></a></td>
                <td ><a href="{{route('user_detail',['id'=>$user->id])}}';"><button id="column" type="button" class="update-user btn btn-outline-primary"  ><i class="bi bi-gear fa-lg"></i></button></a></td>
                <td><a onclick="return confirm('Bạn có muốn đặt lại mật khẩu cho người dùng này?');" href="{{route('reset_password',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-warning"><i class="bi bi-key fa-lg"></i></button></a></td>
               
                <td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người dùng này?');" href="{{route('send_mail_to_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
                @else
                <td colspan="4"><a onclick="return confirm('Bạn có muốn khôi phục người dùng này?');" href="{{route('backup_user',['id'=>$user->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-arrow-clockwise fa-lg"></button></a></td>
                @endif
            </tr>

            @endforeach
        </tbody>
       
    </table>
	@endif
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<div id="addBookDialog" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <input type="hidden" name="bookId" id="bookId" value=""/>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
        $(".update-user").click(function () {
            var name = $("#column").val();
            $("#column").html(name);
        });
        function readvalues(tableRow){
                var columns=tableRow.querySelectorAll("td");
                for(var i=0;i<columns.length-4;i++)
                {
                $("#column").html(columns[i].innerHTML);
                console.log('Column ': '+columns[i].innerHTML );}

};

    </script>

@include('layout.create-teacher-modal')

@include('layout.update-user-modal')



<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets/js/lightbox.js')}}"></script>
    <script src="{{asset('assets/js/tabs.js')}}"></script>
    <script src="{{asset('assets/js/video.js')}}"></script>
    <script src="{{asset('assets/js/slick-slider.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>