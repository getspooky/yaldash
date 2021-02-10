@extends("yal\laraveldash::home")

@section("content")

  @component("yal\laraveldash::components.navbar")
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title" style="margin-top:10px;">Template Overview</h3>
      </div>
    @endcomponent
    </div>

@endsection
