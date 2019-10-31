<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share('publicURL', getenv('PUBLIC_URL'));
        $listType = DB::table('room_type')
            ->select()
            ->orderBy('type_id', 'asc')
            ->get();
        View::share('listType', $listType);
    }
}
