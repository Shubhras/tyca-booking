@extends('fronts.layouts.app')
@section('front-title')
{{ __('messages.web.medical') }}
@endsection


@section('front-content')



<div class="transition-none">
    <section class="title-hero-bg parallax-effect" style="background-image: url('{{$abouTimage1->value}}');">

        <!-- <img src="assets/images/Frame_3.png" alt="" class=""> -->

        <div class="container">
            <div class="page-title text-center white-color">
                <h1 class="ellipsis1">{{$aboutTitle->value}}</h1>
                <h4 class="workspace">
                    <div class="ellipsis">
                    {!! $aboutShortDescription->value !!}
                    </div>
                    
                    <!-- Interested in our workspace?
                    <br> Book a slot for our space now! -->
                </h4>
            </div>
        </div>
    </section>
</div>


<section class="white-bg">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($outletUser as $outletData)
            @if($outletData['status'] == 1)
            <div class="col-xl-4 col-md-6 our-team-block d-flex align-items-stretch">
                <a href="book-slot/{{$outletData['id']}}" style="text-decoration: none;">
                    <div class="row">
                        <div class="col-sm-12 section-heading">
                            <img src="{{$outletData['profile_image']}}" alt="" style="width: 250px; height: 240px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-10 col-xs-12 centerize-col text-center">
                            <div class="again-flex col-lg-12 col-md-12 col-sm-10 col-xs-12">
                                <h4 class="again-heading  col-lg-6 col-md-6 come-set" style="text-align:end;">{{$outletData['first_name']}}
                                    {{$outletData['last_name']}}</h4>
                                <div class="from-flex col-lg-6 col-md-6 come-set1">
                                    <p class="again-p">From</p>
                                    <h5 class="again-heading" style=" font-weight: 600; color: #000000;">$
                                        {{$outletData['charges_daily']}}/day</h5>
                                    <p class="again-hour">${{$outletData['charges']}} /hour</p>
                                </div>
                            </div>
                        </div>
                        <div class="onloads-button">
                            <button class="onloads-btn">Book Now</button>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>


@endsection


<style>
.page-title {
    position: absolute;
    top: 60%;
    width: 100%;
    text-align: center;
    left: 0;
    -webkit-transform: translate(0%, -50%);
    -moz-transform: translate(0%, -50%);
    -ms-transform: translate(0%, -50%);
    -o-transform: translate(0%, -50%);
    transform: translate(0%, -50%);
}

.white-color {
    color: #fff;
}

.page-title h1 {
    font-size: 45px;
    line-height: 1.5em;
    font-weight: 700;
    margin: auto;
}

.workspace {
    line-height: 40px;
    font-size: 30px;
    font-weight: 300;
    margin-top: 20px;
}

section.title-hero-bg.parallax-effect img {
    width: 100%;
}

.white-bg {
    padding-top: 60px;
    background: #f5f5f5;
    overflow: hidden;
}

.section-heading {
    text-align: center;
    margin: auto;
    float: none;
    padding-bottom: 20px;
}

.centerize-col {
    text-align: center;
}

.outlet-center {
    text-align: center;
    font-size: 40px;
    margin-bottom: 20px;
    font-weight: 700;
    color: #000000;
}

.again-flex {
    display: flex;
    /* justify-conitent: space-around; */
    font-size: 30px;
    /* justify-content: end; */
}

.again-heading {
    /* margin-right: 115px;
    margin-top: 0px; */
    font-weight: 600;
    color: #000000;
}

.again-p {
    font-size: 16px;
    margin-bottom: -10px;
    margin-top: -15px;
    color: #000000;
}

.again-hour {
    font-size: 12px;
    margin-bottom: -15px;
    margin-top: -18px;
    color: #000000;
}

.from-flex {
    line-height: 50px;
    /* margin-top: 20px; */
}

.onloads-button {
    text-align: center;
    padding-top: 60px;
    margin-bottom: 30px;
}

.onloads-btn {
    padding: 10px;
    width: 230px;
    height: 50px;
    font-size: 20px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

@media (max-width: 500px) {
    .come-set {
        width: 60% !important;
    }

    .come-set1 {
        width: 30% !important;
    }
}

@media (min-width: 768px) and (max-width: 992px) {

    h5,
    .fs-5 {
        font-size: 14px !important;
    }

    .again-heading {
        font-size: 18px !important;
    }
}

@media (max-width: 767px) {
    .workspace {
        line-height: 40px;
        font-size: 30px !important;
    }

}

.title-hero-bg {
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    min-height: 550px;
}
.ellipsis {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2; /* Number of lines to show */
    overflow: hidden;
    text-overflow: ellipsis;
}
.ellipsis1 {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2; /* Number of lines to show */
    overflow: hidden;
    text-overflow: ellipsis;
}
@media (min-width: 320px) and (max-width: 600px) {
    .title-hero-bg {
        min-height: 400px !important;
    }

    .page-title {
        font-size: 35px !important;
    }

    .workspace {
        font-size: 20px !important
    }

    .page-title h1 {
        font-size: 35px !important;
    }
}
</style>