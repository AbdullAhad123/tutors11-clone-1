<?php
namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamSection;
use App\Models\ExamSession;
use App\Models\mocks;
use App\Models\mock_sessions;
use App\Models\PracticeSession;
use App\Models\PracticeSet;
use App\Models\Quiz;
use App\Models\QuizSession;
use App\Models\Section;
use App\Models\SubCategory;
use App\Models\SubCategorySections;
use App\Repositories\CurriculumRepository;
use Inertia\Inertia;

class CurriculumController extends Controller
{
    public CurriculumRepository $repository;
    private $child_class_id;
    public function __construct(CurriculumRepository $repository)
    {
        $this->repository = $repository;

    }
    public function exams()
    {
        $this->child_class_id = isset(session("selected_child")["classId"]) ? session("selected_child")["classId"] : null;
        if ($this->child_class_id == null) {
            return redirect()->route('change_child');
        }
        $sub_categories = [];
        $child = '';
        $result = [];
        $data = [];
        $steps = [];
        $total_session = 0;
        $done_session = 0;
        $exams = Exam::where("sub_category_id", $this->child_class_id)->with("examType")->get(["id", "exam_type_id", "title"]);
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
            foreach ($exams as $key => $value) {
                $exam_sessions = ExamSession::where("exam_id", $value->id)->where("user_id", session("selected_child")["id"])->get("id");
                if (count($exam_sessions) > 0) {
                    if (!isset($result[$value->title])) {
                        $result[$value->title] = [$value->examType->name, $exam_sessions[0]->id];
                    }
                } else {
                    if (!isset($result[$value->title])) {
                        $result[$value->title] = [$value->examType->name, null];
                    }
                }
            }

            $totals = [];
            $attempt = [];
            foreach ($result as $key => $value2) {
                if (isset($totals[$value2[0]])) {
                    $totals[$value2[0]] += 1;
                } else {
                    $totals[$value2[0]] = 1;
                }
                if (isset($attempt[$value2[0]])) {
                    if ($value2[1] != null) {
                        $attempt[$value2[0]] += 1;
                    }
                } else {
                    if ($value2[1] != null) {
                        $attempt[$value2[0]] = 1;
                    } else {
                        $attempt[$value2[0]] = 0;
                    }
                }
            }
            $data = [];
            $index = 1;
            foreach ($totals as $key => $value) {
                if (isset($attempt[$key])) {
                    $total_session += $value;
                    $done_session += $attempt[$key];
                    array_push($data, [
                        "key" => $index,
                        "title" => $key,
                        "percentage" => $attempt[$key] / $value * 100,
                        "color" => ["#1985ff", "#c9c9c9"]
                    ]);
                } else {
                    array_push($data, [
                        "key" => $index,
                        "title" => $key,
                        "percentage" => 0,
                        "color" => ["#1985ff", "#c9c9c9"]
                    ]);
                }
                $index++;
            }
            $steps = $this->repository->getProgressLinks($this->child_class_id, session("selected_child")["id"], route("curriculum_exam", [
                "sc_id" => $this->child_class_id
            ]));
        }
        session()->put('childName',$child['name']);
        
