<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="index.html">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="{{asset('assets/static/images/logo.png')}}" alt="" /></div>
                            </div>
                            <div class="peer peer-greed"><h5 class="lh-1 mB-0 logo-text">Admin Anime</h5></div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @php
        $segment = Request::segment(1);
        $segmentdua = Request::segment(2);
        @endphp
        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 @if (!$segment || $segment=='dashboard') actived @endif">
                <a class="sidebar-link" href="{{route('beranda')}}">
                    <span class="icon-holder">
                        <i class="c-blue-500 ti-home"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-orange-500 ti-control-play"></i></span>
                    <span class="title">Anime</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link @if ($segment=='anime' && $segmentdua=='data') actived @endif" href="{{route('anime')}}">Data Anime</a></li>
                    <li><a class="sidebar-link @if ($segment=='anime' && $segmentdua=='genre') actived @endif" href="{{route('genreAnime')}}">Genre Anime</a></li>
                    <li><a class="sidebar-link @if ($segment=='anime' && $segmentdua=='status') actived @endif" href="{{route('animeStatus')}}">Status Anime</a></li>
                    <li><a class="sidebar-link @if ($segment=='anime' && $segmentdua=='rating') actived @endif" href="{{route('ratingAnime')}}">Rating Anime</a></li>
                </ul>
            </li>
            {{-- <li class="nav-item @if ($segment=='list_anime') actived @endif">
                <a class="sidebar-link" href="{{route('anime')}}">
                    <span class="icon-holder">
                        <i class="c-orange-500 ti-server"></i>
                    </span>
                    <span class="title">Data Anime</span>
                </a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-red-500 ti-video-clapper"></i></span>
                    <span class="title">Movie</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link @if ($segment=='movie' && $segmentdua=='data') actived @endif" href="{{route('movie')}}">Data Movie</a></li>
                    <li><a class="sidebar-link @if ($segment=='movie' && $segmentdua=='genre') actived @endif" href="{{route('movieGenre')}}">Genre Movie</a></li>
                    <li><a class="sidebar-link @if ($segment=='movie' && $segmentdua=='status') actived @endif" href="{{route('movieStatus')}}">Status Movie</a></li>
                    <li><a class="sidebar-link @if ($segment=='movie' && $segmentdua=='rating') actived @endif" href="{{route('movieRating')}}">Rating Movie</a></li>
                </ul>
            </li>
            {{-- <li class="nav-item @if ($segment=='movie') actived @endif">
                <a class="sidebar-link" href="{{route('anime')}}">
                    <span class="icon-holder">
                        <i class="c-red-500 ti-server"></i>
                    </span>
                    <span class="title">Data Movie</span>
                </a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-deep-purple-500 ti-cloud"></i></span>
                    <span class="title">Storage</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link @if ($segment=='storage' && $segmentdua=='anime') actived @endif" href="{{route('stanime')}}">Storage Anime</a></li>
                    <li><a class="sidebar-link @if ($segment=='storage' && $segmentdua=='movie') actived @endif" href="{{route('stmovie')}}">Storage Movie</a></li>
                </ul>
            </li>
            {{-- @if ($segment=='storage')
            @php
            $segmentstorage = Request::segment(2);
            @endphp
            <li class="nav-item @if ($segmentstorage=='anime') actived @endif">
                <a class="sidebar-link" href="{{route('stanime')}}">
                    <span class="icon-holder">
                        <i class="c-orange-500 ti-layout-list-thumb"></i>
                    </span>
                    <span class="title">Storage Anime</span>
                </a>
            </li>
            <li class="nav-item @if ($segmentstorage=='movie') actived @endif">
                <a class="sidebar-link" href="{{route('stmovie')}}">
                    <span class="icon-holder">
                        <i class="c-orange-500 ti-layout-list-thumb"></i>
                    </span>
                    <span class="title">Storage Movie</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('stanime')}}">
                    <span class="icon-holder">
                        <i class="c-brown-500 ti-cloud"></i>
                    </span>
                    <span class="title">Storage Anime</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('stmovie')}}">
                    <span class="icon-holder">
                        <i class="c-deep-purple-500 ti-cloud"></i>
                    </span>
                    <span class="title">Storage Movie</span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
