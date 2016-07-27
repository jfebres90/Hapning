<?php

namespace App\Providers;





use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use DateTime;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        validator::extend('validEndDate', function($attribute, $value, $parameters, $validator) {





            $start = DateTime::createFromFormat('Y-m-d',array_get($validator->getData(), $parameters[0]));

            $end= DateTime::createFromFormat ('Y-m-d' ,$value);

            $diff= date_diff($end ,$start);


            $int= (int) $diff->format('%R%a');





           // $diffs= date_sub($end ,$start);

            if($int > 0 )
                {

                return false;

                }
            return true;
        });


        validator::extend('validEndTime', function($attribute, $value, $parameters, $validator) {





            $start = DateTime::createFromFormat('U:i',array_get($validator->getData(), $parameters[0]));

            $end= DateTime::createFromFormat ('U:i' ,$value);

            $diff= date_diff($end ,$start);


            $int= (int) $diff->format('%R%a');
            print($int);





            // $diffs= date_sub($end ,$start);

            if($int > 0 )
            {

                return false;

            }
            return true;
        });




    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
