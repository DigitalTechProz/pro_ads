@extends('layouts.admin')
@section('title','Update Website Settings')

@section('content')

<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Website Settings</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Update Website</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('generalsettings')}}" method="post" class="card auth_form">
        {{csrf_field()}}
        <!-- General Settings -->
        <div class="row clearfix">
            <div class="container-fluid">
                <div class="header">
                    <h2><strong>Website </strong> Settings</h2>
                </div>

                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">notifications</i>
                        <span data-notify="message">
                            @foreach($errors->all() as $error)
                            <li><strong> {{$error}} </strong></li>
                            @endforeach
                        </span>
                    </div>
                @endif
                <div class="card mcard_3">
                    <div class="body">
                        <div class="col-md-4">
                            <p class="text-danger text-center"> This is a Fund Transfer Settings. If you Turn Off, No one can Transfer Fund from User to User. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="transfer" data-style="btn btn-success btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->transfer == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->transfer == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card mcard_4">
                    <div class="body ">
                        <div class="col-md-4 justify-content-center">
                            <p class="text-danger text-center"> This is a Live Chat Settings. If you Turn Off, No one can use live chat. </p>
                            <div class="form-group label-floating ">
                                <select class="selectpicker" name="live_chat" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->live_chat == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->live_chat == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 ">
                            <p class="text-danger text-center"> This is a Payment Proof Settings. If you Turn Off, No one can see payment proof page. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="payment_proof" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->payment_proof == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->payment_proof == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card mcard_4">
                    <div class="body">
                        <div class="col-md-4">
                            <p class="text-danger text-center"> This is the Investment Settings. If you Turn Off, No one can use the Investment system. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="invest" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->invest == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->invest == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is a Homepage Settings. If you Turn Off, No one can see summary on home page. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="summary" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"
                                        @if ($settings->summary == 0)
                                            selected
                                        @endif

                                    >Turn Off</option>
                                    <option value="1"
                                        @if ($settings->summary == 1)
                                            selected
                                        @endif

                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is a Deposit Settings. If you Turn Off, No one can see deposit section on home page. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="latest_deposit" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"
                                        @if ($settings->latest_deposit == 0)
                                            selected
                                        @endif

                                    >Turn Off</option>
                                    <option value="1"
                                        @if ($settings->latest_deposit == 1)
                                        selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is a PTC Ads Settings. If you Turn Off, No one can see PTC Ads Feature. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="ptc" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"
                                        @if($settings->ptc == 0)
                                        selected
                                        @endif

                                    >Turn Off</option>
                                    <option value="1"
                                        @if($settings->ptc == 1)
                                        selected
                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is the Membership Updgrade Setting. If you Turn Off, No one can see Membership Updgrade section on home page. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="membership_upgrade" data-style="btn btn-info  btn-round" title="Select Membership Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->membership_upgrade == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->membership_upgrade == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is the PPV Settings. If you Turn Off, No one can see PPV section on home page. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="ppv" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->ppv == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->ppv == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is Login Bonus Settings. If you Turn Off, No one can earn Login Bonus. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="login" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->login == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->login == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is the Affilate Share Settings. If you Turn Off, The Affilate Share feature will be disbaled. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="aff_share" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->aff_share == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->aff_share == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 justify-content-end">
                            <p class="text-danger text-center"> This is the Buy Traffic Settings. If you Turn Off, No one can Buy Traffic. </p>
                            <div class="form-group label-floating">
                                <select class="selectpicker" name="buy_traffic" data-style="btn btn-info  btn-round" title="Select Status" data-size="7">

                                    <option value="0"

                                        @if ($settings->buy_traffic == 0)

                                            selected

                                        @endif

                                    >Turn Off</option>
                                    <option value="1"

                                        @if ($settings->buy_traffic == 1)

                                            selected

                                        @endif


                                    >Turn On</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form-->
        <div class="row clearfix">
            <div class="container-fluid">

                    <div class="card">
                        <div class="body">
                            <!-- create table-->

                            <div class="body">
                                <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Website Name </label>
                                                <input id="site_name"  name="site_name" type="text" value="{{$settings->site_name}}" class="form-control" placeholder="Website Name">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Website Title </label>
                                                <input id="site_title"  name="site_title" type="text" value="{{$settings->site_title}}" class="form-control" placeholder="Website Title">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Company Name </label>
                                                <input id="company_name"  name="company_name" type="text" value="{{$settings->company_name}}" class="form-control" placeholder="Company Name">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Company Contact Email </label>
                                                <input id="contact_email"  name="contact_email" type="text" value="{{$settings->contact_email}}"  class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>System  Contact Email </label>
                                                <input id="app_contact"  name="app_contact" type="text" value="{{$settings->app_contact}}" class="form-control" placeholder="System Contact Email">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Disqus Comment System Site Username </label>
                                                <input id="disqus"  name="disqus" type="text" value="{{$settings->disqus}}" class="form-control" placeholder="Disqus Username">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Company Address </label>
                                                <input id="address"  name="address" type="text" value="{{$settings->address}}" class="form-control" placeholder="Company Address">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Twak to Chat Code </label>
                                                <input id="chat_code"  name="chat_code" type="text" value="{{$settings->chat_code}}" class="form-control" placeholder="Chat code">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Company Start Date </label>
                                                <input id="start_date"  name="start_date" type="date" value="{{ date('Y-m-d', strtotime($settings->start_date)) }}"  class="form-control" placeholder="Disqus Username">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Referral Investment Commission (in Percentage) </label>
                                                <input id="referral_invest"  name="referral_invest" type="text" value="{{$settings->referral_invest + 0}}" class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Minimum Deposit (in {{config('app.currency_code')}}) </label>
                                                <input id="minimum_deposit"  name="minimum_deposit" type="text" value="{{$settings->minimum_deposit + 0}}" class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Minimum Withdrawal (in {{config('app.currency_code')}}) </label>
                                                <input id="minimum_withdraw"  name="minimum_withdraw" type="text" value="{{$settings->minimum_withdraw + 0}}" class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Self Transfer Commission (in Percentage) </label>
                                                <input id="self_transfer"  name="self_transfer" type="number" value="{{$settings->self_transfer + 0}}" class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Member To Member Transfer Commission (in Percentage) </label>
                                                <input id="other_transfer"  name="other_transfer" type="number" value="{{$settings->other_transfer + 0}}"  class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Self Transfer Commission (in Percentage) </label>
                                                <input id="self_transfer"  name="self_transfer" type="number" value="{{$settings->selft_transfer + 0}}" class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Referral Link Share Bonus (in {{config('app.currency_code')}}) </label>
                                                <input id="link_share"  name="link_share" type="number" value="{{$settings->link_share + 0}}"  class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Referral Signup Bonus (in {{config('app.currency_code')}}) </label>
                                                <input id="referral_signup"  name="referral_signup" type="number" value="{{$settings->referral_signup + 0}}" class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Referral Deposit Commission (in Percentage) </label>
                                                <input id="referral_deposit"  name="referral_deposit" type="number" value="{{$settings->referral_deposit + 0}}"  class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Minimum Member To Member Transfer  (in {{config('app.currency_code')}}) </label>
                                                <input id="minimum_transfer"  name="minimum_transfer" type="number" value="{{$settings->minimum_transfer + 0}}" class="form-control" placeholder="Referral Commission">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Daily Rewards  (in {{config('app.currency_code')}}) </label>
                                                <input id="daily_rewards"  name="daily_rewards" type="number" value="{{$settings->daily_rewards + 0}}" class="form-control" placeholder="Enter Daily Reward amount">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>SignUp Bonus  (in {{config('app.currency_code')}}) </label>
                                                <input id="signup_bonus"  name="signup_bonus" type="number" value="{{$settings->signup_bonus + 0}}" class="form-control" placeholder="Enter SignUp Bonus amount">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Referral Upgrade Bonus  (in {{config('app.currency_code')}}) </label>
                                                <input id="referral_upgrade"  name="referral_upgrade" type="number" value="{{$settings->referral_upgrade + 0}}"  class="form-control" placeholder="Enter Referral Upgrade Bonus">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Referral Advert Bonus  (in {{config('app.currency_code')}}) </label>
                                                <input id="referral_advert"  name="referral_advert" type="number" value="{{$settings->referral_advert + 0}}" class="form-control" placeholder="Enter Referral Advert bonus amount">
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="{{route('admindashboard')}}" class="btn btn-danger">Cancel Configure</a>

                                            <button type="submit" class="btn btn-success pull-right">Save Changes</button>

                                            <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>

    </form>

</section>

@endsection


