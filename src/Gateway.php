<?php

namespace Omnipay\Cardconnect;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    // Getters
    // =========================================================================

    public function getName()
    {
        return 'Cardconnect';
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function getApiHost()
    {
        return $this->getParameter('apiHost');
    }

    public function getApiPort()
    {
        return $this->getParameter('apiPort');
    }

    public function getApiUsername()
    {
        return $this->getParameter('apiUsername');
    }

    public function getApiPassword()
    {
        return $this->getParameter('apiPassword');
    }

    public function getTestMode()
    {
        return $this->getParameter('testMode');
    }

    // Setters
    // =========================================================================

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function setApiUsername($value)
    {
        return $this->setParameter('apiUsername', $value);
    }
    public function setApiHost($value)
    {
        return $this->setParameter('apiHost', $value);
    }
    public function setApiPort($value)
    {
        return $this->setParameter('apiPort', $value);
    }

    public function setApiPassword($value)
    {
        return $this->setParameter('apiPassword', $value);
    }

    public function setTestMode($value)
    {
        return $this->setParameter('testMode', $value);
    }

    // Public Functions
    // =========================================================================

    public function getDefaultParameters()
    {
        $params = [
            'merchantId' => '',
            'apiHost' => '',
            'apiPort' => '',
            'apiUsername' => '',
            'apiPassword' => '',
            'testMode' => false
        ];
        return $params;
    }

    /**
     * Create an authorize request.
     *
     * @param array $parameters
     * @return \Omnipay\Cardconnect\Message\AuthorizeRequest
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cardconnect\Message\AuthorizeRequest', $parameters);
    }

    /**
     * Create a purchase request.
     *
     * @param array $parameters
     * @return \Omnipay\Cardconnect\Message\PurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cardconnect\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create a capture request.
     *
     * @param array $parameters
     * @return \Omnipay\Cardconnect\Message\CaptureRequest
     */
    public function capture(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cardconnect\Message\CaptureRequest', $parameters);
    }

    /**
     * Create a void request.
     *
     * @param array $parameters
     * @return \Omnipay\Cardconnect\Message\VoidRequest
     */
    public function void(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cardconnect\Message\VoidRequest', $parameters);
    }

    /**
     * Create a refund request.
     *
     * @param array $parameters
     * @return \Omnipay\Cardconnect\Message\RefundRequest
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cardconnect\Message\RefundRequest', $parameters);
    }
}
