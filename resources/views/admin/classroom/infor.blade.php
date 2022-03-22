


<div class=' row col-md-12 post'>
    <div class="col-md-12">
<td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến giảng viên của lớp này?');" href="{{route('send_mail_to_classroom',['id'=>$classroom->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
<hr>
</div>
    
	<div class="col-md-12 row">
		
		<h6 class="col-md-1">
Tên lớp: 
</h6>
		<div class="col-md-11">
			<fieldset>
				<input disabled name="name" type="text" class="form-control  " id="name" placeholder="Tên lớp" required="" value="{{$classroom->name}}">
				</fieldset>
			</div>
		</div>
		<div class="col-md-12 row">
			<h6 class="col-md-1">
Chủ đề: 
</h6>
			<div class="col-md-11">
				<fieldset>
					<input disabled name="subject" type="text" class="form-control " id="password_new" placeholder="Chủ đề" required="" value="{{$classroom->subject}}">
					</fieldset>
				</div>
			</div>
			<div class="col-md-12 row">
				<h6 class="col-md-1">
Mã lớp: 
</h6>
				<div class="col-md-11">
					<fieldset>
						<input disabled name="subject" type="text" class="form-control " id="password_new" placeholder="Mã lớp" required="" value="{{$classroom->code}}">
						</fieldset>
					</div>
				</div>
			</div>