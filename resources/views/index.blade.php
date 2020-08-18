@extends('laravelDash::layouts.master')

@section('title', 'Dashboard Overview'. ' | ' . config('app.name', 'Laravel'))

@section("content")

  @component("laravelDash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title" style="margin-top:10px;">Dashboard Overview</h3>
      </div>
      @endcomponent

      <article id="top" class="wrapper style1">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <span class="image fit"><img
                  src="{{ \yal\laraveldash\Helper\Helper::UploadedAvatar(\App\User::find(auth()->id())) }}"
                  alt=""/></span>
            </div>
            <div class="col-lg-7 col-7-large col-12-medium">
              <header>
                <h1>Hi. I'm <strong>{{ ucwords(auth()->user()->name) }}</strong>.</h1>
              </header>
              <p>{{ config('laravelDash.views.Dashboard.intro_paragraph') }}</p>
              <a href="{{ config('laravelDash.views.Dashboard.intro_button') }}"
                 class="button-intro-large">{{ config('laravelDash.views.Dashboard.intro_button') }}</a>
            </div>
          </div>
        </div>
      </article>

      @component("laravelDash::components.state",['POST'=>$POST,'EARNINGS'=>$EARNINGS])
        <div class="col-lg col-md-4 col-sm-12 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Points</span>
                  <h6 class="stats-small__value count my-3">{{ $POINTS }}</h6>
                </div>
                <div class="progress max-progress-state">
                  <div class="progress-bar progress-bar-striped" role="progressbar" style="width:100%;"
                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endcomponent

      <div class="row mt-5">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card card-small h-100 mb-5" style="max-height:400px !important;">
            <div class="card-header border-bottom">
              <h6 class="m-0">Devices</h6>
            </div>
            <div class="card-body d-flex py-0" style="margin-top:30px;padding-left:06px !important;">
              <div>
                <chart-component state="{{ route('dashboard.views.state') }}" chart="pie"></chart-component>
              </div>
            </div>
          </div>
        </div>

        @component("laravelDash::components.referrals")
          <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
            <div class="card card-small">
              <div class="card-header border-bottom">
                <h6 class="m-0">Publish Post</h6>
              </div>
              <div class="card-footer border-top">
                <div class="row">
                  <img src="{{ \yal\laraveldash\Helper\Assets::loadImg('Post.png') }}"
                       style="position:relative;width:100%;height:100%;object-fit:cover;margin-bottom:30px;">
                  <div class="col text-right view-report">
                    <a href="{{ route('post.create') }}">Create One &rarr;</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endcomponent

      </div>

    </div>

    <article class="wrapper style2">
      <div class="container" style="margin-top:-50px !important;">
        <header>
          <h2>{{ config('laravelDash.views.Dashboard.stuff.title') }}</h2>
          <p>{{ config('laravelDash.views.Dashboard.stuff.sub_title') }}</p>
        </header>
        <br>
        <div class="row aln-center">
          <div class="col-4 col-6-medium col-12-small">
            <section class="box style1">
              <span class="{{ config('laravelDash.views.Dashboard.stuff.first_stuff.icon') }}"></span>
              <h3>{{ config('laravelDash.views.Dashboard.stuff.first_stuff.title') }}</h3>
              <p>{{ config('laravelDash.views.Dashboard.stuff.first_stuff.content') }}</p>
            </section>
          </div>
          <div class="col-4 col-6-medium col-12-small">
            <section class="box style1">
              <span class="{{ config('laravelDash.views.Dashboard.stuff.second_stuff.icon') }}"></span>
              <h3>{{ config('laravelDash.views.Dashboard.stuff.second_stuff.title') }}</h3>
              <p>{{ config('laravelDash.views.Dashboard.stuff.second_stuff.content') }}</p>
            </section>
          </div>
          <div class="col-4 col-6-medium col-12-small">
            <section class="box style1">
              <span class="{{ config('laravelDash.views.Dashboard.stuff.third_stuff.icon') }}"></span>
              <h3>{{ config('laravelDash.views.Dashboard.stuff.third_stuff.title') }}</h3>
              <p>{{ config('laravelDash.views.Dashboard.stuff.third_stuff.content') }}</p>
            </section>
          </div>
        </div>
      </div>

    </article>

    @component("laravelDash::components.footer",["top"=>"-55px"])
      <div class="col-md-3 col-sm-6 footer-col">
        <h6 class="heading7">Social Media</h6>
        <ul class="footer-social">
          <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i></li>
          <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
          <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
          <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></li>
        </ul>
      </div>
    @endcomponent

@endsection
