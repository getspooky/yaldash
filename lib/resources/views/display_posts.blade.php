@extends("LaravelDashboard::home")

@section("content")

    @component("LaravelDashboard::components.navbar")

        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title" style="margin-top:10px;">Post Overview</h3>
            </div>

        @endcomponent

        <!-- show all posts order by id -->

         @if($post->count()>0)

         <!-- col-lg-4 -->

            <div class="row">

                @foreach($post as $get_post)

                <!-- col-lg-6 -->

                 @if(!is_null(\Yasser\LaravelDashboard\Helper\Helper::Scraping($get_post->content)))

                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="card card-small card-post card-post--1">
                        <div class="card-post__image img-card-cover">
                            {!! \Yasser\LaravelDashboard\Helper\Helper::Scraping($get_post->content)[0] !!}
                            <a href="#" class="card-post__category badge badge-pill badge-info">
                                {{strtoupper(\Yasser\LaravelDashboard\Helper\Helper::Categories($get_post))}}
                            </a>
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url({{ \Yasser\LaravelDashboard\Helper\Helper::UploadedAvatar($get_post->user) }});">{{ $get_post->user->name }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="text-fiord-blue" href="#">{{ $get_post->title }}</a>
                            </h5>
                            <p class="card-text d-inline-block mb-3">{{ $get_post->summary}}...</p>
                            <span class="text-muted">{{ (new \Carbon\Carbon($get_post->updated_at))->toFormattedDateString() }}</span>
                            <div class="my-auto ml-auto">
                                <form method="post" id="show" action="{{ route('dashboard.post.DevicesStore',['id'=>$get_post->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-white" style="margin-top:10px !important;">
                                        <i class="far fa-bookmark mr-1"></i> Read Post
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                   <!-- end -->

                    @else

                    <!-- col without image -->

                <div class="col-lg-4">
                    <div class="card card-small card-post mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $get_post->title }}</h5>
                            <p class="card-text text-muted">{{ $get_post->summary }}...</p>
                            <a href="#" class="card-post__category badge badge-pill badge-info">
                                {{strtoupper(\Yasser\LaravelDashboard\Helper\Helper::Categories($get_post))}}
                            </a>
                        </div>
                        <div class="card-footer border-top d-flex">
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url({{ \Yasser\LaravelDashboard\Helper\Helper::UploadedAvatar($get_post->user) }});">Written by James Khan</a>
                                <div class="d-flex flex-column justify-content-center ml-3">
                                    <span class="card-post__author-name">{{ $get_post->user->name }}</span>
                                    <small class="text-muted">{{ (new \Carbon\Carbon($get_post->updated_at))->toFormattedDateString() }}</small>
                                </div>
                            </div>

                            <div class="my-auto ml-auto">
                                <form method="post" id="show" action="{{ route('dashboard.post.DevicesStore',['id'=>$get_post->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-white" style="margin-top:10px !important;">
                                        <i class="far fa-bookmark mr-1"></i> Read Post
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

                    @endif

                <!-- end col -->

                @endforeach

                <!-- end show posts -->

             </div>

             @else

                <!-- jumbotron -->

                    <div class="jumbotron">
                        <h1 class="display-4">{{ config('laravelDash.views.Post.intro_post') }}</h1>
                        <p class="lead"></p>
                        <hr class="my-4">
                        <p>{{ config('laravelDash.views.Post.desc_post') }}</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="{{ route('post.create') }}" role="button">Create new Post</a>
                        </p>
                    </div>

                <!-- end jumbotron -->

             @endif

           </div>

        </div>

@endsection
