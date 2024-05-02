 @extends('layouts.app')
 @section('content')
 <div class="page-content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-sm-12">
                 <div class="page-title-box">
                     <div class="row">
                         <div class="col">
                             <h4 class="page-title">{{$slug->name}}</h4>
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"></li>
                             </ol>
                         </div>
                         <!--end col-->
                         <div class="col-auto align-self-center">
                             <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                 <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                 <span class="" id="Select_date">Jan 11</span>
                                 <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                             </a>
                         </div>
                         <!--end col-->
                     </div>
                     <!--end row-->
                 </div>
                 <!--end page-title-box-->
             </div>
             <!--end col-->
         </div>
         <div class="row ">
             <div class="col-lg-12">
                 <div class="row justify-content-left">
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card bg-success ">
                             <div class="card-body" >
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="mb-0 fw-semibold text-black">Verified Requests</p>
                                         <h3 class="m-0 text-black">3</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card bg-danger">
                             <div class="card-body" >
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="text-black mb-0 fw-semibold">Unverified Requests</p>
                                         <h3 class="m-0 text-black">6</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card bg-warning">
                             <div class="card-body" >
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="text-black mb-0 fw-semibold">Pending Requests</p>
                                         <h3 class="m-0 text-black">7</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <!--end col-->
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card bg-secondary">
                             <div class="card-body" >
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="text-black mb-0 fw-semibold">Cancelled Requests</p>
                                         <h3 class="m-0 text-black">8</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <!--end col-->
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card bg-info">
                             <div class="card-body" >
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                          <p class="text-black mb-0 fw-semibold">Requests Awaiting Reschedule</p>
                                         <h3 class="m-0 text-black">7</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div> 
                         <!--end card-->
                     </div>
                     <!--end col-->
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card bg-light">
                             <div class="card-body" >
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="text-black mb-0 fw-semibold">Verification not Requested</p>
                                         <h3 class="m-0 text-black">8</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <!--end col-->
                     <!--end col-->
                 </div>
                 <!--end row-->
             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="card mb-3" style="background:#f1f5fa">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="card-body">
                                 <h5 class="card-title">Verify @if($slug->slug == 'individual_address') an Individual @elseif ($slug->slug == 'reference_address') a Guarantor @else a Business @endif </h5>
                                 <p class="card-text mb-0">Wether you are verifying a business, a guarantor or an individual's address, we provide key insights and overall analysis of any verification request made.</p>
                                 <p class="card-text mb-0"><small class="text-muted">Use the "Create Candidate" button to initiate the {{$slug->name}} process.</small></p>
                             </div>
                         </div>
                         <div class="col-md-6 align-self-center">
                             <div class="card-body d-flex justify-content-lg-end justify-content-center">
                                 <a type="button" class="btn btn-primary " href="{{route('showCreateCandidate', $slug->slug)}}">Create Candidate</a>

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
                         <h4 class="card-title">{{$slug->name}} log</h4>
                     </div>
                     <!--end card-header-->
                     <div class="card-body">
                         <table id="datatable-buttons" class="table table-striped dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th>SN</th>
                                     <th>Address Candidate</th>
                                     <th>Reference Id</th>
                                     <th>Status</th>
                                     <th>Initiated by</th>
                                     <th>Fee</th>
                                     <th>Date Requested</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Benson John</td>
                                    <td>service_reference</td>
                                    <td>
                                        <span class="badge badge-soft-purple">Pending</span>
                                    </td>
                                    <td>Benson</td>
                                    <td>20000</td>
                                    <td>12 April, 2024 </td>
                                    <td>
                                        <a class="badge bg-soft-primary" href="{{route('showAddressReport', ['slug' => encrypt($slug->slug)])}}"> view Details</a>
                                    </td>
                                </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div> <!-- end col -->
         </div>
         @endsection
         @section('script')
         <script>

         </script>

         @endsection