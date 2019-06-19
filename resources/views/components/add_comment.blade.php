@extends('layouts.app')
@section('content')

  <h4 class="text-secondary py-3">Add Comment</h4>

  <form action="/single_post/{{$id}}/commentAdding" class="form-group my-5" method="POST">

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Comment Body</span>
      </div>
      <textarea rows="10" class="form-control" name="comment_body"></textarea>
    </div>

    <button class="btn btn-primary"><i class="fas fa-check"></i> Add Comment</button>

    {{ csrf_field() }}

  </form>
@endsection
