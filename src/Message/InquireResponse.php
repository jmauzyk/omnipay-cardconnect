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
class InquireResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return count($this->data) && !isset($this->data['respcode']);
    }

    public function getMessage()
    {
        return isset($this->data['resptext']) ? $this->data['resptext'] : null;
    }
}
