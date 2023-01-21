<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Str;
use Cache;
use Hash;
use Session;
use Carbon\Carbon;
use App\Models\TercerosUser;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Events\UserPasswordResetEvent;
use App\Events\TercerosContactosEvent;

use Illuminate\Validation\ValidationException;
use App\Http\Requests\TercerosUserLoginRequest;

class TercerosUserController extends Controller
{
    

    public function contacto ( Request $FormData ) {
        TercerosContactosEvent::dispatch( $FormData);
    }



    public function buscarEmail ( Request $FormData ) {
        $UsuarioExiste = TercerosUser::where('email', $FormData->email )->first();
 
        if ( !empty( $UsuarioExiste ) ){
            return "OkUsuario";
        }else {
            return "NoOkUsuario";
        }
    }

    public function login ( Request $FormData ){ 
        $credenciales = $FormData->only('email','password');

        if ( Auth::attempt( $credenciales ) ) {                               // true al final es para recordar sessión               
            return response()->json( Auth::user(), 200);
        }    
        $this->ErrorMessage ( 'Datos no registrados en nuestra base de datos...');
    }
  
    public function logout(){
        Session::flush();
        Cache::flush();
        Auth::logout();
    }


    public function resetPassword ( TercerosUserLoginRequest $FormData ){
         
        $User = TercerosUser::where('email', $FormData->email)->first();
       
        if ( $User->inactivo ) {
            $this->ErrorMessage (  Lang::get("validation.custom.UserLogin.inactive-user") );
        }  
         
        $User->tmp_token        = Str::random(100);
        $User->tmp_token_expira = Carbon::now()->addMinute(15) ;
        $User->save();
 
        UserPasswordResetEvent::dispatch( $User->email, $User->tmp_token );
        return response()->json('Ok', 200);  
    }

    public function updatePassword ( TercerosUserLoginRequest $FormData ){
        $User = TercerosUser::where('tmp_token', $FormData->token)->first();
      
        $this->tokenValidate           ( $User  );
        $this->tokenExpirationValidate ( $User  );

        $User->password       = $FormData->password;
        $User->remember_token = '';
        $User->tmp_token      = '';
        $User->save();

       return response()->json($User, 200); 

    }

    private function tokenValidate ( $User ){
        if ( !$User) {
            throw ValidationException::withMessages( [
                'password' =>  [ 'El token de validación ha expirado o no ha sido validado. Debes iniciar el proceso nuevamente.'  ]
            ]);             
        }
    }

    private function tokenExpirationValidate ( $User ) {
        $Expiracion = $User->tmp_token_expira;
        $Diferencia = $Expiracion->diffInMinutes();
        if (  $Diferencia > 15 ) {
            throw ValidationException::withMessages( [
                'password' =>  [ 'El token de validación ha expirado o no ha sido validado. Debes iniciar el proceso nuevamente.'  ]
            ]);             
        }
    }

    private function ErrorMessage ( $ErrorTex ) {
        throw ValidationException::withMessages( [
            'email' =>  [$ErrorTex  ]
        ]);
    }

    public function registroNuevoUsuario ( request $FormData ) {
        $Usuario                     = new TercerosUser;
        $Usuario->identificacion     = $FormData->identificacion   ;
        $Usuario->tipo_persona       = $FormData->tipo_persona   ;
        $Usuario->idmcipio           = $FormData->idmcipio   ;
        $Usuario->pnombre            = $FormData->pnombre   ;
        $Usuario->papellido          = $FormData->papellido   ;
        $Usuario->direccion          = $FormData->direccion   ;
        $Usuario->direccion_cmplmnto = $FormData->direccion_cmplmnto   ;
        $Usuario->celular            = $FormData->celular   ;
        $Usuario->email              = $FormData->email   ;
        $Usuario->password           = $FormData->password   ;
        $Usuario->regimen            = $FormData->regimen   ;

        $Usuario->save();
        return $Usuario;
    }

}
