<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Korisnik;

class LoginController extends Controller
{
    //
    public function doLogin(Request $request){
       
        $korisnickoIme=$request->input('korisnickoIme');
        $sifra=$request->input('sifra');
       
            $korisnik= Korisnik::where([
            ['korisnickoIme','=',$korisnickoIme],
            ['sifra','=',md5($sifra)]
            ])->first();
           
            if($korisnik){
                
                $request->session()->put('korisnik',$korisnik);
                   
                  return redirect()->route('home');
              
            }
            else{
                
                echo"Niste registrovani";
            }



       
    }
    public function logOut(Request $request){
        if($request->session()->has('korisnik')){
            $request->session()->forget('korisnik');
            $request->session()->flush();
            return redirect(route('home'));
        }
        
    }
}
