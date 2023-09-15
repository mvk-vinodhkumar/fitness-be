<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PaymentRequest as StoreRequest;
use App\Http\Requests\PaymentRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class PaymentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PaymentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Payment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/payments');
        $this->crud->setEntityNameStrings('payment', 'payments');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->removeColumns(['name','currency_type','amount','response_from_razor_pay','status']);

        $this->crud->addColumn([
            'label' => 'created date',
            'name' => 'created_at',
            'required' => true,
        ]);
        $this->crud->addColumns([
            'razor_pay_id',
            'plan',
        ]);

        $this->crud->addColumns([
            'country',
            'state',
        ]);
        $this->crud->addColumns([
            'mobile',
            'email',
        ]);

        $this->crud->addColumn([
            'label' => "Amount",
            'type' => 'model_function',
            'function_name'=>'getAmount',
        ]);

        $this->crud->addColumn([
            'label' => 'View Invoice',
            'name' => 'token',
            'type' => 'link',

        ]);

        $this->crud->orderBy('id','desc');
        $this->crud->denyAccess(['delete','create']);

        // add asterisk for fields that are required in PaymentRequest
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
