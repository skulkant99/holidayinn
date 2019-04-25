        <style>
            .sidebar:after, .sidebar:before {
                background-color: #1f262f;
            }
            .navbar-default {
                background-color: #1f262f;
                border-bottom: 2px solid #0044cc;
            }
           
        </style>
    
       <div class="sidebar">
            <div class="logo">
                <a href="#" class="simple-text">
                    <img class="card-img-top" src="{{asset('assets/admin/img/logo.png')}}" alt="Card image cap" style="width:30%;">
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    innotech
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav flex-column">
                    @if(isset($menus))
                        @foreach($menus as $menu)
                            @if(sizeof($menu->SubMenu)>0)
                                <li class="d-flex flex-column {{ (isset($main_menu)&&$menu->link==$main_menu)? 'active':'' }}">
                                    <a data-toggle="collapse" href="#menu_{{$menu->id}}" class="{{ (isset($main_menu)&&$menu->link==$main_menu)? '':'collapsed' }} nav-link" aria-expanded="false">
                                        <i class="{{$menu->icon}}"></i>
                                        <p>
                                            {{$menu->name}}
                                            <i class="fa fa-sort-desc submenu-toggle"></i>
                                        </p>
                                    </a>
                                    <div class="collapse {{ (isset($main_menu)&&$menu->link==$main_menu)? 'show':'' }}" id="menu_{{$menu->id}}" role="navigation" aria-expanded="{{ (isset($main_menu)&&$menu->link==$main_menu)? 'true':'false' }}">
                                        <ul class="nav flex-column">
                                            @foreach($menu->SubMenu as $sub)
                                                <li class="{{ (isset($sub_menu)&&$sub->link==$sub_menu)? 'active':'' }}">
                                                    <a class="nav-link" href="{{url('admin/'.$sub->link)}}">
                                                        {{$sub->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li class="d-flex flex-column {{ (isset($main_menu)&&$menu->link==$main_menu)? 'active':'' }}">
                                    <a class="nav-link" href="{{url('admin/'.$menu->link)}}">
                                        <i class="{{$menu->icon}}"></i>
                                        <p>{{$menu->name}}</p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
