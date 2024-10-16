    <body class="dark-sidenav navy-sidenav">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="{{route('index')}}" class="logo">
                    <span>
                        <img src="{{asset('/assets/images/logo.png')}}"  width="150px" alt="logo-large" class="logo-light"> 
                    </span>  
                </a>
            </div>
            <!--end logo-->
            @if(auth()->user()->user_type != 1)
            <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">
                    <li class="menu-label mt-0">Main</li>
                    <li>
                        <a href="{{route('instructions')}}"> <i data-feather="coffee" class="align-self-center menu-icon"></i><span>Getting Started</span></a>
                        
                    </li>
                    <li>
                        <a href="{{route('index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
                        
                    </li>
                    <hr class="hr-dashed hr-menu">
                    
                    <li class="menu-label my-2 text-white">Applicants Onboarding</li>
                    <li>
                     
                        @foreach ($applicants as $applicant)
                            <a class="nav-link" href="{{ route('applicant', $applicant->slug) }}">
                                <i data-feather="user-plus" class="align-self-center menu-icon"></i>
                                {{$applicant->name}}
                            </a>
                        @endforeach
                        
                    </li>
                    <hr class="hr-dashed hr-menu">
                    <li class="menu-label my-2">Verifications</li>
                    <li>
                        <a href="{{route('identityIndex')}}">
                            <i data-feather="user" class="align-self-center menu-icon"></i>
                            <span>Identity Verification</span>
                            <span class="menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            {{-- @foreach($sidebar as $menu)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('identityIndex',$menu->slug)}}">
                                    <i class="ti-control-record"></i>
                                    {{strlen($menu->slug) == 3 ? strtoupper($menu->slug) : ucwords(str_replace('-',' ', $menu->slug))}} Verification
                                </a>
                            </li>
                             @endforeach --}}
                        </ul>
                    </li> 
                     <li>
                        <a href="javascript: void(0);"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Business Verifications</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            {{-- @foreach($business as $biz )
                             <li class="nav-item"><a class="nav-link" href="{{route('businessIndex',$biz->slug)}}"><i class="ti-control-record"></i>{{$biz->name}}</a></li>
                            @endforeach --}}
                        </ul>
                    </li> 
                         <li>
                        <a href="javascript: void(0);"><i data-feather="map-pin" class="align-self-center menu-icon"></i><span>Address Verification</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                        @foreach ($address as $add)
                            <li class="nav-item"><a class="nav-link" href="{{ route('addressIndex', $add->slug) }}"><i class="ti-control-record"></i>{{$add->name}}</a></li>
                         @endforeach
                        </ul>
                    </li> 
                    <hr class="hr-dashed hr-menu">
                    <li class="menu-label my-2">AML Verification</li>
                    @foreach ($aml as $amls)
                    <li>
                        <a href="{{route('user.aml_'.$amls->slug,$amls->slug)}}">
                            <i data-feather="search" class="align-self-center menu-icon"></i>
                            <span>{{$amls->name}}   </span>
                        </a>
                    </li>   
                    @endforeach 
                     <hr class="hr-dashed hr-menu">
                    <li class="menu-label my-2">Administrative Task</li>
                    <li>
                        <a href="{{route('users.report')}}">
                            <i data-feather="trending-up" class="align-self-center menu-icon"></i>
                            <span>Audit Reports</span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{route('user.profile')}}">
                            <i data-feather="settings" class="align-self-center menu-icon"></i>
                            <span>Settings</span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{route('client.ActivityLog')}}">
                            <i data-feather="activity" class="align-self-center menu-icon"></i>
                            <span>Activity Log</span>
                        </a>
                    </li>  
                     <li>
                        <a href="{{route('user.transactions')}}">
                            <i data-feather="credit-card" class="align-self-center menu-icon"></i>
                            <span>Billing</span>
                        </a>
                    </li>
                
                    <li>
                        <form  action="{{route('client.AccountActivate')}}" method="get" id="form2">
                     
                            <div class="form-check form-switch form-switch-info">
                                {{-- <input class="form-check-input" type="checkbox" id="customSwitchSecondary" onclick="form2.submit()" @if($logon_user->client->is_activated == 1) checked @endif> --}}
                                {{-- <label class="form-check-label" for="customSwitchinfo" style="color:#fff"> @if($logon_user->client->is_activated == 1)  Live Mode @else Test Mode @endif</label> --}}
                            </div>
                    
                        </form>
                    </li>       
                </ul>
            </div>
            @else
             <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">
                    <li class="menu-label mt-0">Main</li>
                    <li>
                        <a href="{{route('candidate.homepage')}}"> 
                            <i data-feather="home" class="align-self-center menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('candidate.homepage')}}"> 
                            <i data-feather="upload" class="align-self-center menu-icon"></i>
                            <span>File Upload</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('candidate.documents')}}"> 
                            <i data-feather="file" class="align-self-center menu-icon"></i>
                            <span>My Documents</span>
                        </a>
                    </li>

                    </ul>
                </div>
            @endif
        </div>
        <!-- end left-sidenav-->