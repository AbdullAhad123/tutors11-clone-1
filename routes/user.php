<?php
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\SwitchUserController;
use App\Http\Controllers\User\QuizDashboardController;
use App\Http\Controllers\Admin\PracticeSetCrudController;
use App\Http\Controllers\User\PracticeDashboardController;
use App\Http\Controllers\User\ExamDashboardController;
use App\Http\Controllers\User\MockDashboardController;
use App\Http\Controllers\User\AssessmentDashboardController;
use App\Http\Controllers\User\PracticeController;
use App\Http\Controllers\User\JourneyController;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\ProgressController;
use App\Http\Controllers\User\QuizScheduleController;
use App\Http\Controllers\User\SyllabusController;
use App\Http\Controllers\User\PracticeLessonController;
use App\Http\Controllers\User\PracticeVideoController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ExamController;
use App\Http\Controllers\User\AssessmentController;
use App\Http\Controllers\User\ExamScheduleController;
use App\Http\Controllers\User\MockController;
use App\Http\Controllers\User\MockScheduleController;
use App\Http\Controllers\User\ParentSetsController;
use App\Http\Controllers\User\GetParentController;
use App\Http\Controllers\Admin\SendQuestionQueryController;
use App\Http\Controllers\Admin\PracticeSetQuestionController;
use App\Http\Controllers\Parent\MasteryLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthConroller;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Syllabus Routes
    |--------------------------------------------------------------------------
    */
    // Route::get('/change-syllabus', [SyllabusController::class, 'changeSyllabus'])->name('change_syllabus');
    // Route::post('/update-syllabus', [SyllabusController::class, 'updateSyllabus'])->name('update_syllabus');
    /*
    |--------------------------------------------------------------------------
    | Common Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user_dashboard');
    Route::get('/profile', [AuthConroller::class, 'profile'])->name('user-profile');

    Route::get('/student/mastery-level', [MasteryLevel::class, 'studentIndex'])->name('student_mastery_level');
    Route::get('/student/journey-mastery-level', [MasteryLevel::class, 'studentJourneyIndex'])->name('student_journey_mastery_level');
    
    Route::get('student/performance/{id}', [MasteryLevel::class,"studentPerformance"])->name('student_performance');
    Route::get('student/detailed-journey-performance', [MasteryLevel::class,"studentJourneyPerformance"])->name('student_journey_performance');
    Route::get('student/practice-sets', [PracticeSetCrudController::class,"studentCreate"])->name("student_practice_sets_create");
    Route::get('/student/practice/practice-sets/{practice_set}/questions', [PracticeSetQuestionController::class, 'studentIndex'])->name('student-practice-sets.questions');

    Route::get('/learn-practice', [PracticeDashboardController::class, 'learn'])->name('learn_practice');
    Route::get('/learn-practice/{category:slug}/{section}', [PracticeDashboardController::class, 'learnSection'])->name('learn_practice_section');

    Route::get('/quizzes', [QuizDashboardController::class, 'quiz'])->name('quiz_dashboard');
    Route::get('/quizzes/{type:slug}', [QuizDashboardController::class, 'quizzesByType'])->name('quizzes_by_type');
    Route::get('/fetch-quizzes-by/{type:slug}', [QuizDashboardController::class, 'fetchQuizzesByType'])->name('fetch_quizzes_by_type');
    Route::get('/live-quizzes', [QuizDashboardController::class, 'liveQuizzes'])->name('live_quizzes');
    Route::get('/fetch-live-quizzes', [QuizDashboardController::class, 'fetchLiveQuizzes'])->name('fetch_live_quizzes');

    Route::get('/exams', [ExamDashboardController::class, 'exam'])->name('exam_dashboard');
    Route::get('/exams/{type:slug}', [ExamDashboardController::class, 'examsByType'])->name('exams_by_type');
    Route::get('/fetch-exams-by/{type:slug}', [ExamDashboardController::class, 'fetchExamsByType'])->name('fetch_exams_by_type');
    Route::get('/live-exams', [ExamDashboardController::class, 'liveExams'])->name('live_exams');
    Route::get('/fetch-live-exams', [ExamDashboardController::class, 'fetchLiveExams'])->name('fetch_live_exams');

    Route::get('/mock', [MockDashboardController::class, 'mock'])->name('mock_dashboard');
    Route::get('/mock/{type:slug}', [MockDashboardController::class, 'mocksByType'])->name('mocks_by_type');
    Route::get('/fetch-mock-by/{type:slug}', [MockDashboardController::class, 'fetchMocksByType'])->name('fetch_mocks_by_type');
    Route::get('/live-mock', [MockDashboardController::class, 'liveMocks'])->name('live_mocks');
    Route::get('/fetch-live-mock', [MockDashboardController::class, 'fetchLiveMocks'])->name('fetch_live_mocks');
    /*
    |--------------------------------------------------------------------------
    | Payment & Checkout Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/checkout/{plan}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/{plan}', [CheckoutController::class, 'processCheckout'])->name('process_checkout');
    Route::get('/payment-cancelled', [CheckoutController::class, 'paymentCancelled'])->name('payment_cancelled');
    Route::get('/payment-pending', [CheckoutController::class, 'paymentPending'])->name('payment_pending');
    Route::get('/payment-success', [CheckoutController::class, 'paymentSuccess'])->name('payment_success');
    Route::get('/payment-failed', [CheckoutController::class, 'paymentFailed'])->name('payment_failed');
    Route::get('/select-plan', [CheckoutController::class, 'selectPlan'])->name('select_plan');
    
    Route::post('/callbacks/razorpay', [CheckoutController::class, 'handleRazorpayPayment'])->name('razorpay_callback');


    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('user_subscriptions');
    Route::post('/cancel-subscription/{id}', [SubscriptionController::class, 'cancelSubscription'])->name('cancel_my_subscription');
    Route::get('/payments', [PaymentController::class, 'index'])->name('user_payments');
    Route::get('/download-invoice/{id}', [PaymentController::class, 'downloadInvoice'])->name('download_invoice');
    /*
    |--------------------------------------------------------------------------
    | Practice Video Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/videos/{category:slug}/{section:slug}/{skill}', [PracticeVideoController::class, 'skillVideos'])->name('skill_videos');
    Route::get('/practice-videos-for-app/{category:slug}/{section:slug}/{skill}', [PracticeVideoController::class, 'PracticeVideosForApp'])->name('practice_videos_for_app');
    Route::get('/fetch-practice-videos/{category:slug}/{section:slug}/{skill}', [PracticeVideoController::class, 'fetchPracticeVideos'])->name('fetch_practice_videos');
    Route::get('/watch/{category:slug}/{section:slug}/{skill}/watch', [PracticeVideoController::class, 'watchVideos'])->name('watch_videos');
    /*
    |--------------------------------------------------------------------------
    | Practice Lesson Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/lessons/{category:slug}/{section:slug}/{skill}', [PracticeLessonController::class, 'skillLessons'])->name('skill_lessons');
    Route::get('/fetch-practice-lessons/{category:slug}/{section:slug}/{skill}', [PracticeLessonController::class, 'fetchPracticeLessons'])->name('fetch_practice_lessons');
    Route::get('/lessons/{category:slug}/{section:slug}/{skill}/read', [PracticeLessonController::class, 'readLessons'])->name('read_lessons');
    /*
    |--------------------------------------------------------------------------
    | Practice Set Routes
    |--------------------------------------------------------------------------
    */
    Route::get('practice/{category:slug}/{section:slug}/{skill}/practice-sets', [PracticeController::class, 'practiceSets'])->name('skill_practice_sets');
    Route::get('/fetch-practice-sets/{category:slug}/{section:slug}/{skill}', [PracticeController::class, 'fetchPracticeSets'])->name('fetch_practice_sets');

    Route::get('/practice/{practiceSet:slug}/init', [PracticeController::class, 'initPracticeSet'])->name('init_practice_set');
    Route::get('/practice/{practiceSet:slug}/{session}', [PracticeController::class, 'goToPractice'])->name('go_to_practice');
    Route::get('/practice/{practiceSet:slug}/questions/{session}', [PracticeController::class, 'getPracticeQuestions'])->name('fetch_practice_questions');
    Route::post('/check_practice_answer/{practiceSet:slug}/{session}', [PracticeController::class, 'checkAnswer'])->name('check_practice_answer');
    Route::get('/practice/{practiceSet:slug}/analysis/{session}', [PracticeController::class, 'analysis'])->name('get_practice_session_analysis');
    Route::post('/practice/{practiceSet:slug}/analysis/{session}', [PracticeController::class, 'analysis'])->name('practice_session_analysis');
    Route::post('/practice/{practiceSet:slug}/finish/{session}', [PracticeController::class, 'finish'])->name('finish_practice_session');
    Route::get('/practice/{practiceSet:slug}/solutions/{session}', [PracticeController::class, 'solutions'])->name('fetch_practice_set_solutions');
