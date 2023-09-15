<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MailRequest as StoreRequest;
use App\Http\Requests\MailRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Carbon\Carbon;

/**
 * Class MailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MailCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Mail');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/mails');
        $this->crud->setEntityNameStrings('Mail', 'Mails');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => "Sent Time",
            'type' => "date",
        ]);
        // $this->crud->removeAllButtons();
        $this->crud->allowAccess(['delete']);
        $this->crud->denyAccess(['update']);
        $this->crud->addClause('orderBy','id','desc');
        $this->crud->addFilter([ // select2 filter
            'name' => 'number',
            'type' => 'select2',
            'label'=> 'Phone Number'
        ], function() {
            return \App\Models\Mail::all()->pluck('contact', 'id')->toArray();
        }, function($value) { // if the filter is active
            $this->crud->addClause('where', 'id', $value);
        });

        $this->crud->addFilter([ // select2 filter
            'name' => 'date',
            'type' => 'date_range',
            'label'=> 'Date Range'
        ], function() {

        }, function($value) { // if the filter is active
            $date=json_decode($_GET['date'],true);
            $this->crud->addClause('whereDate', 'created_at','>=', Carbon::parse($date['from']));
            $this->crud->addClause('whereDate', 'created_at','<=', Carbon::parse($date['to']));
        });

        $this->crud->enableAjaxTable();

        // add asterisk for fields that are required in MailRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
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
