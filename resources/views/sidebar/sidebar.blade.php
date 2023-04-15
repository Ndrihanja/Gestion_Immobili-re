<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="{{set_active(['setting/page'])}}">
                    <a href="{{ route('setting/page') }}">
                        <i class="fas fa-cog"></i>
                        <span>Paramettre</span>
                    </a>
                </li>
                <li class="submenu {{set_active(['home','teacher/dashboard','student/dashboard'])}}">
                    <a href="#"><i class="feather-grid"></i>
                        <span> Tableau de bord</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('home') }}" class="{{set_active(['home'])}}">TsaraVidy Dashboard</a></li>
                        <li><a href="{{ route('agence/dashboard') }}" class="{{set_active(['agence/dashboard'])}}">Agence Dashboard</a></li>
                        <li><a href="{{ route('client/dashboard') }}" class="{{set_active(['client/dashboard'])}}">Client Dashboard</a></li>
                        <li><a href="{{ route('logement/dashboard') }}" class="{{set_active(['logement/dashboard'])}}">Logement Dashboard</a></li>
                        <li><a href="{{ route('terrain/dashboard') }}" class="{{set_active(['terrain/dashboard'])}}">Terrain Dashboard</a></li>
                    </ul>
                </li>
                <!--
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-shield-alt"></i>
                        <span>User Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">List Users</a></li>
                    </ul>
                </li>
                
                @endif
                -->

                <li class="submenu {{set_active(['agence/list','agence/grid','agence/add/page'])}} {{ (request()->is('agence/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Agence</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('agence/list') }}" class="{{set_active(['agence/list','agence/grid'])}}">Agence List</a></li>
                        <li><a href="{{ route('agence/add/page') }}" class="{{set_active(['agence/add/page'])}}">Agence Add</a></li>
                        <li><a class="{{ (request()->is('agence/edit/*')) ? 'active' : '' }}">Agence Edit</a></li>
                    </ul>
                </li>
                <li class="submenu {{set_active(['cite/list','cite/grid','cite/add/page'])}} {{ (request()->is('cite/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-clipboard-list"></i>
                        <span> Cité</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('cite/list') }}" class="{{set_active(['cite/list','cite/grid'])}}">Cité List</a></li>
                        <li><a href="{{ route('cite/add/page') }}" class="{{set_active(['cite/add/page'])}}">Cité Add</a></li>
                        <li><a class="{{ (request()->is('cite/edit/*')) ? 'active' : '' }}">Cité Edit</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Client</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('client/list') }}" class="{{set_active(['client/list','client/grid'])}}">Client List</a></li>
                        <li><a href="teacher-details.html">Client View</a></li>
                        <li><a href="{{ route('client/add/page') }}" class="{{set_active(['client/add/page'])}}">Client Add</a></li>
                        <li><a class="{{ (request()->is('client/edit/*')) ? 'active' : '' }}">Client Edit</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Logement</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('logement/list') }}" class="{{set_active(['logement/list','logement/grid'])}}">Logement List</a></li>
                        <li><a href="{{ route('logement/add/page') }}" class="{{set_active(['logement/add/page'])}}">Logement Add</a></li>
                        <li><a href="edit-department.html">Logement Edit</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span> Terrain</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('terrain/list') }}" class="{{set_active(['terrain/list','terrain/grid'])}}">Terrain List</a></li>
                        <li><a href="{{ route('terrain/add/page') }}" class="{{set_active(['terrain/add/page'])}}">Terrain Add</a></li>
                        <li><a class="{{ (request()->is('terrain/edit/*')) ? 'active' : '' }}">Terrain Edit</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-comment-dollar"></i>
                        <span> Vente</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('vente/list') }}" class="{{set_active(['vente/list','vente/grid'])}}">Vente List</a></li>
                        <li><a href="{{ route('vente/add/page') }}" class="{{set_active(['vente/add/page'])}}">Vente Add</a></li>
                        <li><a class="{{ (request()->is('vente/edit/*')) ? 'active' : '' }}">Vente Edit</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Management</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i>
                        <span> Tresorerie</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="fees-collections.html">Historique des transactions</a></li>
                        <li><a href="expenses.html">Caisse</a></li>
                        <li><a href="salary.html">Salary</a></li>
                    </ul>
                </li>
                <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                </li>
                <li>
                    <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                </li>
                <li>
                    <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                </li>
                <li>
                    <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                </li>
                <li>
                    <a href="time-table.html"><i class="fas fa-table"></i> <span>Time Table</span></a>
                </li>
                <li>
                    <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>