<!-- header -->
<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="{{ url('/') }}"><img class="img-responsive" src="{{ asset('images/logo.png') }}"--}}
                                                                 {{--alt="Logo"></a>--}}
                <img class="img-responsive" width="100" src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <!-- /navbar-header -->

            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="faq.html">Помощ</a></li>
                    </ul>
                </div>
            </div>

            <!-- nav-right -->
            <div class="nav-right">

                <!-- sign-in -->
                <ul class="sign-in">
                    <li><i class="fa fa-user"></i></li>
                    <li><a href="{{ route ('profile') }}">Моят профил</a>
                </ul><!-- sign-in -->
                <a href="{{ route('post-ad') }}" class="btn">ДОБАВИ ОБЯВА</a>
            </div>
            <!-- nav-right -->
        </div><!-- container -->
    </nav><!-- navbar -->
</header>
<!-- header -->