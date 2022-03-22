<!-- The Modal -->
<div class="modal  " id="invite-join">
    <div class="modal-dialog modal-dialog-centered">
        <div class="form modal-content">
            <h5 class="modal-title">Mời tham gia</h5>
            <div class="col-md-12">
            <h6>Mời bằng mã lớp</h6>
              <h1>{{$classroom->code}}</h1>
</div>
<h6>Mời qua email</h6>
            <form action="{{route('invite_join',['id'=>$classroom->id])}}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-12 row ">
                    <div class="col-md-9 ">
                        <fieldset>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Email" required="">
                        </fieldset>
                    </div>
                    <div class=" main-button col-md-3">
                        <fieldset>

                            <input type="submit" value="Mời"></input>

                        </fieldset>
                    </div>
                    </div>
                    
                </div>
            </form>
            <h6>Mời qua danh sách email</h6>
            <form action="{{route('invite_join',['id'=>$classroom->id])}}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-12 row ">
                <div class="upload-btn-wrapper col-md-9">
                
  <button class="btn">Tải lên</button>
  <input id="avatar" type="file" class="" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="avatar"/>
</div>

                    <div class=" main-button col-md-3">
                        <fieldset>

                            <input type="submit" value="Mời">

                        </fieldset>
                    </div>
                    </div>


                    <div class="main-button-cancel col-md-12">
                        <fieldset>
                            <input type="submit" data-dismiss="modal" value="Hủy">
                        </fieldset>
                    </div>
                   
                </div>
                
            </form>



        </div>
    </div>
</div>


