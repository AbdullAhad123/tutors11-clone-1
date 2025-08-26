<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\ExamTypeFilters;
use App\Http\Requests\Admin\StoreExamTypeRequest;
use App\Http\Requests\Admin\UpdateExamTypeRequest;
use App\Models\ExamType;
use App\Transformers\Admin\ExamTypeTransformer;
use Inertia\Inertia;

class ExamTypeCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor'])->except('search');
    }

    /**
     * List all Exam Types
     *
     * @param ExamTypeFilters $filters
     * @return \Inertia\Response
     */
    public function index(ExamTypeFilters $filters)
    {
        return view('Admin/ExamTypes', [
            'examTypes' => function () use($filters) {
                return fractal(ExamType::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new ExamTypeTransformer())->toArray();
            },
        ]);
    }

    public function create(ExamTypeFilters $filters)
    {
        return view('Admin/ExamTypes/Create', [
            'editFlag' => false,
        ]);
    }

    /**
     * Store a ExamType
     *
     * @param StoreExamTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreExamTypeRequest $request)
    {

        $data = $request->all();
        $data['image_path'] = "";
        if($data['is_active'] == "true"){
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }
        ExamType::create($data);
        return [
            'success' => true,
            'successMessage' => 'Exam Type was successfully added!'
        ];
    }

    /**
     * Show a ExamType
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        return fractal(ExamType::find($id), new ExamTypeTransformer())->toArray();
    }

    /**
     * Edit a ExamType
     *
     * @param $id
     * @return ExamType|ExamType[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        $ExamType = ExamType::find($id);
        return view('Admin/ExamTypes/Create', [
            'ExamType' => $ExamType,
            'editFlag' => true,
        ]);
    }

    /**
     * Update a ExamType
     *
     * @param UpdateExamTypeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateExamTypeRequest $request, $id)
    {

        $examType = ExamType::find($id); 

        $data = $request->all();
        $data['image_path'] = "";
        if($data['is_active'] == "true"){
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }
        $examType->update($data);
        return [
            'success' => true,
            'successMessage' => 'Exam Type was successfully updated!'
        ];
    }
    /**
     * Delete a ExamType
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $examType = ExamType::find($id);
            if(!$examType->canSecureDelete('exams')) {
                return [
                    'message' => "Unable to Delete Exam Type! Remove from associated quizzes and try again.",
                    'success' => false,
                ];
            }

            $examType->secureDelete('exams');
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'message' => "Unable to Delete Exam Type . Remove all associations and Try again!",
                'success' => false,
            ];
        }
        return [
            'message' => "Exam Type was successfully deleted!",
            'success' => true,
        ];
    }
}

