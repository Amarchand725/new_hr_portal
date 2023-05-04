<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="<?php echo e(url('/dashboard')); ?>" class="app-brand-link">
        <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0"
            />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
              fill="#161616"
            />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
              fill="#161616"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0"
            />
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Cyberonix</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item <?php echo e(request()->is('dashboard')?'active':''); ?>">
        <a href="<?php echo e(route('dashboard')); ?>" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>

      <!-- Apps & Pages -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Apps &amp; Pages</span>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-files"></i>
          <div data-i18n="Salary Details">Salary Details</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="<?php echo e(route('employees')); ?>" class="menu-link">
              <div data-i18n="Salary Details">Salary Details</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo e(route('employees')); ?>" class="menu-link">
              <div data-i18n="Bank Details">Bank Details</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo e(route('employees')); ?>" class="menu-link">
              <div data-i18n="Team Bank Details">Team Bank Details</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item <?php echo e(request()->is('employees') ||
                    request()->is('designations') ||
                    request()->is('employment_status')
                    ?'open active':''); ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Employees">Employees</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item <?php echo e(request()->is('employees')?'active':''); ?>">
            <a href="<?php echo e(route('employees')); ?>" class="menu-link">
              <div data-i18n="Employees">Employees</div>
            </a>
          </li>
          <li class="menu-item <?php echo e(request()->is('designations')?'active':''); ?>">
            <a href="<?php echo e(route('designations.index')); ?>" class="menu-link">
              <div data-i18n="Designations">Designations</div>
            </a>
          </li>
          <li class="menu-item <?php echo e(request()->is('employment_status')?'active':''); ?>">
            <a href="<?php echo e(route('employment_status.index')); ?>" class="menu-link">
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
            <a href="<?php echo e(route('employees')); ?>" class="menu-link">
              <div data-i18n="Leave Status">Leave Status</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo e(route('employees')); ?>" class="menu-link">
              <div data-i18n="Leave Report">Leave Report</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo e(route('employees')); ?>" class="menu-link">
              <div data-i18n="Team Leaves">Team Leaves</div>
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
            <a href="<?php echo e(route('roles.index')); ?>" class="menu-link">
              <div data-i18n="Daily Log">Daily Log</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo e(route('permissions.index')); ?>" class="menu-link">
              <div data-i18n="Discrepancies">Discrepancies</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo e(route('permissions.index')); ?>" class="menu-link">
              <div data-i18n="Summary">Summary</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo e(route('permissions.index')); ?>" class="menu-link">
              <div data-i18n="Attendance Filter">Attendance Filter</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item  <?php echo e(request()->is('roles') ||
            request()->is('permissions') ||
            request()->is('positions') ||
            request()->is('work_shifts') ||
            request()->is('departments') ||
            request()->is('announcements')
            ?'open active':''); ?>">

        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-settings"></i>
          <div data-i18n="Administration">Administration</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item <?php echo e(request()->is('roles')?'active':''); ?>">
            <a href="<?php echo e(route('roles.index')); ?>" class="menu-link">
              <div data-i18n="Roles">Roles</div>
            </a>
          </li>
          <li class="menu-item <?php echo e(request()->is('permissions')?'active':''); ?>">
            <a href="<?php echo e(route('permissions.index')); ?>" class="menu-link">
              <div data-i18n="Permission">Permission</div>
            </a>
          </li>
          <li class="menu-item <?php echo e(request()->is('positions')?'active':''); ?>">
            <a href="<?php echo e(route('positions.index')); ?>" class="menu-link">
              <div data-i18n="Positions">Positions</div>
            </a>
          </li>
          <li class="menu-item <?php echo e(request()->is('work_shifts')?'active':''); ?>">
            <a href="<?php echo e(route('work_shifts.index')); ?>" class="menu-link">
              <div data-i18n="Work Shifts">Work Shifts</div>
            </a>
          </li>
          <li class="menu-item <?php echo e(request()->is('departments')?'active':''); ?>">
            <a href="<?php echo e(route('departments.index')); ?>" class="menu-link">
              <div data-i18n="Departments">Departments</div>
            </a>
          </li>
          <li class="menu-item <?php echo e(request()->is('announcements')?'active':''); ?>">
            <a href="<?php echo e(route('announcements.index')); ?>" class="menu-link">
              <div data-i18n="Announcements">Announcements</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
</aside>
<?php /**PATH C:\xampp\htdocs\new_hr_portal.local\resources\views/admin/layouts/sidebar-menu.blade.php ENDPATH**/ ?>