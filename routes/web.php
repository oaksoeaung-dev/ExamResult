<?php

use App\Http\Controllers\AcademicclassController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BehaviourController;
use App\Http\Controllers\HealthrecordController;
use App\Http\Controllers\InternationalSchoolExportController;
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

//Start Public Route
Route::get('/healthrecords/student/{studentId}', [HealthrecordController::class, 'qrShow'])->name('healthrecords.student.qrShow');
//End Public Route

Route::middleware('auth')->group(function () {
    Route::middleware(RedirectToNotFound::class)->group(function () {
        Route::resource('/activities', ActivityController::class);

        Route::resource('/behaviours', BehaviourController::class);

        Route::resource('/classes', AcademicclassController::class);

        Route::resource('/subjects', SubjectController::class);
    });

    Route::middleware("can:AdminOrActive")->group(function () {
        Route::prefix("/documentation")->name("documentation.")->group(function(){
            Route::view('/addTeacherAndSign', 'documentations.howToAddTeacherAndSign')->name('addTeacherAndSign');
            Route::view('/uploadTranscript', 'documentations.uploadTranscript')->name('uploadTranscript');
            Route::view('/howToCreateGovernmentReportCard', 'documentations.howToCreateGovernmentReportCard')->name('howToCreateGovernmentReportCard');
            Route::view('/howToCreateCambridgeReportCard', 'documentations.howToCreateCambridgeReportCard')->name('howToCreateCambridgeReportCard');
        });

        // International School
        Route::prefix("export/internationalSchool")->name("export.internationalSchool")->group(function () {
            Route::get('/', [InternationalSchoolExportController::class, 'index']);

            Route::get('download/{file}', [InternationalSchoolExportController::class, 'downloadExample'])->name('.download');

            Route::prefix("academicTranscript")->name(".academicTranscript")->group(function () {
                Route::get('/uploadFile', [InternationalSchoolExportController::class, 'academicTranscript'])->name('.uploadFile');
                Route::post('/generate', [InternationalSchoolExportController::class, 'academicTranscriptExport'])->name('.generate');
            });

            Route::prefix("reportCard")->name(".reportCard")->group(function () {
                Route::prefix("cambridge")->name(".cambridge")->group(function () {
                    Route::get('uploadFile', [InternationalSchoolExportController::class, 'cambridgeReportCard'])->name('.uploadFile');
                    Route::post('generate', [InternationalSchoolExportController::class, 'cambridgeReportCardExport'])->name('.generate');
                });

                Route::prefix("government")->name(".government")->group(function () {
                    Route::get('uploadFile', [InternationalSchoolExportController::class, 'governmentReportcard'])->name('.uploadFile');
                    Route::post('generate', [InternationalSchoolExportController::class, 'governmentReportcardExport'])->name('.generate');
                });
            });
        });


        // Pre University
        Route::prefix("export/preUniversity")->name("export.preUniversity")->group(function () {
            Route::get('/', [PreUniversityExportController::class, 'index']);

            Route::get('/download/{file}', [PreUniversityExportController::class, 'downloadExample'])->name('.download');

            Route::prefix("reportCard")->name(".reportCard")->group(function () {
                Route::get('/uploadFile', [PreUniversityExportController::class, 'reportCard'])->name('.uploadFile');
                Route::post('/generate', [PreUniversityExportController::class, 'reportCardExport'])->name('.generate');
            });

            Route::prefix("certificate")->name(".certificate")->group(function () {
                Route::get('/uploadFile', [PreUniversityExportController::class, 'certificate'])->name('.uploadFile');
                Route::post('/generate', [PreUniversityExportController::class, 'certificateExport'])->name('.generate');
            });

        });


        Route::resource('/healthrecords', HealthrecordController::class);
        Route::get('/healthrecords/viewqr/{healthrecord}', [HealthrecordController::class, 'viewQr'])->name('healthrecords.viewqr');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('/role', RoleController::class);

        Route::resource('/students', StudentController::class);
        Route::post('students/addacademicclass/{student}', [StudentController::class, 'addAcademicClass'])->name('student.addAcademicClass');
        Route::delete('students/removeacademicclass/{student}/{id}', [StudentController::class, 'removeAcademicClass'])->name('student.removeAcademicClass');
        Route::get('students/addresults/{student}/{class}', [StudentController::class, 'addResults'])->name('student.addResults');

        Route::resource('/teachers', TeacherController::class);

        Route::resource("/users", UserController::class);
    });
});

require __DIR__ . '/auth.php';
