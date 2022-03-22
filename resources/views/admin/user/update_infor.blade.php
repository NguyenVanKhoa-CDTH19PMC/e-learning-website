


<div class=' row col-md-12 post'>
    
    <div class="col-md-12">
    
                <td ><button type="button" class="update-user btn btn-outline-primary" >Lưu</button></td>
                
                <td><button type="button" class="btn btn-outline-secondary">Hủy</button></td>
        <hr>
    </div>
    
    <div class="col-md-12 row">

                        <h6 class="col-md-2">
            Tư cách: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
                                <input readonly="readonly" name="level" type="text" class="form-control" id="level" placeholder="Họ tên" required="" value="{{$user->level=='gv'?'Giáo viên':($user->level=='sv'?'Sinh viên':'Quản trị viên')}}">
                            </fieldset>
                        </div>
                    </div>
	<div class="col-md-12 row">

                        <h6 class="col-md-2">
            Họ tên: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
                                <input  name="name" type="text" class="form-control" id="name" placeholder="Họ tên" required="" value='{{$user->name}}'>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-2">
            Ngày sinh: 
        </h6>
                        <div class="col-md-10">
                            <fieldset>
                                <input  name="birthday" type="date" class="form-control" id="birthday" placeholder="Ngày sinh" required="" value="{{\Carbon\Carbon::parse($user->birthday)->format('Y')}}-{{\Carbon\Carbon::parse($user->birthday)->format('m')}}-{{\Carbon\Carbon::parse($user->birthday)->format('d')}}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 row">

                        <h6 class="col-md-2">
            Giới tính: 
        </h6>
                        <div class="col-md-10">
                            <select name="sex" data-btn-class="btn-danger btn-block" class="form-control" >
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
                                <input  name="email" type="text" class="form-control" id="email" placeholder="Nhập mật khẩu cũ" required="" value='{{$user->email}}'>
                            </fieldset>
                        </div>
                    </div>
			</div>