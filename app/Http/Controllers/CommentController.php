<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Dlc;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function post_comment(Request $request, $id){
        $this->validate($request,
            [
                'content' => 'required|max:1000|min:9',
	            'rating' => 'required|numeric|max:5|min:0'
            ]
        );
	    $user = auth()->user();
	    $post = Post::find($id);
	    $userID = $user->id;
	    $lsUserRating = $post->comment()->where('status', 1)->where('user_id', $userID)->get();
	    $lsUserRatingCount = count($lsUserRating);
		if($lsUserRatingCount < 1){
			$comment = new Comment();
			$comment->user_id = $userID;
			$comment->content = $request -> input("content");
			$comment->rating = $request -> input("rating");
			$comment->status = 1;
			$comment->post_id = $id;
			$comment->save();
			return redirect()->back();
		}else{
			return null;
		}
    }
    public function post_comment_ajax(Request $request, $id){
        $this->validate($request,
            [
                'content' => 'required|max:1000|min:9',
	            'rating' => 'required|numeric|max:5|min:0'
            ]
        );

	    $user = auth()->user();
	    $post = Post::find($id);
	    $userID = $user->id;
	    $lsUserRating = $post->comment()->where('status', 1)->where('user_id', $userID)->get();
	    $lsUserRatingCount = count($lsUserRating);
	    if($lsUserRatingCount < 1) {
		    $comment = new Comment();
		    $comment->user_id = $userID;
		    $comment->post_id = $id;
		    $comment->content = $request->input("content");
		    $comment->rating = $request->input("rating");
		    $comment->status = 1;
		    $comment->save();
		    return response()->json([
			    'success' => 'comment successful',
			    'created_at' => $comment->created_at->format('M d Y - H:i:s'),
			    'comment_id' => $comment->id,
		    ]);
	    }else{
	    	return null;
	    }
    }
    public function dlc_comment(Request $request, $id){
        $this->validate($request,
            [
                'content' => 'required|max:1000|min:9',
	            'rating' => 'required|numeric|max:5|min:0'
            ]
        );
	    $user = auth()->user();
	    $dlc = Dlc::find($id);
	    $userID = $user->id;
	    $lsUserRating = $dlc->comment()->where('status', 1)->where('user_id', $userID)->get();
	    $lsUserRatingCount = count($lsUserRating);
		if($lsUserRatingCount < 1){
			$comment = new Comment();
			$comment->user_id = $userID;
			$comment->content = $request -> input("content");
			$comment->rating = $request -> input("rating");
			$comment->status = 1;
			$comment->dlc_id = $id;
			$comment->save();
			return redirect()->back();
		}else{
			return null;
		}
    }
    public function dlc_comment_ajax(Request $request, $id){
        $this->validate($request,
            [
                'content' => 'required|max:1000|min:9',
	            'rating' => 'required|numeric|max:5|min:0'
            ]
        );

	    $user = auth()->user();
	    $dlc = Dlc::find($id);
	    $userID = $user->id;
	    $lsUserRating = $dlc->comment()->where('status', 1)->where('user_id', $userID)->get();
	    $lsUserRatingCount = count($lsUserRating);
	    if($lsUserRatingCount < 1) {
		    $comment = new Comment();
		    $comment->user_id = $userID;
		    $comment->dlc_id = $id;
		    $comment->content = $request->input("content");
		    $comment->rating = $request->input("rating");
		    $comment->status = 1;
		    $comment->save();
		    return response()->json([
			    'success' => 'comment successful',
			    'created_at' => $comment->created_at->format('M d Y - H:i:s'),
			    'comment_id' => $comment->id,
		    ]);
	    }else{
	    	return null;
	    }
    }
    public function listComment(){
        $countComment = Comment::all()->count();
        if($countComment % 6 === 0){
            $countPage  = floor($countComment/6);
        }else{
            $countPage  = floor($countComment/6) + 1;
        }
        $lsComment = Comment::orderBy('created_at','desc')->simplePaginate(6);
        return view("comment.list")->with(['lsComment' => $lsComment, 'countPage'=> $countPage]);
    }

    public function changeStatus(Request $request){
        $id = $request -> comment_id;
        $status = $request -> comment_status;
        $comment = Comment::find($id);
        $comment->status = $status;
        $comment->save();
        return response()->json([
            'success' => 'change status successful'
        ]);
    }
//    public function listCommentByProperties($postId){
//        $title = 'Comment In Post id '.$postId;
//        $countComment = Comment::where('post_Id', $postId)->count();
//        if($countComment % 6 === 0){
//            $countPage  = floor($countComment/6);
//        }else{
//            $countPage  = floor($countComment/6) + 1;
//        }
//        $lsComment = Comment::where('post_Id', $postId)->simplePaginate(6);
//        return view("comment.listByProperties")->with(['lsComment' => $lsComment, 'countPage'=> $countPage, 'title' => $title]);
//    }
    public function deleteCommentAjax(Request $request){
	    $id = $request -> comment_id;
	    $comment = Comment::find($id);
	    if(auth()->user()->id === $comment->user->id){
		    $comment->status = 0;
		    $comment->save();
		    return response()->json([
			    'success' => 'delete comment successful',
			    'comment_content' => $comment->content,
			    'comment_rating' => $comment->rating,
		    ]);
	    }
    }
}
