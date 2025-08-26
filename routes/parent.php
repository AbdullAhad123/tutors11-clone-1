<?php

use App\Http\Controllers\Admin\MockCrudController;
use App\Http\Controllers\Admin\PracticeSetCrudController;
use App\Http\Controllers\Parent\AnalysisMasteryLevel;
use App\Http\Controllers\Parent\Attainment;
use App\Http\Controllers\Parent\ChangeChild;
use App\Http\Controllers\Parent\AddStudentToGroup;
use App\Http\Controllers\Parent\CurriculumController;
use App\Http\Controllers\Parent\MasteryLevel;
use App\Http\Controllers\Parent\ParentSetsController;
use App\Http\Controllers\Parent\PaymentController;
use App\Http\Controllers\Parent\PracticeDashboardController;
use App\Http\Controllers\Parent\ProgressController;
use App\Http\Controllers\Parent\QuestionAnalysis;
use App\Http\Controllers\Parent\SubscriptionController;
use App\Http\Controllers\Parent\TimeSpent;
use App\Http\Controllers\SwitchUserController;
use App\Http\Controllers\Admin\TagCrudController;
use App\Http\Controllers\Admin\SkillCrudController;
use App\Http\Controllers\Admin\PracticeSetQuestionController;
use App\Http\Controllers\Admin\UserCrudController;
use App\Http\Controllers\AuthConroller;
use App\Http\Controllers\ProfileUpdateController;
use Illuminate\Support\Facades\Route;
 
 
Route::get('/child-subscriptions', [SubscriptionController::class, 'index'])->name('child_subscriptions');
Route::get('/child-payments', [PaymentController::class, 'index'])->name('child_payments');
Route::get('/change-child', [ChangeChild::class, 'index'])->name('change_child');
Route::post('/change-child', [ChangeChild::class, 'change'])->name('child_changed');

Route::get('/add-student-to-group', [AddStudentToGroup::class, 'index'])->name('add_existing_student');
Route::post('/add-student-to-group', [AddStudentToGroup::class, 'add'])->name('add_student_to_group');
// Progress

Route::get('progress', [ProgressController::class, 'Progress'])->name('progress');
Route::get('/parent/journey-progress', [ProgressController::class, 'parentJourneyProgress'])->name('parent_journey_progress');
Route::get('/parent/my-journey', [ProgressController::class, 'myJourney'])->name('my_child_journey');
Route::get('progress/practice', [ProgressController::class, 'Practice'])->name('practices');
Route::get('progress/exams', [ProgressController::class, 'Exams'])->name('exams');
Route::get('progress/mocks', [ProgressController::class, 'Mocks'])->name('mocks');
Route::get('progress/quizzes', [ProgressController::class, 'Quizzes'])->name('quizzes');
Route::get('progress/assessment', [ProgressController::class, 'Assessment'])->name('assessment');
// Attainments
Route::get('attainments/exams', [Attainment::class, 'exams'])->name('exams_attainment');
Route::get('attainments/mocks', [Attainment::class, 'mocks'])->name('mocks_attainment');
Route::get('attainments/quizzes', [Attainment::class, 'quiz'])->name('quiz_attainment');
Route::get('attainments/practices', [Attainment::class, 'practice'])->name('practice_attainment');
// Time Spent
Route::get('time-spent/overall', [TimeSpent::class, 'overall'])->name('overall_time');
Route::get('time-spent/exams', [TimeSpent::class, 'exams'])->name('exams_time');
Route::get('time-spent/mocks', [TimeSpent::class, 'mocks'])->name('mocks_time');
Route::get('time-spent/quizzes', [TimeSpent::class, 'quizzes'])->name('quiz_time');
Route::get('time-spent/practices', [TimeSpent::class, 'practices'])->name('practice_time');
// Question Analysis
Route::get('question-analysis/exams', [QuestionAnalysis::class, 'exams'])->name('exams_question_analysis');
Route::get('question-analysis/mocks', [QuestionAnalysis::class, 'mocks'])->name('mocks_question_analysis');
Route::get('question-analysis/quizzes', [QuestionAnalysis::class, 'quizzes'])->name('quizzes_question_analysis');
Route::get('question-analysis/practices', [QuestionAnalysis::class, 'practices'])->name('practices_question_analysis');
// MasteryLevel
Route::get('/parent/mastery-level', [MasteryLevel::class, 'parentIndex'])->name('parent_mastery_level');
Route::get('/parent/journey-mastery-level', [MasteryLevel::class, 'parentJourneyIndex'])->name('parent_journey_mastery_level');
Route::get('answer-sheet/{s_id}/{u_id}', [AnalysisMasteryLevel::class,"index"])->name('answer_sheet');
Route::get('parent/performance/{id}', [MasteryLevel::class,"parentPerformance"])->name('parent_performance');
Route::get('parent/detailed-journey-performance', [MasteryLevel::class,"parentJourneyPerformance"])->name('parent_journey_performance');
// Curriculum
Route::get('curriculum/exams', [CurriculumController::class,"exams"])->name('curriculum_exam');
Route::get('curriculum/mocks', [CurriculumController::class,"mocks"])->name('curriculum_mock');
Route::get('curriculum/practices', [CurriculumController::class,"practices"])->name('curriculum_practice');
Route::get('curriculum/quizzes', [CurriculumController::class,"quizzes"])->name('curriculum_quiz');
// Parent Sets
Route::get('parent-set/section', [PracticeDashboardController::class,"section"])->name('parent_set_section');
Route::get('parent-set/skills/{category:slug}/{section}', [PracticeDashboardController::class, 'skill'])->name('parent_set_skill');

