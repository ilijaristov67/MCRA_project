<?php

use App\Http\Controllers\API\BlogBodyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ConnectionController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\EventAgendaController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\ReccomendationController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\SpeakerController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\ConferenceController;
use App\Http\Controllers\API\ConferenceAgendaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    //
});
// User routes
Route::get('user/{id}', [UserController::class, 'show']);
Route::post('editUser/{id}', [UserController::class, 'update']);
Route::get('allUsers', [UserController::class, 'getAllUsers']);
Route::delete('deleteUser/{id}', [UserController::class, 'destroy']);
Route::post('toggleBan/{id}', [UserController::class, 'toggleBan']);

// Blog routes
Route::post('saveBlog', [BlogController::class, 'store']);
Route::get('getBlogs', [BlogController::class, 'index']);
Route::get('getBlog/{id}', [BlogController::class, 'show']);
Route::get('/getBlogLikes/{id}', [BlogController::class, 'getLikes']);
Route::get('recomendedBlogs/{id}', [BlogController::class, 'recomendedBlogs']);
Route::post('updateBlog/{id}', [BlogController::class, 'updateBlog']);
Route::post('deleteBlog/{id}', [BlogController::class, 'destroy']);

//Category routes
Route::post('saveCategory', [CategoryController::class, 'store']);
Route::get('getCategories', [CategoryController::class, 'index']);

//BlogBody routes
Route::post('saveBlogBody', [BlogBodyController::class, 'store']);
Route::get('blogBody/{id}', [BlogBodyController::class, 'show']);
Route::post('updateBlogBody/{id}', [BlogBodyController::class, 'update']);

//Like Routes
Route::post('/toggleLike', [LikeController::class, 'toggleLike'])->middleware('web');
//Comment Routes
Route::post('/saveComment', [CommentController::class, 'store']);
Route::get('/getComments/{id}', [CommentController::class, 'index']);
Route::get('/getComment/{id}', [CommentController::class, 'getSingleComment']);
Route::post('editComment/{id}', [CommentController::class, 'editComment']);
Route::post('deleteComment/{id}', [CommentController::class, 'deleteComment']);
Route::get('getCommentLikes/{id}', [CommentController::class, 'getCommentLikes']);
//Reccomendations

Route::post('/saveReccomendation', [ReccomendationController::class, 'store']);
Route::get('/getReccomendations/{id}', [ReccomendationController::class, 'index']);
Route::post('/approveReccomendation/{id}', [ReccomendationController::class, 'updateReccomendation']);
Route::post('/deleteReccomendation/{id}', [ReccomendationController::class, 'destroy']);
Route::get('/getReccomendation/{id}', [ReccomendationController::class, 'show']);
Route::put('/updateReccomendation/{id}', [ReccomendationController::class, 'update']);
//Connections
Route::post('/sendConnection', [ConnectionController::class, 'sendConnection']);
Route::get('/getConnections/{id}', [ConnectionController::class, 'getConnections']);
Route::post('/acceptConnection/{id}', [ConnectionController::class, 'acceptConnection']);
Route::post('/deleteConnection/{id}', [ConnectionController::class, 'destroy']);

//Reports
Route::middleware(['ensureFrontendRequestsAreStateful', 'auth:sanctum'])->group(function () {
    Route::post('/report', [ReportController::class, 'store']);
});
Route::get('/getReports', [ReportController::class, 'index']);
Route::post('/deleteReport/{id}', [ReportController::class, 'destroy']);

//Speakers
Route::post('/saveSpeaker', [SpeakerController::class, 'store']);
Route::get('/getSpeakers', [SpeakerController::class, 'index']);
Route::post('/deleteSpeaker/{id}', [SpeakerController::class, 'destroy']);
Route::get('/getSpeaker/{id}', [SpeakerController::class, 'show']);
Route::post('/updateSpeaker/{id}', [SpeakerController::class, 'update']);

//events
Route::post('/saveEvent', [EventController::class, 'store']);
Route::get('/getEvents', [EventController::class, 'index']);
Route::post('/deleteEvent/{id}', [EventController::class, 'destroy']);
Route::get('/getEvent/{id}', [EventController::class, 'show']);
Route::post('/updateEvent/{id}', [EventController::class, 'update']);

//employees
Route::post('/addEmployee', [EmployeeController::class, 'store']);
Route::get('/getEmployees', [EmployeeController::class, 'index']);
Route::get('/getEmployee/{id}', [EmployeeController::class, 'show']);
Route::post('/updateEmployee/{id}', [EmployeeController::class, 'update']);
Route::post('/deleteEmployee/{id}', [EmployeeController::class, 'destroy']);

//eventAgenda
Route::post('/saveEventAgenda', [EventAgendaController::class, 'store']);
Route::get('/getAgendas', [EventAgendaController::class, 'index']);
Route::get('/getAgenda/{id}', [EventAgendaController::class, 'show']);
Route::post('/updateAgenda/{id}', [EventAgendaController::class, 'update']);
Route::post('/deleteAgenda/{id}', [EventAgendaController::class, 'destroy']);
Route::get('/getEventSpeakers/{id}', [EventAgendaController::class, 'getEventSpeakers']);

// glupi konferencii

Route::get('/getConferences', [ConferenceController::class, 'index']);
Route::post('/saveConference', [ConferenceController::class, 'store']);
Route::get('/getConference/{id}', [ConferenceController::class, 'show']);
Route::post('/updateConference/{id}', [ConferenceController::class, 'update']);
Route::post('/deleteConference/{id}', [ConferenceController::class, 'destroy']);

// sdfjklsdfmmfsdkopfmasopd
Route::post('/saveConferenceAgenda', [ConferenceAgendaController::class, 'store']);
Route::get('/getConferenceAgendas/{conferenceId}', [ConferenceAgendaController::class, 'index']);
Route::get('/getConferenceAgenda/{id}', [ConferenceAgendaController::class, 'show']);
Route::post('/updateConferenceAgenda/{id}', [ConferenceAgendaController::class, 'update']);
Route::post('/deleteConferenceAgenda/{id}', [ConferenceAgendaController::class, 'destroy']);
