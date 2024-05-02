@php 
 use Illuminate\Support\Carbon;

@endphp

@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Adddress verification Report</h4>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}">
                            <i class="fa fa-arrow-left me-2 font-15"></i>
                            <span class="card-title">Back</span>
                        </a>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="my-4 fw-semibold text-dark font-16">Address Report - reference_id</h4>
                                    <div>
                                        <a id="printBtn" class="btn btn-primary btn-square">Print</a>
                                        <a id="downloadBtn" class="btn btn-primary btn-square">Download Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"  id="pdfContent">
                            <div class="col-12">
                                
                                <div class="alert custom-alert alert-purple icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="mdi mdi-clock-outline alert-icon text-purple align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0">Pending</h5>
                                            <span>Your address verification request is yet to be accepted by our agent or is currently in progress.</span>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-4">
                                <div class="pt-2 px-2 mb-2 font-15"><span class="text-muted mr-2">Verification Id :</span> reference_id</div>
                            </div>
                            <div class="col-md-8">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Verification Type :</span> {{$slug->name}}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Created At:</span> created_at</div>
                            </div>
                     
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Accepted At :</span> accepted_at </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Start Date :</span> start_date </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">End Date :</span> end_date </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Completed At :</span> completed_at</div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Submitted At :</span>submitted_at</div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Revalidated At :</span> revalidation_date</div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Initiated At :</span> {{Auth()->user()->name}}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Estimated Turn Around Time :</span> 3 days</div>
                            </div>
                            <div class="col-12">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Task Description :</span> description</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="accordion" id="personalInformation">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingOne">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Personal Information
                                            </button>
                                        </h5>
                                        <div id="collapseOne" class="accordion-collapse" aria-labelledby="headingOne" data-bs-parent="#personalInformation">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-lg-4 align-self-center py-4 mb-3 mb-lg-0">
                                                        <div class="dastone-profile-main">
                                                            <div class="dastone-profile-main-pic">
                                                                <img src="{{asset('/assets/profile/avater.png')}}" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">

                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">First Name : </div>
                                                        <div class="fw-normal font-15 col-8">Benson Jame</div>
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Middle Name : </div>
                                                        <div class="fw-normal font-15 col-8">Middle Name</div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Last Name : </div>
                                                        <div class="fw-normal font-15 col-8">Last Name</div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Date of Birth : </div>
                                                        <div class="fw-normal font-15 col-8">12 April, 2024</div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Phone : </div>
                                                        <div class="fw-normal font-15 col-8">08132434567</div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">email : </div>
                                                        <div class="fw-normal font-15 col-8">email@gmail.com</div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="accordion" id="guarantorInformation">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingOneTwo">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneTwo" aria-expanded="true" aria-controls="collapseOneTwo">
                                                Guarantor's information
                                            </button>
                                        </h5>
                                        <div id="collapseOneTwo" class="accordion-collapse" aria-labelledby="headingOneTwo" data-bs-parent="#guarantorInformation">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-lg-4 align-self-center py-4 mb-3 mb-lg-0">
                                                        <div class="dastone-profile-main">
                                                            <div class="dastone-profile-main-pic">
                                                                <img src="" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">

                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">First Name : </div>
                                                        <div class="fw-normal font-15 col-8">guarantor name</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Last Name : </div>
                                                        <div class="fw-normal font-15 col-8">guarantor lastname</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Phone : </div>
                                                        <div class="fw-normal font-15 col-8">mobile</div>
                                                    </div>
                                              
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">email : </div>
                                                        <div class="fw-normal font-15 col-8">email</div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                            <div class="col-12">
                                <div class="accordion" id="businessInformation">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingOneThree">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneThree" aria-expanded="true" aria-controls="collapseOneThree">
                                                Business information
                                            </button>
                                        </h5>
                                        <div id="collapseOneThree" class="accordion-collapse" aria-labelledby="headingOneThree" data-bs-parent="#businessInformation">
                                            <div class="accordion-body">
                                                <div class="row border-bottom mb-5">
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Name : </div>
                                                        <div class="fw-normal font-15 col-8">name</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Last Name : </div>
                                                        <div class="fw-normal font-15 col-8">email</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Phone : </div>
                                                        <div class="fw-normal font-15 col-8">phone</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Registration Number : </div>
                                                        <div class="fw-normal font-15 col-8">number</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <div class="accordion" id="addressDetails">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingTwo">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Address
                                            </button>
                                        </h5>
                                        <div id="collapseTwo" class="accordion-collapse" aria-labelledby="headingTwo" data-bs-parent="#addressDetails">
                                            <div class="accordion-body pt-0">
                                                <div class="row mb-5">
                                                   
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Flat Number : </div>
                                                        <div class="fw-normal font-15 col-8">flatNumber</div>
                                                    </div>
                                                   
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Building Name : </div>
                                                        <div class="fw-normal font-15 col-8">buildingName</div>
                                                    </div>
                                                  

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Building Number : </div>
                                                        <div class="fw-normal font-15 col-8">buildingNumber</div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Street : </div>
                                                        <div class="fw-normal font-15 col-8">street</div>
                                                    </div>
                                                    
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Sub-Street : </div>
                                                        <div class="fw-normal font-15 col-8">subStreet</div>
                                                    </div>
                                                   

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">State : </div>
                                                        <div class="fw-normal font-15 col-8">state</div>
                                                    </div>
                                                   
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">City : </div>
                                                        <div class="fw-normal font-15 col-8">city</div>
                                                    </div>
                                                   
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">LGA : </div>
                                                        <div class="fw-normal font-15 col-8">lga</div>
                                                    </div>
                                                  
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Country : </div>
                                                        <div class="fw-normal font-15 col-8">country</div>
                                                    </div>
                                                   

                                                    <div class="col-12 py-4 border-top pb-3">
                                                        <div class="fw-semibold m-0 font-15 mb-2">Address Location : </div>
                                                        <div class="w-100 overflow-hidden rounded">
                                                            {{-- <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12094.57348593182!2d-74.00599512526003!3d40.72586666928451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2598f988156a9%3A0xd54629bdf9d61d68!2sBroadway-Lafayette%20St!5e0!3m2!1spl!2spl!4v1624523797308!5m2!1spl!2spl"
                                                            class="h-100 w-100" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                                                            {{-- <iframe src="{{$address_verification->addressverificationDetail->map_address_url}}" width="100%" height="275" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                                            </iframe> --}}


                                                            


                                                        </div>
                                                           
                                                    </div>



                                                    <div class="col-6 d-block col-sm-3 col-xl-3 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted">Longitude : </div>
                                                        <div class="fw-normal font-15">Longitude</div>
                                                    </div>
                                                    <div class="col-6 d-block col-sm-3 col-xl-3 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted">Latitude : </div>
                                                        <div class="fw-normal font-15">Latitude</div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        
                        
                        
                        
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        @endsection
        @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('/assets/js/poppins64/Poppins-Bold-bold.js')}}"></script>
        <script src="{{asset('/assets/js/poppins64/fa-solid-900-bold.js')}}"></script>

        <script>
               window.jsPDF = window.jspdf.jsPDF;
            window.html2canvas = html2canvas;
            let downloadBtn = document.getElementById('downloadBtn');
            downloadBtn.addEventListener("click", createPdf);

            let printBtn = document.getElementById('printBtn');
            printBtn.addEventListener("click", printPage);

            function createPdf() {
                html2canvas(document.getElementById('pdfContent')).then(canvas => {
                    let source = $('#pdfContent')[0];
                    const doc = new jsPDF({
                        unit: "pt",
                        orientation: 'portrait'
                    });

                    let margins = {
                        top: 50,
                        bottom: 50,
                        left: 50,
                        width: 500
                    }

                    let specialElementHandlers = {
                        '#hasCharr': function(element, renderer) {
                            return true;
                        }
                    };

                    doc.setFont('Poppins-Bold', 'bold');
                    doc.html(source, {
                        x: margins.left,
                        y: margins.top,
                        width: margins.width,
                        windowWidth: 900,
                        elementHandlers: specialElementHandlers,
                        callback: function() {
                            doc.save("another.pdf", margins)
                        }
                    });
                });
            }

            function printPage() {
                window.print();
                // setTimeout(() => {
                //     window.close();
                // }, 10000);
            }

        $(window).on('load', function(){
           $('#awaiting_response_modal').modal('show', {keyboard:false, backdrop: 'static'});
        });

        let times = {!! json_encode('12/02/1992') !!}
        console.log(times);
        Initiated = new Date(times).getTime();
     
       let X =  setInterval(() => {
        let reportDate = new Date().getTime();
        let reports =  Initiated - reportDate;
        let Days = Math.floor(reports / (1000 * 60 * 60 * 24));
        let Hours = Math.floor((reports % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let Minutes = Math.floor((reports % (1000 * 60 * 60)) / (1000 * 60)); 
        let Seconds = Math.floor((reports % (1000 * 60)) / (1000)); 

        document.getElementById("days").innerHTML  =  num(Days) + ' : ';
        document.getElementById("hours").innerHTML =  num(Hours) + ' : ';
        document.getElementById("minutes").innerHTML =  num(Minutes) + ' : ';
        document.getElementById("seconds").innerHTML = num(Seconds);
        
        if(reports < 0){
            clearInterval(X);
        document.getElementById("days").innerHTML  =   '';
        document.getElementById("hours").innerHTML =  '  ';
        document.getElementById("minutes").innerHTML =   '  ';
        document.getElementById("timerHolder").hidden = true;
        document.getElementById("timer").hidden = true;
        document.getElementById("reporter").hidden = true;
        document.getElementById("dater").hidden = true;
        document.getElementById("title").innerHTML =   '<span style="color:red; font-size:30px; font-weight:bolder">  Awaiting Period Completed, Please Check report </span>';
        }
        }, 1000);

    

        function num(n){
            return n > 9 ? "" +n : "0" +n; 
        }
        </script>
        @endsection