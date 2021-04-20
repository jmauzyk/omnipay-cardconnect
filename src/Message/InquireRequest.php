<?php

namespace Omnipay\Cardconnect\Message;

class InquireRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transactionReference');
        $data = [
            'merchid' => $this->getMerchantId(),
            'retref' => $this->getTransactionReference()
        ];
        return $data;
    }

    public function sendData($data)
    {
        $authString = $this->getApiUsername() . ':' . $this->getApiPassword();
        $headers = ['Authorization' => 'Basic ' . base64_encode($authString)];
        $httpResponse = $this->httpClient->request('GET', $this->getEndpoint($data), $headers);
        return $this->createResponse($httpResponse);
    }

    public function getEndpoint($data)
    {
        $path = $data['retref'] . '/' . $data['merchid'];
        return $this->getEndpointBase() . '/inquire/' . $path;
    }

    protected function createResponse($data)
    {
        $jsonData = json_decode($data->getBody()->getContents(), true);
        return $this->response = new InquireResponse($this, $jsonData);
    }
}
