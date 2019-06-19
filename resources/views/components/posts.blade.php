@extends('layouts.app')
@section('content')
  <h4 class="text-secondary py-3">Posts</h4>
  <!-- == Section Post == -->
  @if(count($posts)>0)
  <ul>
    @foreach($posts as $post)
      <!-- Single Post -->
      <li class="post_single my-5">
        <h6 class="post_title"><i class="fas fa-blog"></i> {{ $post->post_title }} <span class="float-right text-muted">
          <h6 class="float-right text-muted"> <i class="far fa-user"></i>  {{ $post->username }} -
            <i class="far fa-clock"></i> {{ $post->updated_at }} -
          </h6>
        </span></h6>
        <p class="post_body py-2">{{ $post->post_body }}</p>
        <div class="post_controls py-3">
          <a href="/single_post/{{ $post->id }}"><button class="btn btn-success"><i class="fas fa-eye"></i> View</button></a>
          @if(auth()->user())
            @can('edit_post',$post)
              <a href="/edit_post/{{ $post->id }}"><button class="btn btn-info"><i class="fas fa-pen-square"></i> Edit</button></a>
            @endcan
            @can('delete_post')
              <a href="/deleting/{{ $post->id }}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
            @endcan
          @endif
        </div>
        <hr />
      </li>
      <!-- ================== -->
    @endforeach
    @if(auth()->user())
      <a href="/add_post"><button class="btn btn-primary my-3"><i class="fas fa-plus-square"></i> Add New Post</button></a>
    @endif
  </ul>
  @else
    <div class="alert alert-warning"> there are not Posts here </div>
    @if(auth()->user())
      <a href="/add_post"><button class="btn btn-primary my-3"><i class="fas fa-plus-square"></i> Add New Post</button></a>
    @endif
  @endif
@endsection
