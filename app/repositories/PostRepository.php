<?php

  namespace App\repositories;

  use App\models\Post;
  use App\models\Comment;
  use App\User;
  use App\repositories\interfaces\PostRepositoryInterface;

  // Class To Use Post Interface
  class PostRepository implements PostRepositoryInterface {

    // Select Function All Posts
    public function all() {

      return Post::all();

    }

    // Select Function Post By User Id
    public function getByUser(User $user) {

      return Post::where('user_id' , $user->id)->get();

    }

    // Find Function Post By Post Id
    public function find($id) {
      return Post::find($id);
    }
    public function findComments($id) {
      return Comment::where('post_id',$id)->get();
    }

    // Create Or Update Function Post By Post Id
    public function create_or_update_post($request, $id = null ) {
      if($id == null){
        // Create New Post
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $user = auth()->user();
        $post->user_id = $user->id;
        $post->username = $user->name;
        return $post->save();
      }else{
        // Update Post
        $post = Post::find($id);
        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        return $post->save();
      }
    }

    // Add Comment To Post By Id
    public function store_comment($request, $id) {
      // Create New Post
      $comment = new Comment();
      $comment->comment_body = $request->comment_body;
      $user = auth()->user();
      $comment->user_id = $user->id;
      $comment->username = $user->name;
      $comment->post_id = $id;
      return $comment->save();
    }

    // Delete Post By Post Id
    public function delete_post($id) {
      return Post::find($id)->delete();
    }

    // Delete Comments By Post Id
    public function delete_comments($id) {
      $post = Post::find($id);
      return Comment::where('post_id',$id)->delete();
    }

  }

?>
