@extends('layouts.header')


@section('content')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>4536+ Jobs Available</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- job_listing_area_start  -->
<div class="job_listing_area plus_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="job_filter white-bg">
                    <div class="form_inner white-bg">
                        <h3>Filter</h3>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <input type="text" placeholder="Search keyword">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select class="wide">
                                            <option data-display="Location">Location</option>
                                            <option value="1">Rangpur</option>
                                            <option value="2">Dhaka </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select class="wide">
                                            <option data-display="Category">Category</option>
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select class="wide">
                                            <option data-display="Experience">Experience</option>
                                            <option value="1">Experience 1</option>
                                            <option value="2">Experience 2 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select class="wide">
                                            <option data-display="Job type">Job type</option>
                                            <option value="1">full time 1</option>
                                            <option value="2">part time 2 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select class="wide">
                                            <option data-display="Qualification">Qualification</option>
                                            <option value="1">Qualification 1</option>
                                            <option value="2">Qualification 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select class="wide">
                                            <option data-display="Gender">Gender</option>
                                            <option value="1">male</option>
                                            <option value="2">female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="range_wrap">
                        <label for="amount">Price range:</label>
                        <div id="slider-range"></div>
                        <p>
                            <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-size: 14px; font-weight:400;">
                        </p>
                    </div>
                    <div class="reset_btn">
                        <button  class="boxed-btn3 w-100" type="submit">Reset</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="recent_joblist_wrap">
                    <div class="recent_joblist white-bg ">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>Job Listing</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="serch_cat d-flex justify-content-end">
                                    <select>
                                        <option data-display="Most Recent">Most Recent</option>
                                        <option value="1">Marketer</option>
                                        <option value="2">Wordpress </option>
                                        <option value="4">Designer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_lists m-0">
                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <img style="width: 100px;height: auto;" src="{{ $job->employer->image }}" alt="">
                                        <div style="margin-left: 15px" class="jobs_conetent">
                                            <a href="{{ '/job/'.$job->slug }}"><h4>{{ $job->title }}</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    @if(!empty($job->employer->city) && !empty($job->employer->country))
                                                        <p> <i class="fa fa-map-marker"></i> {{$job->employer->city . ", " . $job->employer->country }}</p>
                                                    @else
                                                        <p> <i class="fa fa-map-marker"></i> Tiranë, Shqipëri </p>
                                                    @endif
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i> Part-time</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a style="float: right; position: relative" class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                        </div>
                                        <div class="date">
                                            <p style="white-space: nowrap; margin-top: 60px;">Date: {{ \Carbon\Carbon::parse($job->job_date)->diffForhumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->

<script>
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 24600,
            values: [ 750, 24600 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] +"/ Year" );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) + "/ Year");
    } );
</script>

@endsection
