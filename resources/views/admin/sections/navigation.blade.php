<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                {{-- <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img"> --}}
                <img src="\img\core-img\businessman_863430.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                {{-- <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3> --}}
                <ul class="nav side-menu">
                    <li>
                        {{-- <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_0_1') }}
                        </a> --}}
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Management</h3>

                {{--This is how Im freakingly activate nav items--}}
                @php ($emp = '')
                @php ($app = '')
                @php ($stor = '') 
                @php ($qf = '') 
                
                @if(!empty($employee))
                    @if (isset($employee[0]))
                        @php ($emp = $employee[0]->id)
                    @elseif(isset($employee))
                        @php ($emp = $employee->id)
                    @endif
                @endif
                @if(!empty($appointment))
                    @php ($app = $appointment->id)
                @endif
                @if(!empty($stores))
                    @php ($stor = $stores->id)
                @endif
                @if(!empty($questionsforum))
                    @if(!empty($questionsforum->id))
                        @php ($qf =  $questionsforum->id)
                    @endif
                @endif 

                <ul class="nav side-menu">
                    <li class="@if (Request::is('admin/member') || Request::is('admin/searchMember') || Request::is('admin/member/'.$emp)) active @endif">
                        <a href="{{ route('admin.member') }}">
                            <i class="fas fa-id-badge" aria-hidden="true"></i>
                            {{ "Member" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/online_book/add') ||Request::is('admin/searchonline_book')) active @endif">
                        <a href="{{ route('admin.online_book') }}">
                            <i class="fas fa-file-pdf-o" aria-hidden="true"></i>
                            {{ "Online book" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/diagnosis') || Request::is('admin/diagnosis/add')) active @endif">
                        <a href="{{ route('admin.book') }}">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            {{ "Book" }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.book_issue') }}">
                            <i class="fas fa-book-reader " aria-hidden="true"></i>
                            {{ "Book issue" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/appointments/add') || Request::is('admin/appointments/'.$app.'/edit') || Request::is('admin/appointments/'.$app)) active @endif">
                        <a href="{{ route('admin.fine_collection') }}">
                            <i class="fas fa-money" aria-hidden="true"></i>
                            {{ "Fine collection" }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.author') }}">
                            <i class="fas fa-pen-nib" aria-hidden="true"></i>
                            {{ "Author" }}
                        </a>
                    </li>
                   
                </ul>
            </div>
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
