<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SettingsRepository;
use App\Settings\CategorySettings;
use App\Settings\CtaSettings;
use App\Settings\FeatureSettings;
use App\Settings\FooterSettings;
use App\Settings\HeroSettings;
use App\Settings\HomePageSettings;
use App\Settings\StatSettings;
use App\Settings\TestimonialSettings;
use App\Settings\HelpSettings;
use App\Settings\TeacherSettings;
use App\Settings\AboutUsSettings;
use App\Settings\TopBarSettings;
use App\Settings\OurServicesSettings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Filters\ContactFilters;
use App\Transformers\Admin\ContactTransformer;
use App\Models\SubscribeEmail;
use App\Filters\SubscribeEmailFilters;
use App\Transformers\Admin\SubscribeEmailTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomePageSettingController extends Controller
{
    /**
     * Get Home Page Settings Page
     *
     * @param HomePageSettings $homePageSettings
     * @return \Inertia\Response
     */
    public function home(HomePageSettings $homePageSettings)
    {
        return view('Admin/Settings/HomePageSettings', [
            'homePageSettings' => $homePageSettings->toArray(),
            'heroSettings' => app(HeroSettings::class)->toArray(),
            'topBarSettings' => app(TopBarSettings::class)->toArray(),
            'featureSettings' => app(FeatureSettings::class)->toArray(),
            'ctaSettings' => app(CtaSettings::class)->toArray(),
            'testimonialSettings' => app(TestimonialSettings::class)->toArray(),
            'statSettings' => app(StatSettings::class)->toArray(),
            'categorySettings' => app(CategorySettings::class)->toArray(),
            'footerSettings' => app(FooterSettings::class)->toArray()
        ]);
    }
    public function contact(ContactFilters $filters)
    {
        return view('Admin/Settings/Contact', [
            'contacts' => function () use($filters) {
                return fractal(Contact::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new ContactTransformer())->toArray();
            }
        ]);
    }
    public function SubscriptedUser(SubscribeEmailFilters $filters)
    {
        return view('Admin/Settings/SubscriptedUser', [
            'users' => function () use($filters) {
                return fractal(SubscribeEmail::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new SubscribeEmailTransformer())->toArray();
            }
        ]);
    }
    

    /**
     * Update Home Page Settings
     *
     * @param Request $request
     * @param HomePageSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateHomePageSettings(Request $request, HomePageSettings $settings)
    {
        $enable_top_bar = $request->enable_top_bar == 'on' ? true : false;
        $enable_hero = $request->enable_hero == 'on' ? true : false;
        $enable_features = $request->enable_features == 'on' ? true : false;
        $enable_categories = $request->enable_categories == 'on' ? true : false;
        $enable_stats = $request->enable_stats == 'on' ? true : false;
        $enable_testimonials = $request->enable_testimonials == 'on' ? true : false;
        $enable_cta = $request->enable_cta == 'on' ? true : false;
        $enable_our_services = $request->enable_our_services == 'on' ? true : false;
        $enable_footer = $request->enable_footer == 'on' ? true : false;
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        $settings->enable_top_bar = $enable_top_bar;
        $settings->enable_hero = $enable_hero;
        $settings->enable_features = $enable_features;
        $settings->enable_categories = $enable_categories;
        $settings->enable_stats = $enable_stats;
        $settings->enable_testimonials = $enable_testimonials;
        $settings->enable_cta = $enable_cta;
        $settings->enable_our_services = $enable_our_services;
        $settings->enable_footer = $enable_footer;
        $settings->save();
        return back()->with('success', 'Home page settings updated successfully.');
    }

    /**
     * Update Hero Settings
     *
     * @param Request $request
     * @param SettingsRepository $repository
     * @param HeroSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateHeroSettings(Request $request, SettingsRepository $repository, HeroSettings $settings)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }


        if (isset($request['image_path'])) {
            $imageName = time().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('storage/site'), $imageName);
            $profile_photo_path = 'site/'.$imageName;
            $settings->image_path = $profile_photo_path;
        }
        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->cta_text = $request->get('cta_text');
        $settings->cta_link = $request->get('cta_link');
        $settings->save();
        return back()->with('success', 'Hero settings updated successfully.');
    }

    /**
     * Update Top Bar Settings
     *
     * @param Request $request
     * @param TopBarSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateTopBarSettings(Request $request, TopBarSettings $settings)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $settings->message = $request->get('message');
        $settings->button_text = $request->get('button_text');
        $settings->button_link = $request->get('button_link');
        $settings->save();

        return back()->with('success', 'Top Bar settings updated successfully.');
    }

    /**
     * Update Top Bar Settings
     *
     * @param Request $request
     * @param CtaSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateCtaSettings(Request $request, CtaSettings $settings)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->button_text = $request->get('button_text');
        $settings->button_link = $request->get('button_link');
        $settings->save();

        return back()->with('success', 'CTA settings updated successfully.');
    }

    /**
     * Update Category Settings
     *
     * @param Request $request
     * @param CategorySettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateCategorySettings(Request $request, CategorySettings $settings)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->explore_title = $request->get('explore_title');
        $settings->explore_subtitle = $request->get('explore_subtitle');
        $settings->explore_image_path = $request->get('explore_image_path');

        $settings->save();

        return back()->with('success', 'Category settings updated successfully.');
    }

    /**
     * Update Feature Settings
     *
     * @param Request $request
     * @param FeatureSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateFeatureSettings(Request $request, FeatureSettings $settings)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $validations = [
            'title' => ['required', 'string', 'max:160'],
            'subtitle' => ['required', 'string', 'max:160'],
        ];

        foreach ([1,2,3,4] as $i) {
            $validations['feature'.$i.'_caption'] = ['required', 'string', 'max:160'];
            $validations['feature'.$i.'_description'] = ['required', 'string', 'max:160'];
            $validations['feature'.$i.'_icon_url'] = ['required', 'string', 'max:250'];
        }

        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->feature1 = [$request->feature1_caption, $request->feature1_description, $request->feature1_icon_url];
        $settings->feature2 = [$request->feature2_caption, $request->feature2_description, $request->feature2_icon_url];
        $settings->feature3 = [$request->feature3_caption, $request->feature3_description, $request->feature3_icon_url];
        $settings->feature4 = [$request->feature4_caption, $request->feature4_description, $request->feature4_icon_url];
        $settings->save();

        return back()->with('success', 'Features settings updated successfully.');
    }

    /**
     * Update Stat Settings
     *
     * @param Request $request
     * @param StatSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatSettings(Request $request, StatSettings $settings)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $validations = [
            'title' => ['required', 'string', 'max:160'],
            'subtitle' => ['required', 'string', 'max:160'],
            'image_path' => ['required', 'string', 'max:160'],
        ];

        foreach ([1,2,3] as $i) {
            $validations['stat'.$i.'_name'] = ['required', 'string', 'max:160'];
            $validations['stat'.$i.'_count'] = ['required', 'string', 'max:160'];
        }

        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->image_path = $request->get('image_path');
        $settings->stat1 = [$request->stat1_count, $request->stat1_name];
        $settings->stat2 = [$request->stat2_count, $request->stat2_name];
        $settings->stat3 = [$request->stat3_count, $request->stat3_name];
        $settings->save();

        return back()->with('success', 'Statistics settings updated successfully.');
    }

    /**
     * Update Testimonial Settings
     *
     * @param Request $request
     * @param TestimonialSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateTestimonialSettings(Request $request, TestimonialSettings $settings)
    {
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $validations = [
            'title' => ['required', 'string', 'max:160'],
            'subtitle' => ['required', 'string', 'max:160'],
        ];
        
        foreach ([1,2,3,4,5,6] as $i) {
            $validations['testimonial'.$i.'_name'] = ['required', 'string', 'max:160'];
            $validations['testimonial'.$i.'_designation'] = ['required', 'string', 'max:160'];
            $validations['testimonial'.$i.'_message'] = ['required', 'string', 'max:250'];
            $validations['testimonial'.$i.'_image'] = ['required', 'string', 'max:250'];
        }
        
        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->testimonial1 = [$request->testimonial1_name, $request->testimonial1_designation, $request->testimonial1_message, $request->testimonial1_image];
        $settings->testimonial2 = [$request->testimonial2_name, $request->testimonial2_designation, $request->testimonial2_message, $request->testimonial2_image];
        $settings->testimonial3 = [$request->testimonial3_name, $request->testimonial3_designation, $request->testimonial3_message, $request->testimonial3_image];
        $settings->testimonial4 = [$request->testimonial4_name, $request->testimonial4_designation, $request->testimonial4_message, $request->testimonial4_image];
        $settings->testimonial5 = [$request->testimonial5_name, $request->testimonial5_designation, $request->testimonial5_message, $request->testimonial5_image];
        $settings->testimonial6 = [$request->testimonial6_name, $request->testimonial6_designation, $request->testimonial6_message, $request->testimonial6_image];
        $settings->save();
        return back()->with('success', 'Testimonial settings updated successfully.');
    }

    public function updateOurServicesSettings(Request $request, OurServicesSettings $settings)
    {
        $service1_enable = $request->service1_enable == 'on' ? true : false;
        $service2_enable = $request->service2_enable == 'on' ? true : false;
        $service3_enable = $request->service3_enable == 'on' ? true : false;
        $service4_enable = $request->service4_enable == 'on' ? true : false;
        $service5_enable = $request->service5_enable == 'on' ? true : false;
        $service6_enable = $request->service6_enable == 'on' ? true : false;
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->image_url = $request->get('image_url');
        $settings->services[0] = [$request->service1_title, $request->service1_subtitle, $request->service1_imageurl, $service1_enable];
        $settings->services[1] = [$request->service2_title, $request->service2_subtitle, $request->service2_imageurl, $service2_enable];
        $settings->services[2] = [$request->service3_title, $request->service3_subtitle, $request->service3_imageurl, $service3_enable];
        $settings->services[3] = [$request->service4_title, $request->service4_subtitle, $request->service4_imageurl, $service4_enable];
        $settings->services[4] = [$request->service5_title, $request->service5_subtitle, $request->service5_imageurl, $service5_enable];
        $settings->services[5] = [$request->service6_title, $request->service6_subtitle, $request->service6_imageurl, $service6_enable];
        $settings->save();
        return back()->with('success', 'Our services settings updated successfully.');
    }

    public function updateHelpSettings(Request $request, HelpSettings $settings)
    {
        $faq1_enable = $request->faq1_enable == 'on' ? true : false;
        $faq2_enable = $request->faq2_enable == 'on' ? true : false;
        $faq3_enable = $request->faq3_enable == 'on' ? true : false;
        $faq4_enable = $request->faq4_enable == 'on' ? true : false;
        $faq5_enable = $request->faq5_enable == 'on' ? true : false;
        $faq6_enable = $request->faq6_enable == 'on' ? true : false;
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->image_path = $request->get('image_path');
        $settings->contact_title = $request->get('contact_title');
        $settings->contact_subtitle = $request->get('contact_subtitle');
        $settings->contact_image_path = $request->get('contact_image_path');
        $settings->faqs[0] = [$request->faq1_title, $request->faq1_subtitle, $faq1_enable];
        $settings->faqs[1] = [$request->faq2_title, $request->faq2_subtitle, $faq2_enable];
        $settings->faqs[2] = [$request->faq3_title, $request->faq3_subtitle, $faq3_enable];
        $settings->faqs[3] = [$request->faq4_title, $request->faq4_subtitle, $faq4_enable];
        $settings->faqs[4] = [$request->faq5_title, $request->faq5_subtitle, $faq5_enable];
        $settings->faqs[5] = [$request->faq6_title, $request->faq6_subtitle, $faq6_enable];
        $settings->save();
        return back()->with('success', 'Help settings updated successfully.');
    }

    public function updateTeacherSettings(Request $request, TeacherSettings $settings)
    {
        $teacher1_enable = $request->teacher1_enable == 'on' ? true : false;
        $teacher2_enable = $request->teacher2_enable == 'on' ? true : false;
        $teacher3_enable = $request->teacher3_enable == 'on' ? true : false;
        $teacher4_enable = $request->teacher4_enable == 'on' ? true : false;
        $teacher5_enable = $request->teacher5_enable == 'on' ? true : false;
        $teacher6_enable = $request->teacher6_enable == 'on' ? true : false;
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->image_path = $request->get('image_path');
        $settings->teachers[0] = [$request->teacher1_name, $request->teacher1_designation, $request->teacher1_subtitle, $request->teacher1_imageurl, $teacher1_enable];
        $settings->teachers[1] = [$request->teacher2_name, $request->teacher2_designation, $request->teacher2_subtitle, $request->teacher2_imageurl, $teacher2_enable];
        $settings->teachers[2] = [$request->teacher3_name, $request->teacher3_designation, $request->teacher3_subtitle, $request->teacher3_imageurl, $teacher3_enable];
        $settings->teachers[3] = [$request->teacher4_name, $request->teacher4_designation, $request->teacher4_subtitle, $request->teacher4_imageurl, $teacher4_enable];
        $settings->teachers[4] = [$request->teacher5_name, $request->teacher5_designation, $request->teacher5_subtitle, $request->teacher5_imageurl, $teacher5_enable];
        $settings->teachers[5] = [$request->teacher6_name, $request->teacher6_designation, $request->teacher6_subtitle, $request->teacher6_imageurl, $teacher6_enable];
        $settings->save();
        return back()->with('success', 'Teacher settings updated successfully.');
    }

    public function updateAboutUsSettings(Request $request, AboutUsSettings $settings)
    {
        
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        $settings->title = $request->get('title');
        $settings->subtitle = $request->get('subtitle');
        $settings->image_url = $request->get('image_url');
        $settings->save();
        return back()->with('success', 'About us settings updated successfully.');
    }

    /**
     * Update Footer Settings
     *
     * @param Request $request
     * @param FooterSettings $settings
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateFooterSettings(Request $request, FooterSettings $settings)
    {
        $enable_links = $request->enable_links == 'on' ? true : false;
        $enable_social_links = $request->enable_social_links == 'on' ? true : false;
        $enable_social_links = $request->enable_social_links == 'on' ? true : false;
        $footer_link1 = $request->footer_link1 == 'on' ? true : false;
        $footer_link2 = $request->footer_link2 == 'on' ? true : false;
        $footer_link3 = $request->footer_link3 == 'on' ? true : false;
        $footer_link4 = $request->footer_link4 == 'on' ? true : false;
        $footer_link5 = $request->footer_link5 == 'on' ? true : false;
        $footer_link6 = $request->footer_link6 == 'on' ? true : false;
        $enable_facebook = $request->enable_facebook == 'on' ? true : false;
        $enable_twitter = $request->enable_twitter == 'on' ? true : false;
        $enable_youtube = $request->enable_youtube == 'on' ? true : false;
        $enable_instagram = $request->enable_instagram == 'on' ? true : false;
        $enable_linkedin = $request->enable_linkedin == 'on' ? true : false;
        $enable_github = $request->enable_github == 'on' ? true : false;
        if(config('tutor11.demo_mode')) {
            return back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }
        $validations = [
            'copyright_text' => ['required', 'string', 'max:160'],
        ];

        $settings->copyright_text = $request->get('copyright_text');
        $settings->footer_address = $request->get('address');
        $settings->footer_contact = $request->get('contact');
        $settings->footer_email = $request->get('email');
        $settings->subscribe_text = $request->get('subscribe_text');
        $settings->enable_links = $enable_links;
        $settings->enable_social_links = $enable_social_links;
        $settings->footer_links = [
            [$request->get('footer_link1_text'), $request->get('footer_link1_url'), $footer_link1],
            [$request->get('footer_link2_text'), $request->get('footer_link2_url'), $footer_link2],
            [$request->get('footer_link3_text'), $request->get('footer_link3_url'), $footer_link3],
            [$request->get('footer_link4_text'), $request->get('footer_link4_url'), $footer_link4],
            [$request->get('footer_link4_text'), $request->get('footer_link4_url'), $footer_link4],
            [$request->get('footer_link5_text'), $request->get('footer_link5_url'), $footer_link5],
            [$request->get('footer_link6_text'), $request->get('footer_link6_url'), $footer_link6]
        ];
        $settings->social_links = [
            'facebook' => ['Facebook', $enable_facebook, $request->get('facebook_link')],
            'twitter' => ['Twitter', $enable_twitter, $request->get('twitter_link')],
            'youtube' => ['Youtube', $enable_youtube, $request->get('youtube_link')],
            'instagram' => ['Instagram', $enable_instagram, $request->get('instagram_link')],
            'linkedin' => ['LinkedIn', $enable_linkedin, $request->get('linkedin_link')],
            'github' => ['GitHub', $enable_github, $request->get('github_link')],
        ];
        $settings->save();

        return back()->with('success', 'Footer settings updated successfully.');
    }
}
