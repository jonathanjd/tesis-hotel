<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;

use App\Contact;

use Debugbar;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $customer = new Customer();
        $contact = new Contact();

        return view('customer.create')
            ->with('customer', $customer)
            ->with('contact', $contact);
    }

    public function buscar($cedula)
    {
        # code...
        $customer = Customer::buscarCustomer($cedula);
        if($customer->exists()){
            return response()->json($customer);
        }else{
            $mensaje = false;
            return response()->json($mensaje);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->codigo_cte = Customer::ultimoCodigo();

        $this->validate($request,[
            'cedula_rif' => 'required|max:15|unique:customers',
            'nombre' => 'required|max:25',
            'domicilio' => 'required|max:25',
            'telefono' => 'required|max:15',
            'fax' => 'required|max:15',
            'email' => 'required|email|max:25|unique:customers',
            'tipo_cte' => 'required',
            'contacto_c1' => 'required|max:25',
            'cargo_dpto_c1' => 'required|max:25',
            'telefono_c1' => 'required|max:15',
            'contacto_c2' => 'max:25',
            'cargo_dpto_c2' => 'max:25',
            'telefono_c2' => 'max:15',
        ]);


        $customer = new Customer();
        $customer->codigo_cte = $request->codigo_cte;
        $customer->cedula_rif = $request->cedula_rif;
        $customer->nombre = $request->nombre;
        $customer->domicilio = $request->domicilio;
        $customer->telefono = $request->telefono;
        $customer->fax = $request->fax;
        $customer->email = $request->email;
        $customer->tipo_cte = $request->tipo_cte;
        $customer->save();

        $contact = new Contact();
        $contact->contacto_c1 = $request->contacto_c1;
        $contact->cargo_dpto_c1 = $request->cargo_dpto_c1;
        $contact->telefono_c1 = $request->telefono_c1;
        $contact->contacto_c2 = $request->contacto_c2;
        $contact->cargo_dpto_c2 = $request->cargo_dpto_c2;
        $contact->telefono_c2 = $request->telefono_c2;
        $contact->customer_id = $customer->id;
        $contact->save();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'nombre' => 'required|max:25',
            'domicilio' => 'required|max:25',
            'telefono' => 'required|max:15',
            'fax' => 'required|max:15',
            'tipo_cte' => 'required',
            'contacto_c1' => 'required|max:25',
            'cargo_dpto_c1' => 'required|max:25',
            'telefono_c1' => 'required|max:15',
            'contacto_c2' => 'max:25',
            'cargo_dpto_c2' => 'max:25',
            'telefono_c2' => 'max:15',
        ]);

        $customer = Customer::find($id);
        $customer->nombre = $request->nombre;
        $customer->domicilio = $request->domicilio;
        $customer->telefono = $request->telefono;
        $customer->fax = $request->fax;
        $customer->tipo_cte = $request->tipo_cte;
        $customer->save();
        $customer->contact->contacto_c2 = $request->contacto_c2;
        $customer->contact->cargo_dpto_c2 = $request->cargo_dpto_c2;
        $customer->contact->telefono_c2 = $request->telefono_c2;
        $customer->contact->contacto_c2 = $request->contacto_c2;
        $customer->contact->cargo_dpto_c2 = $request->cargo_dpto_c2;
        $customer->contact->telefono_c2 = $request->telefono_c2;
        $customer->contact->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        $customer->delete();
    }
}
