<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Section;
use App\Models\Skill;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function main()
    {
        $xml = view('sitemap');
        return response($xml)->header('Content-Type', 'text/xml');
    }
    public function schoolSitemap()
    {
        $xml = view('school_sitemap', [
            'schools' => School::select('id', 'slug', 'region')->get(),
        ]);

        return response($xml)->header('Content-Type', 'text/xml');
    }
    public function subjectsSitemap(Request $request)
    {
        $urls = [];
        $subjects = Section::select('id', 'slug')->get();
        foreach($subjects as $subject){
            array_push($urls, route('subject', ['subject' => $subject->slug]));
            $topics = Skill::select('id', 'slug')->where('section_id', $subject->id)->get();
            foreach($topics as $topic){
                array_push($urls, route('topic', ['subject_region' => $subject->slug, 'topic_school' => $topic->slug]));
                $sub_topics = Topic::select('id', 'slug')->where('skill_id', $topic->id)->get();
                foreach($sub_topics as $sub_topic){
                    array_push($urls, route('sub_topic', ['subject' => $subject->slug, 'topic' => $topic->slug, 'subtopic' => $sub_topic->slug]));
                }
            }
        }
        $xml = view('dynamic_sitemap', [
            'urls' => $urls,
        ]);
        return response($xml)->header('Content-Type', 'text/xml');
    }
    public function regionsSitemap(Request $request)
    {
        $urls = [];
        $regions = School::selectRaw('region, GROUP_CONCAT(id) as ids, GROUP_CONCAT(slug) as slugs')
        ->groupBy('region')
        ->get();
        foreach($regions as $region){
            array_push($urls, route('school_region', ['region' => Str::slug($region->region)]));
        }
        $xml = view('dynamic_sitemap', [
            'urls' => $urls,
        ]);
        return response($xml)->header('Content-Type', 'text/xml');
    }
}
