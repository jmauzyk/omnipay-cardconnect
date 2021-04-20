<?php

namespace Omnipay\Cardconnect\Message;

class AuthorizeRequest extends AbstractRequest
{
    public function getData()
    {
        if ($this->getProfile()) {
            $this->validate('amount');
        } else {
            $this->validate('amount', 'card');
            $this->getCard()->validate();
        }
        $card = $this->getCard();
        $data = [
            'merchid' => $this->getMerchantId(),
            'account' => $card->getNumber(),
            'expiry' => $card->getExpiryDate('my'),
            'cvv2' => $card->getCvv(),
            'amount' => $this->getAmountInteger(),
            'currency' => $this->getCurrency(),
            'orderid' => $this->getOrderId(),
            'name' => $card->getName(),
            'address' => $card->getBillingAddress1(),
            'address2' => $card->getBillingAddress2(),
            'city' => $card->getBillingCity(),
            'region' => $card->getBillingState(),
            'postal' => $card->getBillingPostcode(),
            'country' => $card->getBillingCountry(),
            'phone' => $card->getBillingPhone(),
            'email' => $card->getEmail(),
            'profile' => $this->getProfile(),
            'userfields' => $this->getUserfields(),
            'bin' => 'Y',
            'tokenize' => 'Y',
            'ecomind' => 'E'
        ];

        return $data;
    }

    public function getEndpoint()
    {
        return $this->getEndpointBase() . '/auth';
    }
}
