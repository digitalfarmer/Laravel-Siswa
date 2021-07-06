<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>SMP N 1 Gegesik</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{asset('front/css/pogo-slider.min.css')}}" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

<!-- LOADER -->
<div id="preloader">
    <div class="loader">
        <img src="{{asset('front/images/loader.gif')}}" alt="#" />
    </div>
</div>
<!-- end loader -->
<!-- END LOADER -->

<!-- Start header -->
<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="{{asset('front/images/logo.png')}}" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link active" href="index.html">Home</a></li>
                    <li><a class="nav-link" href="about.html">About</a></li>
                    <li><a class="nav-link" href="courses.html">Courses</a></li>
                    <li><a class="nav-link" href="reaserch.html">Reaserch</a></li>
                    <li><a class="nav-link" href="news.html">News</a></li>
                    <li><a class="nav-link" href="contact.html">Contact us</a></li>
                </ul>
            </div>
            <div class="search-box">
                <input type="text" class="search-txt" placeholder="Search">
                <a class="search-btn">
                    <img src="{{asset('front/images/search_icon.png')}}" alt="#" />
                </a>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
@yield('content')
<!-- Start Footer -->
<footer class="footer-box">
    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="footer_blog">
                    <div class="full margin-bottom_30">
                        <img src="{{asset('front/images/footer_logo.png')}}" alt="#" />
                    </div>
                    <div class="full white_fonts">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="footer_blog footer_menu white_fonts">
                    <h3>Quick links</h3>
                    <ul>
                        <li><a href="#">> Join Us</a></li>
                        <li><a href="#">> Maintenance</a></li>
                        <li><a href="#">> Language Packs</a></li>
                        <li><a href="#">> LearnPress</a></li>
                        <li><a href="#">> Release Status</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="footer_blog full white_fonts">
                    <h3>Newsletter</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    <div class="newsletter_form">
                        <form action="index.html">
                            <input type="email" placeholder="Your Email" name="#" required />
                            <button>Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="footer_blog full white_fonts">
                    <h3>Contact us</h3>
                    <ul class="full">
                        <li><img src="{{asset('front/images/i5.png')}}"><span>London 145<br>United Kingdom</span></li>
                        <li><img src="{{asset('front/images/i6.png')}}"><span>demo@gmail.com</span></li>
                        <li><img src="{{asset('front/images/i7.png')}}"><span>+12586954775</span></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</footer>
<!-- End Footer -->

<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="crp">© Copyrights 2021 design by LobotIjo</p>
            </div>
        </div>
    </div>
</div>

<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

<!-- ALL JS FILES -->
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/js/jquery.pogo-slider.min.js')}}"></script>
<script src="{{asset('front/js/slider-index.js')}}"></script>
<script src="{{asset('front/js/smoothscroll.js')}}"></script>
<script src="{{asset('front/js/form-validator.min.js')}}"></script>
<script src="{{asset('front/js/contact-form-script.js')}}"></script>
<script src="{{asset('front/js/isotope.min.js')}}"></script>
<script src="{{asset('front/js/images-loded.min.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
<script>
    /* counter js */

    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from:            $(this).data('from'),
                    to:              $(this).data('to'),
                    speed:           $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals:        $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 1000,           // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
</script>
</body>

</html>
