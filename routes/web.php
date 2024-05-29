<?php
use App\Http\Controllers\AcademicclassController;
use App\Http\Controllers\ActivityController;
    use App\Http\Controllers\BehaviourController;
    use App\Http\Controllers\InternationalSchoolExportController;
    use App\Http\Controllers\PermissionController;
    use App\Http\Controllers\PreUniversityExportController;
    use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
    use App\Http\Controllers\TeacherController;
    use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectToNotFound;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware(RedirectToNotFound::class)->group(function () {
        Route::resource('/activities', ActivityController::class);
        Route::resource('/behaviours',BehaviourController::class);
        Route::resource('/classes', AcademicclassController::class);
        Route::get('/permission', [PermissionController::class,'index'])->name('permission.index');
        Route::resource('/role', RoleController::class);
        Route::resource('/students',StudentController::class);
        Route::post('students/addacademicclass/{student}',[StudentController::class,'addAcademicClass'])->name('student.addAcademicClass');
        Route::delete('students/removeacademicclass/{student}/{id}',[StudentController::class,'removeAcademicClass'])->name('student.removeAcademicClass');
        Route::get('students/addresults/{student}/{class}',[StudentController::class,'addResults'])->name('student.addResults');
        Route::resource('/subjects', SubjectController::class);
        Route::resource("/users", UserController::class);
    });

    Route::view('/documentation/addTeacherAndSign','documentations.addTeacherAndSign')->name('documentation.addTeacherAndSign');
    Route::view('/documentation/uploadTranscript','documentations.uploadTranscript')->name('documentation.uploadTranscript');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/teachers', TeacherController::class);

    Route::get('/export/international-school', [InternationalSchoolExportController::class,'index'])->name('export.international-school.index');
    Route::get('/export/international-school/academic-transcript', [InternationalSchoolExportController::class,'academictranscript'])->name('export.international-school.academic-transcript');
    Route::post('/export/international-school/academic-transcript-export', [InternationalSchoolExportController::class,'academictranscriptexport'])->name('export.international-school.academic-transcript-export');
    Route::get('/export/international-school/download/{file}', [InternationalSchoolExportController::class,'downloadExample'])->name('export.international-school.download');
    Route::get('/export/international-school/report-card', [InternationalSchoolExportController::class,'reportcard'])->name('export.international-school.report-card');
    Route::post('/export/international-school/report-card-export', [InternationalSchoolExportController::class,'reportcardExport'])->name('export.international-school.report-card-export');

    Route::get('/export/pre-university', [PreUniversityExportController::class,'index'])->name('export.pre-university.index');
    Route::get('/export/pre-university/reportcard', [PreUniversityExportController::class,'reportcard'])->name('export.pre-university.reportcard');
    Route::post('/export/pre-university/reportcard-export', [PreUniversityExportController::class,'reportcardExport'])->name('export.pre-university.reportcard-export');
    Route::get('/export/pre-university/download/{file}', [PreUniversityExportController::class,'downloadExample'])->name('export.pre-university.download');
});

    //Route::get('class/insert',function(){
    //    Subject::create([
    //        'name' => "Myanmar",
    //        'slug' => 'myanmar',
    //    ]);
    //    Activity::create([
    //       'name' => "Ncc",
    //       'slug' => 'ncc'
    //    ]);
    //    $class= AcademicClass::create([
    //        "name" => "Secondary1",
    //        "slug" => "s1",
    //        "startdate" => Carbon::now(),
    //        "enddate" => Carbon::now()
    //    ]);
    //    $subject = Subject::findOrFail(1);
    //    $class = AcademicClass::findOrFail(1);
    //    $subject->academicClasses()->save($class);
    //
    //    return "Data inserted";
    //});

require __DIR__.'/auth.php';
