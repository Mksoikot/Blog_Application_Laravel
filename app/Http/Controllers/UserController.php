<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\PostComment;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionAnswerLike;

class UserController extends Controller
{
    public function index(){
        $objPost = new Post();

        $posts = $objPost->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->orderby('posts.id', 'desc')
        ->paginate(2);

        $categories = Category::all();
        // $posts = Post::all()->where('status', 1)->sortByDesc('created_at');
        // dd($post);
        return view('layouts.user.index', compact('posts', 'categories'));
    }

    public function single_post_view($id){
        $objPost = new Post();

        $post = $objPost->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.id', $id)
        ->first();

        $commentObj = new PostComment();
        $comments = $commentObj->join('users', 'users.id', '=', 'post_comments.user_id')
        ->select('post_comments.*', 'users.name as user_name', 'users.photo as user_photo')
        ->where('post_comments.post_id', $id)
        ->paginate('3');

        return view('layouts.user.single_post_view', compact('post','comments'));
    }
    public function filterby_category($id){
        $objPost = new Post();

        $filterPosts = $objPost->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status', 1)
        ->where('posts.category_id', $id)
        ->orderby('posts.id', 'desc')->get();

        $posts = $objPost->join('categories', 'categories.id', '=', 'posts.category_id')
        // ->join('users', 'users.id', '=', 'questions.user_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->orderby('posts.id', 'desc')
        ->paginate(5);

        return view('layouts.user.filter_by_category', compact('posts','filterPosts'));
    }

    public function comment_store(Request $request, $id){
        // dd($request->all());
        $data =[
            'post_id' => $id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
        ];
        PostComment::create($data);
        return redirect()->back()->with('success','Comment added successfully');

    }

    public function question(){

        $questionObj = new Question();
        $postObj = new Post();


        $questions = $questionObj->join('categories', 'categories.id', '=', 'questions.category_id')
        ->join('users', 'users.id', '=', 'questions.user_id')
        ->select('questions.*','categories.name as category_name', 'users.name as user_name', 'users.photo as user_photo')
        ->orderby('questions.id', 'desc')
        ->paginate(5);

        $posts = $postObj->join('categories', 'categories.id', '=', 'posts.category_id')
        // ->join('users', 'users.id', '=', 'questions.user_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->orderby('posts.id', 'desc')
        ->limit(3);
        $categories = Category::all();
        return view('layouts.user.question', compact('categories','questions','posts'));
    }

    public function question_store(Request $request){
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
        ]);
        $data =[
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'question' => $request->question,
        ];
        Question::create($data);
        return redirect()->back()->with('success','Question added successfully');

    }
    public function question_delete($id){
        Question::find($id)->delete();
        return redirect()->back()->with('success','Question delete successfully');
    }

    public function question_answer($id){

        $questionObj = new Question();
        $answerObj = new QuestionAnswer();

        $question = $questionObj->join('categories', 'categories.id', '=', 'questions.category_id')
            ->join('users', 'users.id', '=', 'questions.user_id')
            ->select('questions.*','categories.name as category_name', 'users.name as user_name', 'users.photo as user_photo')
            ->where('questions.id', $id)
            ->first();

        $answers = $answerObj->join('users','users.id', '=','question_answers.user_id')
            ->select('question_answers.*', 'users.name as user_name', 'users.photo as user_photo')
            ->where('question_answers.question_id', $id)
            ->orderby('question_answers.id', 'desc')
            ->get();

        return view('layouts.user.answer_question',compact('question', 'answers'));
    }

    public function question_answer_store(Request $request, $id){
        // dd($request->all());
        $data = [
            'question_id'=>$id,
            'user_id'=>auth()->user()->id,
            'answer'=>$request->answer,
        ];
        QuestionAnswer::create($data);
        return redirect()->back()->with('success','Answer added successfully');
    }
    public function question_answer_delete($id){
        QuestionAnswer::find($id)->delete();
        return redirect()->back()->with('success','Answer delete successfully');
    }


    // Question Like and dislike

    public function question_answer_like($id){
        $data = [
            'answer_id' => $id,
            'user_id' => auth()->user()->id
        ];

        QuestionAnswerLike::create($data);

        return redirect()->back();
    }

    public function question_answer_unlike($id){
        QuestionAnswerLike::where('answer_id', $id)->where('user_id', auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function contact(){
        return view('layouts.user.contact');
    }

    public function contact_store(Request $request){
        $data = [
            'user_id'=>auth()->user()->id,
            'subject'=>$request->subject,
            'message'=>$request->message
        ];

        ContactMessage::create($data);
        return redirect()->back()->with('success','Send successfully');
    }
}
