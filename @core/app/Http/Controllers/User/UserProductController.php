<?php

namespace App\Http\Controllers\User;

use App\Actions\Blog\BlogAction;
use App\Actions\Blog\BlogUserAction;
use App\Actions\Product\ProductAction;
use App\Actions\Product\ProductUserAction;
use App\Blog;
use App\BlogCategory;
use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogInsertRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Requests\ProductInsertRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductLocation;
use App\ProductTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    private const BASE_PATH = 'frontend.user.dashboard.user-post.';

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function get_user_id(){
        return Auth::guard('web')->user()->id;
    }

    public function user_index(Request $request){

        $all_user_product = Product::where('user_id',$this->get_user_id())->latest()->paginate(10);
        $default_lang = $request->lang ??  LanguageHelper::user_lang_slug();
        return view(self::BASE_PATH.'index',compact('all_user_product','default_lang'));
    }

    public function user_new_product(Request $request){
        $all_category = ProductCategory::select(['id','title'])->get();
        $all_brand = ProductBrand::select(['id','title'])->get();
        $all_location = ProductLocation::select(['id','city_name','state_name'])->get();
        return view(self::BASE_PATH.'new')->with([
            'all_category' => $all_category,
            'all_brand' => $all_brand,
            'all_location' => $all_location,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function user_store_new_product(ProductInsertRequest $request, ProductUserAction  $productAction){
        $productAction->store_execute($request);
        return back()->with(FlashMsg::item_new('Product Created Successfully..'));
    }

    public function user_edit_product(Request $request,$id){
        $product = Product::find($id);
        $all_category = ProductCategory::select(['id','title'])->get();
        $all_brand = ProductBrand::select(['id','title'])->get();
        $all_location = ProductLocation::select(['id','city_name','state_name'])->get();
        return view(self::BASE_PATH.'edit')->with([
            'all_category' => $all_category,
            'all_brand' => $all_brand,
            'all_location' => $all_location,
            'product' => $product,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function user_update_product(ProductUpdateRequest $request, ProductUserAction $productUserAction,$id) : RedirectResponse
    {
        $productUserAction->update_execute($request,$id);
        return back()->with(FlashMsg::item_update('Product Updated Successfully..'));
    }

    public function user_delete_product_all_lang(Request $request,ProductUserAction $action, $id){
        $action->delete_execute($request,$id,'delete');
        return redirect()->back()->with(FlashMsg::item_delete('Product Deleted Successfully..'));
    }

    public function user_clone_product(Request $request, ProductUserAction $productAction)
    {
        $productAction->clone_product_execute($request);
        return back()->with(FlashMsg::item_clone('Product Cloned..'));
    }

    public function get_tags_by_ajax(Request $request)
    {
        $query = $request->get('query');
        $filterResult = ProductTag::Where('name', 'LIKE', '%' . $query . '%')->get();
        $html_markup = '';
        $result = [];
        foreach ($filterResult as $data) {

            $fdata = $data->getTranslation('name', get_user_lang());
            array_push($result, $fdata);
        }
        return response()->json(['result' => $result]);
    }

    //=============================== FORCE DELETE AND RESTORE FUNCTIONS =================================

    public function trashed_blogs(Request $request){
        $trashed_blogs = Product::where('user_id',$this->get_user_id())->onlyTrashed()->paginate(10);
        $default_lang = $request->lang ?? LanguageHelper::default_slug();
        return view(self::BASE_PATH.'trashed',compact('trashed_blogs','default_lang'));
    }

    public function user_restore_trashed_product($id){
        Product::where('user_id',$this->get_user_id())->onlyTrashed()->find($id)->restore();
        return back()->with(FlashMsg::settings_update('Trashed Product Restored Successfully..'));
    }

    public function user_delete_trashed_product(Request $request, ProductUserAction $act, $id){

        $act->delete_execute($request,$id,'trashed_delete');
        return back()->with(FlashMsg::item_delete('Product Deleted Forever'));
    }

}
