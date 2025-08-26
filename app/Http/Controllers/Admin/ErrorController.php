<?php
/**
 * File name: DashboardController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Models\ErrorLog;
use App\Filters\ErrorFilters;
use App\Transformers\Admin\ErrorTransformer;
use App\Models\QuestionsErrorLog;
use App\Filters\QuestionsErrorFilters;
use App\Transformers\Admin\QuestionsErrorTransformer;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
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
    public function softwareErrors(ErrorFilters $filters)
    {
        return view('Admin/Errors/Errors', [
            'errors' => function () use($filters) {
                return fractal(ErrorLog::filter($filters)
                    ->orderBy('created_at', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new ErrorTransformer())->toArray();
            },
        ]);
    }
    public function questionsErrors(QuestionsErrorFilters $filters)
    {
        return view('Admin/Errors/QuestionsErrors', [
            'errors' => function () use($filters) {
                return fractal(QuestionsErrorLog::filter($filters)
                    ->orderBy('created_at', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new QuestionsErrorTransformer())->toArray();
            },
        ]);
    }
}
