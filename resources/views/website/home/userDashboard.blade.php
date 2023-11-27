@auth
@extends('website.home.welcome')
@section('contents')

<section class="space-around m-5 p-5">
    <div class="container">
        <div class="row justify-content-center">
            @if (Auth::user()->user_status == 0  || Auth::user()->user_status == 1  )
            <div class="col-md-4 col-12">
                <a href="{{ url('website/home/view_profile/' . Auth::user()->user_slug) }}">
                    <div class="card border_card m-3">
                        <div class="card-img">
                            <img src="{{ asset('contents/admin/images/view-info.png') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-text card_text">View Your Profile</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @if (Auth::user()->user_status == 1)
            <div class="col-md-4 col-12">
                <a href="{{ url('website/home/edit_profile/' . Auth::user()->user_slug) }}">
                    <div class="card border_card m-3">
                        <div class="card-img">
                            <img src="{{ asset('contents/admin/images/edit-info.png') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-text card_text">Edit Your Profile</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>

@endsection

@endauth