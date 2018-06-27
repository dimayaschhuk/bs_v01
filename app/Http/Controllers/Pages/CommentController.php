<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Comment;
use App\Models\CommentVote;
use App\Models\CommentSpam;

class CommentController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new Comment;

        $comment->comment = $request->comment;
        $comment->users_id = Auth::id();
        if(isset($request->reply_id)) {
            $comment->reply_id = $request->reply_id;
        }
        
        if($comment->save()){
            return [ "status" => "true","commentId" => $comment->id ];
        }
    }

    public function update(Request $request, $commentId, $type) {
 
        if($type == "vote") {          
            $this->validate($request, [
                'vote' => 'required',
            ]);
 
            $comments = Comment::find($commentId);
            $comment = $comments;

            $commentVote = CommentVote::where('comment_id', $comment['id'])
                            ->where('user_id', Auth::id())
                            ->orderBy('id', 'DESC')
                            ->take(1)
                            ->get();
                            
            if(isset($commentVote) && !empty($commentVote[0])) {
                if($commentVote[0]['vote'] == $request->vote) {
                    return "false";
                } else {
                    if($request->vote == "up") {
                        $vote = $comment->votes;
                        $vote = $vote + 2;
                        $comments->votes = $vote;
                        $comments->save();
                    }
         
                    if($request->vote == "down") {
                        $vote = $comment->votes;
                        $vote = $vote - 2;
                        $comments->votes = $vote;
                        $comments->save();
                    }

                    $data = [
                        "comment_id" => $commentId,
                        'vote' => $request->vote,
                        'user_id' => Auth::id(),
                    ];
         
                    if(CommentVote::create($data)) {
                        return "true";
                    }
                }
            } else {

                if($request->vote == "up") {
                    $vote = $comment->votes;
                    $vote++;
                    $comments->votes = $vote;
                    $comments->save();
                }
     
                if($request->vote == "down") {
                    $vote = $comment->votes;
                    $vote--;
                    $comments->votes = $vote;
                    $comments->save();
                }

                $data = [
                    "comment_id" => $commentId,
                    'vote' => $request->vote,
                    'user_id' => Auth::id(),
                ];
     
                if(CommentVote::create($data)) {
                    return "true";
                }
            }
        }
 
        if($type == "spam") {
 
            $comments = Comment::find($commentId);
            $comment = $comments->first();
            $spam = $comment->spam;
            $spam++;
            $comments->spam = $spam;
            $comments->save();
 
            $data = [
                "comment_id" => $commentId,
                'user_id' => Auth::id(),
            ];

            if(CommentSpam::create($data)) {
                return "true";
            }
        }
    }

    public function index(Request $request) {

        $comments = Comment::where('page_id', 0)->where('reply_id', 0)->orderBy('created_at', 'DESC')->get();
        $commentsData = [];
 
        foreach ($comments as $key) {
            $user = User::find($key->users_id);
            $email = $user->email;
            $replies = $this->replies($key->id);
            /*$photo = $user->first()->photo_url;*/
            // dd($photo->photo_url);
            $reply = 0;
            $vote = 0;
            $voteStatus = 0;
            $spam = 0;
 
            if(Auth::user()) {
 
                $voteByUser = CommentVote::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
                $spamComment = CommentSpam::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();              
 
                if($voteByUser){
                    $vote = 1;
                    $voteStatus = $voteByUser->vote;
                }
 
                if($spamComment){
                    $spam = 1;
                }
            }          
    
            if($replies) {
                if(count($replies) > 0){
                    $reply = 1;
                }
            }
 
            if(!$spam){
                array_push($commentsData,[
                    "name" => $email,
                    /*"photo_url" => (string)$photo,*/
                    "commentid" => $key->id,
                    "comment" => $key->comment,
                    "votes" => $key->votes,
                    "reply" => $reply,
                    "votedByUser" =>$vote,
                    "vote" =>$voteStatus,
                    "spam" => $spam,
                    "replies" => $replies,
                    "date" => $key->created_at->toDateTimeString()
               ]);
            }       
        }
 
        $collection = collect($commentsData);
 
        return $collection->sortBy('votes');
    }
 
    protected function replies($commentId) {
 
        $comments = Comment::where('reply_id',$commentId)->get();
        $replies = [];
 
        foreach ($comments as $key) {
            $user = User::find($key->users_id);
            $email = $user->email;
            /*$photo = $user->first()->photo_url;*/
            $vote = 0;
            $voteStatus = 0;
            $spam = 0;        
 
            if(Auth::user()) {
 
                $voteByUser = CommentVote::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
                $spamComment = CommentSpam::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
 
                if($voteByUser) {
                    $vote = 1;
                    $voteStatus = $voteByUser->vote;
                }
 
                if($spamComment) {
                    $spam = 1;
                }
            }
 
            if(!$spam) {        
                array_push($replies,[
                    "name" => $email,
                    /*"photo_url" => $photo,*/
                    "commentid" => $key->id,
                    "comment" => $key->comment,
                    "votes" => $key->votes,
                    "votedByUser" => $vote,
                    "vote" => $voteStatus,
                    "spam" => $spam,
                    "date" => $key->created_at->toDateTimeString()
                ]);
            }
        }
        $collection = collect($replies);

        return $collection->sortBy('votes');
    }

    public function user() {
        return Auth::user();
    }
}
