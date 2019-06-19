@extends('layouts.app')
@section('content')
  <h4 class="text-secondary py-3">
    <i class="fas fa-blog"></i> {{ $post->post_title }}
    <h6 class="float-right text-muted"> <i class="far fa-user"></i>  {{ $post->username }} -
      <i class="far fa-clock"></i> {{ $post->updated_at }} -
    </h6>
  </h4>

    <!-- Single Post -->
    <div class="post_single my-5">
      <p class="post_body py-2">{{ $post->post_body }}</p>
      @if(auth()->user())
        @can('edit_post',$post)
          <a href="/edit_post/{{ $post->id }}"><button class="btn btn-info"><i class="fas fa-pen-square"></i> Edit</button></a>
        @endcan
        @can('delete_post')
          <a href="/deleting/{{ $post->id }}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
        @endcan
      @endif
      <hr />
      <ul>

      @if(count($comments)>0)
        @foreach($comments as $comment)
          <li>
            <!-- Comments -->
            <div class="comment_post mb-5">
              <h6><i class="fas fa-user"></i> {{ $comment->username }}</h6>
              <p><i class="fas fa-comment"></i> {{ $comment->comment_body }}</p>
            </div>
            <hr />
          </li>
        @endforeach
      @else
        <div class="alert alert-secondary">there are not Comments Here</div>
      @endif

      </ul>
      <!-- Post Controls -->
      <div class="post_controls py-3">
        @if(auth()->user())
          <a href="/add_comment/{{$post->id}}"><button class="btn btn-secondary"><i class="fas fa-comment"></i> Add Comment</button></a>
        @else
          <a href="/home"><button class="btn btn-warning"><i class="fas fa-warning"></i> You Have to Login To Add Comment</button></a>
        @endif
        <div class="float-right">
          <a href="/"><button class="btn btn-dark"><i class="fas fa-blog"></i> Back to Posts</button></a>
        </div>
      </div>
      <hr />
    </div>
    <!-- ================== -->

@endsection
