@extends('layouts.app')
 @section('content')
 <div class="page-content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-sm-12">
                 <div class="page-title-box">
                     <div class="row">
                         <div class="col">
                             <h4 class="page-title">{{$slug['slug']}} Verification</h4>
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
                             <a href="#" class="btn btn-sm btn-outline-primary">
                                 <i data-feather="download" class="align-self-center icon-xs"></i>
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
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">{{strtoupper($slug->name)}} Verification</h4>
                     </div>
                     <!--end card-header-->
                     <form method="post" action="{{route('businessStore',$slug->slug)}}" id="form1">
                         @csrf

                         <div class="card-body bootstrap-select-1">
                             <div class="row">
                                 @foreach($fields as $input)
                                 @if($input->type == 'select')
                                 <div class="col-md-6 mb-3">
                                     <label class="mb-3" style="font-weight:bolder">{{$input->label}}</label> 
                                     @if($input->is_required == 1) <span style="color:red; font-weight:bolder"> * </span> @endif
                                     <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" 
                                     id="{{$input->inputid}}" value="{{old($input->name)}}"  name="{{$input->name}}">
                                         <option disabled>{{$input->placeholder}}</option>
                                         <option value="cacReg" selected>CAC Registration Number</option>
                                     </select>
                                 </div>
                                 @else
                                 <div class="col-md-6 mb-3">
                                     <label class="mb-3" style="font-weight:bolder">{{$input->label}}</label> @if($input->is_required == 1) <span style="color:red; font-weight:bolder"> * </span> @endif
                                     <input type="{{$input->type}}" value="{{old($input->name)}}" id="{{$input->inputid}}" name="{{$input->name}}" class="form-control mb-3 custom-select" placeholder="{{$input->label}}" @if($input->is_required == 1) required @endif>
                                 </div><!-- end col -->
                                 @endif
                                  @endforeach
                                  @if($input->slug == 'cac')
                                 <div class="col-md-6 mb-3">
                                    <select  class="select2 form-control mb-3 custom-select" name="countryCode" data-placeholder="Select Countries" >    
                                                  <option value="ag" >Argentina</option>
                                                  <option value="aus">Australia</option>
                                                  <option value="by">Belarus</option>
                                                  <option value="be">Belgium</option>
                                                  <option value="cy">Cyprus</option>
                                                  <option value="cn">China</option>
                                                  <option value="ca">Canada</option>
                                                  <option value="eg">Egypt</option>
                                                  <option value="gh">Ghana</option>
                                                  <option value="ng" selected>Nigeria</option>
                                                  <option value="za">South Africa</option>
                                                  <option value="us" >United States</option>
                                                  <option value="uk" >United Kingdom</option> 
                                          </select>
                                          <small class="text-warning">Select the countries you want your search</small>
                                    </div>
                                 @endif
                                 <div class="col-md-12 mt-3">
                                     <div class="col-md-7 mb-3">
                                       
                                         <div class="media align-items-center p-2">
                                           
                                             @if(UserEnvironment() == 0)
                                             <div class="col-md-12 ">
                                                <div class="card" >
                                                    <div class="card-header" style="background: rgb(7, 12, 89); color:#fff">
                                                        <h4 class="card-title" style=" color:#fff">Test Data</h4>
                                                        <p class="mb-0" style="color:#fff">Copy the Test data below and paste on the input field</p>
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <p id="clipboardParagraph" class="border p-3">
                                                           {{$slug->test_data}}
                                                        </p>
                                                        <div class="mt-3">
                                                                <button type="button" class="btn btn-outline-info btn-clipboard" 
                                                                data-clipboard-action="copy"
                                                                 data-clipboard-target="#clipboardParagraph">
                                                                 <i class="far fa-copy me-2"></i>Copy</button>
                                                        </div>
                                                    </div><!--end card-body-->
                                                </div>
                                             </div>
                                              @else 
                                              <div class="me-3 align-items-center">
                                                <i class="la la-info-circle"></i>
                                            </div>
                                              <div class="media-body" style="font-size:12px;"> <strong>Note:</strong> You will be charged <strong>₦{{number_format($slug->fee, 2)}}</strong> for each {{$slug->slug}} verification</div>
                                              @endif

                                         </div>
                                        
                          

                                         <!-- <div class="bg-soft-primary mb-2 p-1" style="font-size:12px;"> <strong>Note:</strong> You will be charged <strong>₦{{number_format($slug->fee, 2)}}</strong> for each {{$slug->slug}} verification</div> -->
                                         <div class="media align-items-center p-2 border-start bg-light border-2">
                                             <div class="me-3 align-items-center">
                                                 <input type="checkbox" name="subject_consent" id="subjectConsent" value="false" required>
                                             </div>
                                             <div class="media-body" style="font-size:12px;"> By checking this box you acknowledge that you have gotten consent from that data subject to use their data for verification purposes on our platform in accordance to our <a href="#"> Privacy Policy</a></div>
                                         </div>
                                     </div>
                                   
                                     <div class="float-center p-2">
                                         <button type="submit" id="btnsubmit" class="btn btn-primary w-23">
                                             <i class="fas fa-check-double"></i> Verify Candidate {{$slug->slug}}</button>
                                     </div>
                                     
                                 </div>
                               
                             </div><!-- end row -->
                         </div><!-- end card-body -->
                     </form>
                 </div> <!-- end card -->
             </div> <!-- end col -->
         </div>
     </div> 
     @endsection

     @section('script')
     <script src="{{asset('/assets/js/business.js')}}"></script>
     @endsection