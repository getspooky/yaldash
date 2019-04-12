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

                    <div class="col-lg-12">

                        <div class="mb-2">

                            <div class="content-blog-post container-galeria">

                                {!! $post->content !!}

                            </div>

                        </div>

                    </div>

                 <!-- end show posts -->

                </div>

            @endif

        </div>

        <!-- footer -->

        @component("LaravelDashboard::components.footer",["top"=>"50px"])

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

        <!-- end footer-->

        </div>

@endsection
