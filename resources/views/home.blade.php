@extends('layouts.app')

@section('content')
        <!-- Material sidebar -->
<div class="containe-fluid">
    <aside id="sidebar" class="sidebar sidebar-default open" role="navigation">
        <!-- Sidebar header -->
        <div class="sidebar-header header-cover" style="background-image: url(http://2.bp.blogspot.com/-2RewSLZUzRg/U-9o6SD4M6I/AAAAAAAADIE/voax99AbRx0/s1600/14%2B-%2B1%2B%281%29.jpg);">
            <!-- Top bar -->
            <div class="top-bar"></div>
            <!-- Sidebar toggle button -->
            <button type="button" class="sidebar-toggle">
                <i class="icon-material-sidebar-arrow"></i>
            </button>
            <!-- Sidebar brand image -->
            <div class="sidebar-image">
                <img src="{{Auth::user()->image}}">
            </div>
            <!-- Sidebar brand name -->
            <a data-toggle="dropdown" class="sidebar-brand" href="#settings-dropdown">
                {{Auth::user()->email}}
                <b class="caret"></b>
            </a>
        </div>

        <!-- Sidebar navigation -->
        <ul class="nav sidebar-nav">
            <li class="dropdown">
                <ul id="settings-dropdown" class="dropdown-menu">
                    <li>
                        <a href="#" tabindex="-1">
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <h4>Perfil de Jugador</h4>
            </li>

            <li class="divider"></li>

            <li>
                <a href="#">
                    <i class="sidebar-icon material-icons">perm_identity</i>
                    {{Auth::user()->name}}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="sidebar-icon md-star"></i>
                    Puntuacion: {{Auth::user()->score}}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="sidebar-icon md-send"></i>
                    Victorias: {{Auth::user()->win_matches}}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="sidebar-icon md-send"></i>
                    Derrotas: {{Auth::user()->lost_matches}}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="sidebar-icon glyphicon glyphicon-tags"></i>
                    Nivel:
                </a>
            </li>
        </ul>
        <!-- Sidebar divider -->
        <!-- <div class="sidebar-divider"></div> -->

        <!-- Sidebar text -->
        <!--  <div class="sidebar-text">Text</div> -->
    </aside>
    <div class="container" id="data_view">

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        loadWelcome();
    });
</script>

<script src="{{asset('js/aside.js')}}" type="text/javascript"></script>
<script src="{{asset('js/scripts/gameBoard.js')}}" type="text/javascript"></script>
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
@endsection
