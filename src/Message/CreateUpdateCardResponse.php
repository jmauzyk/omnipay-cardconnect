<?php

namespace Omnipay\Cardconnect\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Create/Update Card Response
 *
 * This is the response class for CardConnect create and update card requests.
 *
 * @see \Omnipay\Cardconnect\Gateway
 */
class CreateUpdateCardResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['respcode']) && $this->data['respcode'] == '09';
    }

    public function getProfileId()
    {
        return isset($this->data['profileid']) ? $this->data['profileid'] : null;
    }

    public function getAcctId()
    {
        return isset($this->data['acctid']) ? $this->data['acctid'] : null;
    }

    public function getMessage()
    {
        return isset($this->data['resptext']) ? $this->data['resptext'] : null;
    }
}
