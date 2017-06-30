@include('Layouts.header')
<body>
<div class="container">
    <div class="row content">
        <div class="col-md-12">
            <p class="heading">
                Today's featured article on @yield('language') Wikipedia:
            </p>
            <div class="sub-content">
                <a href="https://@yield('langcode').wikipedia.org/@yield('link')" class="result">@yield('title')</a>
            </div>
        </div>
    </div>
    <div class="row content">
        <div class="col-md-12">
            <p class="heading">
                Total number of articles on @yield('language') Wikipedia:
            </p>
            <div class="sub-content">
                <p class="result">@yield('article_count')</p>
            </div>
        </div>
    </div>
    <div class="row content">
        <div class="col-md-12">
            <p class="heading">
                Featured Picture on @yield('language') Wikipedia:
            </p>
            <div class="sub-content">
                <!-- <img src="https://"> -->
                @yield('picture')
            </div>
        </div>
    </div>
</div>
</body>
</html>