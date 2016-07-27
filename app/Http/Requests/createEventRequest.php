<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Validator;



class createEventRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {



        return [

            'event_title' => 'required | min:3',
            'description' => 'required | between:50,250',
            'category_id' => 'required | numeric | max:5',
            'file'  => 'required | image | max:2000',
            'startDate'   => 'required | date |after:-1 day',
            'endDate'     => 'required | date | valid_end_date:startDate',
            'startTime'   => 'required | date_format:H:i',
            'endTime'     => 'required | valid_end_time:startTime'


        ];
    }



    public function messages()
    {
        return [
            'category_id.min' => 'Please select a category',
            'startDate.after'=> 'Your start date has passed',
            'endDate.valid_end_date' => 'End date is before the start date',
            'endTime.valid_end_time' => 'End time is before the start time'
        ];
    }
}
