<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Centro;
use Illuminate\Http\Request;
use App\Http\Resources\CentroResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Gate;

class CentroController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    /** Create the controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->authorizeResource(Centro::class, 'centro');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CentroResource::collection(Centro::paginate(10));
    }

    public function indexOD()
    {
        $this->authorize('viewAny', Centro::class);
        $response = Http::get('https://datosabiertos.regiondemurcia.es/catalogo/api/action//datastore_search?resource_id=52dd8435-46aa-495e-bd2b-703263e576e7&limit=5');
        return response()->json(json_decode($response));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->authorize('create', Centro::class);

        $centro = json_decode($request->getContent(), true);

        $centro = Centro::create($centro);

        return new CentroResource($centro);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function show(Centro $centro)
    {
        return new CentroResource($centro);
        // $response = Http::get('https://datosabiertos.regiondemurcia.es/catalogo/api/action//datastore_search?resource_id=52dd8435-46aa-495e-bd2b-703263e576e7&filters={"CODIGOCENTRO": "'. $centro->codigo .'"}');
        // return response()->json(json_decode($response)->result->records);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centro $centro)
    {
//        $this->authorize('update', $centro);

        $centroData = json_decode($request->getContent(), true);
        $centro->update($centroData);

        return new CentroResource($centro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centro $centro)
    {
//        $this->authorize('delete', $centro);
        $centro->delete();
    }

    public function miCentro() {
        $user = Auth::user();
        return new CentroResource($user->centroCoordinado);
    }
}
