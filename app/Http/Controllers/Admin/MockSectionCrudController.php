<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMockSectionRequest;
use App\Http\Requests\Admin\UpdateMockSectionRequest;
use App\Models\mocks;
use App\Models\mock_sections;
use App\Repositories\MockRepository;
use App\Transformers\Admin\MockSectionTransformer;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MockSectionCrudController extends Controller
{
    private MockRepository $repository;

    public function __construct(MockRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all mock sections
     *
     * @param $mock
     * @return \Inertia\Response
     */
    public function index(mocks $mock)
    {
        if($mock["settings"] == null) {
            return redirect()->back()->with('errorMessage', 'Please Update Settings to the mock.');
        }
        $mock = $mock->id;
        $test = mocks::select(['id', 'title', 'settings'])->with(['mockSections' => function($query) {
            $query->with('section:id,name')->orderBy('section_order');
        }])->findOrFail($mock);
        if (Auth::user()->hasRole("admin")){
            return Inertia::render('Admin/Mock/Sections', [
                'editFlag' => true,
                'mock' => $test->only(['id', 'title', 'settings']),
                'steps' => $this->repository->getSteps($mock, 'sections'),
                'sections' => function () use ($test) {
                    return fractal($test->mockSections, new MockSectionTransformer())->toArray()['data'];
                },
            ]);
        }else if (Auth::user()->hasRole("parent")) {
            return Inertia::render('Parent/Mock/Sections', [
                'editFlag' => true,
                'mock' => $test->only(['id', 'title', 'settings']),
                'steps' => $this->repository->getSteps($mock, 'sections'),
                'sections' => function () use ($test) {
                    return fractal($test->mockSections, new MockSectionTransformer())->toArray()['data'];
                },
            ]);
        }
    }

    /**
     * Store an mock section
     *\
     * @param StoreMockSectionRequest $request
     * @param $mock
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMockSectionRequest $request, mocks $mock)
    {
        // dd($mock);

        $mockSection = new mock_sections();
        $mockSection->mock_id = $mock->id;
        $mockSection->name = $request->name;
        $mockSection->section_id = $request->section_id;
        $mockSection->correct_marks = $request->correct_marks;
        $mockSection->negative_marking_type = $request->negative_marking_type;
        $mockSection->negative_marks = $request->negative_marks;
        $mockSection->section_cutoff = $request->section_cutoff;
        $mockSection->section_order = $request->section_order;

        if($mock->settings->get('auto_duration', true)) {
            $mockSection->total_duration = $mockSection->questions()->sum('default_time');
        } else {
            $mockSection->total_duration = $request->total_duration * 60;
        }

        if($mock->settings->get('auto_grading', true)) {
            $mockSection->total_marks = $mockSection->questions()->sum('default_marks');
        } else {
            $mockSection->total_marks = $mockSection->questions()->count() * $request->correct_marks;
        }
        $mockSection->save();

        $mock->updateMeta();

        return redirect()->back()
            ->with('successMessage', 'Mock Section was successfully added!');
    }

    /**
     * Edit a section
     *
     * @param $mock
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($mock, $id)
    {
        $section = mock_sections::with(['section:id,name'])->findOrFail($id);
        return response()->json($section, 200);
    }

    /**
     * Update a section
     *
     * @param UpdateMockSectionRequest $request
     * @param mocks $mock
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMockSectionRequest $request, mocks $mock, $id)
    {
        // dd($mock);
        $mockSection = mock_sections::findOrFail($id);
        $mockSection->name = $request->name;
        $mockSection->section_id = $request->section_id;
        $mockSection->correct_marks = $request->correct_marks;
        $mockSection->negative_marking_type = $request->negative_marking_type;
        $mockSection->negative_marks = $request->negative_marks;
        $mockSection->section_cutoff = $request->section_cutoff;
        $mockSection->section_order = $request->section_order;

        if($mock->settings->get('auto_duration', true)) {
            $mockSection->total_duration = $mockSection->questions()->sum('default_time');
        } else {
            $mockSection->total_duration = $request->total_duration * 60;
        }

        if($mock->settings->get('auto_grading', true)) {
            $mockSection->total_marks = $mockSection->questions()->sum('default_marks');
        } else {
            $mockSection->total_marks = $mockSection->questions()->count() * $request->correct_marks;
        }

        $mockSection->update();
        $mockSection->updateMeta();
        $mock->updateMeta();

        return redirect()->back()
            ->with('successMessage', 'Mock Section was successfully updated!');
    }

    /**
     * Delete a section
     *
     * @param mocks $mock
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(mocks $mock, $id)
    {
        // dd($mock);
        // dd("svjkgndjfvn");
        try {
            $mockSection = mock_sections::find($id);
            if(!$mockSection->canSecureDelete('mockSessions')) {
                return redirect()->back()->with('errorMessage', 'Unable to delete mock section. mock sessions exist and deleting section will disrupt analytics!');
            }
            $mockSection->questions()->detach();
            $mockSection->secureDelete('mockSessions');

            $mock->updateMeta();
        }
        catch (\Illuminate\Database\QueryException $e){
            dd($e);
            // return redirect()->route('mock.sections.index', ['mock' => $mock])
            //     ->with('errorMessage', 'Unable to Delete Section . Remove all associations and Try again! Pakidy');
        }
        return redirect()->route('mock.sections.index', ['mock' => $mock])
            ->with('successMessage', 'Section was successfully deleted!');
    }
}
