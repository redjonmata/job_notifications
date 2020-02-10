<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="keywords" content="">

    <title>TheJobs - Job list</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/thejobs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
</head>

<body class="nav-on-header smart-nav bg-alt">

<!-- Navigation bar -->
<nav class="navbar">
    <div class="container">

        <!-- Logo -->
        <div class="pull-left">
            <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

            <div class="logo-wrapper">
                <a class="logo" href="index.html"><img src="assets/img/logo.png" alt="logo"></a>
                <a class="logo-alt" href="index.html"><img src="assets/img/logo-alt.png" alt="logo-alt"></a>
            </div>

        </div>
        <!-- END Logo -->

        <!-- User account -->
        <div class="pull-right user-login">
            <a class="btn btn-sm btn-primary" href="user-login.html">Login</a> or <a href="user-register.html">register</a>
        </div>
        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
            <li>
                <a href="index.html">Home</a>
                <ul>
                    <li><a href="index.html">Version 1</a></li>
                    <li><a href="index-2.html">Version 2</a></li>
                </ul>
            </li>
            <li>
                <a class="active" href="#">Position</a>
                <ul>
                    <li><a class="active" href="job-list-1.html">Browse jobs - 1</a></li>
                    <li><a href="job-list-2.html">Browse jobs - 2</a></li>
                    <li><a href="job-list-3.html">Browse jobs - 3</a></li>
                    <li><a href="job-detail.html">Job detail</a></li>
                    <li><a href="job-apply.html">Apply for job</a></li>
                    <li><a href="job-add.html">Post a job</a></li>
                    <li><a href="job-manage.html">Manage jobs</a></li>
                    <li><a href="job-candidates.html">Candidates</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Resume</a>
                <ul>
                    <li><a href="resume-list.html">Browse resumes</a></li>
                    <li><a href="resume-detail.html">Resume detail</a></li>
                    <li><a href="resume-add.html">Create a resume</a></li>
                    <li><a href="resume-manage.html">Manage resumes</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Company</a>
                <ul>
                    <li><a href="company-list.html">Browse companies</a></li>
                    <li><a href="company-detail.html">Company detail</a></li>
                    <li><a href="company-add.html">Create a company</a></li>
                    <li><a href="company-manage.html">Manage companies</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Pages</a>
                <ul>
                    <li><a href="page-blog.html">Blog</a></li>
                    <li><a href="page-post.html">Blog-post</a></li>
                    <li><a href="page-about.html">About</a></li>
                    <li><a href="page-contact.html">Contact</a></li>
                    <li><a href="page-faq.html">FAQ</a></li>
                    <li><a href="page-pricing.html">Pricing</a></li>
                    <li><a href="page-typography.html">Typography</a></li>
                    <li><a href="page-ui-elements.html">UI elements</a></li>
                </ul>
            </li>
        </ul>
        <!-- END Navigation menu -->

    </div>
</nav>
<!-- END Navigation bar -->


<!-- Page header -->
<header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg);">
    <div class="container page-name">
        <h1 class="text-center">Browse jobs</h1>
        <p class="lead text-center">Use following search box to find jobs that fits you better</p>
    </div>

    <div class="container">
        <form action="/search" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <div class="form-group col-xs-12 col-sm-3">
                    <input name="keyword" type="text" class="form-control" placeholder="Keyword: job title, skills, or company">
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                    <input name="location" type="text" class="form-control" placeholder="Location: city, state or zip">
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                    <select name="category" class="form-control selectpicker">
                        <option value="">All categories</option>
                        @foreach($dropCategories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                    <select name="category" class="form-control selectpicker">
                        <option value="newest">Sort (Date newest) </option>
                        <option value="oldest">Sort (Date oldest) </option>
                    </select>
                </div>

            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-primary">Apply filter</button>
                </div>
            </div>

        </form>

    </div>

</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <br>
                    <h5>We found <strong>357</strong> matches, you're watching <i>10</i> to <i>20</i></h5>
                </div>

                <!-- Job item -->
                @foreach($jobs as $job)
                    <div class="col-xs-12">
                        <a class="item-block" href="{{ '/job/'.$job->slug }}">
                            <header>
                                <img style="width: 100px;height: auto;" src="{{ $job->employer->image }}" alt="">
                                <div class="hgroup">
                                    <h4>{{ $job->title }}</h4>
                                    <h5>{{ $job->employer->name }} <span class="label label-success">Full-time</span></h5>
                                </div>
                                <time datetime="{{$job->job_date}}">{{ \Carbon\Carbon::parse($job->job_date)->diffForhumans() }}</time>
                            </header>

                            <footer>
                                <ul class="details cols-3">
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        @if(!empty($job->employer->city) && !empty($job->employer->country))
                                            <span>{{$job->employer->city . ", " . $job->employer->country }}</span>
                                        @else
                                            <span>Tiranë, Shqipëri</span>
                                        @endif
                                    </li>
                                </ul>
                            </footer>
                        </a>
                    </div>
                @endforeach
                <!-- END Job item -->

            </div>


            <!-- Page navigation -->
            <nav class="text-center">
                {{ $jobs->links() }}
            </nav>
            <!-- END Page navigation -->

        </div>
    </section>
</main>
<!-- END Main container -->


<!-- Site footer -->
<footer class="site-footer">

    <!-- Top section -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">An employment website is a web site that deals specifically with employment or careers. Many employment websites are designed to allow employers to post job requirements for a position to be filled and are commonly known as job boards. Other employment sites offer employer reviews, career and job-search advice, and describe different job descriptions or employers. Through a job website a prospective employee can locate and fill out a job application.</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Company</h6>
                <ul class="footer-links">
                    <li><a href="page-about.html">About us</a></li>
                    <li><a href="page-typography.html">How it works</a></li>
                    <li><a href="page-faq.html">Help center</a></li>
                    <li><a href="page-typography.html">Privacy policy</a></li>
                    <li><a href="page-contact.html">Contact us</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Trendeing jobs</h6>
                <ul class="footer-links">
                    <li><a href="job-list.html">Front-end developer</a></li>
                    <li><a href="job-list.html">Android developer</a></li>
                    <li><a href="job-list.html">iOS developer</a></li>
                    <li><a href="job-list.html">Full stack developer</a></li>
                    <li><a href="job-list.html">Project administrator</a></li>
                </ul>
            </div>
        </div>

        <hr>
    </div>
    <!-- END Top section -->

    <!-- Bottom section -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyrights &copy; 2016 All Rights Reserved by <a href="http://themeforest.net/user/shamsoft">ShaMSofT</a>.</p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END Bottom section -->

</footer>
<!-- END Site footer -->


<!-- Back to top button -->
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
<!-- END Back to top button -->

<!-- Scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/thejobs.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
