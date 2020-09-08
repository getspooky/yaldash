@extends('laravelDash::layouts.master')

@section('title', auth()->user()->name . ' Settings'. ' | ' . config('app.name', 'Laravel'))

@section("content")

  @component("laravelDash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title" style="margin-top:10px;">Settings Overview</h3>
      </div>
    @endcomponent

    @component("laravelDash::components.validation")
      <!-- empty component -->
      @endcomponent

      <div class="row">
        <div class="col-lg-4">
          <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
              <div class="mb-3 mx-auto">
                <img class="rounded-circle" onclick="document.getElementById('file').click()"
                     src="{{ \yal\laraveldash\Helper\Helper::UploadedAvatar(\App\User::find(auth()->id())) }}"
                     alt="User Avatar" width="110" height="110">
              </div>
              <form method="post" id="settings_upload_image" action="{{route('dashboard.settings.upload_avatar')}}"
                    enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file"
                       onchange="document.getElementById('settings_upload_image').submit()" style="display:none;"/>
              </form>
              <h4 class="mb-0">{{ auth()->user()->name }}</h4>
              <span class="text-muted d-block mb-2">Active User 🙂</span>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-4">
                <div class="progress-wrapper">
                  <strong class="text-muted d-block mb-2">Subscribers</strong>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar"
                         aria-valuenow="74"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width:{{ \yal\laraveldash\Helper\Helper::Level(auth()->id()) }}%;">
                      <span
                        class="progress-value">{{ \yal\laraveldash\Helper\Helper::Subscribers_count(auth()->id()) }}
                      </span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item p-4">
                <strong class="text-muted d-block mb-2">Description</strong>
                <span>{{ \yal\laraveldash\Helper\Helper::GlobalInformation('description') }}</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card card-small mb-4">
            <div class="card-header border-bottom">
              <h6 class="m-0">Account Details</h6>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item p-3">
                <div class="row">
                  <div class="col">
                    <form method="post" action="{{ route('dashboard.settings.update') }}">
                      @csrf
                      @method('PUT')

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="feFirstName">First Name</label>
                          <input type="text" class="form-control"
                                 placeholder="{{ auth()->user()->name }}"
                                 id="feFirstName" name="name"
                                 value="{{ old('name', auth()->user()->name) }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="feLastName">Last Name</label>
                          <input type="text" class="form-control" id="feLastName" name="last_name"
                                 placeholder="Last Name"
                                 value="{{ old('last_name', auth()->user()->isLastName()) }}">
                        </div>
                      </div>

                      <div class="form-row">
                        <label for="feEmailAddress">Email</label>
                        <input type="email" class="form-control" id="feEmailAddress"
                               placeholder="{{ auth()->user()->email }}" name="email"
                               value="{{ old('email', auth()->user()->email) }}">
                      </div>

                      <div class="form-group">
                        <label for="feInputAddress " style="margin-top:10px;">Address</label>
                        <input type="text" class="form-control" id="feInputAddress"
                               placeholder="1234 Main St"
                               name="address" value="{{ old('address', auth()->user()->isAddress()) }}">
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="feInputCity">City</label>
                          <input type="text" name="city" class="form-control"
                                 value="{{ old('city', auth()->user()->isCity()) }}"
                                 id="feInputCity">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="feInputState">Country</label>
                          <select id="feInputState" class="form-control" name="country_id">
                            @foreach($countries as $country)
                              <option
                                value="{{ $country->id }}"
                                {{ auth()->user()->isCountry() == $country->id ? "selected":"" }}>
                                {{ $country->name }}
                              </option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-2">
                          <label for="inputZip">Zip</label>
                          <input type="text" class="form-control" name="zip" id="inputZip"
                                 value="{{ old('zip', auth()->user()->isZipcode()) }}">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="feDescription">Description</label>
                          <textarea class="form-control" name="description" rows="5">
                            {{ old('description', auth()->user()->isDescription()) }}
                          </textarea>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-accent">Update Account</button>
                    </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    @component("laravelDash::components.footer",["top"=>"50px"])
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
