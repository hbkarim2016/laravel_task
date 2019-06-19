@extends('layouts.app')
@section('content')

  <h4 class="text-secondary py-3">Add New Post</h4>

  <form action="/postAdding" class="form-group my-5" method="POST">

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-blog"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="Post Title" aria-label="post_title" name="post_title" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Post Body</span>
      </div>
      <textarea rows="10" name="post_body" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary"><i class="fas fa-check"></i> Add New Post</button>

    {{ csrf_field() }}

  </form>
@endsection
