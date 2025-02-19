<?php

use App\Http\Controllers\AiFreeCodeSubmissionApi;
use App\Http\Controllers\CanteenFoodOrderController;
use App\Http\Controllers\ClassAttendanceController;
use App\Http\Controllers\EmergencyAlertController;
use App\Http\Controllers\ExamRoomController;
use App\Http\Controllers\LibraryBookController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\StudentManagementSystemController;
use App\Http\Controllers\WifiLoginController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/health', function () {
    $Utc_servertime = Carbon::now()->utc()->toRfc3339String();
    return response()->json(
        [
            'status' => "ok",
            'server_time' => $Utc_servertime
        ],
        200
    );
});
Route::get('/api/exam-room/{student_id}', [ExamRoomController::class, "getExamRoomAllocation"]);
Route::post("/api/wifi-login", [WifiLoginController::class, "WifiLoginHistory"])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::get("/api/library/book/{isbn}",[LibraryBookController::class,"getLibraryBookAvailability"]);
Route::post("/api/cantten/order",[CanteenFoodOrderController::class,"insertCanteenFoodOrder"])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::post("/api/attendance",[ClassAttendanceController::class,'InsertClassAttendace'])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::post("/api/emergency",[EmergencyAlertController::class,"InsertEmergencyAlert"])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::get("/api/notices",[NoticeBoardController::class,'getNotice']);
Route::post("/api/students",[StudentManagementSystemController::class, "createStudent"])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::get("/api/students/{student_id}",[StudentManagementSystemController::class,'getStudent']);
Route::put("/api/students/{student_id}",[StudentManagementSystemController::class, "updateStudent"])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::delete("/api/students/{student_id}",[StudentManagementSystemController::class,"deleteStudent"])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::post("/api/code-submission",[AiFreeCodeSubmissionApi::class,"AiCodeDetector"])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/webhook/code-review', function (Request $request) {

    return response()->json(['message' => 'Webhook received'], 200);
})->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
