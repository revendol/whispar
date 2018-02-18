
<nav class="navbar navbar-expand-lg bg-info">
    <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{ url('') }}/img/logo-small.jpg" alt="Wisper Logo" class="wisper-nav-logo">
            Wisper
        </a>
    </div>
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#example-navbar-info" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-left" id="example-navbar-info" data-nav-image="./assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="#" method="POST">
                        <div class="input-group search-input-group">
                            <input type="text" class="form-control search-box-input" placeholder="Search">
                            <span class=" search-box-btn">
                       <i class="fas fa-search icon-search-box"></i>
                    </span>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-right" id="example-navbar-info2" data-nav-image="./assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle badge-container" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons objects_globe" title="Notification"></i> <span class="nav-badge">5</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="http://tr.com/home">Radoan Hossain reacted on your photo.</a>
                        <a class="dropdown-item" href="http://tr.com/member/my-profile">Radoan Hossain reacted on your shout</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons ui-1_email-85" title="Message"></i><span class="nav-badge">2</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="http://tr.com/home">Message 1</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://tr.com/member/my-profile">Message 2</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons ui-1_settings-gear-63" title="Setting"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://tr.com/home">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://tr.com/member/my-profile">Logout</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>