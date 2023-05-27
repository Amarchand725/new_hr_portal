<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/logout', [AdminController::class, 'logOut'])->name('user.logout');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/departments', [AdminController::class, 'departments'])->name('departments');
    Route::get('/calendar', [AdminController::class, 'calendar'])->name('calendar');

    Route::get('/designations/trashed', [App\Http\Controllers\Admin\DesignationController::class, 'trashed'])->name('designations.trashed');
    Route::get('/designations/restore/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'restore'])->name('designations.restore');

    Route::get('/employment_status/trashed', [App\Http\Controllers\Admin\EmploymentStatusController::class, 'trashed'])->name('employment_status.trashed');
    Route::get('/employment_status/restore/{id}', [App\Http\Controllers\Admin\EmploymentStatusController::class, 'restore'])->name('employment_status.restore');

    Route::get('/positions/trashed', [App\Http\Controllers\Admin\PositionController::class, 'trashed'])->name('positions.trashed');
    Route::get('/positions/restore/{id}', [App\Http\Controllers\Admin\PositionController::class, 'restore'])->name('positions.restore');

    Route::get('/work_shifts/trashed', [App\Http\Controllers\Admin\WorkShiftController::class, 'trashed'])->name('work_shifts.trashed');
    Route::get('/work_shifts/restore/{id}', [App\Http\Controllers\Admin\WorkShiftController::class, 'restore'])->name('work_shifts.restore');

    Route::get('/departments/trashed', [App\Http\Controllers\Admin\DepartmentController::class, 'trashed'])->name('departments.trashed');
    Route::get('/departments/restore/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'restore'])->name('departments.restore');
    Route::get('/departments/status/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'status'])->name('departments.status');
    Route::get('/departments/add-manager/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'addManager'])->name('departments.add-manager');
    Route::get('/departments/add-shift/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'addShift'])->name('departments.add-shift');

    Route::get('/bank_accounts/status/{id}', [App\Http\Controllers\Admin\BankAccountController::class, 'status'])->name('bank_accounts.status');

    Route::get('/employees/trashed', [App\Http\Controllers\Admin\EmployeeController::class, 'trashed'])->name('employees.trashed');
    Route::get('/employees/restore/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'restore'])->name('employees.restore');
    Route::post('/employees/status/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'status'])->name('employees.status');
    Route::post('/employees/add_salary', [App\Http\Controllers\Admin\EmployeeController::class, 'addSalary'])->name('employees.add_salary');
    Route::get('/employees/salary_details', [App\Http\Controllers\Admin\EmployeeController::class, 'salaryDetails'])->name('employees.salary_details');
    Route::get('/employees/filter-salary-details', [App\Http\Controllers\Admin\EmployeeController::class, 'filterSalaryDetails'])->name('employees.filter-salary-details');
    Route::get('/employees/get-team-members/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'getTeamMembers'])->name('employees.get-team-members');
    Route::get('/employees/teams-members/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'teamMembers'])->name('employees.team-members');

    Route::get('/announcements/trashed', [App\Http\Controllers\Admin\AnnouncementController::class, 'trashed'])->name('announcements.trashed');
    Route::get('/announcements/restore/{id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'restore'])->name('announcements.restore');

    Route::get('/leave_types/trashed', [App\Http\Controllers\Admin\LeaveTypeController::class, 'trashed'])->name('leave_types.trashed');
    Route::get('/leave_types/restore/{id}', [App\Http\Controllers\Admin\LeaveTypeController::class, 'restore'])->name('leave_types.restore');

    Route::get('/profile_cover_images/trashed', [App\Http\Controllers\Admin\ProfileCoverImageController::class, 'trashed'])->name('profile_cover_images.trashed');
    Route::get('/profile_cover_images/restore/{id}', [App\Http\Controllers\Admin\ProfileCoverImageController::class, 'restore'])->name('profile_cover_images.restore');
    Route::get('/profile_cover_images/status/{id}', [App\Http\Controllers\Admin\ProfileCoverImageController::class, 'status'])->name('profile_cover_images.status');

    Route::get('/user_leaves/report', [App\Http\Controllers\UserLeaveController::class, 'leaveReport'])->name('user_leaves.report');
    Route::get('/user_leaves/show/{id}', [App\Http\Controllers\UserLeaveController::class, 'show'])->name('user_leaves.show');
    Route::get('/user_leaves/status/{id}', [App\Http\Controllers\UserLeaveController::class, 'status'])->name('user_leaves.status');

    Route::get('/user/attendance/summary', [App\Http\Controllers\AttendanceController::class, 'summary'])->name('user.attendance.summary');
    Route::get('/user/discrepancies', [App\Http\Controllers\AttendanceController::class, 'discrepancies'])->name('user.discrepancies');
    Route::get('/user/discrepancies/show/{id}', [App\Http\Controllers\AttendanceController::class, 'show'])->name('user.discrepancies.show');
    Route::get('/user/attendance/daily-log', [App\Http\Controllers\AttendanceController::class, 'dailyLog'])->name('user.attendance.daily-log');

    //team
    Route::get('/team/attendance/daily-log', [App\Http\Controllers\AttendanceController::class, 'teamDailyLog'])->name('team.attendance.daily-log');
    Route::get('/team/attendance/discrepancies', [App\Http\Controllers\AttendanceController::class, 'teamDiscrepancies'])->name('team.attendance.discrepancies');
    Route::get('/team/attendance/get-discrepancies', [App\Http\Controllers\AttendanceController::class, 'getDiscrepancies'])->name('team.attendance.get-discrepancies');

    Route::get('/team/leave-requests/{id}', [App\Http\Controllers\Admin\TeamController::class, 'leaveRequests'])->name('team.leave-requests');
    Route::get('/team/leave-reports/{id}', [App\Http\Controllers\Admin\TeamController::class, 'leaveReports'])->name('team.leave-reports');

    Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('/designations', App\Http\Controllers\Admin\DesignationController::class);
    Route::resource('/positions', App\Http\Controllers\Admin\PositionController::class);
    Route::resource('/work_shifts', App\Http\Controllers\Admin\WorkShiftController::class);
    Route::resource('/departments', App\Http\Controllers\Admin\DepartmentController::class);
    Route::resource('/announcements', App\Http\Controllers\Admin\AnnouncementController::class);
    Route::resource('/employment_status', App\Http\Controllers\Admin\EmploymentStatusController::class);
    Route::resource('/employees', App\Http\Controllers\Admin\EmployeeController::class);
    Route::resource('/profile_cover_images', App\Http\Controllers\Admin\ProfileCoverImageController::class);
    Route::resource('/bank_details', App\Http\Controllers\Admin\BankDetailController::class);
    Route::resource('/bank_accounts', App\Http\Controllers\Admin\BankAccountController::class);
    Route::resource('/user_contacts', App\Http\Controllers\Admin\UserContactController::class);
    Route::resource('/settings', App\Http\Controllers\Admin\SettingController::class);
    Route::resource('/leave_types', App\Http\Controllers\Admin\LeaveTypeController::class);
    Route::resource('/user_leaves', App\Http\Controllers\UserLeaveController::class);
});

require __DIR__.'/auth.php';
