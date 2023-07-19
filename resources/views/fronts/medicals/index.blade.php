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
                <h1 class="ellipsis1 padding-elips">{{$aboutTitle->value}}</h1>
                <h4 class="workspace">
                    <div class="ellipsis padding-elips new-p">
                        {!! $aboutShortDescription->value !!}
                    </div>
                </h4>
            </div>
        </div>
    </section>
</div>
<!-- style="background-image: url('{{$bodyimage1->value}}');" -->

<section class="white-bg" style="background-image: url('{{$bodyimage1->value}}');">
    <div class="container">
        <div class="top-outlets">
            OUTLETS
        </div>
        <div class="row justify-content-center">
            @foreach($outletUser as $outletData)
            @if($outletData['status'] == 1)
            <div class="col-xl-4 col-md-6 our-team-block d-flex align-items-stretch">
                <a href="book-slot/{{$outletData['id']}}" style="text-decoration: none;">
                    <div class="row">
                        <div class="col-sm-12 section-heading">
                            <img src="{{$outletData['profile_image']}}" alt="" class="medical-img">
                        </div>
                    </div>
                    <div class="row outlets-des" style="margin-top: -18px;">
                        <div class="centerize-col text-center">
                            <div class="again-flex col-12">
                                <h4 class="again-heading come-set col-lg-6 thank-name">{{$outletData['first_name']}}
                                    {{$outletData['last_name']}}</h4>
                                <div class="from-flex come-set1 col-lg-6">
                                    <p class="again-p">From</p>
                                    <h5 class="again-headings" style=" font-weight: 700; color: #000000;">$
                                        {{$outletData['charges_daily']}}/day</h5>
                                    <p class="again-ps">${{$outletData['charges']}} /hour</p>
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
body {
    font-family: "Noto Serif" !important;
}
.outlets-des{
    padding-left: 30px;
    padding-right: 30px;
}
.medical-img {
    width: 400px;
    height:400px;
    padding:30px;
    /* height: 240px; */
}
.top-outlets{
    font-size: 50px;
    font-weight: 700;
    line-height: 68.1px;
    color: #000000;
    text-align: center;
    padding: 30px;
    margin-bottom: 40px;
}
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

.new-p {
    font-size: 40px;
    font-weight: 400;
    line-height: 54.48px;
    text-align: center;
}

.page-title h1 {
    font-size: 70px;
    line-height: 95.34px;
    font-weight: 700;
    /* margin: auto; */
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
    padding-top: 100px;
    background: #f5f5f5;
    overflow: hidden;
}

.section-heading {
    text-align: center;
    margin: auto;
    float: none;
    /* padding-bottom: 20px; */
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
    font-size: 30px;
    height:115px;
}

.again-headings {
    font-weight: 700;
    color: #000000;
    font-size: 30px !important;
    line-height: 40.86px;
    margin-top: -15px;
}

.again-heading {
    text-align: left;
    padding: 20px;
    width: 192px;
    font-weight: 700;
    font-size: 30px;
    line-height: 40.86px;
    color: #000000;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.again-ps {
    font-size: 12px;
    color: #000000;
    font-weight: 500;
    line-height: 16.34px;
    margin-top: -5px;
}

.again-p {
    font-size: 15px;
    color: #000000;
    line-height: 20.43px;
    font-weight: 500;
}

.again-hour {
    font-size: 12px;
    margin-bottom: -15px;
    margin-top: -18px;
    color: #000000;
}

.from-flex {
    line-height: 50px;
    text-align: left;
    padding: 20px;
    margin-left: 20px;
}

.onloads-button {
    text-align: center;
    padding-top: 60px;
    margin-bottom: 30px;
}

.onloads-btn {
    padding: 10px 5px 10px 5px;
    width: 260px;
    height: 60px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
    font-size: 25px;
    font-weight: 600;
    line-height: 34.05px;
}

@media (max-width: 500px) {
    .come-set {
        width: 60% !important;
    }

    .come-set1 {
        width: 30% !important;
    }
}

@media (min-width: 320px) and (max-width: 767px) {
    .medical-img {
        width: 270px !important;
        height: 270px !important;

    }
}
@media (min-width: 768px) and (max-width: 1024px) {
    .medical-img {
        width: 350px !important;
        height: 350px !important;

    }
    .again-heading {
    text-align: right !important;
    }
}

@media (min-width: 1025px) and (max-width: 1300px) {
    .medical-img {
        width: 300px !important;
    }
}

@media (min-width: 1301px) and (max-width: 1400px) {
    .medical-img {
        width: 300px !important;
        height:300px !important;
    }
}

@media(min-width:768px){
    .padding-elips{
        padding-left:150px;
        padding-right:150px;
    }
}
@media(min-width:320px) and (max-width:767px){
    .padding-elips{
        padding-left:30px;
        padding-right:30px;
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
    -webkit-line-clamp: 2;
    /* Number of lines to show */
    overflow: hidden;
    text-overflow: ellipsis;
}

.ellipsis1 {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    /* Number of lines to show */
    overflow: hidden;
    text-overflow: ellipsis;
}

@media (min-width: 320px) and (max-width: 600px) {
    .page-title h1 {
        font-size: 70px;
        line-height: 54.48px !important;
    }

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