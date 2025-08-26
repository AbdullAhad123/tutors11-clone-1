<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamSchedule;
use App\Models\QuizSchedule;
use App\Settings\LocalizationSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Application maintenance page
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return view('Admin/Settings/MaintenanceSettings', [
            'appVersion' => config('tutor11.version'),
            'debugMode' => config('app.debug')
        ]);
    }

    /**
     * Clear application cache
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearCache()
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        Artisan::call('cache:forget', ['key' => 'spatie.permission.cache']);
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        return back()->with('successMessage', 'Cache cleared successfully.');
    }

    /**
     * Fix Storage Links
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fixStorageLinks()
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        Artisan::call('storage:link');
        return back()->with('successMessage', 'Storage linked successfully.');
    }

    /**
     * Mark completed schedules as expired
     *
     * @param LocalizationSettings $localization
     * @return \Illuminate\Http\RedirectResponse
     */
    public function expireSchedules(LocalizationSettings $localization)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $now = Carbon::now()->timezone($localization->default_timezone);

        $quizSchedules = QuizSchedule::where('end_date', '<=', $now->toDateString())
            ->where('status', '=', 'active')->get();

        foreach ($quizSchedules as $schedule) {
            $schedule->status = 'expired';
            $schedule->update();
        }

        $examSchedules = ExamSchedule::where('end_date', '<=', $now->toDateString())
            ->where('status', '=', 'active')->get();

        foreach ($examSchedules as $schedule) {
            $schedule->status = 'expired';
            $schedule->update();
        }

        return back()->with('successMessage', 'Schedules updated successfully.');
    }

    /**
     * Enable/Disable Debug Mode
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function debugMode(Request $request)
    {
        $mode = $request->mode == 'on' ? true : false;
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        $env = DotenvEditor::load();
        $env->setKey('APP_DEBUG', $mode == true ? 'true' : 'false');
        $env->save();
        $status = $mode == true ? 'Enabled' : 'Disabled';
        return back()->with('successMessage', "Debug mode {$status} successfully.");
    }
}
