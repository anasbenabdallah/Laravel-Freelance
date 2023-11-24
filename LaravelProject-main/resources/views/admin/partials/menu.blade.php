<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('category_access')
                <li class="nav-item">
                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-tags nav-icon">

                        </i>
                        {{ trans('cruds.category.title') }}
                    </a>
                </li>
            @endcan
                       <!--Projects Management -->
                       <li class="nav-item">
                        <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-folder nav-icon"></i> <!-- Changed the icon to represent projects -->
                            {{ trans('cruds.project.title') }}
                        </a>
                    </li>

                    <!--Tasks Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.tasks.index') }}" class="nav-link {{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-tasks nav-icon"></i> <!-- Changed the icon to represent tasks -->
                            {{ trans('cruds.task.title') }}
                        </a>
                    </li>
            @can('company_access')
                <li class="nav-item">
                    <a href="{{ route("admin.companies.index") }}" class="nav-link {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-building nav-icon">

                        </i>
                        {{ trans('cruds.company.title') }}
                    </a>
                </li>
            @endcan
            @can('job_access')
                <li class="nav-item">
                    <a href="{{ route("admin.jobs.index") }}" class="nav-link {{ request()->is('admin/jobs') || request()->is('admin/jobs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.job.title') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route("contratsadmin.index") }}" class="nav-link {{ request()->is('admin/contrats') || request()->is('admin/contrats/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-clipboard nav-icon"></i>
                    {{ trans('Contrat') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("offresadmin.index") }}" class="nav-link {{ request()->is('admin/contrats') || request()->is('admin/contrats/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-clipboard nav-icon"></i>
                    {{ trans('Offres') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("payment.index") }}" class="nav-link {{ request()->is('admin/payments') || request()->is('admin/payments/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-dollar-sign nav-icon"></i>
                    {{ trans('Payment') }}
                </a>
            </li>

            @can('location_access')

<li class="nav-item">
    <a href="{{ route("admin.claims.index") }}" class="nav-link {{ request()->is('admin/claims') || request()->is('admin/claims/*') ? 'active' : '' }}">
        <i class="fa-fw fas fa-clipboard nav-icon"></i>
        Claims
    </a>
</li>
@endcan




        </ul>

    </nav>


                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>


    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
