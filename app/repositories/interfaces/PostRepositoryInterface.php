<?php

  namespace App\repositories\interfaces;

  use App\User;
  use App\models\Post;

  // Create Global Interface
  interface PostRepositoryInterface {

    // Select All
    public function all();

    // Select By User
    public function getByUser(User $user);

    // Show By Id
    public function find($id);
    public function findComments($id);

    // Add New Post
    public function create_or_update_post($request, $id);
    // Add Comment To This Post
    public function store_comment($request, $id);

    // Delete Post By Id
    public function delete_post($id);
    // Delete Comments By Post Id
    public function delete_comments($id);
  }

?>
