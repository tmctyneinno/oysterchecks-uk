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
                   <div class="row ">
                       <div class="col-lg-12">
                           <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <div class="card report-card bg-secondary">
                                    <div class="card-body " >
                                        <div class="row d-flex justify-content-center">
                                            <div class="col">
                                                <p class="mb-0 fw-semibold text-white">Init Request</p>
                                                <h3 class="m-0 text-white">10</h3>
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
                                <div class="card report-card bg-success">
                                    <div class="card-body" >
                                        <div class="row d-flex justify-content-center">
                                            <div class="col">
                                                <p class="mb-0 fw-semibold text-white">Completed Request</p>
                                                <h3 class="m-0 text-white">45</h3>
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
                                <div class="card report-card bg-warning">
                                    <div class="card-body">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col">
                                                <p class="mb-0 fw-semibold text-white">Pending Request</p>
                                                <h3 class="m-0 text-white">20</h3>
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
                                   <div class="card report-card bg-info">
                                       <div class="card-body" >
                                           <div class="row d-flex justify-content-center">
                                               <div class="col">
                                                   <p class="mb-0 fw-semibold text-white">Prechecked Request</p>
                                                   <h3 class="m-0 text-white">15</h3>
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
                                   <div class="card report-card bg-primary">
                                       <div class="card-body">
                                           <div class="row d-flex justify-content-center">
                                               <div class="col">
                                                   <p class="text-white mb-0 fw-semibold">Queued Request</p>
                                                   <h3 class="m-0 text-white">5</h3>
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
                                   <div class="card report-card bg-info">
                                       <div class="card-body">
                                           <div class="row d-flex justify-content-center">
                                               <div class="col">
                                                   <p class="text-white mb-0 fw-semibold">Onhold Request</p>
                                                   <h3 class="m-0 text-white">9</h3>
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
        <!-- end page title end breadcrumb -->
        @if(isset($verified))
                   <div class="row">
                       <div class="col-12">
                           <div class="card">
                               <div class="card-body">
                                <p class="mb-1 btn btn-success" ><i class="fa fa-check"> </i> Verified</p>

                                   <div class="row">
                                       <div class="col-lg-6 card">
                                            <h5 class="pro-title">
                                                <snap class="mt-2"> <b> Full name </b> </snap> : Thomas Eredo
                                            </h5>
                                           <div class="single-pro-detail">
                                           <ul class="list-unstyled pro-features border-0">
                                            <li class="mt-2"> <b> Email </b> : oystercheck@gmail.com</li>
                                            <li class="mt-2"> <b> Date of Birth </b> : July 16, 1989</li>
                                            <li class="mt-2"><b> Country</b> : Nigeria</li>
                                           </ul>  
                                           </div>
                                       </div><!--end col-->
                                       <div class="col-lg-6 card">
                                            <h5 class="pro-title">
                                                <span class="badge badge-soft-info"> Document details</span>
                                            </h5>
                                           <div class="single-pro-detail">
                                               <ul class="list-unstyled pro-features border-0">
                                                <li class="mt-2"> <b> Document Type </b> : ID CARD</li>
                                                <li class="mt-2"> <b> Expired Date </b> : <snap class="badge badge-soft-danger">July 16, 2025</snap></li>
                                                <li class="mt-2"><b> Document number </b> : LGXX359T8</li>
                                                <li class="mt-2"> <b> MRZ information</b> : IDD<2809045D<<<<<<<<<<<<<8</li>
                                                <li class="mt-2"> <b> MRZ information 2</b> : 8907167<2809045D<<<<<<<<<<<<<8</li>
                                                <li class="mt-2"> <b> MRZ information 3</b> : SMITH<2809045D<<<<<<<<<<<<<8</li> </li>
                                                <li class="mt-2"> <b> ID Document SetType</b> : Identity</li>
                                                <li class="mt-2"> <b> Document Set Type</b> : SELFIE</li>
                                                <li class="mt-2"><b>Type</b> : <snap class="badge badge-soft-primary"> Individual </snap></li>
                                                <li class="mt-2"><b>Review Status</b> : <snap class="badge badge-soft-success"> Completed </snap></li>
                                               </ul>                                             
                                           </div>
                                       </div><!--end col-->                                            
                                   </div><!--end row-->
                               </div><!--end card-body-->
                           </div><!--end card-->
                       </div><!--end col-->
                   </div><!--end row-->
           @endif
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
                        
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">1</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Moses Smith</div></a></td>
                                    
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
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>

                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">2</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Moses Smith</div></a></td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-warning">Pending</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Company</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">3</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Chris </div></a></td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-info"> Prechecked</span> 
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
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">4</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Ojo </div></a></td>
                                     <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Queued</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Company</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>

                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Ojo </div></a></td>
                                   <td class="px-0 py-0"><a class="table-link" href="">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-success">Completed</span>
                                            
                                        </div></a>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-secondary">Individual</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                        <a href="{{route('verify.details')}}">View Details</a>
                                        </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Ojo </div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-warning">OnHold</span>
                                        </div></a>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Company</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                        <a href="{{route('verify.details')}}">View Details</a>
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>
                                
                                
                                </tbody>
                            </table>        
                        </div>  
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
       </div> 
                   
@endsection
