<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="brand">
            <a  href="/admin">
                Willy Mix
            </a>
        </li>

        <li class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin') }}">
                <i class="flaticon-desktop"></i>
                Tableau de bord
            </a>
        </li>

        <li class="{{ Request::is('admin/songs*') ? 'active' : '' }}">
            <a href="{{ route('songs.index' )}}">
                <i class="flaticon-songs"></i>
                Audio
            </a>
        </li>

        <li class="{{ Request::is('admin/videos*') ? 'active' : '' }}">
            <a href="{{ route('videos.index' )}}">
                <i class="flaticon-video"></i>
                Video
            </a>
        </li>

        <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
            <a href="{{ route('pages.index' )}}">
                <i class="flaticon-page"></i>
                Pages
            </a>
        </li>

        <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
            <a href="/admin/users">
                <i class="flaticon-users"></i>
                Utilisateurs
            </a>
        </li>


        <li class="{{ Request::is('admin/files*') ? 'active' : '' }}">
            <a href="/admin/files">
                <i class="flaticon-clip"></i>
                Fichiers
            </a>
        </li>

        <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
            <a href="/admin/settings">
                <i class="flaticon-settings"></i>
                Paramètres
            </a>
        </li>

        <li class="separer"></li>

        <li>
            <a href="/" target="_blank">
                <i class="flaticon-home"></i>
                Site public
            </a>
        </li>

        <li>
            <a href="{{ route('admin.logout') }}">
                <i class="flaticon-power"></i>
                Déconnexion
            </a>
        </li>
    </ul>
</div>
