<?php

namespace Omnipay\Cardconnect\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Delete Card Response
 *
 * This is the response class for CardConnect delete card requests.
 *
 * @see \Omnipay\Cardconnect\Gateway
 */
class DeleteCardResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['respcode']) && $this->data['respcode'] == '08';
    }

    public function getMessage()
    {
        return isset($this->data['resptext']) ? $this->data['resptext'] : null;
    }
}
