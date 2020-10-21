<?php

namespace Omnipay\Cardconnect\Message;

class DeleteCardRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('profile');
        $data = [
            'profile' => $this->getProfile(),
            'acct' => $this->getAcct(),
            'merchid' => $this->getMerchantId()
        ];
        return $data;
    }

    public function sendData($data)
    {
        $authString = $this->getApiUsername() . ':' . $this->getApiPassword();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($authString)
        ];
        $httpResponse = $this->httpClient->request('DELETE', $this->getEndpoint($data), $headers);
        return $this->createResponse($httpResponse);
    }

    public function getEndpoint($data)
    {
        $path = $data['profile'] . '/' . $data['acct'] . '/' . $data ['merchid'];
        return $this->getEndpointBase() . '/profile/' . $path;
    }

    protected function createResponse($data)
    {
        $jsonData = json_decode($data->getBody()->getContents(), true);
        return $this->response = new DeleteCardResponse($this, $jsonData);
    }
}
