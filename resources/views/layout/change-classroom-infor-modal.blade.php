
<!-- The Modal -->
<div class="modal  " id="change_classroom_infor">
    <div class="modal-dialog modal-dialog-centered">
        <div class="form modal-content">
            <h5 class="modal-title">Thông tin lớp</h5>
            <form action="{{route('change_classroom_infor',['id'=>$classroom->id])}}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-12 row">

<h6 class="col-md-4">
Tên lớp: 
</h6>
<div class="col-md-8">
<fieldset>
                            <input name="name" type="text" class="form-control  " id="name" placeholder="Tên lớp" required="" value="{{$classroom->name}}">
                        </fieldset>
</div>
</div>
<div class="col-md-12 row">

<h6 class="col-md-4">
Chủ đề: 
</h6>
<div class="col-md-8">
<fieldset>
                            <input name="subject" type="text" class="form-control " id="password_new" placeholder="Chủ đề" required="" value="{{$classroom->subject}}">
                        </fieldset>
</div>
</div>
                    

                    <div class="main-button-cancel col-md-6">
                        <fieldset>
                            <input type="submit" data-dismiss="modal" value="Hủy">
                    </div>
                    <div class=" main-button col-md-6">
                        <fieldset>

                            <input type="submit" value="Lưu">

                        </fieldset>
                    </div>
                </div>
            </form>





        </div>
    </div>
</div>