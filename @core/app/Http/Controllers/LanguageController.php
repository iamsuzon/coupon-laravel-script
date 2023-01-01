<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\Blog;
use App\Contribution;
use App\Counterup;
use App\Event;
use App\EventCategory;
use App\Faq;
use App\Gallery;
use App\GalleryCategory;
use App\HeaderSlider;
use App\KeyFeatures;
use App\Language;

use App\Newsletter;
use App\Page;
use App\StaticOption;
use App\Tag;
use App\Testimonial;
use App\TopbarInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:language-list|language-edit|language-create|language-delete', ['only' => ['index', 'make_default']]);
        $this->middleware('permission:language-create', ['only' => ['store']]);
        $this->middleware('permission:language-edit', ['only' => ['backend_edit_words', 'frontend_edit_words', 'update_words', 'update', 'add_new_string', 'clone']]);
        $this->middleware('permission:language-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $all_lang = Language::all();
        return view('backend.languages.index')->with([
            'all_lang' => $all_lang
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string:max:191',
            'direction' => 'required|string:max:191',
            'slug' => 'required|string:max:191',
            'status' => 'required|string:max:191',
        ]);

        Language::create([
            'name' => $request->name,
            'direction' => $request->direction,
            'slug' => $request->slug,
            'status' => $request->status,
            'default' => 0
        ]);

        //generate admin panel string
        $backend_default_lang_data = file_get_contents(resource_path('lang/') . 'en_GB.json');
        file_put_contents(resource_path('lang/') . $request->slug . '.json', $backend_default_lang_data);

        return redirect()->back()->with([
            'msg' => __('New Language Added Success...'),
            'type' => 'success'
        ]);
    }

    public function all_edit_words($slug)
    {
        $all_word = file_get_contents(resource_path('lang/') . $slug . '.json');
        return view('backend.languages.edit-words')->with([
            'all_word' => json_decode($all_word),
            'lang_slug' => $slug,
            'type' => 'backend'
        ]);
    }

    public function update_words(Request $request, $id)
    {
        $lang = Language::where('slug', $id)->first();
        $content = json_encode($request->word);
        if ($content === 'null') {
            return back()->with(['msg' => __('Please fill one minimum one field'), 'type' => 'danger']);
        }
        file_put_contents(resource_path('lang/') . $lang->slug . '.json', $content);
        return back()->with(['msg' => __('Words Change Success'), 'type' => 'success']);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string:max:191',
            'direction' => 'required|string:max:191',
            'status' => 'required|string:max:191',
            'slug' => 'required|string:max:191'
        ]);
        Language::where('id', $request->id)->update([
            'name' => $request->name,
            'direction' => $request->direction,
            'status' => $request->status,
            'slug' => $request->slug
        ]);
        $backend_lang_file_path = resource_path('lang/') . $request->slug . '.json';
        $frontend_lang_file_path = resource_path('lang/') . $request->slug . '.json';
        if (!file_exists($backend_lang_file_path)) {
            file_put_contents(resource_path('lang/') . $request->slug . '.json', file_get_contents(resource_path('lang/') . $request->slug . '.json'));
        }


        return redirect()->back()->with([
            'msg' => __('Language Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete(Request $request, $id)
    {

        $lang = Language::find($id);
        $all_static_option = StaticOption::where('option_name', 'regexp', '_' . $lang->slug . '_')->get();
        foreach ($all_static_option as $option) {
            StaticOption::find($option->id)->delete();
        }

        $all_lang_models = [
            BlogCategory::all(),
            Blog::all(),
            Page::all(),
            Faq::all(),
            Tag::all(),
        ];

        foreach ($all_lang_models as $model) {
            foreach ($model as $item) {
                $item->forgetAllTranslations($lang->slug)->save();
            }
        }

        $lang->delete();
        if (file_exists(resource_path('lang/') . $lang->slug . '.json')) {
            unlink(resource_path('lang/') . $lang->slug . '.json');
        }
        return redirect()->back()->with([
            'msg' => __('Language Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function make_default(Request $request, $id)
    {
        Language::where('default', 1)->update(['default' => 0]);
        Language::find($id)->update(['default' => 1]);
        $lang = Language::find($id);
        $lang->default = 1;
        $lang->save();
        session()->put('lang', $lang->slug);
        return redirect()->back()->with([
            'msg' => __('Default Language Set To') . ' ' . $lang->name,
            'type' => 'success'
        ]);
    }

    public function clone_languages(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|string',
            'direction' => 'required|string',
            'status' => 'required|string',
            'slug' => 'required|string',
        ]);

        $clone_lang = Language::find($request->id);
        Language::create([
            'name' => $request->name,
            'direction' => $request->direction,
            'slug' => $request->slug,
            'status' => $request->status,
            'default' => 0
        ]);

        $search_term = '_' . $clone_lang->slug . '_';
        $all_static_option = StaticOption::where('option_name', 'regexp', $search_term)->get();
        foreach ($all_static_option as $option) {
            $option_name = str_replace($search_term, '_' . $request->slug . '_', $option->option_name);
            StaticOption::create([
                'option_name' => $option_name,
                'option_value' => $option->option_value
            ]);
        }

        $backend_default_lang_data = file_get_contents(resource_path('lang') . '/' . $clone_lang->slug . '_backend.json');
        file_put_contents(resource_path('lang/') . $request->slug . '.json', $backend_default_lang_data);


        return redirect()->back()->with([
            'msg' => __('Language clone success with content...'),
            'type' => 'success'
        ]);
    }


    public function add_new_words(Request $request)
    {

        $this->validate($request, [
            'lang_slug' => 'required|string',
            'new_string' => 'required|string',
            'translate_string' => 'required|string',
        ]);

        if (file_exists(resource_path('lang/') . $request->lang_slug . '.json')) {
            $default_lang_data = file_get_contents(resource_path('lang/') . $request->lang_slug .'.json');
            $default_lang_data = (array)json_decode($default_lang_data);
            $default_lang_data[$request->new_string] = $request->translate_string;
            $default_lang_data = (object)$default_lang_data;
            $default_lang_data = json_encode($default_lang_data);
            file_put_contents(resource_path('lang/') . $request->lang_slug . '.json', $default_lang_data);
        }

        return back()->with(['msg' => __('New Word Added'), 'type' => 'success']);
    }


}
