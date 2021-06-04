
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="/userdashboard"><img src="{{asset('adptc/assets/img/logo-pro-ads.png')}}" width="25" alt=""><span class="m-l-10"></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                @if (Auth::user()->usertype =='admin')
                <div>
                    <a href="{{url('/admindashboard')}}" class="btn btn-info">Access Admin Dashboard</a>
                </div>
                @endif

            </li>
            <hr>
            <li>
                <div class="user-info">
                    <a class="image" href="/profile"><img src="{{asset('img/default-avatar.jpg')}}" alt="User"></a>
                    <div class="detail">
                        <h4> {{ Auth::user()->name }}</h4>
                        <small>Marketer</small>
                    </div>
                </div>
            </li>
            <li class="{{ Request::is('userdashboard') ? "active open" :"" }}"><a href="/userdashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="{{ Request::is('profile') ? "active open" :"" }}"><a href="{{route('profile')}}"><i class="zmdi zmdi-account"></i><span>My Profile</span></a></li>


                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Financials</span></a>
                    <ul class="ml-menu">
                        <li class="{{ Request::is('invest.index') ? "active open" :"" }}"><a href="/invest.index">Make Investment</a></li>
                        <li class="{{ Request::is('invest.earnings') ? "active open" :"" }}"><a href="/invest.earnings">My Total Earnings</a></li>
                        <li class="{{ Request::is('invest.history') ? "active open" :"" }}"><a href="/invest.history">My Investments</a></li>
                        <li class="{{ Request::is('makewithdrawal') ? "active open" :"" }}"><a href="/makewithdrawal">Request Withdrawal</a></li>
                        <li><a href="contact.html">Referral Balances</a></li>
                    </ul>
                </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Earning History</span></a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('earninghistory') ? "active open" :"" }}"><a href="/earninghistory">My Earnings</a></li>
                    <li class="{{ Request::is('user.daily.earnings') ? "active open" :"" }}"><a href="/user.daily.earnings">My Daily Bonus Earnings</a></li>
                    <li class="{{ Request::is('interestlog') ? "active open" :"" }}"><a href="/interestlog">My Interests Log</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>Deposits</span></a>
                <ul class="ml-menu">
                    <li><a href="/depositindex">My Deposits</a></li>
                    <li><a href="/makedeposit">Make Deposit</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Rerrals</span></a>
                <ul class="ml-menu">
                    <li><a href="/newreferral">New Referral</a></li>
                    <li><a href="/myreferrals">My Referrals</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-money-box"></i><span>Advertisements</span></a>
                <ul class="ml-menu">



                        <li><a href="{{route('userCash.links')}}"><i class="zmdi zmdi-local-offer"></i> View Cash Links </a>




                        <li><a href="{{route('userLink.share')}}"><i class="zmdi zmdi-local-offer"></i> View Link Share </a>



                        <li><a href="{{route('userAdPlan')}}"><i class="zmdi zmdi-local-offer"></i> Buy Traffic </a>


                        <li><a href="{{route('uPlanLog')}}"><i class="zmdi zmdi-local-offer"></i> My Traffic Plan</a>

                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Testimonial</span></a>
                <ul class="ml-menu">
                    <li><a href="/user.review">Write Us A Review</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Testimonial</span></a>
                <ul class="ml-menu">

                <li><a href="/memberships"><i class="zmdi zmdi-hc-border-lock"></i> Upgrade Membership</a>
            </li>
        </ul>
    </div>
</aside>
