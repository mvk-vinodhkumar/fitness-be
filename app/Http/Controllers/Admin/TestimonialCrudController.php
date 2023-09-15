<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TestimonialRequest as StoreRequest;
use App\Http\Requests\TestimonialRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Storage;
/**
 * Class TestimonialCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TestimonialCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Testimonial');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/testimonial');
        $this->crud->setEntityNameStrings('testimonial', 'testimonials');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();

        $array = array(1 => 'Active', 0 => 'Inactive');

        $this->crud->addColumn([
            'name' => 'designation',
            'label' => "Client Type",
        ]);

        $this->crud->addColumn([
            'name' => 'status',
            'label' => "Status",
            'type' => 'select_from_array',
            'priority' => '1',
            'visibleInTable' => true,
            'options' => $array
        ]);


        $this->crud->addColumn([
            'name' => 'display_order',
            'priority' => '1',
            'visibleInTable' => true,

        ]);

        $array1 = array(1 => 'Yes', 0 => 'No');

        $this->crud->addColumn([
            'name' => 'show_in_homepage',
            'label' => 'Show on homepage',
            'priority' => '1',
            'visibleInTable' => true,
            'type' => 'select_from_array',

            'options' => $array1
        ]);

        $this->crud->addColumn([
            'label' => "Images", // Table column heading
            'name' => 'image_url', // The db column name
            'type' => 'image',
            'visibleInTable' => true,
            'visibleInModal' => false,
            // 'prefix' => 'folder/subfolder/',
            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);

        $this->crud->addField([
            'label' => 'Client Type',
            'name' => 'designation',
        ]);

        $this->crud->addField([
            'label' => 'Upload Image',
            'type' => 'upload',
            'name' => 'image_url',
            'upload' => true,
            'max-size' => '220',
            'accept'=>"image/*",
            'required'=>true
            // 'disk' => 'public' // <- this line is new
            //
        ]);


        $this->crud->addField([

            'name' => 'details',
            'type' => 'textarea',
            'label' => 'Description',
            'required' => true,
        ]);
        $this->crud->addField([
            'name' => 'status',
            'class_name' => 'col-md-4',
            'label' => 'Status',
            // 'allows_null' => true,
            'required' => true,
            'type' => 'select2_from_array',
            'options' => $array
        ]);
        $this->crud->addField([
            'name' => 'show_in_homepage',
            'label' => 'Display on home page',
            'type' => 'checkbox'
        ]);
        $this->crud->orderBy('display_order', 'asc');


        // add asterisk for fields that are required in TestimonialRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {

        $request->validate([
            'name' => 'required',
            'upload_image_url' => 'required',
            'status' => 'required',
            'designation' => 'required',
            'details' => 'required'
        ]);

        if ($request->has('upload_image_url')) {
          $file = $request['upload_image_url'];
          $name = $file->getClientOriginalName();
          $e=explode(".", $name);
          $e=$e[count($e)-1];
          $key = 'testimonials/'.str_replace(' ','',$request['name']).'/'.time().'.'.$e;
          Storage::disk('s3')->put($key, fopen($file, 'r+'));
          $request['image_url']= Storage::disk('s3')->url($key);
        }

        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $request->validate([
            'name' => 'required',
            // 'image_url' => 'required',
            'status' => 'required',
            'designation' => 'required',
            'details' => 'required'
        ]);
        if ($request->has('upload_image_url')) {
          $file = $request['upload_image_url'];
          $name = $file->getClientOriginalName();
          $e=explode(".", $name);
          $e=$e[count($e)-1];
          $key = 'testimonials/'.str_replace(' ','',$request['name']).'/'.time().'.'.$e;
          Storage::disk('s3')->put($key, fopen($file, 'r+'));
          $request['image_url']= Storage::disk('s3')->url($key);
        }

        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
