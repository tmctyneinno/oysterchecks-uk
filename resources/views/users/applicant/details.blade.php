@extends('layouts.app')
@section('content')
<div class="page-content">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-sm-12">
                           <div class="page-title-box">
                               <div class="row">
                                   <div class="col">
                                       <h4 class="page-title">Applicant Onboarding</h4>
                                       <ol class="breadcrumb">
                                           <li class="breadcrumb-item"></li>
                                       </ol>
                                   </div><!--end col-->
                                   <div class="col-auto align-self-center">
                                       <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                           <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                           <span class="" id="Select_date">Jan 11</span>
                                           <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                                       </a>
                                   </div><!--end col-->  
                               </div><!--end row-->                                                              
                           </div><!--end page-title-box-->
                       </div><!--end col-->
                   </div>
                   <div class="row ">
                       <div class="col-lg-12">
                           <div class="row justify-content-center">
                               <div class="col-md-6 col-lg-3">
                                   <div class="card report-card ">
                                       <div class="card-body" >
                                           <div class="row d-flex justify-content-center">
                                               <div class="col">
                                                   <p class="mb-0 fw-semibold text-black">Total Applicants </p>
                                                   <h3 class="m-0 text-black">{{count($applicant)}}</h3>
                                               </div>
                                               <div class="col-auto align-self-center">
                                                   <div class="report-main-icon bg-light-alt">
                                                       <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                   </div>
                                               </div>
                                           </div>
                                       </div><!--end card-body--> 
                                   </div><!--end card--> 
                               </div>
                               <div class="col-md-6 col-lg-3">
                                   <div class="card report-card">
                                       <div class="card-body" >
                                           <div class="row d-flex justify-content-center">
                                               <div class="col">
                                                   <p class="text-black mb-0 fw-semibold">Total Verified Applicants</p>
                                                   <h3 class="m-0 text-black">{{count($verified)}}</h3>
                                               </div>
                                               <div class="col-auto align-self-center">
                                                   <div class="report-main-icon bg-light-alt">
                                                       <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                   </div>
                                               </div>
                                           </div>
                                       </div><!--end card-body--> 
                                   </div><!--end card--> 
                               </div>
                               <div class="col-md-6 col-lg-3">
                                   <div class="card report-card">
                                       <div class="card-body" >
                                           <div class="row d-flex justify-content-center">
                                               <div class="col">
                                                   <p class="text-black mb-0 fw-semibold">Pending Applicants</p>
                                                   <h3 class="m-0 text-black">{{count($pending)}}</h3>
                                               </div>
                                               <div class="col-auto align-self-center">
                                                   <div class="report-main-icon bg-light-alt">
                                                       <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                   </div>
                                               </div>
                                           </div>
                                       </div><!--end card-body--> 
                                   </div><!--end card--> 
                             </div> <!--end col-->  
                             <div class="col-md-6 col-lg-3">
                               <div class="card report-card">
                                   <div class="card-body" >
                                       <div class="row d-flex justify-content-center">
                                           <div class="col">
                                               <p class="text-black mb-0 fw-semibold">Rejected Applicants</p>
                                               <h3 class="m-0 text-black">{{count($rejected)}}</h3>
                                           </div>
                                           <div class="col-auto align-self-center">
                                               <div class="report-main-icon bg-light-alt">
                                                   <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                               </div>
                                           </div>
                                       </div>
                                   </div><!--end card-body--> 
                               </div><!--end card--> 
                         </div> <!--end col-->         
                             <!--end col-->                               
                           </div><!--end row-->                
                       </div>
       </div>

 
                   <div class="row">
                       <div class="col-12">
                           <div class="card">
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-lg-3 ">
                                            <div class="custom-border mb-3"></div>
                                            <h3 class="pro-title">{{strtoupper($appli->user->firstname .' '. $appli->user->lastname)}} </h3>
                                            <ul class="list-unstyled personal-detail mb-0">
                                                <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> ApplicantID</b> : {{$appli->applicantId}}</li>
                                                <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> ExternalUserId</b> : {{$appli->externalUserId}}</li>
                                                <li class="mt-2"><i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> Phone </b> : {{$appli->phone}}</li>
                                                <li class="mt-2"><i class="ti ti-email text-secondary font-16 align-middle me-2"></i> <b> Email </b> : {{$appli->email}}</li>
                                                @if($appli->address)
                                                <li class="mt-2"><i class="ti ti-map text-secondary font-16 align-middle me-2"></i> <b> Address </b> :{{$appli->address}} </li>
                                                @endif 
                                                @if($appli->gender)
                                                <li class="mt-2"><i class="ti ti-map text-secondary font-16 align-middle me-2"></i> <b> Gender </b> :{{$appli->gender}} </li>
                                                @endif  
                                                @if($appli->city)
                                                <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> City</b> : {{$appli->city}}</li>
                                                @endif
                                                <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Country</b> : {{$appli->country}}</li>   
                                                @if($appli->registrationnumber)
                                                <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Registration number</b> : {{$appli->registrationnumber}}</li>
                                                @endif                 
                                                @if($appli->websitelink)
                                                <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Website</b> : {{$appli->websitelink}}</li>
                                                @endif                             
                                            </ul>
                                            <br> 
                                        </div><!--end col-->
                                        <div class="col-lg-9 align-self-center">
                                                        <div class="single-pro-detail">
                                                            <div class="custom-border mb-3"></div>
                                                            <h3 class="pro-title">Verification Services</h3>
                                                
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered mb-0 table-centered">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Applicant type Name</th>
                                                                            <th>Review</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                        
                                                                        <tr>
                                                                            <td> {{ strtoupper($appli->applicant_type) }}</td>
                                                                            <td>
                                                                                
                                                                                <ul>
                                                                                    <li><b>Review ID:</b>   {{ json_decode($appli->review)->reviewId }}</li>
                                                                                    <li><b>Attempt ID:</b>   {{ json_decode($appli->review)->attemptId }}</li>
                                                                                    <li><b>Attempt Count:</b>   {{  json_decode($appli->review)->attemptCnt }}</li>
                                                                                    <li><b>LevelName:</b>   {{  json_decode($appli->review)->levelName }}</li>
                                                                                    <li><b>LevelAutoCheckMode:</b>   {{  json_decode($appli->review)->levelAutoCheckMode }}</li>
                                                                                    <li><b>Review Status:</b>   {{  json_decode($appli->review)->reviewStatus }}</li>
                                                                                </ul>
                                                                            </td>
                                                                           
                                                                            @if($appli->status == "approved")
                                                                                <td><span class="badge badge-soft-success">Approved</span></td>
                                                                            @elseif($appli->status == "failed")
                                                                                <td><span class="badge badge-soft-danger">Rejected</span></td>
                                                                            @else
                                                                                <td>
                                                                                    <span class="badge badge-soft-warning">Pending</span> 
                                                                                </td>
                                                                            @endif
                                                                           
                                        
                                                                             <td>
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="dropdown-toggle arrow-none" id="seeMore" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                                                        <i class="fa fa-ellipsis-h font-12 text-muted"></i>
                                                                                    </a>
                                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="seeMore" style="">
                                                                                        {{-- <a class="dropdown-item" href="#">Copy Reference Id</a> --}}
                                                                                        <a   class="btn btn-sm" href=""> Request Verification</a> 
                                                                                        
                                                                                    </div>
                                                                                </div> 
                                                                            </td>
                                                                        </tr>
                                                                        {{-- @include('users.candidates.modals') --}}
                                                                        
                                                                        </tbody>
                                                                    </table><!--end /table-->
                                                                </div><!--end /tableresponsive-->
                                                                                    
                                            </div>
                                        </div><!--end col-->                                            
                                    </div><!--end row-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
       

               @include('users.applicant.applicantData')
          
       </div>                  
@endsection