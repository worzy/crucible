<!DOCTYPE html>
<html>
<head>
        <title>Crucible</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css" media="all and (min-width: 120px)">
</head>
<body>
    <div class="header">
        <div class="container">
                <header class="col8 pre2 suf2">
                        <a class="logo" href="/"><h1>Crucible</h1></a>

                        <nav class="main-nav">
                            @if(!Sentry::check())
                            <ul>
                                <li><a href="/register">Sign up</a></li>
                                <li><a href="/login">Log in</a></li>
                            </ul>
                            @else
                            <ul>
                                <li><a class="cta" href="/post/create">Share</a></li>
                                <li><a href="/logout">Log out</a></li>
                            </ul>
                            @endif
                        </nav>
                </header>
                <div class="clear"></div>
        </div>
    </div>
        <div class="container">
                <div class="main-content col8 pre2 suf2">
                         @yield('content')
                </div>
                <div class="clear"></div>
        </div>
        <div class="container">
        <footer class="col8 pre2 suf2">
             <a target="_blank" href="https://github.com/worzy/crucible/issues">Bugs</a> <span>|</span> <a target="_blank" href="https://github.com/worzy/crucible/issues">Feature Requests</a> <span>|</span> <a href="/roadmap">Roadmap</a> <span>|</span> <a href="/bookmarklet">Bookmarklet</a> <span>|</span> <a href="{{URL::to('rss')}}">RSS Feed</a>
        </footer>
        </div>
        <div class="clear"></div>
</body>
</html>