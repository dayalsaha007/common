@extends('backend.dashboard.master_dashboard')


@section('head_title')
    Admin | Change Language
@endsection

@section('content')
    <div class="content">

        <div class="content-page">
            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">

                        <div class="col-md-6" >

                            <select name="" class="form-control top-selector language_switcher">
                                <option>{{ Config::get('languages')[App::getLocale()] }}</option>
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                           <option value="{{ $lang }}"> <a class="dropdown-item" href="#"> {{$language}}</a> </option>
                                    @endif
                                @endforeach
                            </select>


                        </div>

                </div>


            </div>
            <!-- container -->

        </div>
    </div>
    <!-- content -->
@endsection


        @section('footer_script')

        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        </script>


            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <script type="text/javascript">
                $("body").on("change", ".language_switcher", function(e) {
                    e.preventDefault();
                    var lang = $(this).val();
                    var url = "{{ route('lang.switch', ':lang') }}",
                    url = url.replace(':lang', lang)
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: {
                            lang: lang,
                        },
                        success: function(data) {

                            console.log(data);
                            if(data.status == 'success'){
                                toastr.success(data.message);
                                window.location.reload();
                            }

                        },
                        error: function() {
                            window.location.reload();
                        }
                    });
                });
            </script>




        @endsection
