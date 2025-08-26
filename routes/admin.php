<?php

/** 
 * File name: admin.php
 * Last modified: 20/07/21, 2:27 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */ 

use App\Http\Controllers\Admin\UserGroupCrudController;
use App\Http\Controllers\Admin\UserCrudController;
use App\Http\Controllers\Admin\PracticeSetCrudController;
use App\Http\Controllers\Admin\JourneySetCrudController;
use App\Http\Controllers\Admin\CategoryCrudController;
use App\Http\Controllers\Admin\SubCategoryCrudController;
use App\Http\Controllers\Admin\SectionCrudController;
use App\Http\Controllers\Admin\SkillCrudController;
use App\Http\Controllers\Admin\TopicCrudController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\QuestionCrudController;
use App\Http\Controllers\Admin\ComprehensionCrudController;
use App\Http\Controllers\Admin\QuestionTypeController;
use App\Http\Controllers\Admin\QuestionImportController;
use App\Http\Controllers\Admin\QuizCrudController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PracticeSetQuestionController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\Admin\QuizScheduleCrudController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\AvatarController;
use App\Http\Controllers\Admin\QuizAnalyticsController;
use App\Http\Controllers\Admin\PracticeAnalyticsController;
use App\Http\Controllers\AppUpdateController;
use App\Http\Controllers\AuthConroller;
use App\Http\Controllers\Admin\HomePageSettingController;
use App\Http\Controllers\Admin\QuizTypeCrudController;
use App\Http\Controllers\Admin\TagCrudController;
use App\Http\Controllers\Admin\LessonCrudController;
use App\Http\Controllers\Admin\VideoCrudController;
use App\Http\Controllers\Admin\PracticeLessonController;
use App\Http\Controllers\Admin\PracticeVideoController;
use App\Http\Controllers\Admin\PlanCrudController;
use App\Http\Controllers\Admin\PaymentCrudController;
use App\Http\Controllers\Admin\SubscriptionCrudController;
use App\Http\Controllers\Admin\ExamTypeCrudController;
use App\Http\Controllers\Admin\ExamCrudController;
use App\Http\Controllers\Admin\ExamQuestionController;
use App\Http\Controllers\Admin\ExamScheduleCrudController;
use App\Http\Controllers\Admin\ExamAnalyticsController;
use App\Http\Controllers\Admin\MockSectionCrudController;
use App\Http\Controllers\Admin\MockTypeCrudController;
use App\Http\Controllers\Admin\MockCrudController;
use App\Http\Controllers\Admin\MockQuestionController;
use App\Http\Controllers\Admin\AssessmentQuestionController;
use App\Http\Controllers\Admin\MockScheduleCrudController;
use App\Http\Controllers\Admin\MockAnalyticsController;
use App\Http\Controllers\Admin\ExamSectionCrudController;
use App\Http\Controllers\Admin\AssessmentCrudController;
use App\Http\Controllers\Admin\AssessmentAnalyticsController;
use App\Http\Controllers\Admin\AssessmentSectionCrudController;
use App\Http\Controllers\User\PracticeController;
use App\Http\Controllers\Admin\DocController;
use App\Http\Controllers\Admin\ErrorController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\SchoolCrudController;
use App\Http\Controllers\Admin\RegionCrudController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');
  Route::get('/profile', [AuthConroller::class, 'profile'])->name('admin-profile');
  /*
    |--------------------------------------------------------------------------
    | CRUD Routes$2y$12$EsQJ4HfuCWQNgx/OVL9EJ.qeHc3sXi1/MEJo3cuKyAHhPXzeAiFnKc
    |--------------------------------------------------------------------------
    */
  Route::resource('users', UserCrudController::class);
  Route::post('user/login/{id}', [UserCrudController::class, 'adminUserLogin'])->name('admin_user_login');
  Route::post('users/{user}', [UserCrudController::class, "update"]);
  Route::post('users-chart-report', [UserCrudController::class, 'userChartReport'])->name('user_chart_report');
  Route::resource('user-groups', UserGroupCrudController::class);
  Route::resource('categories', CategoryCrudController::class);
  Route::resource('sections', SectionCrudController::class);
  Route::resource('skills', SkillCrudController::class);
  Route::resource('topics', TopicCrudController::class);
  Route::resource('comprehensions', ComprehensionCrudController::class);
  Route::resource('quiz-types', QuizTypeCrudController::class);
  Route::resource('exam-types', ExamTypeCrudController::class);
  Route::resource('mock-types', MockTypeCrudController::class);
  Route::resource('tags', TagCrudController::class);

  Route::resource('sub-categories', SubCategoryCrudController::class);
  Route::get('sub-categories/{id}/map-section', [SubCategoryCrudController::class, 'fetchSections'])->name('fetch_sub_category_sections');
  Route::post('update_sub_category_sections/{id}', [SubCategoryCrudController::class, 'updateSections'])->name('update_sub_category_sections');
  /*
    |--------------------------------------------------------------------------
    | Payment & Subscription Routes
    |--------------------------------------------------------------------------
    */
  Route::resource('payments', PaymentCrudController::class);
  Route::resource('subscriptions', SubscriptionCrudController::class);
  Route::get('subscriptions/{id}/details', [SubscriptionCrudController::class, 'details'])->name('details');
  Route::post('authorize-bank-payment/{id}', [PaymentCrudController::class, 'authorizeBankPayment'])->name('authorize_bank_payment');

  /*
    |--------------------------------------------------------------------------
    | Question Routes
    |--------------------------------------------------------------------------
    */
  Route::resource('questions', QuestionCrudController::class);
  Route::get('bulk-question-editor', [QuestionCrudController::class, 'BulkQuestionEditor'])->name('BulkQuestionEditor');
  Route::get('approved-qustion', [QuestionCrudController::class, 'ApprovedQuestion'])->name('approved_question');
  Route::get('approve-questions', [QuestionCrudController::class, 'ApproveQuestions'])->name('approve_questions');
  Route::post('fetch-yet-to-approve-questions', [QuestionCrudController::class, 'fetchYetToApproveQuestions'])->name('fetch_yet_to_approve_questions');
  Route::post('refreash-approve-questions', [QuestionCrudController::class, 'refreashApproveQuestions'])->name('refreash_approve_questions');
  Route::post('approve-question-id/{id}', [QuestionCrudController::class, 'approveQuestionId'])->name('approve_question_id');
  Route::post('reject-question-id/{id}', [QuestionCrudController::class, 'rejectQuestionId'])->name('reject_question_id');
  Route::post('prev-question-id/{id}', [QuestionCrudController::class, 'prevQuestionId'])->name('prev_question_id');
  Route::post('next-question-id/{id}', [QuestionCrudController::class, 'nextQuestionId'])->name('next_question_id');
  Route::get('not-approved-qustion', [QuestionCrudController::class, 'NotApprovedQuestion'])->name('not_approved_question');
  Route::get('questions/{id}/approve', [QuestionCrudController::class, 'QuestionApprove'])->name('QuestionApprove');
  Route::get('questions/{id}/cloneQuestion', [QuestionCrudController::class, 'cloneQuestion'])->name('cloneQuestion');
  Route::post('questions/{id}/approve', [QuestionCrudController::class, 'updateQuestionApprove'])->name('update_question_approve');
  Route::get('questions/{id}/preview', [QuestionCrudController::class, 'preview'])->name('preview');
  Route::post('questions/{id}/{skill_id}/skill_update', [QuestionCrudController::class, 'skillUpdate'])->name('skill_update');
  Route::get('question/{id}/topic', [QuestionCrudController::class, 'getTopic'])->name('get_topic');
  Route::get('questions/{id}/settings', [QuestionCrudController::class, 'settings'])->name('question_settings');
  Route::post('questions/{id}/settings', [QuestionCrudController::class, 'updateSettings'])->name('update_question_settings');
  Route::post('question/update/topic/{id}/{topic}', [QuestionCrudController::class, 'updateTopic'])->name('update_question_topic');
  Route::get('questions/{id}/solution', [QuestionCrudController::class, 'solution'])->name('question_solution');
  Route::post('questions/{id}/solution', [QuestionCrudController::class, 'updateSolution'])->name('update_question_solution');
  Route::get('questions/{id}/attachment', [QuestionCrudController::class, 'attachment'])->name('question_attachment');
  Route::post('questions/{id}/attachment', [QuestionCrudController::class, 'updateAttachment'])->name('update_question_attachment');
  Route::get('topic-selector', [QuestionCrudController::class, 'topicSelector'])->name('topic_selector');
  Route::get('single-questions-transfer', [QuestionCrudController::class, 'singleQuestionsTransfer'])->name('single_questions_transfer');
  Route::post('change-questions-topics', [QuestionCrudController::class, 'changeQuestionsTopics'])->name('change_questions_topics');
  Route::post('change-topics', [QuestionCrudController::class, 'changeTopics'])->name('change_topics');
  Route::post('topic-selector/questions', [QuestionCrudController::class, 'topicsQuestions'])->name('topics_questions');
  Route::post('questions/get-questions-counts', [QuestionCrudController::class, 'CountUserQuestions'])->name('count_user_questions');

  Route::get('import-questions', [QuestionImportController::class, 'initiateImport'])->name('initiate_import_questions');
  Route::post('import-questions/{skill}', [QuestionImportController::class, 'import'])->name('import_questions');
  Route::get('question-types', [QuestionTypeController::class, 'index'])->name('question-types.index');

  /*
   |--------------------------------------------------------------------------
   | Exam Routes
   |--------------------------------------------------------------------------
   */
  Route::resource('exams', ExamCrudController::class);
  Route::resource('exams/{exam}/sections', ExamSectionCrudController::class, ['as' => 'exams']);
  Route::resource('exams/{exam}/schedules', ExamScheduleCrudController::class, ['as' => 'exams']);

  Route::get('exams/{exam}/overall-report', [ExamAnalyticsController::class, 'overallReport'])->name('exams.overall_report');
  Route::get('exams/{exam}/detailed-report', [ExamAnalyticsController::class, 'detailedReport'])->name('exams.detailed_report');
  Route::get('/exam/{exam:slug}/results/{session}', [ExamAnalyticsController::class, 'results'])->name('exam_session_results');
  Route::get('/exam/{exam:slug}/solutions/{session}', [ExamAnalyticsController::class, 'solutions'])->name('fetch_exam_session_solutions');
  Route::get('exams/{exam}/export-report', [ExamAnalyticsController::class, 'exportReport'])->name('exams.export_report');
  Route::get('/exam/{exam:slug}/report/{session}', [ExamAnalyticsController::class, 'exportPDF'])->name('exam_session_report');

  Route::get('/exams/{exam}/settings', [ExamCrudController::class, 'settings'])->name('exams.settings');
  Route::post('/exams/{exam}/settings', [ExamCrudController::class, 'updateSettings'])->name('exams.settings.update');

  Route::get('/exams/{exam}/questions', [ExamQuestionController::class, 'index'])->name('exams.questions');
  Route::get('/exams/{exam}/{section}/fetch-questions', [ExamQuestionController::class, 'fetchQuestions'])->name('exams.fetch_questions');
  Route::get('/exams/{exam}/{section}/fetch-available-questions', [ExamQuestionController::class, 'fetchAvailableQuestions'])->name('exams.fetch_available_questions');
  Route::post('/exams/{exam}/{section}/add-question', [ExamQuestionController::class, 'addQuestion'])->name('exams.add_question');
  Route::post('/exams/{exam}/{section}/remove-question', [ExamQuestionController::class, 'removeQuestion'])->name('exams.remove_question');
  Route::post('/exams/{exam}/randomly/add-questions', [ExamQuestionController::class, 'randomlyAddQuestions'])->name('exams.randomly.add_questions');

  /*
   |--------------------------------------------------------------------------
   | Mock test Routes
   |--------------------------------------------------------------------------
   */

  Route::resource('mock', MockCrudController::class);
  Route::resource('mock/{mock}/sections', MockSectionCrudController::class, ['as' => 'mock']);
  Route::resource('mock/{mock}/schedules', MockScheduleCrudController::class, ['as' => 'mock']);
  //   Route::get('mock/sections/index', [MockSectionCrudController::class, 'index'])->name('mock.sections.index');
  Route::get('mock/{mock}/overall-report', [MockAnalyticsController::class, 'overallReport'])->name('mock.overall_report');
  Route::get('mock/{mock}/detailed-report', [MockAnalyticsController::class, 'detailedReport'])->name('mock.detailed_report');
  Route::get('/mock/{mock:slug}/results/{session}', [MockAnalyticsController::class, 'results'])->name('mock_session_results');
  Route::get('/mock/{mock:slug}/solutions/{session}', [MockAnalyticsController::class, 'solutions'])->name('fetch_mock_session_solutions');
  Route::get('mock/{mock}/export-report', [MockAnalyticsController::class, 'exportReport'])->name('mock.export_report');
  Route::get('/mock/{mock:slug}/report/{session}', [MockAnalyticsController::class, 'exportPDF'])->name('mock_session_report');

  Route::get('/mock/{mock}/settings', [MockCrudController::class, 'settings'])->name('mock.settings');
  Route::post('/mock/{mock}/settings', [MockCrudController::class, 'updateSettings'])->name('mock.settings.update');

  Route::get('/mock/{mock}/questions', [MockQuestionController::class, 'index'])->name('mock.questions');
  Route::get('/mock/{mock}/{section}/fetch-questions', [MockQuestionController::class, 'fetchQuestions'])->name('mock.fetch_questions');
  Route::get('/mock/{mock}/{section}/fetch-available-questions', [MockQuestionController::class, 'fetchAvailableQuestions'])->name('mock.fetch_available_questions');
  Route::post('/mock/{mock}/{section}/add-question', [MockQuestionController::class, 'addQuestion'])->name('mock.add_question');
  Route::post('/mock/{mock}/{section}/remove-question', [MockQuestionController::class, 'removeQuestion'])->name('mock.remove_question');

  /*
    |--------------------------------------------------------------------------
    | Quiz Routes
    |--------------------------------------------------------------------------
    */
  Route::resource('quizzes', QuizCrudController::class);
  Route::resource('quizzes/{quiz}/schedules', QuizScheduleCrudController::class, ['as' => 'quizzes']);

  Route::get('quizzes/{quiz}/overall-report', [QuizAnalyticsController::class, 'overallReport'])->name('quizzes.overall_report');
  Route::get('quizzes/{quiz}/detailed-report', [QuizAnalyticsController::class, 'detailedReport'])->name('quizzes.detailed_report');
  Route::get('/quiz/{quiz:slug}/results/{session}', [QuizAnalyticsController::class, 'results'])->name('quiz_session_results');
  Route::get('/quiz/{quiz:slug}/solutions/{session}', [QuizAnalyticsController::class, 'solutions'])->name('fetch_quiz_session_solutions');
  Route::get('quizzes/{quiz}/export-report', [QuizAnalyticsController::class, 'exportReport'])->name('quizzes.export_report');
  Route::get('/quiz/{quiz:slug}/report/{session}', [QuizAnalyticsController::class, 'exportPDF'])->name('quiz_session_report');

  Route::get('/quizzes/{quiz}/settings', [QuizCrudController::class, 'settings'])->name('quizzes.settings');
  Route::post('/quizzes/{quiz}/settings', [QuizCrudController::class, 'updateSettings'])->name('quizzes.settings.update');

  Route::get('/quizzes/{quiz}/questions', [QuizQuestionController::class, 'index'])->name('quizzes.questions');
  Route::get('/quizzes/{quiz}/fetch-questions', [QuizQuestionController::class, 'fetchQuestions'])->name('quizzes.fetch_questions');
  Route::get('/quizzes/{quiz}/fetch-available-questions', [QuizQuestionController::class, 'fetchAvailableQuestions'])->name('quizzes.fetch_available_questions');
  Route::post('/quizzes/{quiz}/add-question', [QuizQuestionController::class, 'addQuestion'])->name('quizzes.add_question');
  Route::post('/quizzes/{quiz}/remove-question', [QuizQuestionController::class, 'removeQuestion'])->name('quizzes.remove_question');
  Route::post('/quizzes/{quiz}/randomly/add-questions', [QuizQuestionController::class, 'randomlyAddQuestions'])->name('quizzes.randomly.add_questions');

  /*
    |--------------------------------------------------------------------------
    | Journey Routes
    |--------------------------------------------------------------------------
  */

  Route::resource('journeys', JourneySetCrudController::class);
  Route::post('/journey/create', [ JourneySetCrudController::class, 'JourneyCreate' ])->name('journey_create');
  Route::post('/journey/{id}/update', [ JourneySetCrudController::class, 'JourneyUpdate' ])->name('journey_update');
  Route::post('/journey/{id}/delete', [ JourneySetCrudController::class, 'JourneyDelete' ])->name('journey_delete');
  Route::get('/journey/{id}/levels', [ JourneySetCrudController::class, 'JourneyCreateLevels' ])->name('journey_create_levels');
  Route::get('/journey/{id}/edit', [ JourneySetCrudController::class, 'JourneyEdit' ])->name('journey_edit');
  Route::post('/journey/create/level', [ JourneySetCrudController::class, 'JourneyCreateLevel' ])->name('journey_create_level');
  Route::post('/journey-sets/{journey_id}/{level_id}/add-set', [JourneySetCrudController::class, 'addJourneySet'])->name('add_journey_set');
  Route::get('/journey/level/{id}/edit', [ JourneySetCrudController::class, 'JourneyLevelEdit' ])->name('journey_level_edit');
  Route::post('/journey/level/{id}/update', [ JourneySetCrudController::class, 'JourneyLevelUpdate' ])->name('journey_level_update');
  Route::post('/journey/level/{id}/delete', [ JourneySetCrudController::class, 'JourneyLevelDelete' ])->name('journey_level_delete');
  Route::post('/journey/level-set/{id}/delete', [ JourneySetCrudController::class, 'JourneyLevelSetDelete' ])->name('journey_level_set_delete');
  Route::get('/journey/level-set/{id}/edit', [ JourneySetCrudController::class, 'JourneyLevelSetEdit' ])->name('journey_level_set_edit');
  Route::post('/journey-sets/{id}/update-set', [JourneySetCrudController::class, 'JourneyLevelSetUpdate'])->name('update_journey_set');
  
  /*
    |--------------------------------------------------------------------------
    | Practice Set Routes
    |--------------------------------------------------------------------------
    */
  Route::resource('practice-sets', PracticeSetCrudController::class);
  Route::get('/practice-sets/{practice_set}/settings', [PracticeSetCrudController::class, 'settings'])->name('practice-sets.settings');
  Route::post('/practice-sets/{practice_set}/settings', [PracticeSetCrudController::class, 'updateSettings'])->name('practice-sets.settings.update');

  Route::get('/practice-sets/{practice_set}/questions', [PracticeSetQuestionController::class, 'index'])->name('practice-sets.questions');
  Route::get('/practice-sets/{practice_set}/fetch-questions', [PracticeSetQuestionController::class, 'fetchQuestions'])->name('practice-sets.fetch_questions');
  Route::get('/practice-sets/{practice_set}/fetch-available-questions', [PracticeSetQuestionController::class, 'fetchAvailableQuestions'])->name('practice-sets.fetch_available_questions');
  Route::post('/practice-sets/{practice_set}/add-question', [PracticeSetQuestionController::class, 'addQuestion'])->name('practice-sets.add_question');
  Route::post('/practice-sets/{practice_set}/remove-question', [PracticeSetQuestionController::class, 'removeQuestion'])->name('practice-sets.remove_question');

  Route::get('practice-sets/{practice_set}/overall-report', [PracticeAnalyticsController::class, 'overallReport'])->name('practice-sets.overall_report');
  Route::get('practice-sets/{practice_set}/detailed-report', [PracticeAnalyticsController::class, 'detailedReport'])->name('practice-sets.detailed_report');
  Route::get('practice-sets/{practice_set}/export-report', [PracticeAnalyticsController::class, 'exportReport'])->name('practice-sets.export_report');

  Route::get('/practice/{practice_set:slug}/analysis/{session}', [PracticeAnalyticsController::class, 'analysis'])->name('practice_session_results');
  Route::get('/practice/{practice_set:slug}/solutions/{session}', [PracticeAnalyticsController::class, 'solutions'])->name('fetch_practice_session_solutions');
  /*
    |--------------------------------------------------------------------------
    | Lesson Routes
    |--------------------------------------------------------------------------
    */
  Route::resource('lessons', LessonCrudController::class);
  Route::get('/practice/configure-lessons', [PracticeLessonController::class, 'index'])->name('practice.configure_lessons');
  Route::get('/practice/{category}/{skill}/lessons', [PracticeLessonController::class, 'lessons'])->name('practice.lessons');
  Route::get('/practice/{category}/{skill}/fetch-practice-lessons', [PracticeLessonController::class, 'fetchLessons'])->name('practice.fetch_lessons');
  Route::get('/practice/{category}/{skill}/fetch-available-lessons', [PracticeLessonController::class, 'fetchAvailableLessons'])->name('practice.fetch_available_lessons');
  Route::post('/practice/{category}/{skill}/add-lesson', [PracticeLessonController::class, 'addLesson'])->name('practice.add_lesson');
  Route::post('/practice/{category}/{skill}/remove-lesson', [PracticeLessonController::class, 'removeLesson'])->name('practice.remove_lesson');

  /*
    |--------------------------------------------------------------------------
    | Video Routes
    |--------------------------------------------------------------------------
    */
  Route::resource('videos', VideoCrudController::class);
  Route::get('/practice/configure-videos', [PracticeVideoController::class, 'index'])->name('practice.configure_videos');
  Route::get('/practice/{category}/{skill}/videos', [PracticeVideoController::class, 'videos'])->name('practice.videos');
  Route::get('/practice/{category}/{skill}/fetch-practice-videos', [PracticeVideoController::class, 'fetchVideos'])->name('practice.fetch_videos');
  Route::get('/practice/{category}/{skill}/fetch-available-videos', [PracticeVideoController::class, 'fetchAvailableVideos'])->name('practice.fetch_available_videos');
  Route::post('/practice/{category}/{skill}/add-video', [PracticeVideoController::class, 'addVideo'])->name('practice.add_video');
  Route::post('/practice/{category}/{skill}/remove-video', [PracticeVideoController::class, 'removeVideo'])->name('practice.remove_video');

  /*
    |--------------------------------------------------------------------------
    | School Routes
    |--------------------------------------------------------------------------
  */

  Route::resource('school', SchoolCrudController::class);
  Route::post('/school/delete/{id}', [SchoolCrudController::class, 'removeSchool'])->name('remove_school');
  Route::post('/school/update/{id}', [SchoolCrudController::class, 'updateSchool'])->name('update_school');

  /*
    |--------------------------------------------------------------------------
    | Region Routes
    |--------------------------------------------------------------------------
  */

  Route::get('/school-regions', [RegionCrudController::class, 'index'])->name('regions_index');
  Route::get('/school-regions/create', [RegionCrudController::class, 'create'])->name('region_create');
  Route::post('/school-regions/store', [RegionCrudController::class, 'store'])->name('region_store');
  Route::get('/school-regions/{id}/edit', [RegionCrudController::class, 'edit'])->name('region_edit');
  Route::post('/school-regions/{id}/update', [RegionCrudController::class, 'update'])->name('region_updates');
  Route::post('/school-regions/{id}/delete', [RegionCrudController::class, 'delete'])->name('region_delete');
  
  

  /*
    |--------------------------------------------------------------------------
    | Chat Routes
    |--------------------------------------------------------------------------
  */

  Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
  Route::post('/get_user/{$id}', [ChatController::class, 'getUser'])->name('get_user');

  /*
    |--------------------------------------------------------------------------
    | Search Routes
    |--------------------------------------------------------------------------
    */
  Route::get('/search_quizzes', [QuizCrudController::class, 'search'])->name('search_quizzes');
  Route::get('/search_sections', [SectionCrudController::class, 'search'])->name('search_sections');
  Route::get('/search_skills', [SkillCrudController::class, 'search'])->name('search_skills');
  Route::get('/search_topics', [TopicCrudController::class, 'search'])->name('search_topics');
  Route::get('/search_tags', [TagCrudController::class, 'search'])->name('search_tags');
  Route::get('/search_users', [UserCrudController::class, 'search'])->name('search_users');
  Route::get('/search_plans', [PlanCrudController::class, 'search'])->name('search_plans');
  Route::get('/search_comprehensions', [ComprehensionCrudController::class, 'search'])->name('search_comprehensions');
  Route::get('/search_sub_categories', [SubCategoryCrudController::class, 'search'])->name('search_sub_categories');

  /*
    |--------------------------------------------------------------------------
    | Monetization Routes
    |--------------------------------------------------------------------------
    */
  Route::resource('plans', PlanCrudController::class);
  Route::get('/plan-features', [PlanCrudController::class, 'features'])->name('paln_features');
  Route::get('/plan-features/create', [PlanCrudController::class, 'createFeature'])->name('create_feature');
  Route::post('/plan-features/add', [PlanCrudController::class, 'addFeature'])->name('add_feature');
  Route::get('/plan-features/{id}/edit', [PlanCrudController::class, 'editFeature'])->name('edit_feature');
  Route::post('/plan-features/update/{id}', [PlanCrudController::class, 'updateFeature'])->name('update_feature');
  Route::post('/plan-features/delete/{id}', [PlanCrudController::class, 'deleteFeature'])->name('delete_feature');

  /*
    |--------------------------------------------------------------------------
    | Setting Routes
    |--------------------------------------------------------------------------
    */
  Route::get('/general-settings', [SettingController::class, 'general'])->name('general_settings');
  Route::post('/update-site-settings', [SettingController::class, 'updateSiteSettings'])->name('update_site_settings');
  Route::post('/update-logo', [SettingController::class, 'updateLogo'])->name('update_logo');
  Route::post('/update-white-logo', [SettingController::class, 'updateWhiteLogo'])->name('update_white_logo');
  Route::post('/update-favicon', [SettingController::class, 'updateFavicon'])->name('update_favicon');
  Route::post('/update-keyword', [SettingController::class, 'updateKeyword'])->name('update_keyword');
  Route::post('/update-title', [SettingController::class, 'updateTitle'])->name('update_title');
  Route::post('/update-description', [SettingController::class, 'updateDescription'])->name('update_description');

  Route::get('/localization-settings', [SettingController::class, 'localization'])->name('localization_settings');
  Route::post('/update-localization-settings', [SettingController::class, 'updateLocalizationSettings'])->name('update_localization_settings');

  Route::get('/email-settings', [SettingController::class, 'email'])->name('email_settings');
  Route::post('/update-email-settings', [SettingController::class, 'updateEmailSettings'])->name('update_email_settings');
 
  Route::get('/theme-settings', [SettingController::class, 'theme'])->name('theme_settings');
  Route::post('/update-theme-settings', [SettingController::class, 'updateThemeSettings'])->name('update_theme_settings');
  Route::post('/update-font-settings', [SettingController::class, 'updateFontSettings'])->name('update_font_settings');

  Route::get('/payment-settings', [SettingController::class, 'payment'])->name('payment_settings');
  Route::post('/update-payment-settings', [SettingController::class, 'updatePaymentSettings'])->name('update_payment_settings');
  Route::post('/update-bank-settings', [SettingController::class, 'updateBankSettings'])->name('update_bank_settings');
  Route::post('/update-razorpay-settings', [SettingController::class, 'updateRazorpaySettings'])->name('update_razorpay_settings');
  Route::post('/update-stripe-settings', [SettingController::class, 'updateStripeSettings'])->name('update_stripe_settings');
  Route::post('/update-paypal-settings', [SettingController::class, 'updatePaypalSettings'])->name('update_paypal_settings');

  Route::get('/billing-tax-settings', [SettingController::class, 'billing'])->name('billing_tax_settings');
  Route::post('/update-billing-settings', [SettingController::class, 'updateBillingSettings'])->name('update_billing_settings');
  Route::post('/update-tax-settings', [SettingController::class, 'updateTaxSettings'])->name('update_tax_settings');
  
  Route::get('/subscripted-user', [HomePageSettingController::class, 'SubscriptedUser'])->name('subscripted_user');
  Route::get('/contact', [HomePageSettingController::class, 'contact'])->name('user_contact');
  Route::get('/home-settings', [HomePageSettingController::class, 'home'])->name('home_page_settings');
  Route::post('/update-home-page-settings', [HomePageSettingController::class, 'updateHomePageSettings'])->name('update_home_page_settings');
  Route::post('/update-hero-settings', [HomePageSettingController::class, 'updateHeroSettings'])->name('update_hero_settings');
  Route::post('/update-top-bar-settings', [HomePageSettingController::class, 'updateTopBarSettings'])->name('update_top_bar_settings');
  Route::post('/update-feature-settings', [HomePageSettingController::class, 'updateFeatureSettings'])->name('update_feature_settings');
  Route::post('/update-stat-settings', [HomePageSettingController::class, 'updateStatSettings'])->name('update_stat_settings');
  Route::post('/update-testimonial-settings', [HomePageSettingController::class, 'updateTestimonialSettings'])->name('update_testimonial_settings');
  Route::post('/update-our-services-settings', [HomePageSettingController::class, 'updateOurServicesSettings'])->name('update_our_services_settings');
  Route::post('/update-help-settings', [HomePageSettingController::class, 'updateHelpSettings'])->name('update_help_settings');
  Route::post('/update-teacher-settings', [HomePageSettingController::class, 'updateTeacherSettings'])->name('update_teacher_settings');
  Route::post('/update-about-us-settings', [HomePageSettingController::class, 'updateAboutUsSettings'])->name('update_about_us_settings');
  Route::post('/update-cta-settings', [HomePageSettingController::class, 'updateCtaSettings'])->name('update_cta_settings');
  Route::post('/update-category-settings', [HomePageSettingController::class, 'updateCategorySettings'])->name('update_category_settings');
  Route::post('/update-footer-settings', [HomePageSettingController::class, 'updateFooterSettings'])->name('update_footer_settings');

  Route::get('/maintenance-settings', [MaintenanceController::class, 'index'])->name('maintenance_settings');
  Route::post('/maintenance/clear-cache', [MaintenanceController::class, 'clearCache'])->name('clear_cache');
  Route::post('/maintenance/fix-storage-links', [MaintenanceController::class, 'fixStorageLinks'])->name('fix_storage_links');
  Route::post('/maintenance/expire-schedules', [MaintenanceController::class, 'expireSchedules'])->name('expire_schedules');
  Route::post('/maintenance/debug-mode', [MaintenanceController::class, 'debugMode'])->name('debug_mode');
  Route::post('/maintenance/update', [AppUpdateController::class, 'onSuccessfulUpdate'])->name('fix_updates');


  /*
    |--------------------------------------------------------------------------
    | Blogs Routes
    |--------------------------------------------------------------------------
  */
  Route::get('/blogs', [BlogController::class, 'index'])->name('get_blogs');
  Route::get('/create-blog', [BlogController::class, 'create'])->name('create_blog');
  Route::post('/store-blog', [BlogController::class, 'store'])->name('store_blog');
  Route::get('/blog/{id}', [BlogController::class, 'update'])->name('update_blog');
  Route::get('/blog-comments/{id}', [BlogController::class, 'viewComments'])->name('view_blog_comments');
  Route::post('/chnage-blog-comment-status/{id}', [BlogController::class, 'changeCommentStatus'])->name('change_comment_status');
  
  Route::post('/update-blog/{id}', [BlogController::class, 'edit'])->name('edit_blog');
  Route::post('/delete-blog/{id}', [BlogController::class, 'delete'])->name('delete_blog');

  /*
    |--------------------------------------------------------------------------
    | Review Routes
    |--------------------------------------------------------------------------
  */
  Route::get('/reviews', [ReviewController::class, 'index'])->name('get_reviews');
  Route::get('/create-review', [ReviewController::class, 'create'])->name('create_review');
  Route::post('/store-review', [ReviewController::class, 'store'])->name('store_review');
  Route::get('/review/{id}', [ReviewController::class, 'update'])->name('update_review');
  Route::post('/update-review/{id}', [ReviewController::class, 'edit'])->name('edit_review');
  Route::post('/delete-review/{id}', [ReviewController::class, 'delete'])->name('delete_review');
  
  /*
    |--------------------------------------------------------------------------
    | Media Routes
    |--------------------------------------------------------------------------
  */
  
  Route::get('/media', [MediaController::class, 'index'])->name('get_media');
  Route::post('/upload-media', [MediaController::class, 'upload'])->name('upload_media');

  /*
    |--------------------------------------------------------------------------
    | Avatar Routes
    |--------------------------------------------------------------------------
  */
  
  Route::get('/avatars', [AvatarController::class, 'index'])->name('get_avatars');
  Route::get('/create-avatar', [AvatarController::class, 'create'])->name('create_avatar');
  Route::get('/edit-avatar/{id}', [AvatarController::class, 'edit'])->name('edit_avatar');
  Route::post('/update-avatar/{id}', [AvatarController::class, 'update'])->name('update_avatar');
  Route::post('/upload-avatar', [AvatarController::class, 'upload'])->name('upload_avatar');
  Route::post('/delete-avatar/{id}', [AvatarController::class, 'delete'])->name('delete_avatar');
  
  /*
    |--------------------------------------------------------------------------
    | Assessment Test Routes
    |--------------------------------------------------------------------------
  */

  Route::resource('assessments', AssessmentCrudController::class);
  Route::get('/assessments/{assessment}/questions', [AssessmentQuestionController::class, 'index'])->name('assessments.questions');
  Route::resource('assessments/{assessment}/sections', AssessmentSectionCrudController::class, ['as' => 'assessments']);
  Route::get('/assessments/{assessment}/settings', [AssessmentCrudController::class, 'settings'])->name('assessments.settings');
  Route::get('/assessments/{assessment}/{section}/fetch-available-questions', [AssessmentQuestionController::class, 'fetchAvailableQuestions'])->name('assessments.fetch_available_questions');
  Route::post('/assessments/{assessment}/settings', [AssessmentCrudController::class, 'updateSettings'])->name('assessments.settings.update');
  Route::get('/assessments/sections/{sc_id}', [AssessmentCrudController::class, 'fetchSections'])->name('assessments_fetch_sections');
  Route::post('/assessments/{assessment}/{section}/add-question', [AssessmentQuestionController::class, 'addQuestion'])->name('assessments.add_question');
  Route::post('/assessments/{assessment}/{section}/remove-question', [AssessmentQuestionController::class, 'removeQuestion'])->name('assessments.remove_question');
  Route::get('/assessments/{assessment}/{section}/fetch-questions', [AssessmentQuestionController::class, 'fetchQuestions'])->name('assessments.fetch_questions');

  Route::get('assessments/{assessment}/overall-report', [AssessmentAnalyticsController::class, 'overallReport'])->name('assessments.overall_report');
  Route::get('assessments/{assessment}/detailed-report', [AssessmentAnalyticsController::class, 'detailedReport'])->name('assessments.detailed_report');
  Route::get('/assessment/{assessment:slug}/results/{session}', [AssessmentAnalyticsController::class, 'results'])->name('assessment_session_results');
  Route::get('/assessment/{assessment:slug}/solutions/{session}', [AssessmentAnalyticsController::class, 'solutions'])->name('fetch_assessment_session_solutions');
  Route::get('assessments/{assessment}/export-report', [AssessmentAnalyticsController::class, 'exportReport'])->name('assessments.export_report');
  Route::get('/assessment/{assessment:slug}/report/{session}', [AssessmentAnalyticsController::class, 'exportPDF'])->name('assessment_session_report');


  Route::post('assessment/fetch/sections', [AssessmentCrudController::class, 'fetchSection'])->name("fetchSection");

  /*
    |--------------------------------------------------------------------------
    | Errors Routes
    |--------------------------------------------------------------------------
  */

  Route::get('/errors', [ErrorController::class, 'softwareErrors'])->name('software_errors');
  Route::get('/questions-errors', [ErrorController::class, 'questionsErrors'])->name('questions_errors');

  /*
    |--------------------------------------------------------------------------
    |  Notifications Routes
    |--------------------------------------------------------------------------
  */

  Route::get('/send-notification', [NotificationController::class, 'create'])->name('create_notification');
  Route::post('/send/notification', [NotificationController::class, 'send'])->name('send_notifications');
  Route::get('/notifications/show', [NotificationController::class, 'show'])->name('show_notifications');
  Route::post('/notification-delete/{id}', [NotificationController::class, 'delete'])->name('delete_notification');

  /*
    |--------------------------------------------------------------------------
    | File Manager Routes
    |--------------------------------------------------------------------------
    */
  Route::get('/file-manager', [FileController::class, 'index'])->name('file-manager');
  Route::get('file-manager/ckeditor', [FileController::class, 'ckeditor'])->name('file-ckeditor');
  Route::get('file-manager/fm-button', [FileController::class, 'button'])->name('file-button');

  Route::get('docs', [DocController::class, 'index'])->name('index');
  Route::get('docs/pre-requisites', [DocController::class, 'pre_requisites'])->name('pre_requisites');
  Route::get('docs/installation/shared-hosting', [DocController::class, 'shared_hosting'])->name('shared_hosting');
  Route::get('docs/installation/cloud-vps', [DocController::class, 'cloud_vps'])->name('cloud_vps');
  Route::get('docs/installation/local-host', [DocController::class, 'local_host'])->name('local_host');
  Route::get('docs/installation/post-installation', [DocController::class, 'post_inst'])->name('post_inst');
  Route::get('docs/installation/update-from-previous-versions', [DocController::class, 'update_details'])->name('update_details');
  Route::get('docs/installation/task-scheduling', [DocController::class, 'task_scheduling'])->name('task_scheduling');
  Route::get('docs/installation/using-vue.js-source-code', [DocController::class, 'using_vuejs'])->name('using_vuejs');
  Route::get('docs/configurations/site-settings', [DocController::class, 'site_settings'])->name('site_settings');
  Route::get('docs/configurations/localization-settings', [DocController::class, 'local_settings'])->name('local_settings');
  Route::get('docs/configurations/homepage-settings', [DocController::class, 'hompage_settings'])->name('hompage_settings');
  Route::get('docs/configurations/email-settings', [DocController::class, 'email_settings'])->name('doc_email_settings');
  Route::get('docs/configurations/maintenance-settings', [DocController::class, 'maint_settings'])->name('maint_settings');
  Route::get('docs/configurations/manage-files-settings', [DocController::class, 'managefiles_settings'])->name('managefiles_settings');
  Route::get('docs/user-management/user-roles', [DocController::class, 'user_roles'])->name('user_roles');
  Route::get('docs/user-management/user-groups', [DocController::class, 'user_groups'])->name('user_groups');
  Route::get('docs/user-management/users', [DocController::class, 'user'])->name('user');
  Route::get('docs/master-data/manage-subjects', [DocController::class, 'manage_subjects'])->name('manage_subjects');
  Route::get('docs/master-data/manage-categories', [DocController::class, 'manage_categories'])->name('manage_categories');
  Route::get('docs/manage-questions/question-bank', [DocController::class, 'question_bank'])->name('question_bank');
  Route::get('docs/manage-questions/multiple-choice-single-answer', [DocController::class, 'msca'])->name('msca');
  Route::get('docs/manage-questions/multiple-choice-multiple-answer', [DocController::class, 'mmca'])->name('mmca');
  Route::get('docs/manage-questions/true-false', [DocController::class, 'tof'])->name('tof');
  Route::get('docs/manage-questions/short-answer-question', [DocController::class, 'saq'])->name('saq');
  Route::get('docs/manage-questions/fill-in-the-blanks', [DocController::class, 'fib'])->name('fib');
  Route::get('docs/manage-questions/match-the-following', [DocController::class, 'mtf'])->name('mtf');
  Route::get('docs/manage-questions/order-sequence', [DocController::class, 'order'])->name('order');
  Route::get('docs/manage-questions/question-attchments', [DocController::class, 'question_attachments'])->name('question_attachments');
  Route::get('docs/manage-questions/bulk-upload-questions', [DocController::class, 'bulkUpload_question'])->name('bulkUpload_question');
  Route::get('docs/manage-tests/get-started', [DocController::class, 'getStarted'])->name('getStarted');
  Route::get('docs/manage-tests/practice-sets', [DocController::class, 'practiceSets'])->name('practiceSets');
  Route::get('docs/manage-tests/quizzes', [DocController::class, 'doc_quiz'])->name('doc_quiz');
  Route::get('docs/manage-tests/quiz-schedule', [DocController::class, 'doc_quizSchedule'])->name('doc_quizSchedule');
  Route::get('docs/manage-tests/view-and-export-reports', [DocController::class, 'viewExportReports'])->name('viewExportReports');
  Route::get('docs/other/common-issues-and-fixes', [DocController::class, 'commonIssues_fixes'])->name('commonIssues_fixes');
  Route::get('docs/other/change-log', [DocController::class, 'changeLog'])->name('changeLog');
  Route::get('docs/other/support-and-faq', [DocController::class, 'supportFaq'])->name('supportFaq');
  Route::get('docs/other/credits', [DocController::class, 'docs_credits'])->name('docs_credits');
  Route::get('docs/other/road-map', [DocController::class, 'road_maps'])->name('road_maps');

});
