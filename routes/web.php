<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    
    Route::get('reset1', 'LoginController@reset1')->name('reset1');
    Route::post('setreset', 'LoginController@setreset');
    Route::post('setpass', 'LoginController@setpass');
    Route::post('setnewpass', 'LoginController@setnewpass');
    
    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
    Route::post('resetpass', 'ForgotPasswordController@resetpass')->name('resetpass');
    Route::post('restnewpass', 'ForgotPasswordController@restnewpass')->name('restnewpass');
    
    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'administrator'], function () {
   // Dashboard
   Route::get('/', 'DashboardControllerv@index')->name('dashboard');

    
    //member function
     Route::get('member/add', 'MemberController@create')->name('member.add');
    Route::get('member','MemberController@index')->name('member');
    Route::get('member/{member}', 'MemberController@show')->name('member.show');
    Route::get('member/edit/{member}', 'MemberController@edit')->name('member.edit');
    Route::post('member/edit/editmember','MemberController@update');
    Route::post('member/addmember', 'MemberController@store')->name('member.store');
    Route::get('member/delete/{member}', 'MemberController@destroy')->name('member.delete');
    Route::post('member/delete/deletemember','MemberController@sedelete');
    Route::post('searchMember','MemberController@searchMember');


    //online book
    Route::get('online_book','OnlineBookController@index')->name('online_book');
    Route::get('online_book/add', 'OnlineBookController@create')->name('online_book.add');
    Route::post('online_book/addbook', 'OnlineBookController@store')->name('online_book.addbook');
    Route::get('online_book/{bookonline}', 'OnlineBookController@show')->name('online_book.show');
    Route::get('online_book/edit/{bookonline}', 'OnlineBookController@edit')->name('online_book.edit');
    Route::post('online_book/edit/updatebook','OnlineBookController@update');
    Route::get('online_book/delete/{bookonline}', 'OnlineBookController@destroy')->name('online_book.delete');
    Route::post('online_book/delete/deletebook','OnlineBookController@sedelete');
    Route::post('searchonline_book', 'OnlineBookController@searchonline_book');
   
    //Book
    Route::get('book','BookController@index')->name('book');
    Route::get('book/add','BookController@create')->name('book.add');
    Route::get('book_category/add','BookController@createbook_category')->name('book_category.add');
    Route::post('book_category/addbook_category', 'BookController@store_book_category')->name('book_category.store_book_category');
    Route::post('book/addbook', 'BookController@store')->name('book.addbook');
    Route::get('book/{book}', 'BookController@show')->name('book.show');
    Route::get('book/edit/{book}', 'BookController@edit')->name('book.edit');
    Route::post('searchBook', 'BookController@searchBook')->name('book.searchBook');
    Route::post('book/edit/updatebook','BookController@update');
    Route::get('book/delete/{book}', 'BookController@destroy')->name('book.delete');
    Route::post('book/delete/deletebook','BookController@sedelete');

    //Book issue addbook_category 
    Route::get('book_issue','BookIssueController@index')->name('book_issue');
    Route::get('book_issue/add','BookIssueController@create')->name('book_issue.add');
    Route::post('book_issue/addbook/addbook_issue', 'BookIssueController@store')->name('book_issue.addbook');
    Route::get('book_issue/{Book_issue}', 'BookIssueController@show')->name('book_issue.show');
    Route::get('book_issue/return/{Book_issue}', 'BookIssueController@return')->name('book_issue.return');
     Route::post('book_issue/addbook/book_issue_book', 'BookIssueController@book_issue_book')->name('book_issue.addbook');
    Route::post('book_issue/addbook/book_issue_add', 'BookIssueController@book_issue_add')->name('book_issue.addbook.book_issue_add');
    Route::post('book_issue/return/returnbook','BookIssueController@returnbook');
    Route::get('book_issue/delete/{book}', 'BookIssueController@destroy')->name('book_issue.delete');
    Route::post('book_issue/delete/deletebook','BookIssueController@sedelete');
    Route::get('book_issue/addbook/{member}', 'BookIssueController@selectbook')->name('book_issue.addbook');
    Route::post('book_issue/book_issue_member','BookIssueController@book_issue_member');

    //fine collection
    Route::post('searchfine', 'FineCollectionController@searchfine');
    Route::get('fine_collection','FineCollectionController@index')->name('fine_collection');
    Route::get('fine_fee/{fine}', 'FineCollectionController@edit')->name('fine_fee.edit');
    Route::get('fine_fee','FineCollectionController@fine_fee')->name('fine_fee'); 
    Route::get('fine_fee/add','FineCollectionController@fine_feeadd')->name('fine_fee.add');
    Route::post('book_issue/return/book_fine_collection','FineCollectionController@store');
    Route::post('fine_fee/fine_feeupdate','FineCollectionController@update');
    
    //Author addauthor
    Route::get('author','AuthorController@index')->name('author');
    Route::get('author/add', 'AuthorController@create')->name('author.add');
    Route::post('author/addauthor', 'AuthorController@store')->name('author.store');
    Route::get('author/{Book_author}', 'AuthorController@show')->name('author.show');
    Route::get('author/edit/{Book_author}', 'AuthorController@edit')->name('author.edit');
    Route::get('author/delete/{Book_author}', 'AuthorController@destroy')->name('author.delete');
    Route::post('author/delete/deleteauthor','AuthorController@sedelete');
    Route::post('searchBook', 'AuthorController@searchBook')->name('book.searchBook');
    Route::post('author/edit/updateauthor','AuthorController@update');
    
    });

Route::group(['prefix' => 'member', 'as' => 'patient.', 'namespace' => 'member', 'middleware' => 'patient'], function () {
   
    // Dashboard
    Route::get('/', 'PatientDashboardController@index')->name('dashboard');
    
    //member function
    Route::get('member','MemberController@index')->name('member');
    Route::get('member/edit/{member}', 'MemberController@edit')->name('member.edit');
    Route::post('member/edit/editmember','MemberController@update');
        
    //online book
    Route::get('online_book','OnlineBookController@index')->name('online_book');
    Route::get('online_book/{bookonline}', 'OnlineBookController@show')->name('online_book.show');
    Route::post('searchonlinelibrary', 'OnlineBookController@searchonlinelibrary')->name('book.searchBook');

    //Book
    Route::get('book','BookController@index')->name('book');
    Route::get('book/{book}', 'BookController@show')->name('book.show');
    Route::post('searchBook', 'BookController@searchBook')->name('book.searchBook');
    
    //Book issue addbook_category 
    Route::get('book_issue','BookIssueController@index')->name('book_issue');
    Route::get('book_issue/{Book_issue}', 'BookIssueController@show')->name('book_issue.show');
    Route::post('Msearchbookissue','BookIssueController@search_book_issue');

    //fine collection
    Route::post('Msearchfine', 'FineCollectionController@searchfine');
    Route::get('fine_collection','FineCollectionController@index')->name('fine_collection');

    //Author addauthor
    Route::get('author','AuthorController@index')->name('author');
    Route::get('author/{Book_author}', 'AuthorController@show')->name('author.show');
    Route::post('authorsearchauthor','AuthorController@authorsearchauthor');
   
});

Route::get('/', 'HomeController@index')->name('/');;
Route::get('/aboutus', 'AboutUsController@aboutus');
Route::get('/services', 'ServicesController@services');
Route::get('/contact', 'ContactController@contact');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

