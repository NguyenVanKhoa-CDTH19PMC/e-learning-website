<div class="col-md-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="section main-banner" id="top" data-section="section1">
                    <img id="theme" src="{{asset('assets/images/covers/'.$classroom->cover)}}"></img>
                    <div class="video-overlay header-text">
                        <div class="caption">
                            <h2><em>{{$classroom->name}}</em></h2> @if($classroom->Teachers->find($user->id))
                            <h6>Mã lớp: {{$classroom->code}}</h6> @endif
                        </div>
                        @if($classroom->Teachers->find($user->id))
                        <!-- more option Button  -->
                        <div class="dropup  col-md-1 " style=" position: absolute;
        right: 0px;
       bottom:0px">
                            <div class="dropbtn" style="color:#ffffff">...</div>
                            <div class="dropup-content" style=" right: 50px;">
                                <a href="#" data-toggle="modal" data-target="#update_cover">Thay ảnh nền</a>
                                <a href="#" data-toggle="modal" data-target="#change_classroom_infor">Sửa thông tin lớp</a>
                                <a onclick="return confirm('Bạn có muốn xóa lớp này này?');" href="{{route('delete_classroom',['id'=>$classroom->id])}}">Xóa lớp</a>
                            </div>
                        </div>
                        @endif

                    </div>

                </section>
                <br>
            </div>

            <div class="col-md-12">
                <!-- form them tb-->
                <form class="form" action="{{route('create_post',['id'=>$classroom->id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Tiêu đề" required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <textarea name="description" rows="6" class="form-control" id="description" placeholder="Nội dung" required=""></textarea>
                            </fieldset>
                        </div>



                        <div class=" main-button col-md-6">
                            <fieldset>

                                <input type="submit" value="Đăng"></input>

                            </fieldset>
                        </div>
                    </div>
                </form>
                <div class='row'><br></div>
                <!-- Danh sách bài đăng-->
                @if($classroom->Posts->whereNull('deleted_at')->count()==0)
					<div class="col-md-12 post">
				<h6>(Chưa có bài viết nào!)</h6>
				
				</div>
				@endif
                @forelse($classroom->Posts->whereNull('deleted_at') as $post)

                <div class="post col-md-12">
                    <div class="col-md-12 ">
                        <div class='row'>
                            <img style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.$post->User->avatar)}}" alt="">
                            <div class="col-md-10 row">
                                <div class="col-md-12">
                                    {{$post->User->name}}
                                </div>
                                <div class="col-md-12">
                                    {{$post->created_at}}
                                </div>
                            </div>

                            @if($post->User->id==$user->id)
                            <!-- more option Button  -->
                            <div class="dropup col-md-1 "style=" text-align: right;">
                                <div class="dropbtn">...</div>
                                <div class="dropup-content">
                                    <a onclick="return confirm('Bạn có muốn xóa bài này?');" href="{{route('delete_post',['id'=>$post->id])}}">Xóa</a>
                                    
                                </div>
                            </div>
                            @endif

                        </div>


                        <hr>
                        <a href="{{route('post_detail',['id'=>$post->id])}}" class='title'>{{ucfirst($post->type)}}: {{$post->title}}</a>
                        <div>{{$post->description}}</div>
                        


                    </div>
                </div>
                <br> @endforeach
            </div>
        </div>
    </div>
</div>
@include('layout.change-classroom-infor-modal')
@include('layout.update-cover-modal')