<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($schools as $school)
        <url>
            <loc>{{route('topic',['subject_region' => $school->region_slug, 'topic_school'=> $school->slug])}}</loc>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>