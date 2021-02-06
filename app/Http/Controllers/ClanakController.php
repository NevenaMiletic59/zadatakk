<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clanak;

class ClanakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clanci=Clanak::all();
        

        return view('layout',[
            'clanci'=>$clanci
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('izgled');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $naslov=$request->input('naslov');
        $opis=$request->input('opis');
        $idAutor=session()->get('korisnik')->id;
      
try{


        $clanci=Clanak::create([
            'naslov'=>$naslov,
            'tekst'=>$opis,
            'autorId'=>$idAutor,
            'datumObjavljivanja'=>now()
        ]);
         return redirect()->route('home');
    }
    catch(PDOException $ex){
        $ex->getMessage();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request){
        $tabela = Clanak::all();
    $fajlIme = "clanci.csv";
    $fajl = fopen($fajlIme, 'w+');
    fputcsv($fajl, array('naslov', 'opis', 'autor', 'datum objavljivanja'));

    foreach($tabela as $red) {
        fputcsv($fajl, array($red['naslov'], $red['tekst'], $red['autorId'], $red['datumObjavljivanja']));
    }

    fclose($fajl);

    $heder = array(
        'Content-Type' => 'text/csv',
    );

    return response()->download($fajlIme, 'clanci.csv', $heder);
    }
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
    }
}
