<div class="col-md-12 post">
    <button type="button" class="btn btn-outline-success">Thêm sinh viên</button>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($users->where("level","sv") as $user )
            <tr>
                <th scope="row">{{ $loop->index+1 }}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->sex}}</td>
                <td>{{$user->birthday->format('d-m-Y')}}</td>
                <td>{{$user->email}}</td>
                <td><button type="button" class="btn btn-outline-danger"><i class="bi bi-x fa-lg"></i></button></td>
                <td><button type="button" class="btn btn-outline-primary"><i class="bi bi-arrow-clockwise fa-lg"></button></td>
                <td><button type="button" class="btn btn-outline-warning">RP</button></td>
                <td><button type="button" class="btn btn-outline-secondary">SE</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
