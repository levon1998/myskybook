<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong></span>
                        </span>
                    </a>
                </div>
            </li>
            <li class="{{ (request()->is('v1-admin')) ? 'active' : '' }}">
                <a href="{{ url('/v1-admin/') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <li class="{{ (request()->is('v1-admin/tags') || request()->is('v1-admin/tags/*')) ? 'active' : '' }}">
                <a href="{{ url('/v1-admin/tags') }}"><i class="fa fa-tags"></i> <span class="nav-label">Tags</span></a>
            </li>

            <li class="{{ (request()->is('v1-admin/categories') || request()->is('v1-admin/categories/*')) ? 'active' : '' }}">
                <a href="{{ url('/v1-admin/categories') }}"><i class="fa fa-tags"></i> <span class="nav-label">Categories</span></a>
            </li>

            <li>
                <a href="/v1-admin/users"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Users</span></a>
            </li>
            <li>
                <a href="/v1-admin/donates"><i class="fa fa-money" aria-hidden="true"></i> <span class="nav-label">Donates</span></a>
            </li>
            <li>
                <a href="/v1-admin/plans"><i class="fa fa-question" aria-hidden="true"></i> <span class="nav-label">Plans</span></a>
            </li>
            <li>
                <a href="/v1-admin/reports"><i class="fa fa-question" aria-hidden="true"></i> <span class="nav-label">Reports</span></a>
            </li>
        </ul>

    </div>
</nav>
