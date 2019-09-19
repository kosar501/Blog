<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">

        <!-- User Profile -->
        <li>
            <div class="user-profile text-center">
                <img src="{{url('img/profile/doctor-character-background_1270-84.jpg')}}" alt="user_auth" class="user-auth-img img-circle"/>
                <div class="dropdown mt-5">
                    <a href="#" class="dropdown-toggle pr-0 bg-transparent" data-toggle="dropdown">
{{--                        @if(auth()->check())--}}
{{--                            {{auth()->user()->family}}--}}
{{--                        @endif--}}
                        <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">

                        <li>
                            <a href="{{ route('logout')}}"><i class="zmdi zmdi-power"></i><span>خروج</span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </li>

        <li>
            <a href="{{url('/home')}}"><div class="pull-left"><i class="fa fa-home mr-20"></i></i><span class="right-nav-text">داشبورد</span></div><div class="clearfix"></div></a>
        </li>


        <!-- /User Profile -->
        <li class="navigation-header">
            <span>تولید محتوا</span>
            <i class="zmdi zmdi-more"></i>
        </li>


{{--        @if(\Illuminate\Support\Facades\Auth::user()->isSecretary() == true)--}}
        <li>
            <a href="{{url('/reception')}}"><div class="pull-left"><i class="fa fa-medkit mr-20"></i><span class="right-nav-text">پذیرش بیمار</span></div><div class="clearfix"></div></a>
        </li>
{{--        @endif--}}
{{--        @if(\Illuminate\Support\Facades\Auth::user()->isWebAdmin() == true)--}}
            <li>
                <a href="{{url('/seeing')}}"><div class="pull-left"><i class="fa fa-user-md mr-20"></i><span class="right-nav-text">ویزیت بیمار</span></div><div class="clearfix"></div></a>

            </li>

{{--        @endif--}}


        <li>
            <a href="{{url('/patients')}}"><div class="pull-left"><i class="fas fa-users mr-20"></i><span class="right-nav-text">لیست بیماران</span></div><div class="clearfix"></div></a>
        </li>

        <li>
            <a href="#"><div class="pull-left"><i class="fa fa-sort-amount-asc mr-20"></i><span class="right-nav-text">لیست نوبت ها</span></div><div class="clearfix"></div></a>
        </li>

        {{--<li>--}}
            {{--<a href="{{url('/receipt')}}"><div class="pull-left"><i class="fas fa-braille mr-20"></i><span class="right-nav-text">ویزیت بیمار</span></div><div class="clearfix"></div></a>--}}
        {{--</li>--}}


        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>حسابداری</span>
            <i class="zmdi zmdi-more"></i>
        </li>
{{--        @if(\Illuminate\Support\Facades\Auth::user()->isWebAdmin() == true)--}}
        <li>
            <a href="{{url('/expenses')}}"><div class="pull-left"><i class="fas fa-dolly-flatbed mr-20"></i><span class="right-nav-text">هزینه ها</span></div><div class="clearfix"></div></a>
        </li>

        <li>
            <a href="{{url('/incomes')}}"><div class="pull-left"><i class="fa fa-balance-scale mr-20"></i><span class="right-nav-text">درآمد</span></div><div class="clearfix"></div></a>
        </li>
{{--        @endif--}}
        <li>
            <a href="{{url('/receipts')}}"><div class="pull-left"><i class="fas fa-file-invoice-dollar mr-20"></i><span class="right-nav-text">صدور فاکتور</span></div><div class="clearfix"></div></a>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>تنطیمات</span>
            <i class="zmdi zmdi-more"></i>
        </li>


        <li>
            <a href="{{url('/services')}}"><div class="pull-left"><i class="fas fa-sort-amount-down mr-20"></i><span class="right-nav-text">مدیریت خدمات</span></div><div class="clearfix"></div></a>
        </li>






{{--        @if(\Illuminate\Support\Facades\Auth::user()->isWebAdmin() == true)--}}
            <li>
                <a href="#"><div class="pull-left"><i class="fas fa-users mr-20"></i><span class="right-nav-text">مدیریت کاربران</span></div><div class="clearfix"></div></a>
            </li>

{{--        @endif--}}





    </ul>
</div>
