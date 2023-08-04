<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAsesores;
use App\Models\Fotos;
use App\Models\User;
use App\Models\Empresarial;
use App\Models\Seguros;
use App\Models\Servicios;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function getUser($url){

        $user = UserAsesores::where('url',$url)->first();

        $wp = Http::get('https://blog.socasesores.com/wp-json/wp/v2/posts?categories=298&_embed');
        $wp = json_decode($wp->body());


        if(!empty($user)){
            $id = $user['id'];

            $oficina_datos = User::where('id_sisec',$user['id_office'])->first();
            if ($oficina_datos == null) {
                $oficina_datos = Empresarial::where('id_sisec',$user['id_office'])->first();
                if ($oficina_datos == null) {
                     $oficina_datos = Seguros::where('id_sisec',$user['id_office'])->first();
                }
            }else{

            }

            $badges = [];
            if (!empty(@unserialize($user['badges']))) {
                foreach(@unserialize($user['badges']) as $badge){
                    $badges[$badge] = Certificaciones::where('id_badge',$badge)->get();
                }
            }

            $tips = [
                'jt_hHbdvUgU',
                'tUeyTWQXV8I',
            ];

            
            $data = [
                'user' => $user,
                'fotos' => Fotos::where('user_id',$id)->get(),
                'office' => $oficina_datos,
                'badges' => $badges,
                'blog' => $wp,
                'tips' => $tips
            ];

            // Ordenamos los servicios por área
            $servicios = explode(",", $user['servicios']);
            $serv = Servicios::whereIn('service_name', $servicios)->get();

            if (!empty($serv)) {
                foreach ($serv as $service) {
                    $data['services'][$service['service_area']][] = $service;
                }
            }
            
            $data['user']['QRCode'] = ''; # $this->getQr($id);

            if ($user->tipo === "PYME" && $user->level != "") {
                $tipo = "empresarial";
            }elseif($user->tipo === "Hipotecario" && $user->level != "") {
                $tipo = "hipotecario";
            }elseif($user->tipo === "Hipotecario" && $user->level == "") {
                $tipo = "hipotecario";
            }elseif($user->tipo === "PYME" && $user->level == "") {
                $tipo = "empresarial";
            }elseif($user->tipo === "Seguros"){
                $tipo = "seguross";
            }else{
                $tipo = "hipotecario";
            }
           
            return view($tipo, $data);
        } else{
            $users = UserAsesores::where('id_office',$office)->where('url','like','%'.$url.'%')->get();
            return view('fail',['users' => $users]);
        }

    }

    public function getUserTesting($url){

        $user = UserAsesores::where('url',$url)->first();

        $wp = Http::get('https://blog.socasesores.com/wp-json/wp/v2/posts?categories=298&_embed');
        $wp = json_decode($wp->body());


        if(!empty($user)){
            $id = $user['id'];

            $oficina_datos = User::where('id_sisec',$user['id_office'])->first();
            if ($oficina_datos == null) {
                $oficina_datos = Empresarial::where('id_sisec',$user['id_office'])->first();
                if ($oficina_datos == null) {
                     $oficina_datos = Seguros::where('id_sisec',$user['id_office'])->first();
                }
            }else{

            }

            $badges = [];
            if (!empty(@unserialize($user['badges']))) {
                foreach(@unserialize($user['badges']) as $badge){
                    $badges[$badge] = Certificaciones::where('id_badge',$badge)->get();
                }
            }

            $tips = [
                'jt_hHbdvUgU',
                'tUeyTWQXV8I',
            ];

            
            $data = [
                'user' => $user,
                'fotos' => Fotos::where('user_id',$id)->get(),
                'office' => $oficina_datos,
                'badges' => $badges,
                'blog' => $wp,
                'tips' => $tips
            ];

            // Ordenamos los servicios por área
            $servicios = explode(",", $user['servicios']);
            $serv = Servicios::whereIn('service_name', $servicios)->get();

            if (!empty($serv)) {
                foreach ($serv as $service) {
                    $data['services'][$service['service_area']][] = $service;
                }
            }
            
            $data['user']['QRCode'] = ''; # $this->getQr($id);

            if ($user->tipo === "PYME" && $user->level != "") {
                $tipo = "empresarial";
            }elseif($user->tipo === "Hipotecario" && $user->level != "") {
                $tipo = "hipotecario";
            }elseif($user->tipo === "Hipotecario" && $user->level == "") {
                $tipo = "hipotecario";
            }elseif($user->tipo === "PYME" && $user->level == "") {
                $tipo = "empresarial";
            }elseif($user->tipo === "Seguros"){
                $tipo = "seguross";
            }else{
                $tipo = "hipotecario";
            }
           
            return view("testing", $data);
        } else{
            $users = UserAsesores::where('id_office',$office)->where('url','like','%'.$url.'%')->get();
            return view('fail',['users' => $users]);
        }

    }

    public function getQr($id){
        /*$user = UserAsesores::where('id','=',$id)->first();
        $firstName = $user->name;
        $email = $user->email;
        
         $cellPhone = [
            'type' => 'work',
            'number' => $user->phone,
            'cellPhone' => true
        ];
        
        $phones = [$cellPhone];
        
        return QRCode::vCard($firstName, $email, $phones)
                    ->setErrorCorrectionLevel('H')
                    ->setSize(4)
                    ->setMargin(2)
                    ->svg();*/
    }
}