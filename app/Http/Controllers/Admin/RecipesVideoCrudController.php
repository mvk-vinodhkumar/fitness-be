<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\RecipesVideoRequest as StoreRequest;
use App\Http\Requests\RecipesVideoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class RecipesVideoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class RecipesVideoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\RecipesVideo');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/recipesVideos');
        $this->crud->setEntityNameStrings('Recipes Video', 'Recipes Videos');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        $array = array(1 => 'Active', 0 => 'In Active');

        $this->crud->addField([
            'name' => 'video_url',
            'class_name' => 'col-md-4',
            'label' => 'Video url',
            'required' => true,
            'type' => 'textarea',
            'rows' => '2',
            'hint' => 'Please copy paste the link in the address bar.',
        ]);

        $array1 = array(
          '1' => 'Veg',
          '2' => 'Non Veg',
        );

        $this->crud->addField([
            'label' => 'Food Type',
            'class_name' => 'col-md-6',
            'name' => 'category',
            'required' => true,
            'type' => 'select_from_array',
            'options' => $array1
        ]);

        // $this->crud->addField([
        //     'name' => 'status',
        //     'class_name' => 'col-md-6',
        //     'label' => 'Status',
        //     'required' => true,
        //     'type' => 'select_from_array',
        //     'options' => $array
        // ]);



        $this->crud->removeFields([
            'thumbnail',
            'title'
        ]);

        $this->crud->addColumns([
            'title' , 'video_url',
        ]);

        $this->crud->addColumn([
            'label' => 'Food Type',
            'class_name' => 'col-md-6',
            'name' => 'category',
            'required' => true,
            'type' => 'select_from_array',
            'options' => $array1
        ]);

        // $this->crud->addColumn([
        //     'name' => 'status',
        //     'label' => 'Status',
        //     'type' => 'select_from_array',
        //     'options' => $array
        // ]);

        $this->crud->removeColumns([
            'thumbnail',
            // 'title'
        ]);

        // add asterisk for fields that are required in RecipesVideoRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        // $this->crud->denyAccess(['delete']);

        $this->crud->addFilter([ // select2 filter
            'name' => 'type',
            'type' => 'select2',
            'label'=> 'Food Type'
        ], function() {
            return array(
              '1' => 'Veg',
              '2' => 'Non Veg',
            );
        }, function($value) { // if the filter is active
            $this->crud->addClause('where', 'category', $value);
        });
    }

    public function store(StoreRequest $request)
    {
        $request['video_url']=str_replace('watch?v=','embed/',str_replace('feature=youtu.be&','',str_replace('//m.','//www.',$request['video_url'])));
        // dd($request->all());
        $yt=explode('embed/',$request['video_url']);
        $videoid=$yt[1];
        // AIzaSyB7kfGW-B8mxgAWCYzJ-XApQYH7BRoaV_s

        $apikey = 'AIzaSyCBTjIx3oNyvDbiWKAVopWnkxueVG2QWZc'; // change this
        $json = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id=' . $videoid . '&key=' . $apikey . '&part=snippet');
        $data = json_decode($json, true);
        $request['thumbnail']=$data['items'][0]['snippet']['thumbnails']['high']['url'];
        $request['title']=$data['items'][0]['snippet']['title'];
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {

        $request['video_url']=str_replace('watch?v=','embed/',str_replace('feature=youtu.be&','',str_replace('//m.','//www.',$request['video_url'])));
        // dd($request->all());
        $yt=explode('embed/',$request['video_url']);
        $videoid=$yt[1];
        // AIzaSyB7kfGW-B8mxgAWCYzJ-XApQYH7BRoaV_s

        $apikey = 'AIzaSyCBTjIx3oNyvDbiWKAVopWnkxueVG2QWZc'; // change this
        $json = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id=' . $videoid . '&key=' . $apikey . '&part=snippet');
        $data = json_decode($json, true);
        $request['thumbnail']=$data['items'][0]['snippet']['thumbnails']['high']['url'];
        $request['title']=$data['items'][0]['snippet']['title'];
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
