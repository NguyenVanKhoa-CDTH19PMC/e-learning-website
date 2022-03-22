<div class="col-md-12">
	<div class="container">
		<div class="row">
            @if($classroom->Teachers->find($user->id))
            
			<div class=" main-button">
				<input type="submit" data-toggle="modal" data-target="#create-assignment" value="Tạo"/>
			</div>
            @endif


            
			<div class="col-md-12">
				<br>
					<!-- Danh sách bài tập-->
					@if($classroom->All_Assignments->whereNull('deleted_at')->count()==0)
					<div class="col-md-12 post">
				<h6>(Chưa có bài tập nào!)</h6>
				
				</div>
				@endif
                @forelse($classroom->All_Assignments->whereNull('deleted_at') as $assignment)


                
					<div class="post row col-md-12">
						<div class=" row col-md-11">
							<a href="{{route('post_detail',['id'=>$assignment->id])}}" class="demo col-md-12 title">{{ucfirst($assignment->type)}}: 
    
{{$assignment->title}}
</a>
							<hr>
								<div class="col-md-12">
                            {{$assignment->description}}
                        </div>
							</div>
                    @if($classroom->Teachers->find($user->id))
                    
							<!-- more option Button  -->
							<div class="dropup col-md-1">
								<div class="dropbtn">...</div>
								<div class="dropup-content">
									<a onclick="return confirm('Bạn có muốn xóa bài này?');" href="{{route('delete_post',['id'=>$assignment->id])}}">Xóa</a>
								</div>
							</div>
                    @endif

                
						</div>
						<br> @endforeach
              
						</div>
					</div>
				</div>
			</div>
        @include('layout.create-assignment-modal')