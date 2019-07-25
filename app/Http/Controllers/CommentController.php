<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function post_comment(Request $request, $id){
        $this->validate($request,
            [
                'name'  => 'required|max:255|min:3',
                'email' => 'required|max:255|min:3',
                'content' => 'required|max:1000|min:9',
            ]
        );
        $comment = new Comment();
        $comment->name = $request -> input("name");
        $comment->email = $request -> input("email");
        $comment->content = $request -> input("content");
        $comment->status = 1;
        $comment->post_id = $id;
        $comment->save();
        return redirect()->back();
    }
    public function post_comment_ajax(Request $request, $id){
//        $this->validate($request,
//            [
//                'name'  => 'required|max:255|min:3',
//                'email' => 'required|max:255|min:3',
//                'content' => 'required|max:1000|min:9',
//            ]
//        );
        $comment = new Comment();
        $comment->name = $request -> input("name");
        $comment->email = $request -> input("email");
        $comment->content = $request -> input("content");
        $comment->status = 1;
        $comment->post_id = $id;
        $comment->save();


        return response()->json([
            'success' => 'comment successful',
            'created_at' => $comment->created_at->format('M d Y - H:i:s')
        ]);
    }
    public function listComment(){
        $countComment = Comment::all()->count();
        if($countComment % 6 === 0){
            $countPage  = floor($countComment/6);
        }else{
            $countPage  = floor($countComment/6) + 1;
        }
        $lsComment = Comment::orderBy('post_id','desc')->simplePaginate(6);
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
    public function listCommentByProperties($postId){
        $title = 'Comment In Post id '.$postId;
        $countComment = Comment::where('post_Id', $postId)->count();
        if($countComment % 6 === 0){
            $countPage  = floor($countComment/6);
        }else{
            $countPage  = floor($countComment/6) + 1;
        }
        $lsComment = Comment::where('post_Id', $postId)->simplePaginate(6);
        return view("comment.listByProperties")->with(['lsComment' => $lsComment, 'countPage'=> $countPage, 'title' => $title]);
    }
}
