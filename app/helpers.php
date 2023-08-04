<?php
use Illuminate\Http\Request;
use App\Models\UserAsesores;
use App\Models\Fotos;

    function getQr($id){
        $user = UserAsesores::where('id','=',$id)->first();
        $firstName = $user->name;
        $email = $user->email;
        $wordAddress = [
           'type' => 'work',
           'pref' => false,
           'street' => '',
           'city' => '',
           'state' => '',
           'country' => '',
           'zip' => ''
        ];
        
        $addresses = [$wordAddress];
        $cellPhone = [
            'type' => 'work',
            'number' => $user->whatsapp,
            'cellPhone' => true
        ];
        $Phone = [
            'type' => 'work',
            'number' => $user->phone,
            'cellPhone' => false
        ];

        
        $phones = [$cellPhone, $Phone];
        
        return QRCode::vCard($firstName, "", "", $email, $addresses, $phones)
                    ->setErrorCorrectionLevel('L')
                    ->setSize(4)
                    ->setMargin(2)
                    ->svg();
    }

