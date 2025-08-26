<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SuggestedPracticeSets;
use App\Models\Skill;
use App\Models\SuggestedMockTest;
use App\Models\PracticeSession;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class ParentSetsController extends Controller
{
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->middleware(['role:guest|student|employee']);
        $this->repository = $repository;
    }

    public function parentsets()
    {
        $u_id = auth()->user()->id;
        $result = [];
        $suggested_practice_sets = SuggestedPracticeSets::where("user_id", $u_id)->with("practiceset")->get();
        foreach ($suggested_practice_sets as $key => $value) {
            $session = PracticeSession::where('practice_set_id', $value->practice_set_id)->where("user_id", $u_id)->first();
            $session_status = false;
            if($session && $session->status == 'completed'){
                $session_status = true;
            }
            if(!$session_status){
                foreach ($value->practiceset as $key => $value1) {
                    $skills = Skill::where("id", $value1->skill_id)->get("name");
                    array_push($result, [
                        'id' => $value1->id,
                        'title' => $value->title,
                        'slug' => $value1->slug,
                        "skill"=>$skills[0]->name,
                        'category' => session('category_name'),
                        'total_questions' => $value1->total_questions,
                        'due_date' =>date_format(date_create($value->due_date),"Y-m-d"),
                        'paid' => $value1->is_paid,
                        'suggested_id' => $value->id
                    ]);
                }
            }
        }
        return view('User/ParentSetPractice', [
            'steps' => $this->repository->getMocktestNavigatorLinks('parent_sets_practices'),
            'heading' => "Parent Sets Practises",
            "practiceSets"=>$result
        ]);
    }
    public function mocktests()
    {
        // dd("feiwfo");
        $u_id = auth()->user()->id;
        $result = [];
        $suggested_practice_sets = SuggestedMockTest::where("user_id", $u_id)->with("mockset")->get();
        foreach ($suggested_practice_sets as $key => $value) {
            foreach ($value->mockset as $key => $value1) {
                array_push($result, [
                    'id' => $value1->id,
                    'title' => $value->title,
                    'slug' => $value1->slug,
                    'category' => session('category_name'),
                    'total_questions' => $value->total_questions,
                    'due_date' =>date_format(date_create($value->due_date),"Y-m-d"),
                    'paid' => $value1->is_paid,
                ]);
            }
        }
        return Inertia::render('User/ParentSetMockTests', [
            'steps' => $this->repository->getMocktestNavigatorLinks('parent_sets_mock_test'),
            'heading' => "Parent Sets Moct Tests",
            "mockTests"=>$result
        ]);
    }
}

?>
