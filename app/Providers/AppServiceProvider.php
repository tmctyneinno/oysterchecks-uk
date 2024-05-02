<?php

namespace App\Providers;

use App\Models\Verification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
use App\Models\Client;
use App\Models\Wallet;
use Illuminate\Support\Composer;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $data['aml'] = Verification::where('report_type', '=', 'aml')->get();
        $data['address'] = Verification::where('report_type', '=', 'address')->get();
        $data['applicants'] = Verification::where('report_type', '=', 'applicants')->get();
        $data['company'] = Verification::where('report_type', '=', 'company')->get();
        $data['individual'] = Verification::where('report_type', '=', 'individual')->get();
            
        view::share($data);
    }
}
