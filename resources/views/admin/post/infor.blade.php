


<div class=' row col-md-12 post'>
    
    <div class="col-md-12"><td><a onclick="return confirm('Bạn có muốn gửi email cảnh báo đến người tạo ?');" href="{{route('send_mail_to_post',['id'=>$post->id])}}"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-envelope fa-lg"></i></button></a></td><hr></div>
    
	<div class="col-md-12 row">
		<h6 class="col-md-2">
Loại: 
</h6>
		<div class="col-md-10">
			<fieldset>
				<input disabled name="type" type="text" class="form-control  " id="type" placeholder="Loại" required="" value="{{ucfirst($post->type)}}">
				</fieldset>
			</div>
		</div>
		<div class="col-md-12 row">
			<h6 class="col-md-2">
Tiêu đề: 
</h6>
			<div class="col-md-10">
				<fieldset>
					<input disabled name="title" type="text" class="form-control " id="title" placeholder="Tiêu đề" required="" value="{{$post->title}}">
					</fieldset>
				</div>
			</div>
			<div class="col-md-12 row">
				<h6 class="col-md-2">
Mô tả: 
</h6>
				<div class="col-md-10">
					<fieldset>
						<input disabled name="description" type="text" class="form-control " id="description" placeholder="Mô tả" required="" value="{{$post->description}}">
						</fieldset>
					</div>
				</div>
				@if($post->type=='bài tập'||$post->type=='bài kiểm tra'||$post->type=='bài thi')
				<div class="col-md-12 row">

                        <h6 class="col-md-2">
            Hạn nộp: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
							<input disabled name="deadline" type="datetime-local" class="form-control" id="deadline" placeholder="Tiêu đề" required="" value="{{\Carbon\Carbon::parse($post->deadline)->format('Y')}}-{{\Carbon\Carbon::parse($post->deadline)->format('m')}}-{{\Carbon\Carbon::parse($post->deadline)->format('d')}}T{{\Carbon\Carbon::parse($post->deadline)->format('H')}}:{{\Carbon\Carbon::parse($post->deadline)->format('s')}}">
                            </fieldset>
                        </div>
						
                    </div>
					@endif
					@if($post->Attachments->count()!=0)
					<hr class="col-md-12">
					<h6 class="col-md-12">
            File đính kèm: 
        </h6>
		<div class=' row'>
                        @foreach($post->Attachments as $attachment)
                        <div class='file  row'>
                        <div class='type col-md-12 '>
                          .{{strtoupper(explode('.',$attachment->attachment)[1])}}

</div>

<div class='name demo col-md-12 '>
                          {{$attachment->attachment}}

</div>
<hr>
<div class=' col-md-12 '>
<a href="{{asset('assets/attachments/'.$post->id.'/'.$attachment->attachment)}}" download>
<i class="bi bi-arrow-down-square"></i>
                          </a>
</div>

                        </div>
                        
                        
                        @endforeach
                        </div>

@endif
			</div>