
@extends('layouts.app')
@section('content')
  <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Hi {{ucwords(auth()->user()->firstname)}} {{ucwords(auth()->user()->lastname)}}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Verify the identity of users globally to reduce the risk of fraudulent activities, optimize risk-management strategies, and enhance security.</li>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                      
                                        <div class="col-lg-12 offset-lg-0 text-left">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators">
                                                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class=""></li>
                                                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active" aria-current="true"></li>
                                                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class=""></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active " style="background-image: url({{asset('assets/images/small/img-1.jpg')}}); background-size:  100%;  ">
                                                        <div class="p-4 align-left">
                                                            <h1 class="my-4 font-weight-bold text-white">Advanced Transaction Monitoring <br> Masterclass.</h1>
                                                            <p class="font-14 text-muted"></p>
                                                            <button type="button" class="btn btn-primary">Get Started</button>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item  " style="background-image: url({{asset('assets/images/small/img-2.jpg')}}); background-size:  100%;  ">
                                                        <div class="p-4 align-left">
                                                            <h1 class="my-4 font-weight-bold text-white">Advanced Transaction Monitoring <br> Masterclass.</h1>
                                                            <p class="font-14 text-muted"></p>
                                                            <button type="button" class="btn btn-primary">Get Started</button>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item  " style="background-image: url({{asset('assets/images/small/img-3.jpg')}}); background-size:  100%;  ">
                                                        <div class="p-4 align-left">
                                                            <h1 class="my-4 font-weight-bold text-white">Advanced Transaction Monitoring <br> Masterclass.</h1>
                                                            <p class="font-14 text-muted"></p>
                                                            <button type="button" class="btn btn-primary">Get Started</button>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                            </div>                                        
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div>
                   
                   
                    <!-- end page title end breadcrumb -->

                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row justify-content-center">
                               
                              
                                <!--end col-->                               
                            </div><!--end row-->
                            <div class="card">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">                      
                                                    <h4 class="card-title">Recent Verification</h4>                      
                                                </div><!--end col-->                                        
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-hover dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="px-2 py-3">S/N</th>
                                                        <th class="px-2 py-3">Reference</th>
                                                        <th class="px-2 py-3">Verification ID</th>
                                                        <th class="px-2 py-3">Name</th>
                                                        <th class="px-2 py-3">Status</th>
                                                        <th class="px-2 py-3">Verified by</th>
                                                        <th class="px-2 py-3">Initiated At</th>
                                                     
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                              
                                                    </tbody>
                                                </table>        
                                            </div>  
                                        </div>
                                    </div><!--end card--> 
                                </div> <!--end col-->   
                        
                            </div><!--end card--> 
                        </div><!--end col-->
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Activity Log</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   All<i class="las la-angle-down ms-1"></i>
                                                </a>
                                               
                                            </div>         
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="text-center">
                                        <div id="ana_device" class="apex-charts" style="min-height: 218.7px;"><div id="apexchartstyaun5x6" class="apexcharts-canvas apexchartstyaun5x6 apexcharts-theme-light" style="width: 254px; height: 218.7px;"><svg id="SvgjsSvg1149" width="254" height="218.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1151" class="apexcharts-inner apexcharts-graphical" transform="translate(20, 0)"><defs id="SvgjsDefs1150"><clipPath id="gridRectMasktyaun5x6"><rect id="SvgjsRect1153" width="222" height="240" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMasktyaun5x6"></clipPath><clipPath id="nonForecastMasktyaun5x6"></clipPath><clipPath id="gridRectMarkerMasktyaun5x6"><rect id="SvgjsRect1154" width="220" height="242" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1155" class="apexcharts-pie"><g id="SvgjsG1156" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle1157" r="84.46097560975609" cx="108" cy="108" fill="transparent"></circle><g id="SvgjsG1158" class="apexcharts-slices"><g id="SvgjsG1159" class="apexcharts-series apexcharts-pie-series" seriesName="Mobile" rel="1" data:realIndex="0"><path id="SvgjsPath1160" d="M 108 8.634146341463406 A 99.3658536585366 99.3658536585366 0 0 1 108 207.3658536585366 L 108 192.46097560975608 A 84.46097560975609 84.46097560975609 0 0 0 108 23.53902439024391 L 108 8.634146341463406 z" fill="rgba(42,118,244,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="180" data:startAngle="0" data:strokeWidth="2" data:value="50" data:pathOrig="M 108 8.634146341463406 A 99.3658536585366 99.3658536585366 0 0 1 108 207.3658536585366 L 108 192.46097560975608 A 84.46097560975609 84.46097560975609 0 0 0 108 23.53902439024391 L 108 8.634146341463406 z" stroke="transparent"></path></g><g id="SvgjsG1161" class="apexcharts-series apexcharts-pie-series" seriesName="Tablet" rel="2" data:realIndex="1"><path id="SvgjsPath1162" d="M 108 207.3658536585366 A 99.3658536585366 99.3658536585366 0 0 1 8.634146341463406 108.00000000000001 L 23.53902439024391 108.00000000000001 A 84.46097560975609 84.46097560975609 0 0 0 108 192.46097560975608 L 108 207.3658536585366 z" fill="rgba(42, 118, 244, .5)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="90" data:startAngle="180" data:strokeWidth="2" data:value="25" data:pathOrig="M 108 207.3658536585366 A 99.3658536585366 99.3658536585366 0 0 1 8.634146341463406 108.00000000000001 L 23.53902439024391 108.00000000000001 A 84.46097560975609 84.46097560975609 0 0 0 108 192.46097560975608 L 108 207.3658536585366 z" stroke="transparent"></path></g><g id="SvgjsG1163" class="apexcharts-series apexcharts-pie-series" seriesName="Desktop" rel="3" data:realIndex="2"><path id="SvgjsPath1164" d="M 8.634146341463406 108.00000000000001 A 99.3658536585366 99.3658536585366 0 0 1 107.98265738698407 8.634147854891893 L 107.98525877893645 23.539025676658127 A 84.46097560975609 84.46097560975609 0 0 0 23.53902439024391 108.00000000000001 L 8.634146341463406 108.00000000000001 z" fill="rgba(42, 118, 244, .18)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="90" data:startAngle="270" data:strokeWidth="2" data:value="25" data:pathOrig="M 8.634146341463406 108.00000000000001 A 99.3658536585366 99.3658536585366 0 0 1 107.98265738698407 8.634147854891893 L 107.98525877893645 23.539025676658127 A 84.46097560975609 84.46097560975609 0 0 0 23.53902439024391 108.00000000000001 L 8.634146341463406 108.00000000000001 z" stroke="transparent"></path></g></g></g></g><line id="SvgjsLine1165" x1="0" y1="0" x2="216" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1166" x1="0" y1="0" x2="216" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1152" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 120px;"></div><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(42, 118, 244);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgba(42, 118, 244, 0.5);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3;"><span class="apexcharts-tooltip-marker" style="background-color: rgba(42, 118, 244, 0.18);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                        <h6 class="bg-light-alt py-3 px-2 mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-self-center icon-xs me-1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            01 January 2020 to 31 December 2020
                                        </h6>
                                    </div>  
                                    <div class="table-responsive mt-2">
                                        <table class="table border-dashed mb-0">
                                            <thead>
                                            <tr>
                                                <th>Device</th>
                                                <th class="text-end">Sassions</th>
                                                <th class="text-end">Day</th>
                                                <th class="text-end">Week</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Dasktops</td>
                                                <td class="text-end">1843</td>
                                                <td class="text-end">-3</td>
                                                <td class="text-end">-12</td>
                                            </tr>
                                            <tr>
                                                <td>Tablets</td>
                                                <td class="text-end">2543</td>
                                                <td class="text-end">-5</td>
                                                <td class="text-end">-2</td>                                                 
                                            </tr>
                                            <tr>
                                                <td>Mobiles</td>
                                                <td class="text-end">3654</td>
                                                <td class="text-end">-5</td>
                                                <td class="text-end">-6</td>
                                            </tr>
                                            
                                            </tbody>
                                        </table><!--end /table-->
                                    </div><!--end /div-->                                 
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col--> 
                    </div><!--end row-->
                   

                  

                </div>
    </div><!-- container -->
@endsection