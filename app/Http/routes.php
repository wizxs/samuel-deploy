<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*_____Routes for the skoolspace registration module__________*/

/*  Bindings for the school, users, clients  */

Route::bind('id' , function($id)
{
    return App\User::find($id);
});

Route::bind('username' , function($name)
{
    /** @var TYPE_NAME $id */
    return App\School::where('username',$name)->first();
});

Route::bind('mail' , function($id)
{
    /** @var TYPE_NAME $id */
    return App\Mail::where('id',$id)->first();
});

Route::bind('client' , function($id)
{
    /** @var TYPE_NAME $id */
    return App\Client::where('id',$id)->first();
});

Route::bind('subject' , function($name)
{
    /** @var TYPE_NAME $id */
    return new App\Http\Forum\Subject($name);
});

Route::bind('recipient' , function($id)
{
    /** @var TYPE_NAME $id */
    return App\Client::where('id',$id)->first();
});

/**Route::bind('school' , function($school)
{
     @var TYPE_NAME $id
    return App\User::where('username', '==' ,$school);
});*/


/* The testing route */



Route::get('/test', function(){
    return view('test');
});



/* Testing Route Ends */

/* Chat Routes */
    /* Client Routes */
        Route::get('/chats', ['middleware' => 'school', 'uses' => 'ChatController@index']);
        Route::get('/chat/{client}/home', ['middleware' => 'school', 'uses' => 'ChatController@show']);
        Route::get('/{client}/chat/{recipient}', ['middleware' => 'school', 'uses' => 'ChatController@create']);
        Route::post('/{client}/chat/{recipient}', ['middleware' => 'school', 'uses' => 'ChatController@store']);

    /* End Client Rotes */

/* End Chat Routes */

/* Mail Routes */

    /* Client Routes */
        Route::get('/mail',  ['middleware' => 'school', 'uses' => 'MailController@clientIndex']);
        Route::get('/{username}/client/mail/{client}/trash',  ['middleware' => 'school', 'uses' => 'MailController@getClientTrash']);
        Route::get('/{username}/client/mail/trash/{client}/{mail}',  ['middleware' => 'school', 'uses' => 'MailController@getClientMessageTrash']);
        Route::get('/{username}/client/mail/{client}/' , ['middleware' => 'client', 'uses' => 'MailController@getClientMail']);
        Route::get('/{username}/client/mail/sent/{client}/' , ['middleware' => 'client', 'uses' =>  'MailController@getClientSent']);
        Route::get('/{username}/client/mail/send/{client}' , ['middleware' => 'client', 'uses' => 'MailController@getClientCompose']);
        Route::post('/{username}/client/mail/send/{client}' , ['middleware' => 'client', 'uses' =>  'MailController@postClientCompose']);
        Route::get('/{username}/client/mail/sent/{client}/{mail}' , ['middleware' => 'client', 'uses' =>  'MailController@getClientMessageSent']);
        Route::get('/{username}/client/mail/{client}/{mail}' , ['middleware' => 'client', 'uses' =>  'MailController@getClientMessageInbox']);
      
       
       /*   
        Route::get('/{username}/client/mail/{client}/{mail}/trash' , ['middleware' => 'client', 'uses' =>  'MailController@markInboxTrash']);
        Route::get('/{username}/client/mail/sent/{mail}/trash' , ['middleware' => 'client', 'uses' =>  'MailController@markSentTrash']);
       */

    /* School Routes */

        Route::get('/{username}/mail/trash',  ['middleware' => 'school', 'uses' => 'MailController@getSchoolTrash']);
        Route::get('/{username}/mail/trash/{mail}',  ['middleware' => 'school', 'uses' => 'MailController@getSchoolMessageTrash']);
        Route::get('/{username}/mail/' ,  ['middleware' => 'school', 'uses' => 'MailController@getSchoolMail']);
        Route::get('/{username}/mail/send' ,  ['middleware' => 'school', 'uses' => 'MailController@getSchoolSend']);
        Route::post('/{username}/mail/send' ,  ['middleware' => 'school', 'uses' => 'MailController@postSchoolSend']);
        Route::get('/{username}/mail/sent',  ['middleware' => 'school', 'uses' => 'MailController@getSchoolSent']);
        Route::get('/{username}/mail/sent/{mail}',  ['middleware' => 'school', 'uses' => 'MailController@getSchoolMessageSent']);
        Route::get('/{username}/mail/{mail}',  ['middleware' => 'school', 'uses' => 'MailController@getSchoolMessageInbox']  );
        Route::get('/{username}/mail/{mail}/trash',  ['middleware' => 'school', 'uses' => 'MailController@markInboxTrash']  );
        Route::get('/{username}/mail/sent/{mail}/trash',  ['middleware' => 'school', 'uses' => 'MailController@markSentTrash']  );
       


/* End Mail Routes */


/* Community Routes */
    /* School Routes */
        Route::get('/admin',  ['middleware' => 'school', 'uses' => 'HomeController@admin']);
        Route::get('/admin/community',  ['middleware' => 'school', 'uses' => 'ForumController@adminIndex']);
        Route::get('/{username}/admin/{subject}/community/',  ['middleware' => 'school', 'uses' => 'ForumController@adminChat']);
        Route::post('/{username}/{subject}/admin/community',  ['middleware' => 'school', 'uses' => 'ForumController@postAdminChat']);
    /* End School Routes */

    /* Client Routes */
        Route::get('/community',  ['middleware' => 'school', 'uses' => 'ForumController@clientIndex']);
        Route::get('/{client}/{subject}/community/',  ['middleware' => 'school', 'uses' => 'ForumController@clientShow']);
        Route::post('/{client}/{subject}/community',  ['middleware' => 'school', 'uses' => 'ForumController@postClientChat']);
        
    /* End CLient Routes */
