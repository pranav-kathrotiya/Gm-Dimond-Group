<style>
    .sidebar .navbar-nav .nav-item .nav-link i {
        -webkit-box-flex: 0;
        flex: 0 0 1.5rem;
        -ms-flex: 0 0 1.5rem;
    }

    .sidebar .navbar-nav .nav-item .multimenu-menu-indicator i {
        -webkit-box-flex: 0;
        flex: 0 0 1rem;
        -ms-flex: 0 0 1rem;
        font-size: 6px;
    }
</style>
<ul class="navbar-nav">
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.project*') ? 'active' : '' }}"
            href="{{ route('admin.project.index') }}" aria-expanded="false">
            <i class="fa-solid fa-project-diagram"></i><span class="nav-text">Project</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.blog*') ? 'active' : '' }}"
            href="{{ route('admin.blog.index') }}" aria-expanded="false">
            <i class="fa-solid fa-blog"></i><span class="nav-text">Blog</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.pioneers*') ? 'active' : '' }}"
            href="{{ route('admin.pioneers.index') }}" aria-expanded="false">
            <i class="fa-solid fa-image"></i><span class="nav-text">Pioneers/Preferred</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.event*') ? 'active' : '' }}"
            href="{{ route('admin.event.index') }}" aria-expanded="false">
            <i class="fa-solid fa-image"></i><span class="nav-text">Media/Events</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.job_opening*') ? 'active' : '' }}"
            href="{{ route('admin.job_opening.index') }}" aria-expanded="false">
            <i class="fa-solid fa-tasks"></i><span class="nav-text">Job Opening</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center" href="#cmsSubmenu" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="cmsSubmenu">
            <i class="fa-solid fa-bars"></i><span class="nav-text ms-2">CMS</span>
            <i class="fa-solid fa-chevron-down ms-auto"></i>
        </a>

        <div class="collapse ps-4" id="cmsSubmenu">
            <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.about*') ? 'active' : '' }}"
                href="{{ route('admin.about.add') }}">
                <i class="fa-solid fa-info"></i><span class="nav-text ms-2">About Us</span>
            </a>
            <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.who_we_are*') ? 'active' : '' }}"
                href="{{ route('admin.who_we_are.add') }}">
                <i class="fa-solid fa-user"></i><span class="nav-text ms-2">Who We Are</span>
            </a>
            <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.vision*') ? 'active' : '' }}"
                href="{{ route('admin.vision.add') }}">
                <i class="fa-solid fa-eye"></i><span class="nav-text ms-2">Vision</span>
            </a>
            <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.mission*') ? 'active' : '' }}"
                href="{{ route('admin.mission.add') }}">
                <i class="fa-solid fa-bullseye"></i><span class="nav-text ms-2">Mission</span>
            </a>
            <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.workplace*') ? 'active' : '' }}"
                href="{{ route('admin.workplace.add') }}">
                <i class="fa-solid fa-diamond"></i><span class="nav-text ms-2">Workplace</span>
            </a>
            <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.chairman*') ? 'active' : '' }}"
                href="{{ route('admin.chairman.index') }}">
                <i class="fa-solid fa-diamond"></i><span class="nav-text ms-2">Chairman</span>
            </a>

        </div>
    </li>

    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.social_media*') ? 'active' : '' }}"
            href="{{ route('admin.social_media.index') }}" aria-expanded="false">
            <i class="fa-solid fa-bars"></i><span class="nav-text">Social Media</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}"
            href="{{ route('admin.testimonials.index') }}" aria-expanded="false">
            <i class="fa-solid fa-comments"></i><span class="nav-text">Testimonials</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.core_values*') ? 'active' : '' }}"
            href="{{ route('admin.core_values.index') }}" aria-expanded="false">
            <i class="fa-solid fa-value-absolute"></i><span class="nav-text">Core Values</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center {{ request()->routeIs('admin.setting*') ? 'active' : '' }}"
            href="{{ route('admin.setting.index') }}" aria-expanded="false">
            <i class="fa-solid fa-gear"></i><span class="nav-text">Settings</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link rounded d-flex align-items-center" href="{{ route('admin.clearcache') }}"
            aria-expanded="false">
            <i class="fa fa-refresh"></i><span class="nav-text">Clear Cache</span>
        </a>
    </li>
</ul>
