<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{asset('assets/back_end/assets/images/logo-icon.png')}}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Syndash</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
                </li>
            </ul>
        </li>
        @can('manage-packages')
        <li class="menu-label">Packages</li>
        <li>
            <a href="{{route('packages.index')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-upload"></i>
                </div>
                <div class="menu-title">Manage Packages</div>
            </a>
        </li>
        @endcan
        <li class="menu-label">Email Validator</li>
        <li>
            <a href="{{route('email-validator.create')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-upload"></i>
                </div>
                <div class="menu-title">Upload Your File</div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="parent-icon icon-color-2"><i class="bx bx-download"></i>
                </div>
                <div class="menu-title">Download Your Results</div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="parent-icon icon-color-2"><i class="bx bx-cloud-upload"></i>
                </div>
                <div class="menu-title">Single Email Validator</div>
            </a>
        </li>
        
    </ul>
    <!--end navigation-->
</div>