<?php

namespace Omnipay\Cardconnect\Message;

class CreateCardRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('card');
        $this->getCard()->validate();
        $card = $this->getCard();
        $data = [
            'profile' => $this->getProfile(),
            'defaultacct' => $this->getDefaultacct(),
            'profileupdate' => $this->getProfileupdate(),
            'auoptout' => $this->getAuoptout(),
            'accttype' => $this->getAccttype(),
            'merchid' => $this->getMerchantId(),
            'account' => $card->getNumber(),
            'expiry' => $card->getExpiryDate('my'),
            'name' => $card->getName(),
            'company' => $card->getCompany(),
            'address' => $card->getBillingAddress1(),
            'city' => $card->getBillingCity(),
            'region' => $card->getBillingState(),
            'postal' => $card->getBillingPostcode(),
            'country' => $card->getBillingCountry(),
            'phone' => $card->getBillingPhone(),
            'email' => $card->getEmail()
        ];
        return $data;
    }

    public function getEndpoint()
    {
        return $this->getEndpointBase() . '/profile/';
    }

    protected function createResponse($data)
    {
        $jsonData = json_decode($data->getBody()->getContents(), true);
        return $this->response = new CreateUpdateCardResponse($this, $jsonData);
    }
}
