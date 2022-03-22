<script src="jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
<div class="col-md-12">
	<div class="post">
@if($classroom->grade_file==null)
    
		<form action="{{route('upload_grade_file',['id'=>$classroom->id])}}" method="post" class='row' enctype="multipart/form-data">
        @csrf
        
			<div class="col-md-12">
				<div>(Chưa có bảng điểm)</div>
				<hr>
				</div>
        @if(Auth::user()->level=='gv')
        
				<div class="upload-btn-wrapper col-md-12">
					<button class="btn">Tải file lên</button>
					<input require="" id="grade_file" type="file" class="" multiple name="grade_file" />
				</div>
				<hr>
					<div class='col-md-12 main-button'>
						<input type='submit' value='Đăng' />
					</div>
					<hr> @endif
    
					</form>
    @else @if(Auth::user()->level=='gv')

    
					<div class='col-md-12 main-button'>
						<a href="{{route('delete_grade_file',['id'=>$classroom->id])}}">
            Xóa bảng điểm
            </a>
					</div>
    @endif



    
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
						</div>
						<table id="exceltable"></table>
					</div>
					<!-- comment -->
					<br>
						<form style="padding-top:25px;padding-bottom:16px;" class="form " action="{{route('create_grade_comment',['id'=>$classroom->id])}}" method="post">
        @csrf
        
							<div class='row'>
								<img style="width:50px;height:50px;margin-right:20px;" src="{{asset('assets/images/avatars/'.Auth::user()->avatar)}}" alt="">
									<input class='col-md-9' name="content" rows="6" class="form-control" id="content" placeholder="Bình luận..." required=""></input>
									<div class='col-md-2 main-button'>
										<input type='submit' value='Đăng'></input>
									</div>
								</form>
							</div>
							<br>
								<div class='post col-md-12 '>
                                    @if($classroom->GradeComments->whereNull('deleted_at')->count()==0)
<div class='col-md-12' style=" text-align: center;">
                                    Không có bình luận nào!
</div>
                                    @endif
        @foreach($classroom->GradeComments->whereNull('deleted_at') as $comment)
        
									<div class=' col-md-12 row'>
										<img style="width:50px;height:50px" src="{{asset('assets/images/avatars/'.$comment->User->avatar)}}" alt="">
											<div class="col-md-11 row">
												<div class=" title col-md-12">
                    {{$comment->User->name}}
                </div>
												<div class="col-md-12">
                    {{$comment->created_at}}
                </div>
												<div class="col-md-12">
                    {{$comment->content}}
                </div>
											</div>
											<hr class=' col-md-12'>
											</div>

        @endforeach


    
										</div>


@endif

									</div>
                                    
									<script>
        function ExportToTable() {
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;
            /*Checks whether the file is a valid excel file*/
            if (regex.test($("#excelfile").val().toLowerCase())) {
                var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
                if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                    xlsxflag = true;
                }
                /*Checks whether the browser supports HTML5*/
                if (typeof(FileReader) != "undefined") {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var data = e.target.result;
                        /*Converts the excel data in to object*/
                        if (xlsxflag) {
                            var workbook = XLSX.read(data, {
                                type: 'binary'
                            });
                        } else {
                            var workbook = XLS.read(data, {
                                type: 'binary'
                            });
                        }
                        /*Gets all the sheetnames of excel in to a variable*/
                        var sheet_name_list = workbook.SheetNames;

                        var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/
                        sheet_name_list.forEach(function(y) { /*Iterate through all sheets*/
                            /*Convert the cell value to Json*/
                            if (xlsxflag) {
                                var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                            } else {
                                var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);
                            }
                            if (exceljson.length > 0 && cnt == 0) {
                                BindTable(exceljson, '#exceltable');
                                cnt++;
                            }
                        });
                        $('#exceltable').show();
                    }
                    if (xlsxflag) { /*If excel file is .xlsx extension than creates a Array Buffer from excel*/
                        reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                    } else {
                        reader.readAsBinaryString($("#excelfile")[0].files[0]);
                    }
                } else {
                    alert("Sorry! Your browser does not support HTML5!");
                }
            } else {
                alert("Please upload a valid Excel file!");
            }
        };

        function BindTable(jsondata, tableid) { /*Function used to convert the JSON array to Html Table*/
            var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/
            for (var i = 0; i < jsondata.length; i++) {
                var row$ = $('
										<tr/>');
                for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                    var cellValue = jsondata[i][columns[colIndex]];
                    if (cellValue == null)
                        cellValue = "";
                    row$.append($('
										<td/>').html(cellValue));
                }
                $(tableid).append(row$);
                $("
										<hr>");
            }
        }

        function BindTableHeader(jsondata, tableid) { /*Function used to get all column names from JSON and bind the html table header*/
            var columnSet = [];
            var headerTr$ = $('
											<tr/>');
            for (var i = 0; i < jsondata.length; i++) {
                var rowHash = jsondata[i];
                for (var key in rowHash) {
                    if (rowHash.hasOwnProperty(key)) {
                        if ($.inArray(key, columnSet) == -1) { /*Adding each unique column names to a variable array*/
                            columnSet.push(key);
                            headerTr$.append($('
											<th/>').html(key));
                        }
                    }
                }
            }
            $(tableid).append(headerTr$);

            return columnSet;
        }
    
										</script>