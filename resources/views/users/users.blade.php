@extends('laravelDash::layouts.master')

@section('title', 'Users'. ' | ' . config('app.name', 'Laravel'))

@section("content")

  @component("laravelDash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title" style="margin-top:10px;">Users Overview</h3>
      </div>
      @endcomponent

      @if(count($users) > 1)

        <div class="row">

          @foreach($users as $followers)

            @if($followers->id !== auth()->id())

              <div class="col-lg-4">

                <div class="card card-small mb-4 pt-3">

                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle"
                           src="{{ \yal\laraveldash\Helper\Helper::UploadedAvatar(\App\User::find($followers->id)) }}"
                           alt="User Avatar" width="110">
                    </div>
                    <h4 class="mb-0">{{ $followers->name }}</h4>
                    <span class="text-muted d-block mb-2">Active User 🙂</span>
                    <form method="post" action="{{ route('dashboard.users.store') }}">
                      @csrf
                      <input type="hidden" name="follow_id" value="{{ $followers->id }}">
                      <button type="submit"
                              class="mb-2 btn btn-sm btn-pill {{ \yal\laraveldash\Helper\Helper::already_subscribe($followers->id) === false ? 'btn-danger color-a' : 'btn-outline-danger' }}  mr-2">
                        <i
                          class="material-icons mr-1">person_add</i>{{ \yal\laraveldash\Helper\Helper::already_subscribe($followers->id) === false ? 'Unsubscribe' : 'Subscribe'  }}
                      </button>
                    </form>
                  </div>

                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Subscribers</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="74" aria-valuemin="0"
                               aria-valuemax="100"
                               style="width:{{ \yal\laraveldash\Helper\Helper::Level($followers->id) }}%;">
                            <span
                              class="progress-value">{{ \yal\laraveldash\Helper\Helper::Subscribers_count($followers->id) }}</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>{{ !is_null($followers->information) ? $followers->information->Description : 'Hi I am '.$followers->name.' and I like Laravel Dashboard' }}</span>
                    </li>
                  </ul>

                </div>

              </div>

            @endif

          @endforeach

        </div>

      @else

        <div class="alert alert-danger">
          <strong>
            <i class="material-icons">
              warning
            </i> Sorry!</strong> We didn't found any users please try again later
        </div>

      @endif

    </div>

@endsection
