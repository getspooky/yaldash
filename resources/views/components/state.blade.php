<div class="row">

  <div class="col-lg col-md-6 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">Posts</span>
            <h6 class="stats-small__value count my-3">{{ $POST }}</h6>
          </div>
          <div class="stats-small__data">
            <div class="progress max-progress-state">
              <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width:100%;"
                   aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg col-md-6 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">VIEWS</span>
            <h6 class="stats-small__value count my-3">{{ \yal\laraveldash\Helper\Helper::devices() }}</h6>
          </div>
          <div class="stats-small__data">
            <div class="progress max-progress-state">
              <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width:100%;"
                   aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg col-md-4 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">SUBSCRIBERS</span>
            <h6
              class="stats-small__value count my-3">{{ \yal\laraveldash\Helper\Helper::Subscribers_count(auth()->id()) }}</h6>
          </div>
          <div class="stats-small__data">
            <div class="progress max-progress-state">
              <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width:100%;"
                   aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{ $slot }}

  <div class="col-lg col-md-4 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">EARNINGS</span>
            <h6 class="stats-small__value count my-3">{{ $EARNINGS }}$</h6>
          </div>
          <div class="stats-small__data">
            <div class="progress max-progress-state">
              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width:100%;"
                   aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
