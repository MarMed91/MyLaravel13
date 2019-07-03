<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComputerRequest; // importiamo ComputerRequest
use App\Computer; //importiamo Model Computer

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::all(); // IL NOME DEL MIO MODEL, va a prendersi tutte le righe del mio database e le va ad inserire nella variabile smartphone
        return view('page.computer', compact("computers"));// A QUESTA VIEW ANDIAMO AD AGGIUNGERE TUTTO QUELLO CHE RIGUARDA CARS.
                                                           //IL MODO PIù CORRETTO PER PASSARE LE INFO è ATTRAVERSO COMPACT
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.computer-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request)
    {

      // dd(-1);
        $validateData = $request->validated();

        $computer = Computer::create($validateData); //salviamo la macchina all'inetrno del nostro database, USIAMO IL MODEL FACCIAMO IL CREATE DEI DATI validati
        return redirect('com');
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
        $computer = Computer::findOrFail($id);//questa funzione ci restituisce la macchina con id uguale a questa variabile se la trova altrimenti fallisce una volta scaricata la macchina
        return view('page.edit-computer', compact('computer'));//dal database la ritorno nellla view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(ComputerRequest $request, $id){
      $validatedData = $request->validated();
      Computer::whereId($id)->update($validatedData); //prendimi la macchina con id uguale a questa variabile e farmi un aggiornamento;
  // in questo modifchiamo auto con i valori inseriti nel form;
      return redirect('com') //redirect va alla cartella che indichi, view si aggiungere a edit
                ->with('success', 'Computer ' . $id . ' was updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $computer = computer::findOrFail($id);
        $computer->delete();

        return redirect('com');
    }
}
