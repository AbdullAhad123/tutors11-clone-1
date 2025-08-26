<?php

/**
 * File name: DashboardController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DocController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor']);
    }

    /**
     * Admin dashboard statistics
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return view('Admin/Documentation/Introduction', []);
    }

    public function pre_requisites()
    {
        return view('Admin/Documentation/Pre-requisites', []);
    }

    public function shared_hosting()
    {
        return view('Admin/Documentation/Shared-hosting', []);
    }

    public function cloud_vps()
    {
        return view('Admin/Documentation/Cloud-vps', []);
    }

    public function local_host()
    {
        return view('Admin/Documentation/Local-host', []);
    }

    public function post_inst()
    {
        return view('Admin/Documentation/Post-installation', []);
    }

    public function update_details()
    {
        return view('Admin/Documentation/Update-versions-details', []);
    }

    public function task_scheduling()
    {
        return view('Admin/Documentation/Task-scheduling', []);
    }

    public function using_vuejs()
    {
        return view('Admin/Documentation/Using-vuejs', []);
    }

    public function site_settings()
    {
        return view('Admin/Documentation/Site-settings', []);
    }

    public function local_settings()
    {
        return view('Admin/Documentation/Local-settings', []);
    }

    public function hompage_settings()
    {
        return view('Admin/Documentation/Hompage-settings', []);
    }

    public function email_settings()
    {
        return view('Admin/Documentation/Email-settings', []);
    }

    public function maint_settings()
    {
        return view('Admin/Documentation/Maintanence-settings', []);
    }

    public function managefiles_settings()
    {
        return view('Admin/Documentation/ManageFiles-settings', []);
    }

    public function user_roles()
    {
        return view('Admin/Documentation/User-roles', []);
    }

    public function user_groups()
    {
        return view('Admin/Documentation/User-groups', []);
    }

    public function user()
    {
        return view('Admin/Documentation/Users', []);
    }

    public function manage_subjects()
    {
        return view('Admin/Documentation/ManageSubjects', []);
    }

    public function manage_categories()
    {
        return view('Admin/Documentation/ManageCategories', []);
    }

    public function question_bank()
    {
        return view('Admin/Documentation/QuestionBank', []);
    }

    public function msca()
    {
        return view('Admin/Documentation/MSCA', []);
    }

    public function mmca()
    {
        return view('Admin/Documentation/MMCA', []);
    }

    public function tof()
    {
        return view('Admin/Documentation/TOF', []);
    }

    public function saq()
    {
        return view('Admin/Documentation/SAQ', []);
    }

    public function fib()
    {
        return view('Admin/Documentation/FIB', []);
    }

    public function mtf()
    {
        return view('Admin/Documentation/MTF', []);
    }

    public function order()
    {
        return view('Admin/Documentation/Order', []);
    }

    public function question_attachments()
    {
        return view('Admin/Documentation/QuestionAttachments', []);
    }

    public function bulkUpload_question()
    {
        return view('Admin/Documentation/BulkUpload-questions', []);
    }

    public function getStarted()
    {
        return view('Admin/Documentation/GetStarted', []);
    }

    public function practiceSets()
    {
        return view('Admin/Documentation/PracticeSets', []);
    }

    public function doc_quiz()
    {
        return view('Admin/Documentation/Quizdoc', []);
    }

    public function doc_quizSchedule()
    {
        return view('Admin/Documentation/Quizschedule', []);
    }

    public function viewExportReports()
    {
        return view('Admin/Documentation/View_ExportReports', []);
    }

    public function commonIssues_fixes()
    {
        return view('Admin/Documentation/CommonIssues_fixes', []);
    }

    public function changeLog()
    {
        return view('Admin/Documentation/ChangeLog', []);
    }

    public function supportFaq()
    {
        return view('Admin/Documentation/Support_Faq', []);
    }

    public function docs_credits()
    {
        return view('Admin/Documentation/Credits', []);
    }

    public function road_maps()
    {
        return view('Admin/Documentation/Roadmaps', []);
    }
}
