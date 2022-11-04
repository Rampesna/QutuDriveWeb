<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication')->group(function () {
    Route::post('login', [\App\Http\Controllers\Api\User\UserController::class, 'login'])->name('user.api.login');
//    Route::post('sendPasswordResetEmail', [\App\Http\Controllers\Api\User\UserController::class, 'sendPasswordResetEmail'])->name('api.user.sendPasswordResetEmail');
//    Route::post('resetPassword', [\App\Http\Controllers\Api\User\UserController::class, 'resetPassword'])->name('api.user.resetPassword');
});

Route::middleware([
    'auth:user_api',
])->group(function () {

    Route::get('getCompanies', [\App\Http\Controllers\Api\User\UserController::class, 'getCompanies'])->name('user.api.getCompanies');
    Route::post('checkPassword', [\App\Http\Controllers\Api\User\UserController::class, 'checkPassword'])->name('user.api.checkPassword');

    Route::prefix('project')->group(function () {
        Route::get('index', [\App\Http\Controllers\Api\User\ProjectController::class, 'index'])->name('user.api.project.index');
        Route::get('getById', [\App\Http\Controllers\Api\User\ProjectController::class, 'getById'])->name('user.api.project.getById');
        Route::get('getAllTasks', [\App\Http\Controllers\Api\User\ProjectController::class, 'getAllTasks'])->name('user.api.project.getAllTasks');
        Route::get('getSubtasksByProjectId', [\App\Http\Controllers\Api\User\ProjectController::class, 'getSubtasksByProjectId'])->name('user.api.project.getSubtasksByProjectId');
        Route::get('getBoardsByProjectId', [\App\Http\Controllers\Api\User\ProjectController::class, 'getBoardsByProjectId'])->name('user.api.project.getBoardsByProjectId');
        Route::get('getUsersByProjectId', [\App\Http\Controllers\Api\User\ProjectController::class, 'getUsersByProjectId'])->name('user.api.project.getUsersByProjectId');
        Route::post('setUsersByProjectId', [\App\Http\Controllers\Api\User\ProjectController::class, 'setUsersByProjectId'])->name('user.api.project.setUsersByProjectId');
        Route::post('create', [\App\Http\Controllers\Api\User\ProjectController::class, 'create'])->name('user.api.project.create');
        Route::put('update', [\App\Http\Controllers\Api\User\ProjectController::class, 'update'])->name('user.api.project.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\ProjectController::class, 'delete'])->name('user.api.project.delete');
    });

    Route::prefix('projectStatus')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\ProjectStatusController::class, 'getAll'])->name('user.api.projectStatus.getAll');
    });

    Route::prefix('task')->group(function () {
        Route::get('getById', [\App\Http\Controllers\Api\User\TaskController::class, 'getById'])->name('user.api.task.getById');
        Route::get('getFilesById', [\App\Http\Controllers\Api\User\TaskController::class, 'getFilesById'])->name('user.api.task.getFilesById');
        Route::get('getSubTasksById', [\App\Http\Controllers\Api\User\TaskController::class, 'getSubTasksById'])->name('user.api.task.getSubTasksById');
        Route::get('getCommentsById', [\App\Http\Controllers\Api\User\TaskController::class, 'getCommentsById'])->name('user.api.task.getCommentsById');
        Route::post('create', [\App\Http\Controllers\Api\User\TaskController::class, 'create'])->name('user.api.task.create');
        Route::put('updateBoard', [\App\Http\Controllers\Api\User\TaskController::class, 'updateBoard'])->name('user.api.task.updateBoard');
        Route::put('updateOrder', [\App\Http\Controllers\Api\User\TaskController::class, 'updateOrder'])->name('user.api.task.updateOrder');
        Route::put('updateByParameters', [\App\Http\Controllers\Api\User\TaskController::class, 'updateByParameters'])->name('user.api.task.updateByParameters');
        Route::delete('delete', [\App\Http\Controllers\Api\User\TaskController::class, 'delete'])->name('user.api.task.delete');
    });

    Route::prefix('board')->group(function () {
        Route::post('create', [\App\Http\Controllers\Api\User\BoardController::class, 'create'])->name('user.api.board.create');
        Route::put('updateName', [\App\Http\Controllers\Api\User\BoardController::class, 'updateName'])->name('user.api.board.updateName');
        Route::put('updateOrder', [\App\Http\Controllers\Api\User\BoardController::class, 'updateOrder'])->name('user.api.board.updateOrder');
        Route::delete('delete', [\App\Http\Controllers\Api\User\BoardController::class, 'delete'])->name('user.api.board.delete');
    });

    Route::prefix('subTask')->group(function () {
        Route::get('getByProjectId', [\App\Http\Controllers\Api\User\SubTaskController::class, 'getByProjectId'])->name('user.api.subTask.getByProjectId');
        Route::get('getByProjectIds', [\App\Http\Controllers\Api\User\SubTaskController::class, 'getByProjectIds'])->name('user.api.subTask.getByProjectIds');
        Route::post('create', [\App\Http\Controllers\Api\User\SubTaskController::class, 'create'])->name('user.api.subTask.create');
        Route::put('update', [\App\Http\Controllers\Api\User\SubTaskController::class, 'update'])->name('user.api.subTask.update');
        Route::put('setChecked', [\App\Http\Controllers\Api\User\SubTaskController::class, 'setChecked'])->name('user.api.subTask.setChecked');
        Route::delete('delete', [\App\Http\Controllers\Api\User\SubTaskController::class, 'delete'])->name('user.api.subTask.delete');
    });

    Route::prefix('taskPriority')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\TaskPriorityController::class, 'getAll'])->name('user.api.taskPriority.getAll');
    });

    Route::prefix('note')->group(function () {
        Route::get('getByDateBetween', [\App\Http\Controllers\Api\User\NoteController::class, 'getByDateBetween'])->name('user.api.note.getByDateBetween');
        Route::get('getById', [\App\Http\Controllers\Api\User\NoteController::class, 'getById'])->name('user.api.note.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\NoteController::class, 'create'])->name('user.api.note.create');
        Route::put('update', [\App\Http\Controllers\Api\User\NoteController::class, 'update'])->name('user.api.note.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\NoteController::class, 'delete'])->name('user.api.note.delete');
    });

    Route::prefix('generalNote')->group(function () {
        Route::get('index', [\App\Http\Controllers\Api\User\GeneralNoteController::class, 'index'])->name('user.api.generalNote.index');
        Route::get('getById', [\App\Http\Controllers\Api\User\GeneralNoteController::class, 'getById'])->name('user.api.generalNote.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\GeneralNoteController::class, 'create'])->name('user.api.generalNote.create');
        Route::put('update', [\App\Http\Controllers\Api\User\GeneralNoteController::class, 'update'])->name('user.api.generalNote.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\GeneralNoteController::class, 'delete'])->name('user.api.generalNote.delete');
    });

    Route::prefix('form')->group(function () {
        Route::get('getByCompanyId', [\App\Http\Controllers\Api\User\FormController::class, 'getByCompanyId'])->name('user.api.form.getByCompanyId');
        Route::get('getById', [\App\Http\Controllers\Api\User\FormController::class, 'getById'])->name('user.api.form.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\FormController::class, 'create'])->name('user.api.form.create');
        Route::put('update', [\App\Http\Controllers\Api\User\FormController::class, 'update'])->name('user.api.form.update');
        Route::put('updateAccessible', [\App\Http\Controllers\Api\User\FormController::class, 'updateAccessible'])->name('user.api.form.updateAccessible');
        Route::post('createFormQuestions', [\App\Http\Controllers\Api\User\FormController::class, 'createFormQuestions'])->name('user.api.form.createFormQuestions');
        Route::delete('delete', [\App\Http\Controllers\Api\User\FormController::class, 'delete'])->name('user.api.form.delete');
        Route::get('getShareLink', [\App\Http\Controllers\Api\User\FormController::class, 'getShareLink'])->name('user.api.form.getShareLink');
    });

    Route::prefix('formQuestion')->group(function () {
        Route::get('getByFormIdWithAnswers', [\App\Http\Controllers\Api\User\FormQuestionController::class, 'getByFormIdWithAnswers'])->name('user.api.formQuestion.getByFormIdWithAnswers');
    });

    Route::prefix('formSubmit')->group(function () {
        Route::get('getByFormId', [\App\Http\Controllers\Api\User\FormSubmitController::class, 'getByFormId'])->name('user.api.formSubmit.getByFormId');
    });

    Route::prefix('password')->group(function () {
        Route::get('index', [\App\Http\Controllers\Api\User\PasswordController::class, 'index'])->name('user.api.password.index');
        Route::get('getById', [\App\Http\Controllers\Api\User\PasswordController::class, 'getById'])->name('user.api.password.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\PasswordController::class, 'create'])->name('user.api.password.create');
        Route::put('update', [\App\Http\Controllers\Api\User\PasswordController::class, 'update'])->name('user.api.password.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\PasswordController::class, 'delete'])->name('user.api.password.delete');
    });

    Route::prefix('file')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\FileController::class, 'getAll'])->name('user.api.file.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\FileController::class, 'getById'])->name('user.api.file.getById');
        Route::get('getByRelation', [\App\Http\Controllers\Api\User\FileController::class, 'getByRelation'])->name('user.api.file.getByRelation');
        Route::post('upload', [\App\Http\Controllers\Api\User\FileController::class, 'upload'])->name('user.api.file.upload');
        Route::post('uploadBatch', [\App\Http\Controllers\Api\User\FileController::class, 'uploadBatch'])->name('user.api.file.uploadBatch');
        Route::get('download', [\App\Http\Controllers\Api\User\FileController::class, 'download'])->name('user.api.file.download');
        Route::put('updateDirectoryId', [\App\Http\Controllers\Api\User\FileController::class, 'updateDirectoryId'])->name('user.api.file.updateDirectoryId');
        Route::delete('delete', [\App\Http\Controllers\Api\User\FileController::class, 'delete'])->name('user.api.file.delete');

        Route::get('getDatabaseBackups', [\App\Http\Controllers\Api\User\FileController::class, 'getDatabaseBackups'])->name('user.api.file.getDatabaseBackups');
    });

    Route::prefix('directory')->group(function () {
        Route::get('getByParentId', [\App\Http\Controllers\Api\User\DirectoryController::class, 'getByParentId'])->name('user.api.directory.getByParentId');
        Route::post('create', [\App\Http\Controllers\Api\User\DirectoryController::class, 'create'])->name('user.api.directory.create');
        Route::put('rename', [\App\Http\Controllers\Api\User\DirectoryController::class, 'rename'])->name('user.api.directory.rename');
        Route::put('updateParentId', [\App\Http\Controllers\Api\User\DirectoryController::class, 'updateParentId'])->name('user.api.directory.updateParentId');
        Route::delete('delete', [\App\Http\Controllers\Api\User\DirectoryController::class, 'delete'])->name('user.api.directory.delete');
    });

    Route::prefix('comment')->group(function () {
        Route::get('getByRelation', [\App\Http\Controllers\Api\User\CommentController::class, 'getByRelation'])->name('user.api.comment.getByRelation');
        Route::post('create', [\App\Http\Controllers\Api\User\CommentController::class, 'create'])->name('user.api.comment.create');
    });

    Route::prefix('syncklasorler')->group(function () {
        Route::get('getByCompanyId', [\App\Http\Controllers\Api\User\SyncKlasorlerController::class, 'getByCompanyId'])->name('user.api.syncklasorler.getByCompanyId');
    });

    Route::prefix('syncdosyahareket')->group(function () {
        Route::get('getBySunucuKlasorId', [\App\Http\Controllers\Api\User\SyncDosyaHareketController::class, 'getBySunucuKlasorId'])->name('user.api.syncdosyahareket.getBySunucuKlasorId');
    });

    Route::prefix('edefterdonemler')->group(function () {
        Route::get('getEDefterDonem', [\App\Http\Controllers\Api\User\EDefterDonemlerController::class, 'getEDefterDonem'])->name('user.api.edefterdonemler.getEDefterDonem');
    });

    Route::prefix('edefterdosyalar')->group(function () {
        Route::get('getByDonemId', [\App\Http\Controllers\Api\User\EDefterDosyalarController::class, 'getByDonemId'])->name('user.api.edefterdosyalar.getByDonemId');
    });

    Route::prefix('backupdosyalar')->group(function () {
        Route::get('getByCompanyId', [\App\Http\Controllers\Api\User\BackupDosyalarController::class, 'getByCompanyId'])->name('user.api.backupdosyalar.getByCompanyId');
    });
});
