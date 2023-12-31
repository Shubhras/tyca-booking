@extends('fronts.layouts.app')
@section('front-title')
{{ __('book slot') }}
@endsection

@section('front-content')
<style>
.container-fluid1 {
    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;
}

/* .grid {
    position: relative;
    margin: 0 auto;
    max-width: 100%;
    list-style: none;
    text-align: center;
} */

/* figure.effect-chico {
    margin: 0;
} */

.grid figure {
    position: relative;
    float: left;
    overflow: hidden;
    max-width: 100%;
    margin: 0 0 21px;
    text-align: center;
    cursor: pointer;
}

.effect-caption-wrap {
    position: absolute;
    left: 50%;
    top: 45%;
    transform: translate(-50%);
}

.blog-content {
    padding: 0;
}

.blog-text p {
    line-height: 1.8;
    color: #505050;
}

.lead {
    font-size: 1.25rem;
    font-weight: 300;
}

.input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}

.white-bg {
    background-color: #fff;
}


.center-layout {
    display: table;
    table-layout: fixed;
    height: 100%;
    width: 100%;
    position: relative;
}

.btn1 {
    padding: 10px;
    margin-left: -10px;
    width: 136px;
    height: 40px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.btn2 {
    padding: 10px;
    margin-left: -10px;
    width: 163px;
    height: 40px;
    background: #fff;
    color: black;
}

.book-btn {
    padding: 10px;
    width: 200px;
    height: 40px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.row-gap {
    margin-bottom: 10px;
}

.col-gap {
    padding: 10px;
}

.main-block1 {
    padding: 150px 0;
}

.container-fluid1 {
    max-width: 1500px;
}

.grid {
    position: relative;
    margin: 0 auto;
    max-width: 100%;
    list-style: none;
    text-align: center;
}

/* figure.effect-chico {
    margin: 0;
} */

.grid figure {
    position: relative;
    overflow: hidden;
    min-width: 100%;
    margin: 0px 0px 20px;
    text-align: center;
    cursor: pointer;
}

.detailed-item-mr {
    margin-bottom: 25px;
}

.h2-day {
    font-size: 20px;
    text-align: end;
    color: #000000;
    margin-bottom: 40px;
}

.hot-desk {
    text-align: start;
    margin-top: -20px;
    margin-bottom: 50px;
}

.hot-desk h2 {
    color: #000000;
    font-size: 30px;
}

.hot-desk p {
    color: #000000;
    font-size: 12px;
    margin-top: -15px;
}
.set-img1{
    margin-left:-12px;
}
.set-img2{
    margin-top:20px;
}
/* .heading-id{
    padding:0px 12px;
}
.heading-id1{
    padding:0px 20px;
} */
.set-border {
    border: 1px solid #F5F5F5;
    padding: 0px;
}
.sec-set{
    padding:30px 0px;
}
.sec2{
    padding:0px 20px; 
    width:66%;
}
.amities{
    margin-bottom:50px;
}
.icon-set{
    padding:0px 10px;
}
.set-padding{
    padding:15px 0px;
}
.hosts{
    width:200px; 
    margin-left:30px;
}
.host-desk{
    padding: 10px 0px; 
    margin-left:30px;
    width:200px;
}
.amities1{
    margin-bottom:30px;
}
</style>

<section class="main-block1 gray">
    <div class="container-fluid1">
        <div class="row col-12">
            <div class="col-md-8">
                <div class="grid">
                    <figure class="effect-chico">
                        <img src="/assets/image/image 12.png" alt="#" class="">
                    </figure>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 set-img1">

                        <div class="grid">
                            <div class="effect-chico">
                                <img src="/assets/image/image 10.png" alt="#" class="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="row set-img2">
                        <div class="col-md-12">
                            <div class="grid">
                                <figure class="effect-chico">
                                    <img src="/assets/image/image 11.png" alt="#" class="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="main-block sec-set">
    <div class="container">
        <div class="row" style="display:flex;">
            <div class="col-md-8 responsive-wrap sec2">
                <div class="full-blog">
                    <div class="blog-content">
                        <div class="blog-text">
                            <h1 class="font-700 roboto-font">Thank You Come Again @Balestier</h1>
                            <h3 class="roboto-font font-300 font-20px">355 Balestier Road Singapore 329782</h3>
                            <p>THANK YOU COME AGAIN / TYCA is a new social hub concept located in the city fringe of
                                Balestier Road. It consists of a café restaurant and event spaces for the collective
                                community.</p>
                            <p>With remote working becoming more and more popular, TYCA provides the perfect location
                                for those who want to take advantage of the trend.</p>
                            <p>TYCA provides a variety of workspaces from hot desks, co-working pods and private rooms
                                combined with hospitality services such as a concierge, gym, food and beverage.</p>
                            <p>TYCA is fully equipped with Wifi, A/V equipment, car and bicycle parking, Grab & Go bar,
                                and restaurant. Whether it's a corporate event, social get-together or meetings, TYCA is
                                your go-to place for small to medium gatherings.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 responsive-wrap">
                <div class="sidebar">
                    <div class="widget-box mb-40 amities">
                        <h1 class="mb-20 amities1">Amenities</h1>
                        <div class="latest-blog">
                            <div class="col section-border">
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <span class="heading-id"><img src="/assets/image/image 15.png" alt="#"
                                                style="padding-right:10px;">wi-fi</span>
                                    </div>
                                    <div class="col icon-set">
                                        <span class="sub-name1"><img src="/assets/image/image 23.png" alt="#"
                                                style="padding-right:10px;">Desk</span>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <span class="heading-id"><img src="/assets/image/image 17.png" alt="#"
                                                style="padding-right:10px;">air
                                            conditioning</span>
                                    </div>
                                    <div class="col icon-set">
                                        <span class="sub-name1"><img src="/assets/image/Frame 4546.png" alt="#"
                                                style="padding-right:10px;">refrigerator</span>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <span class="heading-id"><img src="/assets/image/image 18.png" alt="#"
                                                style="padding-right:10px;">shower facilities</span>
                                    </div>
                                    <div class="col icon-set">
                                        <span class="sub-name1"><img src="/assets/image/Frame 4552.png" alt="#"
                                                style="padding-right:10px;">electric kettle</span>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <span class="heading-id"><img src="/assets/image/image 33.png" alt="#"
                                                style="padding-right:10px;">toilets</span>
                                    </div>
                                    <div class="col icon-set">
                                        <span class="sub-name1"><img src="/assets/image/image 26.png" alt="#"
                                                style="padding-right:10px;">sofa</span>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <span class="heading-id"><img src="/assets/image/image 21.png" alt="#"
                                                style="padding-right:10px;">telephone</span>
                                    </div>
                                    <div class="col icon-set">
                                        <span class="sub-name1"><img src="/assets/image/image 16.png" alt="#"
                                                style="padding-right:10px;">toiltries</span>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <span class="heading-id"><img src="/assets/image/image 22.png" alt="#"
                                                style="padding-right:10px;">wardrobe</span>
                                    </div>
                                    <div class="col icon-set">
                                        <span class="sub-name1"><img src="/assets/image/image 20.png" alt="#"
                                                style="padding-right:10px;">Telivision</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-box">
                        <h1 class="amities1">Operating Hours</h1>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <span class="heading-id1">Monday</span>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <span class="heading-id1">Monday</span>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <span class="heading-id1">Monday</span>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <span class="heading-id1">Monday</span>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <span class="heading-id1">Monday</span>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <span class="heading-id1">Monday</span>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <span class="heading-id1">Monday</span>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="white-bg">
    <div class="container">
        <div class="row col-12">
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3" style="width:60%;margin-left:30px;">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3" style="width:60% ; margin-left:30px;">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection