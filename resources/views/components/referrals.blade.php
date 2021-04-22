<div class="col-lg-4 col-md-12 col-sm-12 mb-4">
  <div class="card card-small">
    <div class="card-header border-bottom">
      <h6 class="m-0">Launch Product</h6>
    </div>
    <div class="card-footer border-top">
      <div class="row">
        <img src="{{ \yal\laraveldash\Helper\Assets::loadImg('Email.jpg') }}"
             style="position:relative;width:100%;height:100%;object-fit:cover;margin-bottom:30px;">
        <div class="col text-right view-report">
          <a href="{{ route('dashboard.sell.index') }}">Create One &rarr;</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{$slot}}
