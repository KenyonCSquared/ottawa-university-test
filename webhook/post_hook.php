<?php


class HookNotification {

    public function notify($post){
        $curl = curl_init();
        $url = 'https://hooks.zapier.com/hooks/catch/10709349/bijzzxe/'; // need to customize this zap


        $json = json_encode( $post );


        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS=>$json,

        ]);

        $response = curl_exec($curl);

        if ($error = curl_error($curl)) {
        throw new Exception($error);
        }

        curl_close($curl);
        $response = json_decode($response, true);

        var_dump('Response:', $response);
    }
}
?>