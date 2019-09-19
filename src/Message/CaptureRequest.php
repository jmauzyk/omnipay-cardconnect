<?php

namespace Omnipay\Cardconnect\Message;

class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount', 'transactionReference');
        $data = [
            'merchid' => $this->getMerchantId(),
            'amount' => $this->getAmountInteger(),
            'retref' => $this->getTransactionReference()
        ];
        return $data;
    }

    public function getEndpoint()
    {
        return $this->getEndpointBase() . '/capture';
    }
}
