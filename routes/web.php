<?php
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\CommentContronler;
use App\Http\Controllers\GradeCommentController;



use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
// Sửa đường dẫn trang chủ mặc định
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
 // Chức năng quên mât mật khẩu

 Route::get('reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('reset.password.get');
 Route::post('reset-password', [UserController::class, 'submitResetPasswordForm'])->name('reset.password.post');
 Route::get('forget-password', [UserController::class, 'showForgetPasswordForm'])->name('forget.password.get');
 Route::post('forget-password', [UserController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

// Đăng nhập và xử lý đăng nhập
Route::middleware('auth')->group(function (){
    Route::middleware('user')->group(function (){
    Route::get('/classroom/{id}', [ClassroomController::class, 'get_classroom'])->name('classroom');
    Route::post('/classroom/chage_infor/{id}', [ClassroomController::class, 'change_classroom_infor'])->name('change_classroom_infor');
    Route::post('/classroom/update-cover/{id}', [ClassroomController::class, 'update_cover'])->name('update_cover');
    Route::post('/classroom/upload-grade-file/{id}', [ClassroomController::class, 'upload_grade_file'])->name('upload_grade_file');
    Route::get('/classroom/delete-grade-file/{id}', [ClassroomController::class, 'delete_grade_file'])->name('delete_grade_file');
    Route::post('/classroom/create', [ClassroomController::class, 'create_classroom'])->name('create_classroom');
    Route::post('/classroom/join', [ClassroomController::class, 'join_classroom'])->name('join_classroom');
    Route::post('/classroom/invite-join/{id}', [ClassroomController::class, 'invite_join'])->name('invite_join');
    Route::get('/classroom/approve-join/{c_id}{u_id}', [ClassroomController::class, 'approve_join'])->name('approve_join');
    Route::get('/classroom/approve-join-all/{c_id}', [ClassroomController::class, 'approve_join_all'])->name('approve_join_all');
    Route::get('/classroom/exit/{c_id}{u_id}', [ClassroomController::class, 'exit_classroom'])->name('exit_classroom');
    Route::get('/classroom/delete/{id}', [ClassroomController::class, 'delete_classroom'])->name('delete_classroom');
    
    Route::get('/post/detail/{id}', [PostController::class, 'post_detail'])->name('post_detail');
    Route::post('/post/create/{id}', [PostController::class, 'create_post'])->name('create_post');
    Route::post('/post/clone/{id}', [PostController::class, 'clone_post'])->name('clone_post');
    Route::get('/post/delete/{id}', [PostController::class, 'delete_post'])->name('delete_post');
    Route::post('/post/update/{id}', [PostController::class, 'update_post'])->name('update_post');
    
    Route::post('/submit/create/{id}', [SubmitController::class, 'create_submit'])->name('create_submit');
    Route::get('/submit/delete/{id}', [SubmitController::class, 'delete_submit'])->name('delete_submit');
    Route::post('/submit/marking/{id}', [SubmitController::class, 'marking_submit'])->name('marking_submit');

    Route::post('/comment/create/{id}', [CommentContronler::class, 'create_comment'])->name('create_comment');

    Route::post('/grade_comment/create/{id}', [GradeCommentController::class, 'create_grade_comment'])->name('create_grade_comment');
  

    

    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    
    
    });

    Route::middleware('admin')->group(function (){
    Route::get('/ad', [AdminController::class, 'index'])->name('admin');
    
    Route::get('/ad/send_mail_to_user/{id}', [AdminController::class, 'send_mail_to_user'])->name('send_mail_to_user');
    Route::get('/ad/send_mail_to_classroom/{id}', [AdminController::class, 'send_mail_to_classroom'])->name('send_mail_to_classroom');
    Route::get('/ad/send_mail_to_grade/{id}', [AdminController::class, 'send_mail_to_grade'])->name('send_mail_to_grade');
    Route::get('/ad/send_mail_to_post/{id}', [AdminController::class, 'send_mail_to_post'])->name('send_mail_to_post');

    Route::post('/ad/user/create', [UserController::class, 'create_user'])->name('create_user');
    Route::get('/ad/user/{id}', [UserController::class, 'user'])->name('user_detail');
    Route::get('ad/user/delete/{id}', [UserController::class, 'delete_user'])->name('delete_user');
    Route::get('ad/user/backup/{id}', [UserController::class, 'backup_user'])->name('backup_user');
    Route::get('ad/user/reset-password/{id}', [UserController::class, 'reset_password'])->name('reset_password');
    Route::match(['get', 'post'],'ad/user/update/{id}', [UserController::class, 'update_user'])->name('update_user');

    Route::get('/ad/post/{id}', [PostController::class, 'post'])->name('post_details');

    Route::get('/ad/classroom/{id}', [AdminController::class, 'get_classroom'])->name('classroom_detail');

    });
    // Đăng xuất
    Route::match(['get', 'post'], '/logout', [LogoutController::class, 'getLogout'])->name('logout');
    
    Route::post('/user/change/password', [UserController::class, 'change_password'])->name('change_password');
    Route::post('/user/change/profile', [UserController::class, 'change_profile'])->name('change_profile');
});





