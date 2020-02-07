@extends('layouts.header')

@section('content')
<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">home</a></li>
                                        <li><a href="/jobs">Browse Job</a></li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="candidate.html">Candidates </a></li>
                                                <li><a href="job_details.html">job details </a></li>
                                                <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <a href="#">Log in</a>
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="#">Post a Job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="slider_text">
                        <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">4536+ Jobs listed</h5>
                        <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                        <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                            <a href="#" class="boxed-btn3">Upload your Resume</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
        <img src="{{ asset('img/banner/illustration.png') }}" alt="">
    </div>
</div>
<!-- slider_area_end -->

<!-- catagory_area -->
<div class="catagory_area">
    <div class="container">
        <div class="row cat_search">
            <div class="col-lg-3 col-md-4">
                <div class="single_input">
                    <input type="text" placeholder="Search keyword">
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single_input">
                    <select style="max-height:200px; overflow:scroll;" class="wide">
                        <option value="" data-display="Select City">Select City</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->city }}">{{ $location->city }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single_input">
                    <select style="max-height:200px; overflow:scroll;" class="wide">
                        <option data-display="Category">Category</option>
                        @foreach($dropCategories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="job_btn">
                    <a href="#" class="boxed-btn3">Find Job</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="popular_search d-flex align-items-center">
                    <span>Popular Search:</span>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ '/tag/' . $category->category->slug }}">{{ $category->category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ catagory_area -->

<!-- popular_catagory_area_start  -->
<div class="popular_catagory_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-40">
                    <h3>Popolar Categories</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="{{ '/tag/' . $category->category->slug }}"><h4>{{ $category->category->name }}</h4></a>
                        <p> <span>{{ $category->total }}</span> Available position</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- popular_catagory_area_end  -->

<!-- job_listing_area_start  -->
<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Job Listing</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="/jobs" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                @foreach($visits as $visit)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div style=" display: block;" class="jobs_left d-flex align-items-center">
                                <img style="width: 100px;height: auto;" src="{{ $visit->notification->employer->image }}" alt="">
                                <div style="margin-left: 15px" class="jobs_conetent">
                                    <a href="{{ '/job/' . $visit->notification->slug }}"><h4>{{ $visit->notification->title }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            @if(!empty($visit->notification->employer->city) && !empty($visit->notification->employer->country))
                                                <p> <i class="fa fa-map-marker"></i> {{ $visit->notification->employer->city . ", " . $visit->notification->employer->country }}</p>
                                            @else
                                                <p> <i class="fa fa-map-marker"></i> Tiranë, Shqipëri </p>
                                            @endif
                                        </div>
                                        <div class="location">
                                            @if($visit->total === 1)
                                                <p> <i class="fa fa-map-marker"></i> {{ $visit->total }} visit</p>
                                            @else
                                                <p> <i class="fa fa-map-marker"></i> {{ $visit->total }} visits</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a style="float: right; position: relative" class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                                <div class="date">
                                    <p style="white-space: nowrap; margin-top: 60px;"> {{ $visit->notification->job_date }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->

<div class="top_companies_area">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Top Companies</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="brouse_job text-right">
                    <a href="/jobs" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($companies as $company)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <img style="width: 100px;height: auto" src="{{ $company->employer->image }}" alt="">
                        <a style="white-space: nowrap;" href="jobs.html"><h3>{{ $company->employer->name }}</h3></a>
                        <p> <span>{{ $company->total }}</span> Available position</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- job_searcing_wrap  -->
<div class="job_searcing_wrap overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>Looking for a Job?</h3>
                    <p>We provide online instant cash loans with quick approval </p>
                    <a href="#" class="boxed-btn3">Browse Job</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>Looking for a Expert?</h3>
                    <p>We provide online instant cash loans with quick approval </p>
                    <a href="#" class="boxed-btn3">Post a Job</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_searcing_wrap end  -->

@endsection
