<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TermRequest as StoreRequest;
use App\Http\Requests\TermRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class TermCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TermCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Term');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/term');
        $this->crud->setEntityNameStrings('term', 'terms');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addField([
            'label' => 'Upload file',
            'type' => 'upload',
            'name' => 'terms',
            'upload' => true,
            'required' => true,
            // 'disk' => 'public' // <- this line is new
            //
        ]);
        // add asterisk for fields that are required in TermRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {

      $file = 'tnc.pdf';
      $request->terms->move(public_path('/tnc/'), $file);
        // your additional operations before save here
        return redirect('/admin');

    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
