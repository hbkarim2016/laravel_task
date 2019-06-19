@extends('layouts.app')
@section('content')
  <h4 class="text-secondary py-3">Posts</h4>
  <!-- == Section Post == -->
  <ul>
    @foreach($posts as $post)
      <!-- Single Post -->
      <li class="post_single my-5">
        <h6 class="post_title"><i class="fas fa-blog"></i> {{ $post->post_title }} <span class="float-right text-muted">2019/7/12</span></h6>
        <p class="post_body py-2">{{ $post->post_body }}</p>
        <!-- Controls Post -->
        <div class="post_controls py-3">
          <a href="/single_post"><button class="btn btn-success"><i class="fas fa-eye"></i> View</button></a>
          <a href="/edit_post/{{ $post->id }}"><button class="btn btn-info"><i class="fas fa-pen-square"></i> Edit</button></a>
          <a href="/deleting/{{ $post->id }}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
        </div>
        <hr />
      </li>
      <!-- ================== -->
    @endforeach

    <a href="/add_post"><button class="btn btn-primary my-3"><i class="fas fa-plus-square"></i> Add Post</button></a>
  </ul>
@endsection