Route::get('parent-set/{category:slug}/{section:slug}/{skill}/practice-sets', [ParentSetsController::class, 'practice'])->name('practice_parent_set');
Route::get('parent/practice-sets', [PracticeSetCrudController::class,"parentCreate"])->name("parent_practice_sets_create");
Route::get('mock-sets', [MockCrudController::class,"create"])->name("mock_sets_create");

Route::get('parent-set/settings/practice/{p_id}', [ParentSetsController::class,"practice_settings"])->name('practice_settings_parent_set');
Route::post('parent-set/add/practice', [ParentSetsController::class,"practice_add"])->name('practice_add_parent_set');
Route::get('parent-set/delete/practice/{p_id}', [ParentSetsController::class,"practice_delete"])->name('practice_delete_parent_set');



Route::get('parent_set/mock', [ParentSetsController::class, 'mock'])->name('parent_set_mock_test');
Route::get('parent-set/mock/{type:slug}', [ParentSetsController::class, 'mocksByType'])->name('parent_set_mocks_by_type');
Route::get('parent-set/fetch-mock-by/{type:slug}', [ParentSetsController::class, 'fetchMocksByType'])->name('parent_set_fetch_mocks_by_type');
Route::get('parent-set/live-mock', [ParentSetsController::class, 'liveMocks'])->name('parent_set_live_mocks');
Route::get('parent-set/fetch-live-mock', [ParentSetsController::class, 'fetchLiveMocks'])->name('parent_set_fetch_live_mocks');
Route::get('parent-set/settings/mock/{m_id}', [ParentSetsController::class,"mock_settings"])->name('mock_settings_parent_set');
Route::post('parent-set/add/mock', [ParentSetsController::class,"mock_add"])->name('mock_add_parent_set');
Route::get('parent-set/delete/mock/{m_id}', [ParentSetsController::class,"mock_delete"])->name('mock_delete_parent_set');


// Switch to Parent
Route::get('switch-to-child', [SwitchUserController::class,"SwitchUser"])->name('SwitchToChild');
// get Selected Child
Route::post('get-selected-child', [ChangeChild::class,"getSelectedChild"])->name('getSelectedChild');
// create student account
Route::get('create-student-account', [ChangeChild::class,"createNewChild"])->name('create_new_child');

// Practice Sets
Route::get('/parent-search_skills', [SkillCrudController::class, 'search'])->name('parent_search_skills');
Route::resource('/parent-practice-sets', PracticeSetCrudController::class);
Route::get('/parent/practice-sets/{practice_set}/settings', [PracticeSetCrudController::class, 'settings'])->name('parent-practice-sets.settings');
Route::post('/parent-practice-sets/{practice_set}/settings', [PracticeSetCrudController::class, 'updateSettings'])->name('parent-practice-sets.settings.update');
Route::post('/parent-practice-sets/{practice_set}/add-questions', [PracticeSetQuestionController::class, 'addQuestions'])->name('parent-practice-sets.add_questions');
Route::get('/parent-fetchIndex/practice-sets/{practice_set}/questions', [PracticeSetQuestionController::class, 'fetchIndex'])->name('parent-practice-sets.fetchIndex');
Route::get('/parent/practice/practice-sets/{practice_set}/questions', [PracticeSetQuestionController::class, 'parentIndex'])->name('parent-practice-sets.questions');
Route::get('/parent-practice-sets/{practice_set}/fetch-questions', [PracticeSetQuestionController::class, 'fetchQuestions'])->name('parent-practice-sets.fetch_questions');
Route::get('/parent-practice-sets/{practice_set}/fetch-available-questions', [PracticeSetQuestionController::class, 'fetchAvailableQuestions'])->name('parent-practice-sets.fetch_available_questions');
Route::post('/parent-practice-sets/{practice_set}/add-question', [PracticeSetQuestionController::class, 'addQuestion'])->name('parent-practice-sets.add_question');
Route::post('/parent-practice-sets/{practice_set}/remove-question', [PracticeSetQuestionController::class, 'removeQuestion'])->name('parent-practice-sets.remove_question');
Route::get('/parent-search_tags', [TagCrudController::class, 'search'])->name('parent-search_tags');

Route::post('/create-child', [ ChangeChild::class, 'createChild' ])->name('create_child');

Route::get('/parent/profile', [AuthConroller::class, 'profile'])->name('parent-profile');

Route::post('/parent/profile/update_profile_details', [ ProfileUpdateController::class, 'Profile_Detail_Update' ])->name('profile_detail_update');

// Route::post('/parent/profile/update_password_details', [ ProfileUpdateController::class, 'Password_Detail_Update' ])->name('password_detail_update');
Route::post('/parent/profile/update', [ ProfileUpdateController::class, 'ProfileUpdate' ])->name('profile.update');
Route::post('/parent/profile/updatepassword', [ ProfileUpdateController::class, 'Updatepassword' ])->name('profile.update-password');
Route::post('/parent/profile/remove-photo', [ ProfileUpdateController::class, 'RemoveProfilePhoto' ])->name('profile.remove-photo');



?>
