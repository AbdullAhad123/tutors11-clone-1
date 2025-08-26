<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\PracticeSession;
use App\Models\PracticeSet;
use App\Repositories\ColorsRepository;
use App\Repositories\MasteryLevelAnalyticsRepository;
use App\Transformers\Platform\QuizSolutionTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AnalysisMasteryLevel extends Controller
{
    private $chart_colors;# 0 index for correct answer , 1 index for wrong answer and 2 index for unanswered questions ,
    private MasteryLevelAnalyticsRepository $repository;
    public function __construct(MasteryLevelAnalyticsRepository $repository ,ColorsRepository $colors)
    {
        $this->repository = $repository;
        $this->chart_colors = [
            $colors->getPositiveColor(),
            $colors->getNegativeColor(),
            $colors->getNeutralColor(),
            $colors->getYellowColor()
        ];
    }
    public function index($s_id,$u_id,Request $request){
        $childName = '';
        $questions = [];
        $total_questions = [];
        $trans = new QuizSolutionTransformer;
        if (isset($request->practiceset)) {
            // $practiceSets = $this->repository->getProgressLinks($s_id,$u_id,'answer-sheet/'.$s_id.'/'.$u_id.'?practiceset='.$request->practiceset);
            $practiceSets = $this->repository->getProgressLinks($s_id,$u_id,route("answer_sheet",[
                "s_id"=>$s_id,
                "u_id"=>$u_id,
                "practiceset"=>$request->practiceset
            ]));
            $PracticeSession = PracticeSession::where("practice_set_id",$request->practiceset)->where("user_id",$u_id)->get();
            foreach ($PracticeSession as $practice_session_value) {
                if (count($PracticeSession) == 0 || count(PracticeSet::where("skill_id", $s_id)->where("id", $practice_session_value->practice_set_id)->get("total_questions")) == 0 ) {break;}
                array_push($total_questions,PracticeSet::where("skill_id", $s_id)->where("id", $practice_session_value->practice_set_id)->get("total_questions")[0]->total_questions);
                foreach ($practice_session_value->questions()->wherePivot("practice_session_id",$practice_session_value->id)->get() as $result) {
                    array_push($questions,$trans->transform($result));
                }
            }
        }else{
            // $practiceSets = $this->repository->getProgressLinks($s_id,$u_id,'answer-sheet/'.$s_id.'/'.$u_id);
            $practiceSets = $this->repository->getProgressLinks($s_id,$u_id,route("answer_sheet",[
                "s_id"=>$s_id,
                "u_id"=>$u_id
            ]));
            $PracticeSet = PracticeSet::where("skill_id", $s_id)->get();
            foreach ($PracticeSet as $practice_set_value) {
                $PracticeSession = PracticeSession::where("practice_set_id",$practice_set_value->id)->where("user_id",$u_id)->get();
                foreach ($PracticeSession as $practice_session_value) {
                    array_push($total_questions,PracticeSet::where("skill_id", $s_id)->where("id", $practice_session_value->practice_set_id)->get("total_questions")[0]->total_questions);
                    foreach ($practice_session_value->questions()->wherePivot("practice_session_id",$practice_session_value->id)->get() as $result) {
                        array_push($questions,$trans->transform($result));
                    }
                }
            }
        }
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        }
        // dd($questions);
        $total_question = 0;
        foreach ($total_questions as $key => $value) {
            $total_question+=$value;
        }
        $sectionId = 0;
        if (isset($request->practiceset)) {
            $sectionId = $request->practiceset;
        }
        return view("Parent/AnalysisMasteryLevel", [
            "practiceSets"=>$practiceSets,
            "questions" => $questions,
            "totalQuestions" => $total_question,
            "chartColors"=>$this->chart_colors,
            "childName" => $childName,
            "sectionId" => $sectionId,
        ]);
    }
}
