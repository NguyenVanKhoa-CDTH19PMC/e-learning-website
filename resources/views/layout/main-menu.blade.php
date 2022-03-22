<a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
<ul class="main-menu">
  

            
             <?php if(Auth::user()->level!='ad') {if(Auth::user()->level=='gv') {?>
              <!-- search form -->
              <div class=" form-group search-container" >
                  <span class="fa fa-search form-control-feedback"></span>
                  <input type="text" class="search">
              </div>
        <li><a data-toggle="modal" data-target="#create-classroom" href="#">Tạo lớp</a></li>]
        <?php }else if(Auth::user()->level=='sv') {?>
        <li><a data-toggle="modal" data-target="#join-classroom" href="#">Tham gia</a></li>]
        <?php }?>
        <li class="has-submenu"><a href="#">Lớp học</a>
          
          <ul class="sub-menu">
          @forelse(Auth::user()->classrooms as $classroom)
              <li><a href="{{route('classroom',['id'=>$classroom->id])}}">{{$classroom->name}}</a></li>
           @endforeach
            </ul>
        </li>
       
        <li><a href="#">Bài tập</a></li>
        <li><a href="#">Khóa biểu</li>

        
        
        <?php } ?>
      </ul>
        </nav>
        
   