        return view("Parent/Curriculum", [
            "data" => $data,
            "heading" => "Exams",
            "chartHeading" => "Exam",
            "childName" => $child['name'],
            "steps" => $steps,
            "total_session" => $total_session,
            "done_session" => $done_session
        ]);

    }
    public function mocks()
    {
        $this->child_class_id = (session()->has("selected_child")) ? session("selected_child")["classId"] : null;
        $sub_categories = [];
        $child = '';
        $result = [];
        $data = [];
        $steps = [];
        $mocks = mocks::where("sub_category_id", $this->child_class_id)->with("mockType")->get(["id", "mock_type_id", "title"]);
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
            foreach ($mocks as $key => $value) {
                $mock_sessions = mock_sessions::where("mock_id", $value->id)->where("user_id", session("selected_child")["id"])->get("id");
                if (count($mock_sessions) > 0) {
                    if (!isset($result[$value->title])) {
                        $result[$value->title] = [$value->mockType->name, $mock_sessions[0]->id];
                    }
                } else {
                    if (!isset($result[$value->title])) {
                        $result[$value->title] = [$value->mockType->name, null];
                    }
                }
            }

            $totals = [];
            $attempt = [];
            foreach ($result as $key => $value2) {
                if (isset($totals[$value2[0]])) {
                    $totals[$value2[0]] += 1;
                } else {
                    $totals[$value2[0]] = 1;
                }
                if (isset($attempt[$value2[0]])) {
                    if ($value2[1] != null) {
                        $attempt[$value2[0]] += 1;
                    }
                } else {
                    if ($value2[1] != null) {
                        $attempt[$value2[0]] = 1;
                    } else {
                        $attempt[$value2[0]] = 0;
                    }
                }
            }
            $data = [];
            $index = 1;
            foreach ($totals as $key => $value) {
                if (isset($attempt[$key])) {
                    $total_session += $value;
                    $done_session += $attempt[$key];
                    array_push($data, [
                        "key" => $index,
                        "title" => $key,
                        "percentage" => $attempt[$key] / $value * 100,
                        "color" => ["#1985ff", "#c9c9c9"]
                    ]);
                } else {
                    array_push($data, [
                        "key" => $index,
                        "title" => $key,
                        "percentage" => 0,
                        "color" => ["#1985ff", "#c9c9c9"]
                    ]);
                }
                $index++;
            }
            $steps = $this->repository->getProgressLinks($this->child_class_id, session("selected_child")["id"], route("curriculum_mock", [
                "sc_id" => $this->child_class_id
            ]));
        }

        return Inertia::render("Parent/Curriculum", [
            "data" => $data,
            "heading" => "Mocks",
            "chartHeading" => "Mock",
            "childName" => $child['name'],
            "steps" => $steps
        ]);

    }
    public function practices()
    {
        $this->child_class_id = (session()->has("selected_child")) ? session("selected_child")["classId"] : null;
        $practice_sets_with_skills = PracticeSet::where("sub_category_id", $this->child_class_id)->with("skill")->get(["id", "skill_id"]);
        $sessions = [];
        $totals = [];
        $attempt = [];
        $data = [];
        $sub_categories = [];
        $child = '';
        $steps = [];
        $total_session = 0;
        $done_session = 0;
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
            foreach ($practice_sets_with_skills as $key => $value) {
                $section = Section::where("id", $value->skill->section_id)->get();
                $practice_session = PracticeSession::where("practice_set_id", $value->id)->where("user_id", session("selected_child")["id"])->get("id");
                if (count($practice_session) > 0) {
                    array_push($sessions, [$section[0]->name => $practice_session[0]->id]);
                } else {
                    array_push($sessions, [$section[0]->name => null]);
                }
            }
            foreach ($sessions as $value) {
                // attempts
                if (!is_null($value[array_key_first($value)])) {
                    if (isset($attempt[array_key_first($value)])) {
                        $attempt[array_key_first($value)] += 1;
                    } else {
                        $attempt[array_key_first($value)] = 1;
                    }
                }
                // Totals
                if (isset($totals[array_key_first($value)])) {
                    $totals[array_key_first($value)] += 1;
                } else {
                    $totals[array_key_first($value)] = 1;
                }
            }
            // Finalize Data
            $index = 0;
            foreach ($totals as $key => $value) {
                
                if (isset($attempt[$key])) {
                    $total_session += $value;
                    $done_session += $attempt[$key];
                    array_push($data, [
                        "key" => $index,
                        "title" => $key,
                        "percentage" => $attempt[$key] / $value * 100,
                        "color" => ["#1985ff", "#c9c9c9"]
                    ]);
                } else {
                    // array_push($data, [
                    //     "key" => $index,
                    //     "title" => $key,
                    //     "percentage" => 0,
                    //     "color" => ["#1985ff", "#c9c9c9"]
                    // ]);
                }
                $index++;
            }
            $steps = $this->repository->getProgressLinks($this->child_class_id, session("selected_child")["id"], route("curriculum_practice", [
                "sc_id" => $this->child_class_id
            ]));
        }
        return view("Parent/CurriculumPractice", [
            "data" => $data,
            "heading" => "Practice Sets",
            "chartHeading" => "Practice Set",
            "childName" => $child['name'],
            "steps" => $steps,
            "total_session" => $total_session,
            "done_session" => $done_session
        ]);


    }
    public function quizzes()
    {
        $this->child_class_id = (session()->has("selected_child")) ? session("selected_child")["classId"] : null;
        $sub_categories = [];
        $child = '';
        $result = [];
        $total_session = 0;
        $done_session = 0;
        $quizzes = Quiz::where("sub_category_id", $this->child_class_id)->with("quizType")->get(["id", "quiz_type_id", "title"]);
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
            foreach ($quizzes as $key => $value) {
                $quiz_sessions = QuizSession::where("quiz_id", $value->id)->where("user_id", session("selected_child")["id"])->get("id");
                if (count($quiz_sessions) > 0) {
                    if (!isset($result[$value->title])) {
                        $result[$value->title] = [$value->quizType->name, $quiz_sessions[0]->id];
                    }
                } else {
                    if (!isset($result[$value->title])) {
                        $result[$value->title] = [$value->quizType->name, null];
                    }
                }
            }

            $totals = [];
            $attempt = [];
            foreach ($result as $key => $value2) {
                if (isset($totals[$value2[0]])) {
                    $totals[$value2[0]] += 1;
                } else {
                    $totals[$value2[0]] = 1;
                }
                if (isset($attempt[$value2[0]])) {
                    if ($value2[1] != null) {
                        $attempt[$value2[0]] += 1;
                    }
                } else {
                    if ($value2[1] != null) {
                        $attempt[$value2[0]] = 1;
                    } else {
                        $attempt[$value2[0]] = 0;
                    }
                }
            }
            $data = [];
            $index = 1;
            foreach ($totals as $key => $value) {
                $total_session += $value;
                $done_session += $attempt[$key];
                if (isset($attempt[$key])) {
                    array_push($data, [
                        "key" => $index,
                        "title" => $key,
                        "percentage" => $attempt[$key] / $value * 100,
                        "color" => ["#1985ff", "#c9c9c9"]
                    ]);
                } else {
                    array_push($data, [
                        "key" => $index,
                        "title" => $key,
                        "percentage" => 0,
                        "color" => ["#1985ff", "#c9c9c9"]
                    ]);
                }
                $index++;
            }
        }
        return view("Parent/CurriculumQuiz", [
            "data" => $data,
            "heading" => "Quizzes",
            "chartHeading" => "Quiz",
            "childName" => $child['name'],
            "total_session" => $total_session,
            "done_session" => $done_session,
            "steps" => $this->repository->getProgressLinks($this->child_class_id, session("selected_child")["id"], route("curriculum_quiz", [
                "sc_id" => $this->child_class_id,
            ]))
        ]);
    }


}


?>
