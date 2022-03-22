<div class="col-md-12">
	<div class="container">
		<div class="row">

        @if($classroom->Teachers->find($user->id))

			<div class=" main-button">
				<input type="submit" data-toggle="modal" data-target="#invite-join" value="Mời"/>
			</div>
            @endif

			<!--  ds giảng viên-->
			<div class="col-md-12">
				<h6>Giảng viên</h6>
			</div>
@foreach($classroom->Teachers as $teacher)

            
			<div class="col-md-12">
				<div class="post row">
					<img style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.$teacher->avatar)}}" alt="">
						<div class="col-md-10">
							<div class='title'>  {{$teacher->name}}</div>
							<div>  {{$teacher->email}}</div>
						</div>
						<!-- s -->
					</div>
				</div>
            @endforeach

           
				<!--  ds sinh viên-->
				<div class="col-md-12">
				<br>
					<h6>Sinh viên ( {{$classroom->Students->count()}} thành viên )</h6>
				</div>
@foreach($classroom->Students as $student)

            
				<div class="col-md-12">
					<div class="post row">
						<img style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.$student->avatar)}}" alt="">
							<div class="col-md-10">
								<div class='title'> {{$student->name}}</div>
								<div > {{$student->email}}</div>
							</div>
                    @if($classroom->Teachers->find($user->id))
                        
							<!-- more option Button  -->
							<div class="dropup col-md-1">
								<div class="dropbtn">...</div>
								<div class="dropup-content">
									<a onclick="return confirm('Bạn có muốn xóa thành viên này?');" href="{{route('exit_classroom',['c_id'=>$classroom->id,'u_id'=>$student->id])}}" >Xóa</a>
									<a href="#">Gửi email</a>
								</div>
							</div>
                  @endif
                
						</div>
						<br>
					</div>
            @endforeach
            @if($classroom->Teachers->find($user->id))
            @if($classroom->Wait_Students->count()!=0)
					<div class="col-md-12">
						<br>
						</div>
						<div class="col-md-10">
							<h6>Sinh viên chờ ( {{$classroom->Wait_Students->count()}} thành viên )</h6>
						</div>
						<div class=" main-button col-md-2">
							<fieldset>
								<a onclick="return confirm('Bạn có muốn duyệt hết thành viên ?');" href="{{route('approve_join_all',['c_id'=>$classroom->id])}}" type="submit" >Duyệt hết</a>
							</fieldset>
						</div>
						<div class="col-md-12">
							<br>
							</div>
@foreach($classroom->Wait_Students as $student)

            
							<div class="col-md-12">
								<div class="post row">
									<img style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.$student->avatar)}}" alt="">
										<div class="col-md-9">
											<div class='title'> {{$student->name}}</div>
											<div > {{$student->email}}</div>
										</div>
										<!-- approve_join Button  -->
										<div class=" main-button col-md-2">
											<fieldset>
												<a onclick="return confirm('Bạn có muốn duyệt thành viên này?');" href="{{route('approve_join',['c_id'=>$classroom->id,'u_id'=>$student->id])}}" type="submit" >Duyệt</a>
											</fieldset>
										</div>
									</div>
									<br>
								</div>
            @endforeach
            @endif

			@endif
        
							</div>
						</div>
					</div>
@include('layout.invite-join-modal')