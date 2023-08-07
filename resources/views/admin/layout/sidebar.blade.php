<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#password-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="password-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/get-admin-password') }}">Update
                            Password</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/get-admin-details') }}">Update
                            Details</a></li>
                </ul>
            </div>
        </li>
        @if (Auth::guard('admin')->user()->roles->contains('name', 'superadmin'))
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Applicants</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('admin/recommended-applicants') }}">Shortlist</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/shortlisted-applicants') }}">Drop
                                Candidate</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('admin/shortlisted-applicants') }}">Shortlisted
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Applicants</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/dashboard') }}">Not
                                Recommended
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('admin/recommended-applicants') }}">Recommended
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('admin/shortlisted-applicants') }}">Shortlisted
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
