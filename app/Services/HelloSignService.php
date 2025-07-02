<?php

namespace App\Services;

use Dropbox\Sign\Configuration;
use Dropbox\Sign\Api\SignatureRequestApi;
use Dropbox\Sign\Model\SignatureRequestSendRequest;
use Dropbox\Sign\Model\SubSignatureRequestSigner;


class HelloSignService
{
    private SignatureRequestApi $signatureApi;

    public function __construct()
    {
        $apiKey = config('services.hellosign.api_key');

        if (!$apiKey) {
            throw new \Exception("HelloSign API key not set in config.");
        }

        $config = Configuration::getDefaultConfiguration()
            ->setUsername($apiKey);

        $this->signatureApi = new SignatureRequestApi($config);
    }

    //(non-embedded)
    public function sendSignatureRequest(string $email, string $name, string $filePath)
    {
        $signer = new SubSignatureRequestSigner([
            'email_address' => $email,
            'name' => $name,
        ]);

        $request = new SignatureRequestSendRequest([
            'title' => 'عقد تنفيذ المناقصة',
            'subject' => 'يرجى توقيع العقد',
            'message' => 'يرجى توقيع هذا العقد.',
            'signers' => [$signer],
            'files' => [$filePath],
            'test_mode' => true,
        ]);

        return $this->signatureApi->signatureRequestSend($request);
    }

}  