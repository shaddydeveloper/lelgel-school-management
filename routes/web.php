<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::post('userlogin', [App\Http\Controllers\Auth\LoginController::class, 'userLogin'])->name('userLogin');

Route::middleware(['auth:web'])->group(function () {
Route::get('update_all', function () {
    return view('backup.update_all');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students');
Route::post('/add_student', [App\Http\Controllers\StudentController::class, 'store'])->name('add_student');
Route::post('/add_teacher', [App\Http\Controllers\TeacherController::class, 'store'])->name('add_teacher');
Route::get('/teachers', [App\Http\Controllers\TeacherController::class, 'index'])->name('teachers');
Route::get('/teachers_accessories', [App\Http\Controllers\TeacherAccessoryController::class, 'index'])->name('teachers_accessories');
Route::post('/assign_accessory', [App\Http\Controllers\TeacherAccessoryController::class, 'store'])->name('assign_accessory');
Route::get('/exercise_books', [App\Http\Controllers\ExerciseBookController::class, 'index'])->name('exercise_books');
Route::post('/assign_exercise', [App\Http\Controllers\ExerciseBookController::class, 'store'])->name('assign_exercise');
Route::post('/add_textbook_title', [App\Http\Controllers\TextBookTitleController::class, 'store'])->name('add_textbook_title');
Route::get('/textbooks', [App\Http\Controllers\TextBookTitleController::class, 'index'])->name('textbooks');
Route::get('/assigned_textbooks', [App\Http\Controllers\AssignTextBookController::class, 'show'])->name('assigned_textbooks');
Route::get('assigned_textbooks/{id}', [App\Http\Controllers\AssignTextBookController::class, 'index']);
Route::post('/assign_textbook', [App\Http\Controllers\AssignTextBookController::class, 'store'])->name('assign_textbook');
Route::post('/add_transaction', [App\Http\Controllers\FeeTransactionController::class, 'store'])->name('add_transaction');
Route::get('/transactions', [App\Http\Controllers\FeeTransactionController::class, 'index'])->name('transactions');
Route::get('/assigned_games_equipments', [App\Http\Controllers\GamesEquipmentAllocationController::class, 'index'])->name('assigned_games_equipments');
Route::post('/assign_games_equipment', [App\Http\Controllers\GamesEquipmentAllocationController::class, 'store'])->name('assign_games_equipment');
Route::get('/games_equipments', [App\Http\Controllers\GamesEquipmentsController::class, 'index'])->name('games_equipments');
Route::get('games_equipments_profile/{id}', [App\Http\Controllers\GamesEquipmentsController::class, 'show'])->name('games_equipments_profile');
Route::post('/add_games_equipments', [App\Http\Controllers\GamesEquipmentsController::class, 'store'])->name('add_games_equipment');
Route::get('/food_stuff', [App\Http\Controllers\FoodStuffController::class, 'index'])->name('food_stuff');
Route::post('/add_food_stuff', [App\Http\Controllers\FoodStuffController::class, 'store'])->name('add_food_stuff');
Route::post('/add_food_expenditure', [App\Http\Controllers\FoodExpenditureController::class, 'store'])->name('add_food_expenditure');
Route::get('/food_expenditures', [App\Http\Controllers\FoodExpenditureController::class, 'index'])->name('food_expenditures');
Route::get('/teaching_accessories', [App\Http\Controllers\TeachingAccessoryController::class, 'index'])->name('teaching_accessories');
Route::post('/add_teaching_accessories', [App\Http\Controllers\TeachingAccessoryController::class, 'store'])->name('add_teaching_accessory');
Route::post('/add_student_accessories', [App\Http\Controllers\StudentAccessoryController::class, 'store'])->name('add_student_accessory');
Route::get('/student_accessories', [App\Http\Controllers\StudentAccessoryController::class, 'index'])->name('student_accessories');
Route::get('/daily_expenses', [App\Http\Controllers\DailyExpenseController::class, 'index'])->name('daily_expenses');
Route::post('/add_daily_expenses', [App\Http\Controllers\DailyExpenseController::class, 'store'])->name('add_daily_expenses');
Route::get('/student_accessories_assignment', [App\Http\Controllers\StudentAccessoriesAssignmentController::class, 'index'])->name('student_accessories_assignment');
Route::get('/form_one', [App\Http\Controllers\StudentController::class, 'formOne'])->name('form_one');
Route::get('/form_two', [App\Http\Controllers\StudentController::class, 'formTwo'])->name('form_two');
Route::get('/form_three', [App\Http\Controllers\StudentController::class, 'formThree'])->name('form_three');
Route::get('/form_four', [App\Http\Controllers\StudentController::class, 'formFour'])->name('form_four');
Route::get('/apparatus', [App\Http\Controllers\ApparatusController::class, 'index'])->name('apparatus');
Route::post('/add_apparator', [App\Http\Controllers\ApparatusController::class, 'store'])->name('add_apparator');
Route::delete('delete_apparator/{id}', [App\Http\Controllers\ApparatusController::class, 'destroy'])->name('apparator.delete');
Route::delete('delete_food/{id}', [App\Http\Controllers\FoodStuffController::class, 'destroy'])->name('food.delete');
Route::get('/chemicals', [App\Http\Controllers\ChemicalsController::class, 'index'])->name('chemicals');
Route::get('update_chemical/{chemical}', [App\Http\Controllers\ChemicalsController::class, 'edit'])->name('edit_chemical');
Route::get('update_apparator/{apparatus}', [App\Http\Controllers\ApparatusController::class, 'edit'])->name('edit_apparator');
Route::post('/add_chemical', [App\Http\Controllers\ChemicalsController::class, 'store'])->name('add_chemical');
Route::post('update_chemical/{chemicals}', [App\Http\Controllers\ChemicalsController::class, 'update'])->name('update_chemical');
Route::post('update_apparator/{apparatus}', [App\Http\Controllers\ApparatusController::class, 'update'])->name('update_apparator');
Route::delete('delete_chemical/{id}', [App\Http\Controllers\ChemicalsController::class, 'destroy'])->name('chemical.delete');
Route::get('collect_textbook/{id}', [App\Http\Controllers\TextbookCollectionController::class, 'store'])->name('textbook.collect');
Route::post('/assign_students_accessory', [App\Http\Controllers\StudentAccessoriesAssignmentController::class, 'store'])->name('assign_students_accessory');
Route::get('teacher_profile/{id}', [App\Http\Controllers\TeacherProfileController::class, 'index'])->name('teacher_profile');
Route::get('student_profile/{id}', [App\Http\Controllers\StudentProfileController::class, 'index'])->name('student_profile');
Route::get('user_profile', [App\Http\Controllers\UserProfileController::class, 'index'])->name('user_profile');
Route::get('update_food_stuff/{id}', [App\Http\Controllers\FoodStuffUpdateController::class, 'index'])->name('food_stuff_update');
Route::get('user_logout', [App\Http\Controllers\UserLogin::class, 'logout'])->name('user_logout');
Route::post('update_food_stuff', [App\Http\Controllers\FoodStuffUpdateController::class, 'store'])->name('update_food_stuff');
Route::get('textbooks/{id}', [App\Http\Controllers\TextBookController::class, 'index']);
Route::get('textbook_info/{id}', [App\Http\Controllers\TextBookController::class, 'bookInfo']);
Route::post('add_textbook', [App\Http\Controllers\TextBookController::class, 'store'])->name('add_textbook');
Route::post('update_student', [App\Http\Controllers\StudentController::class, 'update'])->name('update_student');
Route::post('update_user', [App\Http\Controllers\UserProfileController::class, 'store'])->name('update_user');
Route::post('update_all_assigned', [App\Http\Controllers\AssignTextBookController::class, 'create'])->name('update_all_assigned');
Route::get('configurations', [App\Http\Controllers\ConfigurationsController::class, 'index'])->name('configurations');
Route::get('terms', [App\Http\Controllers\TermsController::class, 'index'])->name('terms');
Route::post('add_term', [App\Http\Controllers\TermsController::class, 'store'])->name('add_term');
Route::get('settings', [App\Http\Controllers\SettingsController::class, 'settings'])->name('settings');
Route::get('fee_balance', [App\Http\Controllers\FeeBalanceController::class, 'index'])->name('fee_balance');
Route::post('make_payment', [App\Http\Controllers\FeePaymentController::class, 'store'])->name('make_payment');
Route::get('invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice');
Route::get('daily_food_used', [App\Http\Controllers\AutoGenerateFoodSpendController::class, 'index'])->name('daily_food_used');
Route::post('school_settings', [App\Http\Controllers\SchoolController::class, 'store'])->name('school_settings');
Route::post('include_auto_generate_food', [App\Http\Controllers\IncludeAutoGenerateController::class, 'includeAutogenerate'])->name('include_auto_generate_food');



});