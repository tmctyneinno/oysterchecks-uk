@extends('layouts.app')
@section('content')
<div class="page-content">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-sm-12">
                           <div class="page-title-box">
                               <div class="row">
                                   <div class="col">
                                       <h4 class="page-title">Identity Verification</h4>
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
                                       <a href="#" class="btn btn-sm btn-outline-primary">
                                           <i data-feather="download" class="align-self-center icon-xs"></i>
                                       </a>
                                   </div><!--end col-->  
                               </div><!--end row-->                                                              
                           </div><!--end page-title-box-->
                       </div><!--end col-->
                   </div> 
                  
        <!-- end page title end breadcrumb -->
        
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        {{-- <p class="mb-1 btn btn-success" ><i class="fa fa-check"> </i> Verified</p> --}}

                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="custom-border mb-3"></div>
                                    {{-- <h3 class="pro-title">{{strtoupper($applicant->user->firstname .' '. $applicant->user->lastname)}} </h3> --}}
                                    <h3 class="pro-title"> Applicant details </h3>
                                    <ul class="list-unstyled personal-detail mb-0">
                                        @if($data['applicant']->firstName)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> Applicant Name</b> : {{$data['applicant']->firstName}} {{$data['applicant']->middleName}} {{$data['applicant']->lastName}}</li>
                                        @endif
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> ApplicantID</b> : {{$data['applicant']->applicantId}}</li>
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> ExternalUserId</b> : {{$data['applicant']->externalUserId}}</li>
                                        <li class="mt-2"><i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> Phone </b> : {{$data['applicant']->phone}}</li>
                                        <li class="mt-2"><i class="ti ti-email text-secondary font-16 align-middle me-2"></i> <b> Email </b> : {{$data['applicant']->email}}</li>
                                        @if($data['applicant']->address)
                                        <li class="mt-2"><i class="ti ti-map text-secondary font-16 align-middle me-2"></i> <b> Address </b> :{{ $data['applicant']->address}} </li>
                                        @endif 
                                        @if( $data['applicant']->gender == 'F')
                                        <li class="mt-2"><i class="ti ti-map text-secondary font-16 align-middle me-2"></i> <b> Gender </b> : Female </li>
                                        @else
                                        <li class="mt-2"><i class="ti ti-map text-secondary font-16 align-middle me-2"></i> <b> Gender </b> : Male </li>
                                        @endif  

                                        @if( $data['applicant']->city)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> City</b> : {{$data['applicant']->city}}</li>
                                        @endif
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Country</b> : {{$data['applicant']->country}}</li>   
                                        @if( $data['applicant']->registrationnumber)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Registration number</b> : {{$data['applicant']->registrationnumber}}</li>
                                        @endif                 
                                        @if( $data['applicant']->websitelink)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Website</b> : {{$data['applicant']->websitelink}}</li>
                                        @endif                             
                                    </ul>
                                    <br> 
                                </div><!--end col-->
                                <div class="col-lg-4 ">
                                    <div class="custom-border mb-3"></div>
                                    <h3 class="pro-title"> Identity details</h3>
                                    <ul class="list-unstyled personal-detail mb-0">
                                        @if($data['identityVerificationdetails']->firstName)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> Applicant Name</b> : {{$data['identityVerificationdetails']->firstName}} {{$data['identityVerificationdetails']->middleName}} {{$data['identityVerificationdetails']->lastName}}</li>
                                        @endif
                                        @if($data['identityVerificationdetails']->country)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> Country </b> : {{ $data['identityVerificationdetails']->country}}</li>
                                        @endif
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Document</b> : {{ $data['identityVerificationdetails']->idDocType}}</li>   
                                       
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i> <b> ApplicantID</b> : {{ $data['identityVerificationdetails']->applicantId}}</li>
                                        @if( $data['identityVerificationdetails']->address)
                                        <li class="mt-2"><i class="ti ti-map text-secondary font-16 align-middle me-2"></i> <b> Address </b> :{{ $data['identityVerificationdetails']->address}} </li>
                                        @endif 
                                        @if( $data['identityVerificationdetails']->gender)
                                        <li class="mt-2"><i class="ti ti-map text-secondary font-16 align-middle me-2"></i> <b> Gender </b> :{{ $data['identityVerificationdetails']->gender}} </li>
                                        @endif  
                                        @if( $data['identityVerificationdetails']->city)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> City</b> : {{ $data['identityVerificationdetails']->city}}</li>
                                        @endif
                                        @if($data['identityVerificationdetails']->registrationnumber)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Registration number</b> : {{$data['identityVerificationdetails']->registrationnumber}}</li>
                                        @endif                 
                                        @if($data['identityVerificationdetails']->websitelink)
                                        <li class="mt-2"> <i class="ti ti-world text-secondary font-16 align-middle me-2"></i><b> Website</b> : {{$data['identityVerificationdetails']->websitelink}}</li>
                                        @endif                             
                                    </ul>
                                    <br> 
                                </div>
                                <div class="col-lg-4 card">
                                    <h4 class="pro-title">Applicant Verification Status </h4>
                                    <div class="card-body">
                                        @if ($identityVerificationStatus['IDENTITY'])
                                            <h3>Identity</h3>
                                            <p><strong>Review Result:</strong> {{ json_encode($identityVerificationStatus['IDENTITY']['reviewResult']) }}</p>
                                            <p><strong>Country:</strong> {{ $identityVerificationStatus['IDENTITY']['country'] }}</p>
                                            <p><strong>ID Document Type:</strong> {{ $identityVerificationStatus['IDENTITY']['idDocType'] }}</p>
                                            <p><strong>Image IDs:</strong> {{ implode(', ', $identityVerificationStatus['IDENTITY']['imageIds']) }}</p>
                                            <p><strong>Image Review Results:</strong> {{ json_encode($identityVerificationStatus['IDENTITY']['imageReviewResults']) }}</p>
                                            <p><strong>Forbidden:</strong> {{ $identityVerificationStatus['IDENTITY']['forbidden'] ? 'Yes' : 'No' }}</p>
                                            <p><strong>Partial Completion:</strong> {{ $identityVerificationStatus['IDENTITY']['partialCompletion'] }}</p>
                                            <p><strong>Step Statuses:</strong> {{ $identityVerificationStatus['IDENTITY']['stepStatuses'] }}</p>
                                            <p><strong>Image Statuses:</strong> {{ json_encode($identityVerificationStatus['IDENTITY']['imageStatuses']) }}</p>
                                        @else
                                            <h3>Identity</h3>
                                            <p>No selfie data available.</p>
                                        @endif
                                        @if ($identityVerificationStatus['SELFIE'])
                                            <h3>Selfie</h3>
                                            <p>{{ json_encode($identityVerificationStatus['SELFIE']) }}</p>
                                        @else
                                            <h3>Selfie</h3>
                                            <p>No selfie data available.</p>
                                        @endif
                                    </div>
                                </div><!--end col-->                                            
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        
           <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Identity Verification Log
                        
                        </h4>
                        <form method="post" action="#">
                        @csrf
                        <span style="float:right; top:-10px">   <li class="nav-item dropdown " style="list-style:none">
                                <a class="nav-link dropdown-toggle card-title" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort Data <i class="la la-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><button type="submit" name="sort" value="success" class="dropdown-item"> Sort By Successful</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button type="submit"  name="sort"  value="failed" class="dropdown-item" >Sort By Failed</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button type="submit"  name="sort"  value="pending" class="dropdown-item" href="#">Sort By Pending</button></li>
                                </ul>
                            </li>
                            </span>
                        </form>
                    
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-hover dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="px-2 py-3">S/N</th>
                                        <th class="px-2 py-3">Inspection ID</th>
                                        <th class="px-2 py-3">Name</th>
                                        <th class="px-2 py-3">Review Status</th>
                                        <th class="px-2 py-3">Type</th>
                                        <th class="px-2 py-3">Fee</th>
                                        <th class="px-2 py-3">Created At</th>
                                        <th class="px-2 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($identityVerificationData as $index => $data)
                                    <tr>
                                        <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">{{$index + 1}}</div></a></td>
                                        <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">{{$data->applicantId}}</div></a></td>
                                        <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">{{$data->firstName}} {{$data->lastName}}</div></a></td>
                                        
                                        <td class="px-0 py-0">
                                            <div class="px-2 py-3">
                                                <span class="badge badge-soft-secondary">Init</span>
                                            </div>
                                        </td>
                                        <td class="px-0 py-0">
                                            <div class="px-2 py-3">
                                                <span class="badge badge-soft-secondary">Individual</span>
                                            </div>
                                        </td>
                                        <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                    
                                        <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                        <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                        
                                            <a href="{{ route('verify.details', $data->imageID )}}">View Details</a>
                                        
                                            </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach 

                                </tbody>
                            </table>        
                        </div>  
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
       </div> 
                   
@endsection
