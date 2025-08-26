<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\QuizTypeFilters;
use App\Http\Requests\Admin\StoreQuizTypeRequest;
use App\Http\Requests\Admin\UpdateQuizTypeRequest;
use App\Models\QuizType;
use App\Transformers\Admin\QuizTypeTransformer;
use Inertia\Inertia;

class QuizTypeCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor'])->except('search');
    }

    /**
     * List all Quiz Types
     *
     * @param QuizTypeFilters $filters
     * @return \Inertia\Response
     */
    public function index(QuizTypeFilters $filters)
    {
        return view('Admin/QuizTypes', [
            'quizTypes' => function () use($filters) {
                return fractal(QuizType::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new QuizTypeTransformer())->toArray();
            },
        ]);
    }
    public function create(QuizTypeFilters $filters)
    {
        return view('Admin/QuizTypes/Create', [
            'editFlag' => false,
        ]);
    }

    /**
     * Store a QuizType
     *
     * @param StoreQuizTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreQuizTypeRequest $request)
    {
        $data = $request->all();
        $data['image_path'] = "";
        if($data['is_active'] == "true"){
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }
        QuizType::create($data);
        return [
            'success' => true,
            'successMessage' => 'Quiz Type was successfully added!'
        ];
    }

    /**
     * Show a QuizType
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        return fractal(QuizType::find($id), new QuizTypeTransformer())->toArray();
    }

    /**
     * Edit a QuizType
     *
     * @param $id
     * @return QuizType|QuizType[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        $QuizType = QuizType::find($id);
        return view('Admin/QuizTypes/Create', [
            'QuizType' => $QuizType,
            'editFlag' => true,
        ]);
        
    }

    /**
     * Update a QuizType
     *
     * @param UpdateQuizTypeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateQuizTypeRequest $request, $id)
    {

        $quizType = QuizType::find($id); 

        $data = $request->all();
        $data['image_path'] = "";
        if($data['is_active'] == "true"){
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }
        $quizType->update($data);
        return [
            'success' => true,
            'successMessage' => 'Quiz Type was successfully updated!'
        ];
    }

    /**
     * Delete a QuizType
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $quizType = QuizType::find($id);
            if(!$quizType->canSecureDelete('quizzes')) {
                return [
                    'message' => "Unable to Delete Quiz Type! Remove from associated quizzes and try again.",
                    'success' => false,
                ];
            }

            $quizType->secureDelete('quizzes');
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'message' => "Unable to Delete Quiz Type . Remove all associations and Try again!",
                'success' => false,
            ];
        }
        return [
            'message' => "Quiz Type was successfully deleted!",
            'success' => true,
        ];
    }


}
