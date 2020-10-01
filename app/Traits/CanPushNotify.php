<?php

namespace App\Traits;

use App\bitfav;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

trait CanPushNotify {

    public function sendNotify ($title, $body,$bit_code,$token) {
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60*20);

            $notificationBuilder = new PayloadNotificationBuilder($title);
            $notificationBuilder->setBody($body)
                                // ->setIcon('icon')
            				    ->setSound('default');

             $dataBuilder = new PayloadDataBuilder();
             $dataBuilder->addData(['ID' => $bit_code]);



            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();

            // $token = "clPdaW4sAJw:APA91bHVrb_ldTtE8UbGquMuu0IG1_AXy6Q_htLsHzl3C_Nmp2aon1VgNX9t0iaVgohjRKTfGfP0TLfDPtr-JpyYV2ZdrGpv0kqoMdkqyoWlqjAb39bIak0f4cTtprJgCJa-2BLPBNUk";

            $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);


            $downstreamResponse->numberFailure();
            $downstreamResponse->numberModification();
            $invalidTokens=$downstreamResponse->tokensToDelete();
            if($invalidTokens){
                foreach ($invalidTokens as $invalidToken) {
                    bitfav::where('device_id',$invalidToken)->delete();
                 }
            }
    }

}
