<?php
/**
* Abstract class used to communicate with CardConnect
*/
namespace Omnipay\Cardconnect\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $testEndpoint = 'https://fts-uat.cardconnect.com/cardconnect/rest';

    // Getters
    // =========================================================================

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function getApiHost()
    {
        return $this->getParameter('apiHost');
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

    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    public function getProfile()
    {
        return $this->getParameter('profile');
    }

    public function getDefaultacct()
    {
        return $this->getParameter('defaultacct');
    }

    public function getProfileupdate()
    {
        return $this->getParameter('profileupdate');
    }

    public function getAuoptout()
    {
        return $this->getParameter('auoptout');
    }

    public function getAccttype()
    {
        return $this->getParameter('accttype');
    }

    public function getAcct()
    {
        return $this->getParameter('acct');
    }

    public function getUserfields()
    {
        return $this->getParameter('userfields');
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

    public function setApiPassword($value)
    {
        return $this->setParameter('apiPassword', $value);
    }

    public function setTestMode($value)
    {
        return $this->setParameter('testMode', $value);
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    public function setProfile($value)
    {
        return $this->setParameter('profile', $value);
    }

    public function setDefaultacct($value)
    {
        return $this->setParameter('defaultacct', $value);
    }

    public function setProfileupdate($value)
    {
        return $this->setParameter('profileupdate', $value);
    }

    public function setAuoptout($value)
    {
        return $this->setParameter('auoptout', $value);
    }

    public function setAccttype($value)
    {
        return $this->setParameter('accttype', $value);
    }

    public function setAcct($value)
    {
        return $this->setParameter('acct', $value);
    }

    public function setUserfields($value)
    {
        return $this->setParameter('userfields', $value);
    }

    protected function liveEndpoint()
    {
        return 'https://'.$this->getApiHost().'/cardconnect/rest';
    }

    // Public Functions
    // =========================================================================

    public function sendData($data)
    {
        $authString = $this->getApiUsername() . ':' . $this->getApiPassword();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($authString)
        ];
        $httpResponse = $this->httpClient->request('PUT', $this->getEndpoint(), $headers, json_encode($data));
        return $this->createResponse($httpResponse);
    }

    public function getEndpointBase()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint();
    }

    protected function createResponse($data)
    {
        $jsonData = json_decode($data->getBody()->getContents(), true);
        return $this->response = new Response($this, $jsonData);
    }
}
