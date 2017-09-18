<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="flaticon-menu"></span>
        </button>
        <a class="navbar-brand" href="/">
            <i class="flaticon-play-2"></i>
            Willy <span>Mix</span>
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="{{ Request::is('audio*') ? 'selected' : '' }}"><a href="/audio">Audio</a></li>
            <li class="{{ Request::is('videos*') ? 'selected' : '' }}"><a href="/videos">Videos</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="/location">Location</a></li>
            <li><a href="/academie">Académie</a></li>
            <li class="active"><a href="/don">Faire un don</a></li>
        </ul>
    </div>
</div>
