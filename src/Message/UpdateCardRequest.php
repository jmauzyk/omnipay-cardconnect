<?php

namespace Omnipay\Cardconnect\Message;

class UpdateCardRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('profile');
        $card = $this->getCard();
        $data = [
            'profile' => $this->getProfile(),
            'defaultacct' => $this->getDefaultacct(),
            'profileupdate' => $this->getProfileupdate(),
            'auoptout' => $this->getAuoptout(),
            'accttype' => $this->getAccttype(),
            'merchid' => $this->getMerchantId(),
        ];
        if ($card) {
            $card->validate();
            $data['account'] = $card->getNumber();
            $data['expiry'] = $card->getExpiryDate('my');
            $data['name'] = $card->getName();
            $data['company'] = $card->getCompany();
            $data['address'] = $card->getBillingAddress1();
            $data['city'] = $card->getBillingCity();
            $data['region'] = $card->getBillingState();
            $data['postal'] = $card->getBillingPostcode();
            $data['country'] = $card->getBillingCountry();
            $data['phone'] = $card->getBillingPhone();
            $data['email'] = $card->getEmail();
        }
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
