<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ url('/dashboard') }}" class="app-brand-link">
        @if(isset(settings()->logo) && !empty(settings()->logo))
            <img style="width: 100%" src="{{ asset('public/admin/assets/img/logo') }}/{{ settings()->logo }}" class="img-fluid light-logo" alt="{{ settings()->name }}"/>
        @else
            <img style="width: 100%" src="{{ asset('public/admin/default.png') }}" class="img-fluid light-logo" alt="Default"/>
        @endif
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('dashboard')?'active':'' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li>
        <li class="menu-item {{
                    request()->is('employees/salary_details') ||
                    request()->is('bank_details/*')
                    ?'open active':''
                }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Salary Details">Salary Details</div>
                </a>
                <ul class="menu-sub">
                <li class="menu-item {{ request()->is('employees/salary_details')?'active':'' }}">
                    <a href="{{ route('employees.salary_details') }}" class="menu-link">
                    <div data-i18n="Salary Details">Salary Details</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('bank_details/*')?'active':'' }}">
                    @if(!empty(bankDetail()))
                        <a href="{{ route('bank_details.edit', bankDetail()->id) }}" class="menu-link">
                            <div data-i18n="Bank Details">Bank Details</div>
                        </a>
                    @else
                        <a href="{{ route('bank_details.create') }}" class="menu-link">
                            <div data-i18n="Bank Details">Bank Details</div>
                        </a>
                    @endif
                </li>
                </ul>
            </li>
        <li class="menu-item {{
                        request()->is('employees') ||
                        request()->is('designations') ||
                        request()->is('employment_status')
                        ?'open active':''
                    }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div data-i18n="Employees">Employees</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item {{ request()->is('employees')?'active':'' }}">
                <a href="{{ route('employees.index') }}" class="menu-link">
                <div data-i18n="Employees">Employees</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('designations')?'active':'' }}">
                <a href="{{ route('designations.index') }}" class="menu-link">
                <div data-i18n="Designations">Designations</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('employment_status')?'active':'' }}">
                <a href="{{ route('employment_status.index') }}" class="menu-link">
                <div data-i18n="Employment Status">Employment Status</div>
                </a>
            </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-clock"></i>
            <div data-i18n="Leaves">Leaves</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('employees.index') }}" class="menu-link">
                <div data-i18n="Leave Status">Leave Status</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('employees.index') }}" class="menu-link">
                <div data-i18n="Leave Report">Leave Report</div>
                </a>
            </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-calendar"></i>
            <div data-i18n="Attendance">Attendance</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('roles.index') }}" class="menu-link">
                <div data-i18n="Daily Log">Daily Log</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('permissions.index') }}" class="menu-link">
                <div data-i18n="Discrepancies">Discrepancies</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('permissions.index') }}" class="menu-link">
                <div data-i18n="Summary">Summary</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('permissions.index') }}" class="menu-link">
                <div data-i18n="Attendance Filter">Attendance Filter</div>
                </a>
            </li>
            </ul>
        </li>
        <li class="menu-item  {{
                request()->is('roles') ||
                request()->is('permissions') ||
                request()->is('positions') ||
                request()->is('work_shifts') ||
                request()->is('departments') ||
                request()->is('announcements') ||
                request()->is('leave_types')
                ?'open active':''
            }}">

        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-settings"></i>
        <div data-i18n="Administration">Administration</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                <a href="{{ route('roles.index') }}" class="menu-link">
                <div data-i18n="Roles">Roles</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('permissions')?'active':'' }}">
                <a href="{{ route('permissions.index') }}" class="menu-link">
                <div data-i18n="Permission">Permission</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('positions')?'active':'' }}">
                <a href="{{ route('positions.index') }}" class="menu-link">
                <div data-i18n="Positions">Positions</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('work_shifts')?'active':'' }}">
                <a href="{{ route('work_shifts.index') }}" class="menu-link">
                <div data-i18n="Work Shifts">Work Shifts</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('departments')?'active':'' }}">
                <a href="{{ route('departments.index') }}" class="menu-link">
                <div data-i18n="Departments">Departments</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('announcements')?'active':'' }}">
                <a href="{{ route('announcements.index') }}" class="menu-link">
                <div data-i18n="Announcements">Announcements</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('profile_cover_images')?'active':'' }}">
                <a href="{{ route('profile_cover_images.index') }}" class="menu-link">
                <div data-i18n="Profile Conver Imges">Profile Conver Imges</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('leave_types')?'active':'' }}">
                <a href="{{ route('leave_types.index') }}" class="menu-link">
                <div data-i18n="Leave Types">Leave Types</div>
                </a>
            </li>
        </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-tag"></i>
                <div data-i18n="Team">Team</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                    <div data-i18n="Members">Members</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                        <div data-i18n="Bank Accounts">Bank Accounts</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-cell"></i>
                        <div data-i18n="Leaves">Leaves</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Leave Status">Leave Status</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Leave Reports">Leave Reports</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-cell"></i>
                        <div data-i18n="Attendance">Attendance</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Daily Log">Daily Log</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Discrepencies">Discrepencies</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Summary">Summary</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Attendance Filter">Attendance Filter</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</aside>