/* End Community Routes */


/* Events Routes */
    /* School Routes */
        Route::get('/admin/events',  ['middleware' => 'school', 'uses' => 'TimelineController@admin']);
        Route::get('/admin/{username}/events',  ['middleware' => 'school', 'uses' => 'TimelineController@create']);
        Route::post('/admin/{username}/events',  ['middleware' => 'school', 'uses' => 'TimelineController@store']);

    /* End School Routes */

    /* Client Routes */
        Route::get('/{username}/events',  ['middleware' => 'school', 'uses' => 'TimelineController@Show']);
        Route::get('/events',  ['middleware' => 'school', 'uses' => 'TimelineController@Index']);
    /* End Client ROutes */
    
/* End Event Routes */

/* Notice Routes */
    /* School Routes */
        Route::get('/admin/{username}/notice',  ['middleware' => 'school', 'uses' => 'NoticeController@admin']);
    /* End School Routes */

    /* Client Routes */
        Route::get('/notice',  ['middleware' => 'school', 'uses' => 'NoticeController@index']);
        Route::get('/{username}/notice',  ['middleware' => 'school', 'uses' => 'NoticeController@show']);
        Route::post('/{username}/notice',  ['middleware' => 'school', 'uses' => 'NoticeController@store']);
    /* End Client Routes */
/* End Notice Routes */



/* SCHOOL'S ROUTES */

/* School Routes: Login and Registration */

Route::get('/login', 'SchoolController@getLoginAndRegister');
Route::post('/register', 'SchoolController@postRegister');
Route::post('/login', 'SchoolController@postLogin');
Route::get('/logout', 'SchoolController@getLogout');
Route::get('/patch/', 'ClientController@getPatchClient');
Route::post('/patch/', 'ClientController@postPatchClient');
Route::get('/', ['middleware' => 'school', 'uses' => 'HomeController@index']);

Route::get('/noAccount', ['middleware' => 'school', 'uses' => 'HomeController@noAccount']);




/* School Routes: Create, Update, Read/Show and Delete */
Route::get('/create/school',  ['middleware' => 'school', 'uses' => 'SchoolController@getCreateSchool']);
Route::post('/create/school',  ['middleware' => 'school', 'uses' => 'SchoolController@postCreateSchool']);
Route::get('/schools',  ['middleware' => 'school', 'uses' => 'SchoolController@getSchools']);
Route::get('/{username}/',  ['middleware' => 'school', 'uses' => 'SchoolController@showSchool']);
Route::post('/{username}/update/',  ['middleware' => 'school', 'uses' => 'SchoolController@updateSchool']);
Route::get('/{username}/delete/',  ['middleware' => 'school', 'uses' => 'SchoolController@deleteSchool']);


/* School Messenger Routes */
Route::get('/{username}/forum/' ,  ['middleware' => 'school', 'uses' => 'MessengerController@getSchoolMessages']);
Route::post('/{username}/forum/' ,  ['middleware' => 'school', 'uses' => 'MessengerController@postSchoolMessages']);


/* CLIENT'S ROUTES */

/* Client Routes: Login, Registration and Patch Routes */

Route::get('/{username}/login' , 'ClientController@getLoginAndRegistration');
Route::post('/{username}/login' , 'ClientController@postLogin');
Route::post('/{username}/register' , 'ClientController@postRegister');


/* Client Routes: Home */

//Route::get('/{username}/' ,['middleware' => 'client', 'uses' => 'ClientController@getHome']);

/* Client Forum Routes  */

/*

Route::get('/{username}/client/forum/{client}/' , ['middleware' => 'client', 'uses' => 'MessengerController@getClientMessages']);
Route::post('/{username}/client/forum/{client}/' , ['middleware' => 'client', 'uses' => 'MessengerController@postClientMessages']);
Route::get('/{username}/client/forum/class/{client}/' , ['middleware' => 'client', 'uses' => 'MessengerController@getClientClassMessages']);
Route::post('/{username}/client/forum/class/{client}/' , ['middleware' => 'client', 'uses' => 'MessengerController@postClientClassMessages']);

*/








/* ADMINISTRATOR'S ROUTES  */

/* Administrators Routes: Login and Registration 

Route::get('/{username}/admin/login', 'AdministratorController@getLogin');
Route::post('/{username}/admin/login' , 'AdministratorController@postLogin');
//Route::get('/admin/{username}/admin/' , 'AdministratorController@getRegister');
Route::post('/{username}/admin/register' , 'AdministratorController@postRegister');
Route::get('/{username}/admin/' , ['middleware' => 'admin', 'uses' => 'AdministratorController@home']);

 /* Mail Routes */

/*
Route::get('/{username}/admin/mail', ['middleware' => 'admin', 'uses' => 'MailController@getAdminMail']);
Route::get('/{username}/admin/mail/send', ['middleware' => 'admin', 'uses' => 'MailController@getAdminCompose']);
Route::post('/{username}/admin/mail/send', ['middleware' => 'admin', 'uses' => 'MailController@postAdminCompose']);
Route::get('/{username}/admin/mail/sent', ['middleware' => 'admin', 'uses' => 'MailController@getAdminSent']);
Route::get('/{username}/admin/mail/sent/{mail}', ['middleware' => 'admin', 'uses' => 'MailController@getAdminMessageSent']);
Route::get('/{username}/admin/mail/{mail}', ['middleware' => 'admin', 'uses' => 'MailController@getAdminMessageInbox']);
*/