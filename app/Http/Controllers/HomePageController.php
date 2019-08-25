<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Country;
use App\Dlc;
use App\Gallery;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Cart;
use App\Invoice;
use App\ProductInvoice;
use Session;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        $lsPost = Post::orderBy('created_at','desc')->take(4)->get();
	    $lsDiscountPost = Post::where('discount','>', 0)->orderBy('discount','desc')->take(2)->get();
        $lsDlc = Dlc::orderBy('created_at','desc')->take(4)->get();
	    $lsDlcFree = Dlc::where('price', 0)->orderBy('created_at','desc')->get();
	    $lsDiscountDlc = Dlc::where('discount','>', 0)->orderBy('discount','desc')->take(2)->get();
        return view('welcome')->with(['lsPost' => $lsPost, 'lsDiscountPost' => $lsDiscountPost,
	        'lsDlc' => $lsDlc, 'lsDiscountDlc' => $lsDiscountDlc, 'lsDlcFree' => $lsDlcFree]);
    }
    public function viewPost($id){
        $post = Post::find($id);
        $lsGallery = Gallery::where('post_id', $id)->get();
        if (Auth::check()){
	        $userID = auth()->user()->id;
	        $lsUserRating = $post->comment()->where('status', 1)->where('user_id', $userID)->get();
	        $lsUserRatingCount = count($lsUserRating);
        }

        $lsRating5 = $post->comment()->where('status', 1)->where('rating', 5)->get();
        $lsRating4 = $post->comment()->where('status', 1)->where('rating', 4)->get();
        $lsRating3 = $post->comment()->where('status', 1)->where('rating', 3)->get();
        $lsRating2 = $post->comment()->where('status', 1)->where('rating', 2)->get();
        $lsRating1 = $post->comment()->where('status', 1)->where('rating', 1)->get();

        $lsRatingTotal = count($post->comment()->where('status', 1)->get());
		if($lsRatingTotal > 0 ){
			$lsRating5Score = count($lsRating5)*100/$lsRatingTotal;
			$lsRating4Score = count($lsRating4)*100/$lsRatingTotal;
			$lsRating3Score = count($lsRating3)*100/$lsRatingTotal;
			$lsRating2Score = count($lsRating2)*100/$lsRatingTotal;
			$lsRating1Score = count($lsRating1)*100/$lsRatingTotal;
		}else{
			$lsRating5Score = 0;
			$lsRating4Score = 0;
			$lsRating3Score = 0;
			$lsRating2Score = 0;
			$lsRating1Score = 0;
		}

        $lsRatingScore = (5*$lsRating5Score + 4*$lsRating4Score +
		        3*$lsRating3Score + 2*$lsRating2Score + $lsRating1Score)/100;

        $listComment = $post->comment()->where('status', 1)->orderBy('created_at','desc')->paginate(10);
        $listComment->fragment('comment-target')->links();
        return view("view_post")->with(['post'=>$post])->with(['listComment'=>$listComment,
	        'lsRating5Score'=>$lsRating5Score, 'lsRating4Score'=>$lsRating4Score,
	        'lsRating3Score'=>$lsRating3Score, 'lsRating2Score'=>$lsRating2Score,
	        'lsRating1Score'=>$lsRating1Score, 'lsRatingTotal'=>$lsRatingTotal,
	        'lsRatingScore'=>$lsRatingScore, 'lsGallery' => $lsGallery])
	        ->with('lsUserRatingCount', isset($lsUserRatingCount)?$lsUserRatingCount:null);
    }

	public function viewDlc($id){
		$dlc = Dlc::find($id);
		if (Auth::check()){
			$userID = auth()->user()->id;
			$lsUserRating = $dlc->comment()->where('status', 1)->where('user_id', $userID)->get();
			$lsUserRatingCount = count($lsUserRating);
		}

		$lsRating5 = $dlc->comment()->where('status', 1)->where('rating', 5)->get();
		$lsRating4 = $dlc->comment()->where('status', 1)->where('rating', 4)->get();
		$lsRating3 = $dlc->comment()->where('status', 1)->where('rating', 3)->get();
		$lsRating2 = $dlc->comment()->where('status', 1)->where('rating', 2)->get();
		$lsRating1 = $dlc->comment()->where('status', 1)->where('rating', 1)->get();

		$lsRatingTotal = count($dlc->comment()->where('status', 1)->get());
		if($lsRatingTotal > 0 ){
			$lsRating5Score = count($lsRating5)*100/$lsRatingTotal;
			$lsRating4Score = count($lsRating4)*100/$lsRatingTotal;
			$lsRating3Score = count($lsRating3)*100/$lsRatingTotal;
			$lsRating2Score = count($lsRating2)*100/$lsRatingTotal;
			$lsRating1Score = count($lsRating1)*100/$lsRatingTotal;
		}else{
			$lsRating5Score = 0;
			$lsRating4Score = 0;
			$lsRating3Score = 0;
			$lsRating2Score = 0;
			$lsRating1Score = 0;
		}

		$lsRatingScore = (5*$lsRating5Score + 4*$lsRating4Score +
				3*$lsRating3Score + 2*$lsRating2Score + $lsRating1Score)/100;

		$listComment = $dlc->comment()->where('status', 1)->orderBy('created_at','desc')->paginate(10);
		$listComment->fragment('comment-target')->links();
		return view("view_dlc")->with(['dlc'=>$dlc])->with(['listComment'=>$listComment,
			'lsRating5Score'=>$lsRating5Score, 'lsRating4Score'=>$lsRating4Score,
			'lsRating3Score'=>$lsRating3Score, 'lsRating2Score'=>$lsRating2Score,
			'lsRating1Score'=>$lsRating1Score, 'lsRatingTotal'=>$lsRatingTotal,
			'lsRatingScore'=>$lsRatingScore])
			->with('lsUserRatingCount', isset($lsUserRatingCount)?$lsUserRatingCount:null);
	}

    public function categorySingle($id){
        $cate = Category::find($id);
        $lsPostCate = $cate->posts()->paginate(8);
        return view('post_by_category')->with(['lsPostCate' => $lsPostCate,'cate'=>$cate]);
    }
    public function tagSingle($id){
        $tag = Tag::find($id);
        $lsPostTag = $tag->posts()->paginate(8);
        return view('post_by_tag')->with(['lsPostTag' => $lsPostTag,'tag'=>$tag]);
    }
    public function about()
    {
        $lsPost = Post::orderBy('created_at','desc')->take(3)->get();
        $lsDlc = Dlc::orderBy('created_at','desc')->take(3)->get();
        return view('about')->with(['lsPost' => $lsPost, 'lsDlc' => $lsDlc]);
    }
    public function randomPost()
    {
        $randomPost = Post::all()->random(1)->first()->id;
        return redirect('/view_post/'.$randomPost);
    }
    public function post_list()
    {
        $lsPostAll = Post::orderBy('created_at','desc')->paginate(8);
        return view('post_list')->with(['lsPostAll' => $lsPostAll]);
    }
    public function dlc_list()
    {
    	$Title = 'All DLCs';
        $lsDlcAll = Dlc::orderBy('created_at','desc')->paginate(8);
        return view('dlc_list')->with(['lsDlcAll' => $lsDlcAll, 'Title' => $Title]);
    }
    public function dlc_list_by_game($id)
    {
	    $Title = Post::find($id)->title;
        $lsDlcAll = Dlc::where('post_id', $id)->orderBy('created_at','desc')->paginate(8);
        return view('dlc_list')->with(['lsDlcAll' => $lsDlcAll, 'Title' => $Title]);
    }
	public function cart()
	{
		return view('cart');
	}
	public function checkout()
	{
		$lsCountries = Country::all();
		return view('checkout')->with(['lsCountries' => $lsCountries]);
	}
	public function gift()
	{
		return view('gift');
	}
	public function userProfile()
	{
		return view('custom');
	}
	public function editProfile()
	{
		$lsCountries = Country::all();
		return view('edit_profile')->with(['lsCountries' => $lsCountries]);
	}
	public function saveProfile(Request $request)
	{
		$this->validate($request,
			[
				'cover' => 'image|mimes:jpeg,png,gif,jpg,svg|nullable',
				'avatar' => 'image|mimes:jpeg,png,gif,jpg,svg|nullable',
				'firstName'  => 'max:255|min:3|nullable',
				'lastName'  => 'max:255|min:3|nullable',
				'email'  => 'required|email',
				'phone' => 'regex:/[0-9]/|nullable',
				'desc' => 'max:800|nullable'
			]
		);
		$user = User::find(auth()->user()->id);

		$cover = $request->cover;
		if($cover != null){
			$image_name_cover = time() . "_" . $cover->getClientOriginalName();
			if ($cover->isValid()) {
				$cover->move('images', $image_name_cover);
			}
			$path_cover = "images/" . $image_name_cover;
			$user->cover = $path_cover;
		}
		$avatar = $request->avatar;
		if($avatar != null){
			$image_name_avatar = time() . "_" . $avatar->getClientOriginalName();
			if ($avatar->isValid()) {
				$avatar->move('images', $image_name_avatar);
			}
			$path_avatar = "images/" . $image_name_avatar;
			$user->avatar = $path_avatar;
		}

		if($request->firstName != null){
			$user->firstName = $request->firstName;
		}else{
			$user->firstName = null;
		}

		if($request->lastName != null){
			$user->lastName = $request->lastName;
		}else{
			$user->lastName = null;
		}

		$user->email = $request->email;

		if($request->country != null){
			$user->country_id = $request->country;
		}else{
			$user->country_id = null;
		}

		if($request->phone != null){
			$user->phone = $request->phone;
		}else{
			$user->phone = null;
		}

		if($request->desc != null){
			$user->desc = $request->desc;
		}else{
			$user->desc = null;
		}

		$user->save();
		return redirect()->route('user_profile');
	}
	public function get_country_selected_phone_code(Request $request){
		$id = $request -> country_selected_id;
		$country = Country::find($id);
		return response()->json([
			'country_selected_phone_code' => $country->phonecode,
		]);
	}

	public function getAddtoCart(Request $req, $id){
		// Kiem tra game da co trong gio hang chua???
		$dayidpost = array();
		if(Session::has('cart')){
			$giohang = Session::get('cart');
			foreach($giohang->items as $key => $product){
				array_push($dayidpost, $key);
			}
			if(in_array($id, $dayidpost)){
				return redirect()->back();
			}else{
				$product = Post::find($id);
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
				$cart->add($product, $id);
				$req->session()->put('cart', $cart);
				return redirect()->back();
			}
		}else{
			$product = Post::find($id);
			$oldCart = null;
			$cart = new Cart($oldCart);
			$cart->add($product, $id);
			$req->session()->put('cart', $cart);
			return redirect()->back();
		}
	}

	public function getDlctoCart(Request $req, $id){
		// Kiem tra dlc da co trong gio hang chua???
		$dayiddlc = array();
		if(Session::has('cart')){
			$giohang = Session::get('cart');
			foreach($giohang->items as $key => $product){
				array_push($dayiddlc, $key);
			}
			if(in_array($id, $dayiddlc)){
				return redirect()->back();
			}else{
				$product = Dlc::find($id);
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
				$cart->add($product, $id);
				$req->session()->put('cart', $cart);
				return redirect()->back();
			}
		}else{
			$product = Dlc::find($id);
			$oldCart = null;
			$cart = new Cart($oldCart);
			$cart->add($product, $id);
			$req->session()->put('cart', $cart);
			return redirect()->back();
		}
	}

	public function getDelItemCart($id){
		$oldCart = Session::has('cart')?Session::get('cart'):null;
		$cart = new Cart($oldCart);
		$cart -> removeItem($id);
		if(count($cart->items)>0){
			Session::put('cart',$cart);
		}else{
			Session::forget('cart');
		}
		return redirect()->back();
	}
	public function delAllCart(){
		if(Session::has('cart')){
			Session::forget('cart');
			return redirect()->back();
		}
	}
	public function postCheckout(Request $req){
		if(Session::has('cart')){
			$cart = Session::get('cart');
			// dd($cart->items);
			$user = auth()->user();
			// dd($user);
			$invoice = new Invoice;
			$invoice -> user_id = $user->id;
			$invoice -> total = $cart -> totalPrice;
			$invoice -> city = $req -> city;
			$invoice -> state = $req -> state;
			$invoice -> zip = $req -> zip;
			$invoice -> bAddress1 = $req -> address1;
			$invoice -> bAddress2 = $req -> address2;
			$invoice -> country_id = $req -> countries;
			$invoice -> phone = $req -> phone;
			$invoice -> buy_at = date('Y-m-d H:i:s');
			$invoice -> save();

			foreach ($cart->items as $key => $product) {
				$product_invoice = new ProductInvoice;
				$product_invoice -> user_id = $user->id;
				$product_invoice -> invoice_id = $invoice -> id;
				if($product['postid']){
					$product_invoice -> dlc_id = $key;
				}else{
					$product_invoice -> post_id = $key;
				}
				$product_invoice -> save();
			}
			Session::forget('cart');
			return redirect()->back();
		}else{
			return redirect()->back();
		}


	}
}
