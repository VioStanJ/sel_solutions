<?php

namespace App\Listeners;

use App\Events\SMSEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SMSListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SMSEvent  $event
     * @return void
     */
    public function handle(SMSEvent $event)
    {
        if (!function_exists("curl_init")){
            return response()->json(['success'=>false,'message'=>"Désolé cURL n'est pas installé !"], 200);
        }

         // Les détailles du compte de l'API

         //votre numéro de téléphone sans le +509
        $tel='+50937093675';
        //votre mot de passe sur TOK SMS
        $PWD='Pass@()1278';

        //le lien http ou https de votre site web
        $lien='https://sel.cdevlop.co/';
         // Les détailles du message que vous voulez envoyer
        // Numéro de téléphone de votre client
        $telephone1=$event->phone;

    // Préparation des données pour la requête POST
        $url = urlencode($lien);

        $data ='number='.$telephone1."&sender=".$tel.
        "&message=".urlencode($event->msj)."&url=".$url."&PWD=".$PWD;
            $ur='https://toksms.com/dashboard1/API/api.toksms.php?';

        $data1=$ur.''.$data;

        // Envoie de la requête GET avec cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL, $data1);

        //exécution du résultat retourne
        $resultat_toksms = curl_exec($ch);

        //fermeture de cURL
        curl_close($ch);
    }
}
