@extends('laravelDash::layouts.master')

@section('title', 'All Posts'. ' | ' . config('app.name', 'Laravel'))

@section("content")

  @component("laravelDash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title" style="margin-top:10px;">Post Overview</h3>
      </div>
      @endcomponent

      @if($post->count()>0)
        <div class="row">
          @foreach($post as $get_post)
            @if(!is_null(\yal\laraveldash\Helper\Helper::Scraping($get_post->content)))
              <div class="col-lg-6 col-sm-12 mb-4">
                <div class="card card-small card-post card-post--1">
                  <div class="card-post__image img-card-cover">
                    {!! \yal\laraveldash\Helper\Helper::Scraping($get_post->content)[0] !!}
                    <a href="#" class="card-post__category badge badge-pill badge-info">
                      {{strtoupper(\yal\laraveldash\Helper\Helper::Categories($get_post))}}
                    </a>
                    <div class="card-post__author d-flex">
                      <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                         style="background-image: url({{ \yal\laraveldash\Helper\Helper::UploadedAvatar($get_post->user) }});">{{ $get_post->user->name }}</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a class="text-fiord-blue" href="#">{{ $get_post->title }}</a>
                    </h5>
                    <p class="card-text d-inline-block mb-3">{{ $get_post->summary}}...</p>
                    <span
                      class="text-muted">{{ (new \Carbon\Carbon($get_post->updated_at))->toFormattedDateString() }}</span>
                    <div class="my-auto ml-auto">
                      <a href="{{ route('post.show',[$get_post->id]) }}"
                         class="btn btn-sm btn-white" style="margin-top:10px !important;">
                        <i class="far fa-bookmark mr-1"></i> Read Post
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            @else
              <div class="col-lg-4">
                <div class="card card-small card-post mb-4">
                  <div class="card-body">
                    <h5 class="card-title">{{ $get_post->title }}</h5>
                    <p class="card-text text-muted">{{ $get_post->summary }}...</p>
                    <a href="#" class="card-post__category badge badge-pill badge-info">
                      {{ strtoupper(\yal\laraveldash\Helper\Helper::Categories($get_post)) }}
                    </a>
                  </div>
                  <div class="card-footer border-top d-flex">
                    <div class="card-post__author d-flex">
                      <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                         style="background-image: url({{ \yal\laraveldash\Helper\Helper::UploadedAvatar($get_post->user) }});">Written
                        by James Khan</a>
                      <div class="d-flex flex-column justify-content-center ml-3">
                        <span class="card-post__author-name">{{ $get_post->user->name }}</span>
                        <small
                          class="text-muted">{{ (new \Carbon\Carbon($get_post->updated_at))->toFormattedDateString() }}</small>
                      </div>
                    </div>
                    <div class="my-auto ml-auto">
                      <a href="{{ route('post.show',[$get_post->id]) }}"
                         class="btn btn-sm btn-white" style="margin-top:10px !important;">
                        <i class="far fa-bookmark mr-1"></i> Read Post
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>

      @else
        <div class="jumbotron">
          <h1 class="display-4">{{ config('laraveldash.views.Post.intro_post') }}</h1>
          <p class="lead"></p>
          <hr class="my-4">
          <p>{{ config('laraveldash.views.Post.desc_post') }}</p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('post.create') }}" role="button">Create new Post</a>
          </p>
        </div>
      @endif

    </div>

    </div>

@endsection
