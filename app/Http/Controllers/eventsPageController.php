<?php

namespace App\Http\Controllers;



use App\Event;
use App\Photo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Request;
use Auth;
use App\Http\Requests\createEventRequest;
use \Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;




class eventsPageController extends Controller
{



    // The user is logged in...

    public function index()
    {

        $events = Event::latest()->activeEvents()->get();
        $user = User::lists('user_name', 'id');




        return view('events.events', compact('events','user'));
    }



    public function myEvents()
    {

        $usersEvents = Event::latest()->userEvents()->get();

        $user = Auth::user();

        return view('events.myEvents', compact('usersEvents', 'user','eventImages'));

    }



    public function show($events)
    {

        $eventDetails =  DB::table('events')->where('event_id', $events)->first();
        $eventImage =    Photo::where('event_id',$events)->first();

        return view('events.aboutEvent', compact('eventDetails','eventImage')) ;


    }


    public function create()
    {

        $categories = Category::lists('category','id');


        return view('events.createEvent', compact('categories','currentTime'));

    }


    public function store(createEventRequest $request)
    {

        $input = $request->all();

        $event = new Event();

        $image = new Photo();


        //$input['user_id'] = ;

        //set time and date in events table
        $date_time = [ $input['startDate'] , $input['startTime']];
        $input['start'] = join(" ", $date_time);

        $date_time = [ $input['endDate'] , $input['endTime']];
        $input['end'] = join(" ", $date_time);

        $user=Auth::user()->id;

        $event->user_id = $user;
        $event->event_title = $input['event_title'];
        $event->description = $input['description'];
        $event->category_id = $input['category_id'];
        $event->start = $input['start'];
        $event->end = $input['end'];

        $event->save();


        //get event id to store in image table
        $latest_event = DB::table('events')->select('event_id')->where('user_id',$user)->orderby('created_at','desc')->first();

        //image File information

        $image_file = Input::file('file');
        $event_images_path = 'images/event-images/';
        $image_name = $image_file->getClientOriginalName();
        $image_extension = $image_file->getClientOriginalExtension();

        //Save file in image directory
        $image_Orin_file = Image::make($image_file->getRealPath());
        $image_Orin_file->orientate()->save($event_images_path.''.$image_file->getClientOriginalName());


        $thumb_path = 'images/event_thumbnail_images/';

        //save image as thumbnail
        $img_thumb = Image::make($image_file->getRealPath());
        $img_thumb->resize(320,240)->orientate();
        $img_thumb->save($thumb_path.''.$image_name);


        //images details to save in images table
        $image->user_id = $user;
        $image->image_path = $event_images_path ;
        $image->thumb_path = $thumb_path;
        $image->image_name = $image_name;
        $image->image_extension = $image_extension;
        $image->imageable_id = $latest_event->event_id;
        $image->imageable_type = 'Event';

        $image->save();


        return redirect('events');

    }

    public function destroy($events){


        $image_to_delete=Photo::select('image_path','thumb_path','image_name')->where('imageable_type','Event')->where('imageable_id',$events)->first();


        $image_path = $image_to_delete->image_path.''.$image_to_delete->image_name;
        $thumb_path = $image_to_delete->thumb_path.''.$image_to_delete->image_name;

        Storage::disk('public')->delete($image_path , $thumb_path);

        Photo::where('imageable_type','Event')->where('imageable_id',$events)->delete();

        Event::where('event_id', $events)->delete();



        return redirect('myEvents');



    }











}
