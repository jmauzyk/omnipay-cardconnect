<?php

namespace Omnipay\Cardconnect\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Get Card Response
 *
 * This is the response class for CardConnect get card requests.
 *
 * @see \Omnipay\Cardconnect\Gateway
 */
class GetCardResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return count($this->data) && !isset($this->data[0]['respcode']);
    }

    public function isDefaultAcct()
    {
        return count($this->data) === 1 && isset($this->data[0]['defaultacct']) ? $this->data[0]['defaultacct'] === 'Y' : null;
    }

    public function getMessage()
    {
        return isset($this->data[0]['resptext']) ? $this->data[0]['resptext'] : null;
    }
}