/*
    |--------------------------------------------------------------------------
    | Journey Set Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/journey/{journeySet:slug}/init', [JourneyController::class, 'initJourneySet'])->name('init_journey_set');
    Route::get('/journey/{journeySet:slug}/{session}', [JourneyController::class, 'goToJourney'])->name('go_to_journey');
    Route::get('/journey/{journeySet:slug}/questions/{session}', [JourneyController::class, 'getJourneyQuestions'])->name('fetch_journey_questions');
    Route::post('/check_journey_answer/{journeySet:slug}/{session}', [JourneyController::class, 'checkAnswer'])->name('check_journey_answer');
    Route::post('/journey/{journeySet:slug}/finish/{session}', [JourneyController::class, 'finish'])->name('finish_journey_session');
    Route::get('/journey/{journeySet:slug}/analysis/{session}', [JourneyController::class, 'analysis'])->name('get_journey_session_analysis');
    Route::post('/journey/{journeySet:slug}/analysis/{session}', [JourneyController::class, 'analysis'])->name('journey_session_analysis');

    /*
    |--------------------------------------------------------------------------
    | User Quiz Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/quiz/{quiz:slug}/instructions', [QuizController::class, 'instructions'])->name('quiz_instructions');
    Route::get('/quiz/{quiz:slug}/init', [QuizController::class, 'initQuiz'])->name('init_quiz');

    Route::get('/quiz/{quiz:slug}/{schedule}/instructions', [QuizScheduleController::class, 'instructions'])->name('quiz_schedule_instructions');
    Route::get('/quiz/{quiz:slug}/{schedule}/init', [QuizScheduleController::class, 'initQuizSchedule'])->name('init_quiz_schedule');

    Route::get('/quiz/{quiz:slug}/{session}', [QuizController::class, 'goToQuiz'])->name('go_to_quiz');
    Route::get('/quiz/{quiz:slug}/questions/{session}', [QuizController::class, 'getQuizQuestions'])->name('fetch_quiz_questions');
    Route::post('/update_quiz_answer/{quiz:slug}/{session}', [QuizController::class, 'updateAnswer'])->name('update_quiz_answer');
    Route::post('/quiz/{quiz:slug}/finish/{session}', [QuizController::class, 'finish'])->name('finish_quiz_session');
    Route::get('/quiz/{quiz:slug}/thank-you/{session}', [QuizController::class, 'thankYou'])->name('quiz_thank_you');
    Route::get('/quiz/{quiz:slug}/results/{session}', [QuizController::class, 'results'])->name('quiz_results');
    Route::get('/quiz/{quiz:slug}/solutions/{session}', [QuizController::class, 'solutions'])->name('quiz_solutions');
    Route::get('/quiz/{quiz:slug}/fetch-solutions/{session}', [QuizController::class, 'fetchSolutions'])->name('fetch_quiz_solutions');
    Route::get('/quiz/{quiz:slug}/leaderboard/{session}', [QuizController::class, 'leaderboard'])->name('quiz_leaderboard');
    Route::get('/quiz/{quiz:slug}/download-report/{session}', [QuizController::class, 'exportPDF'])->name('download_quiz_report');

    /*
    |--------------------------------------------------------------------------
    | Question Routes
    |--------------------------------------------------------------------------
    */
  Route::post('/question/{id}/send-query', [SendQuestionQueryController::class, 'sendQuestionQuery'])->name('send_question_query');

    /*
    |--------------------------------------------------------------------------
    | User Exam Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/exam/{exam:slug}/instructions', [ExamController::class, 'instructions'])->name('exam_instructions');
    Route::get('/exam/{exam:slug}/init', [ExamController::class, 'initExam'])->name('init_exam');

    Route::get('/exam/{exam:slug}/{schedule}/instructions', [ExamScheduleController::class, 'instructions'])->name('exam_schedule_instructions');
    Route::get('/exam/{exam:slug}/{schedule}/init', [ExamScheduleController::class, 'initExamSchedule'])->name('init_exam_schedule');

    Route::get('/exam/{exam:slug}/{session}', [ExamController::class, 'goToExam'])->name('go_to_exam');
    Route::get('/exam/{exam:slug}/questions/{session}/{section}', [ExamController::class, 'getExamSectionQuestions'])->name('fetch_exam_section_questions');
    Route::post('/update_exam_answer/{exam:slug}/{session}/{section}', [ExamController::class, 'updateAnswer'])->name('update_exam_answer');
    Route::post('/exam/{exam:slug}/finish/{session}', [ExamController::class, 'finish'])->name('finish_exam_session');
    Route::get('/exam/{exam:slug}/thank-you/{session}', [ExamController::class, 'thankYou'])->name('exam_thank_you');
    Route::get('/exam/{exam:slug}/results/{session}', [ExamController::class, 'results'])->name('exam_results');
    Route::get('/exam/{exam:slug}/solutions/{session}', [ExamController::class, 'solutions'])->name('exam_solutions');
    Route::get('/exam/{exam:slug}/fetch-solutions/{session}/section/{section}', [ExamController::class, 'fetchSolutions'])->name('fetch_exam_solutions');
    Route::get('/exam/{exam:slug}/leaderboard/{session}', [ExamController::class, 'leaderboard'])->name('exam_leaderboard');
    Route::get('/exam/{exam:slug}/download-report/{session}', [ExamController::class, 'exportPDF'])->name('download_exam_report');

    /*
    |--------------------------------------------------------------------------
    | User Assessment Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/assessment/{assessment:slug}/instructions', [AssessmentController::class, 'instructions'])->name('assessment_instructions');
    Route::get('/assessment/{s_id}/init', [AssessmentController::class, 'initAssessment'])->name('init_assessment');
    Route::get('/assessments', [AssessmentDashboardController::class, 'assessment'])->name('assessment_dashboard');

    // Route::get('/assessments/{s_id}', [AssessmentDashboardController::class, 'assessment'])->name('assessment_dashboard');
    Route::get('/assessment/{assessment:slug}/{session}', [AssessmentController::class, 'goToAssessment'])->name('go_to_assessment');
    Route::get('/assessment/{assessment:slug}/questions/{session}/{section}', [AssessmentController::class, 'getAssessmentSectionQuestions'])->name('fetch_assessment_section_questions');
    Route::get('/assessment/{assessment:slug}/thank-you/{session}', [AssessmentController::class, 'thankYou'])->name('assessment_thank_you');
    Route::post('/assessment/{assessment:slug}/finish/{session}', [AssessmentController::class, 'finish'])->name('finish_assessment_session');
    Route::get('/assessment/{assessment:slug}/results/{session}', [AssessmentController::class, 'results'])->name('assessment_results');
    Route::post('/update_assessment_answer/{assessment:slug}/{session}/{section}', [AssessmentController::class, 'updateAnswer'])->name('update_assessment_answer');
    Route::get('/assessment/{assessment:slug}/fetch-solutions/{session}/section/{section}', [AssessmentController::class, 'fetchSolutions'])->name('fetch_assessment_solutions');
    Route::get('/assessment/{assessment:slug}/leaderboard/{session}', [AssessmentController::class, 'leaderboard'])->name('assessment_leaderboard');
    Route::get('/assessment/{assessment:slug}/download-report/{session}', [AssessmentController::class, 'exportPDF'])->name('download_assessment_report');
    Route::get('/assessment/{assessment:slug}/solutions/{session}', [AssessmentController::class, 'solutions'])->name('assessment_solutions');


        /*
    |--------------------------------------------------------------------------
    | User Mock Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/mock/{mock:slug}/instructions', [MockController::class, 'instructions'])->name('mock_instructions');
    Route::get('/mock/{mock:slug}/init', [MockController::class, 'initMock'])->name('init_mock_test');

    Route::get('/mock/{mock:slug}/{schedule}/instructions', [MockScheduleController::class, 'instructions'])->name('mock_schedule_instructions');
    Route::get('/mock/{mock:slug}/{schedule}/init', [MockScheduleController::class, 'initMockSchedule'])->name('init_mock_schedule');

    Route::get('/mock/{mock:slug}/{session}', [MockController::class, 'goToMock'])->name('go_to_mock');
    Route::get('/mock/{mock:slug}/questions/{session}/{section}', [MockController::class, 'getMockSectionQuestions'])->name('fetch_mock_section_questions');
    Route::post('/update_mock_answer/{mock:slug}/{session}/{section}', [MockController::class, 'updateAnswer'])->name('update_mock_answer');
    Route::post('/mock/{mock:slug}/finish/{session}', [MockController::class, 'finish'])->name('finish_mock_session');
    Route::get('/mock/{mock:slug}/thank-you/{session}', [MockController::class, 'thankYou'])->name('mock_thank_you');
    Route::get('/mock/{mock:slug}/results/{session}', [MockController::class, 'results'])->name('mock_results');
    Route::get('/mock/{mock:slug}/solutions/{session}', [MockController::class, 'solutions'])->name('mock_solutions');
    Route::get('/mock/{mock:slug}/fetch-solutions/{session}/section/{section}', [MockController::class, 'fetchSolutions'])->name('fetch_mock_solutions');
    Route::get('/mock/{mock:slug}/leaderboard/{session}', [MockController::class, 'leaderboard'])->name('mock_leaderboard');
    Route::get('/mock/{mock:slug}/download-report/{session}', [MockController::class, 'exportPDF'])->name('download_mock_report');


    /*
    |--------------------------------------------------------------------------
    | User Progress Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/my-progress', [ProgressController::class, 'myProgress'])->name('my_progress');
    Route::get('/student/journey-progress', [ProgressController::class, 'studentJourneyProgress'])->name('student_journey_progress');
    Route::get('/student/my-journey', [ProgressController::class, 'myJourney'])->name('my_journey');
    Route::get('/my-practice', [ProgressController::class, 'myPractice'])->name('my_practice');
    Route::get('/my-exams', [ProgressController::class, 'myExams'])->name('my_exams');
    Route::get('/my-mocks', [ProgressController::class, 'myMocks'])->name('my_mocks');
    Route::get('/my-quizzes', [ProgressController::class, 'myQuizzes'])->name('my_quizzes');
    Route::get('/my-assessments', [ProgressController::class, 'myAssessments'])->name('my_assessments');
    // Parent Set
    Route::get('parent-set/practice', [ParentSetsController::class,"parentsets"])->name('parent_sets_practices');
    // Parent Set
    Route::get('parent-set/mock', [ParentSetsController::class,"mocktests"])->name('parent_sets_mock_test');
    // get parents
    Route::post('get-parent', [GetParentController::class,"getParent"])->name('get_parent');
    // get student journey
    Route::get('/journey/{id}', [DashboardController::class,"studentJourney"])->name('student_journey');

});
?>
