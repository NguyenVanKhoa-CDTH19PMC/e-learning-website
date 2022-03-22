
<div class="col-md-12">
	<div class="post">
		<div class="col-md-12">
        @if($classroom->grade_file==null)
			<div>(Chưa có bảng điểm)</div>
			@else
			</div>
			<div class="col-md-12">
			<td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến giảng viên của bảng điểm này?');" href="{{route('send_mail_to_grade',['id'=>$classroom->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td>
			<hr>
</div>
			<div class='file  row'>
				<div class='type col-md-12 '>
            .{{strtoupper(explode('.',$classroom->grade_file)[1])}}

        </div>
				<div class='name demo col-md-12 '>
            {{$classroom->grade_file}}

        </div>
				<hr>
					<div class=' col-md-12 '>
						<a href="{{asset('assets/grade_files/'.$classroom->grade_file)}}" download>
							<i class="bi bi-arrow-down-square"></i>
						</a>
					</div>
                    @endif
				</div>
			</div>
		</div>