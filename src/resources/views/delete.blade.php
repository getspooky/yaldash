@extends("views")

@section("content")

    @component("views")
        <div class="page-header row no-gutters py-4">
        @endcomponent


            <!-- Delete Account -->
            <form method="post" action="{{ route('dashboard.settings.delete_account.destroy') }}">

                <div class="error" style="margin-top:-10vh;">
                   <div class="error__content">
                      <h2><i class="material-icons">sentiment_dissatisfied</i></h2>
                      <h3>Delete my Account!</h3>
                      <p>Keep in mind that you will not be able to reactive your account or retrieve any of the account or  information you have added.</p>
                      <button type="button" class="btn btn-accent btn-pill"><i class="material-icons">delete</i> Delete Account</button>
                   </div>
                 <!-- / .error_content -->
              </div>

            </form>
            <!-- End Delete Account -->

        </div>

@endsection


@section('js')

    <script src="{{ asset('js/app.js') }}" defer></script>

@endsection
