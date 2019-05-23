<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('patient.dashboard') }}" class="site_title">
                <span>Artificial limb care </span>
            </a>
        </div>

        <div class="clearfix"></div>
        @php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        $members = DB::table('member')->where('email', $email)->get();
        $mbr_pic = "pandding";
        $id=null;
            foreach($members as $member)
            {
                $mbr_pic=$member->mbr_pic;
                $id=$member->id;
            }
        @endphp
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img  src="\image\member\pic\{{$mbr_pic}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
                <h3>Mamber</h3>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Management</h3>

                @php ($emp = '')
                @php ($app = '')
                @php ($stor = '') 
                @php ($qf = '') 
                
                @if(!empty($employee))
                    @php ($emp = $employee->id)
                @endif
                @if(!empty($appointment))
                    @php ($app = $appointment->id)
                @endif
                @if(!empty($stores))
                    @php ($stor = $stores->id)
                @endif

                <ul class="nav side-menu">
                    <li class="@if (Request::is('member/member') || Request::is('member/member/edit/'.$id) || Request::is('member/member/edit/editmember')) active @endif">
                        <a href="{{ route('patient.member') }}">
                            <i class="fas fa-id-badge" aria-hidden="true"></i>
                            {{ "Member" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('member/online_book')||Request::is('member/searchonlinelibrary')|| Request::is('member/online_book/'.$id)) active @endif">
                        <a href="{{ route('patient.online_book') }}">
                            <i class="fas fa-file-pdf-o" aria-hidden="true"></i>
                            {{ "Online book" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('member/book') || Request::is('member/searchBook')  || Request::is('member/book/'.$id)) active @endif">
                        <a href="{{ route('patient.book') }}">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            {{ "Book" }}
                        </a>
                    </li>
                    <li  class="@if (Request::is('member/book_issue') ||Request::is('member/Msearchbookissue') || Request::is('member/book_issue/'.$id)) active @endif">
                        <a href="{{ route('patient.book_issue') }}">
                            <i class="fas fa-book-reader " aria-hidden="true"></i>
                            {{ "Book issue" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('member/fine_collection')||Request::is('member/Msearchfine')) active @endif">
                        <a href="{{ route('patient.fine_collection') }}">
                            <i class="fas fa-money" aria-hidden="true"></i>
                            {{ "Fine collection" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('member/author') || Request::is('member/authorsearchauthor')) active @endif">
                        <a href="{{ route('patient.author') }}">
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
