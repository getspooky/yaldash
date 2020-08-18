@foreach ($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible no-radius" role="alert">
    <strong>Error !</strong> {{ $error }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background-color:transparent;">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endforeach
