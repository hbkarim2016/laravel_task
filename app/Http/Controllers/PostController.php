<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\repositories\interfaces\PostRepositoryInterface;
use App\User;
use App\models\Post;

class PostController extends Controller
{
    private $PostRepository;

    public function __construct( PostRepositoryInterface $PostRepository ){
      $this->PostRepository = $PostRepository;
    }

    // = Posts Controls

    // Fetch All Posts
    public function index() {
      $posts = $this->PostRepository->all();
      return view('components.posts')->with('posts',$posts);
    }

    // Add Post Page
    public function add_page(){
      return view('components.add_post');
    }
    public function add_comment($id){
      return view('components.add_comment',['id'=>$id]);
    }

    // Create New Post
    public function create_post(Request $request) {
      $this->PostRepository->create_or_update_post($request);
      return redirect('/');
    }

    // Create Comment to This Post
    // Create New Post
    public function store_comment(Request $request , $id) {
      $this->PostRepository->store_comment($request , $id);
      return redirect('/single_post/'.$id);
    }

    // Fetch Only Posts By User Login
    public function postUser($id) {
      $user = User::find($id);
      $posts = $this->PostRepository->getByUser($user);
      return view('components.user_posts')->with('posts' , $posts);
    }

    // Find Post By Post Id
    public function show($id) {
      $post = $this->PostRepository->find($id);
      $comments = $this->PostRepository->findComments($id);
      return view('components.single_post',['comments'=>$comments],['post'=>$post]);
    }

    // redirect to edit page
    public function edit_post($id) {
      $post = $this->PostRepository->find($id);
      return view('components.edit_post',['post'=>$post]);
    }

    // update Post
    public function update_post(Request $request, $id) {
      $this->PostRepository->create_or_update_post($request, $id);
      return redirect('/');
    }

    // delete Post
    public function delete($id) {
      $this->PostRepository->delete_post($id);
      $this->PostRepository->delete_comments($id);
      return redirect('/');
    }
}
