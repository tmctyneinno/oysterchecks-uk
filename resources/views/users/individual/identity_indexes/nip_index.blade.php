@extends('layouts.app')
 @section('content')
 <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">{{strtoupper($slug['slug'])}} Verification</h4>
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
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card ">
                                        <div class="card-body" >
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="mb-0 fw-semibold text-black">Successful {{$slug['slug']}} Verifications </p>
                                                    <h3 class="m-0 text-black">{{$success}}</h3>
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
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card">
                                        <div class="card-body" >
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-black mb-0 fw-semibold">Failed {{$slug['slug']}}  Verifications</p>
                                                    <h3 class="m-0 text-black">{{$failed}}</h3>
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
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card">
                                        <div class="card-body" >
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-black mb-0 fw-semibold">Pending Request</p>
                                                    <h3 class="m-0 text-black">{{$pending}}</h3>
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
             <div class="col-lg-12">
                 <div class="card mb-3" style="background: #1b4c89;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="text-white">  <strong> Verify an Identity </strong> ({{$slug->name}}) </h4>
                                <p class="card-text text-white mb-0">Seamless KYC and identity verification and get key insights and analysis for every verification.</p>
                                <p class="card-text text-white mb-0"><small class="">Use the "Verify {{strtoupper($slug->slug)}}" button to initiate the verification process.</small></p>
                            </div>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="card-body d-flex justify-content-lg-end justify-content-center">
                                <a type="button" class="btn btn-primary btn-lg" href="{{route('showIdentityVerificationForm', $slug->slug)}}">      <img src="{{asset('assets/images/favicon.png')}}" width="30px" > Verify {{strtoupper($slug->slug)}}</a>

                            </div>
                        </div>
                        <!--end col-->
                        <!--end col-->
                    </div>
                     <!--end row-->
                 </div>
                 <!--end card-->
             </div>
         </div>
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$slug->slug}} Verification log
                        
                         </h4>
                         <form method="post" action="{{route('IdentitySort',$slug->slug)}}">
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
                                    <th class="px-2 py-3">Verification ID</th>
                                    <th class="px-2 py-3">Name</th>
                                    <th class="px-2 py-3">Status</th>
                                    <th class="px-2 py-3">Fee</th>
                                    <th class="px-2 py-3">Verified by</th>
                                    <th class="px-2 py-3">Initiated At</th>
                                     <th class="px-2 py-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                          
                            @foreach ($logs as $trans)
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}"><div class="px-2 py-3">{{$loop->iteration}}</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}"><div class="px-2 py-3">{{$trans->ref}}</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}"><div class="px-2 py-3">{{$trans->status == 'found' ? $trans->first_name.' '.$trans->last_name : 'N/A'}}</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}">
                                        <div class="px-2 py-3">
                                            @if($trans->status == $trans->status )
                                            @if($trans->validations != null && $trans->validations->validationMessages != "")
                                            <span class="badge badge-soft-warning">Found</span>
                                            @else
                                            <span class="badge badge-soft-success"> Found</span> 
                                            @endif
                                            @elseif($trans->status == 'not_found')
                                            <span class="badge badge-soft-danger">Not Found</span>
                                            @else
                                            <span class="badge badge-soft-purple"> {{$trans->status}}</span>
                                            @endif  
                                        </div></a>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}"><div class="px-2 py-3">{{$trans->fee}}</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}"><div class="px-2 py-3">{{auth()->user()->name}}</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}"><div class="px-2 py-3">{{date('jS F Y, h:iA', strtotime($trans->requested_at))}}</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}"><div class="px-2 py-3"> @if($trans->status == 'found')
                                    <a href="{{route('showIdentityReport', ['slug'=>$slug->slug, 'verificationId'=>$trans->id])}}" class="btn btn-white btn-sm">View Details</a>
                                     @endif
                                    </div></a></td>
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
