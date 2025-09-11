<?php

namespace AzonPressAmazonAPI;

class AmazonUrlBuilder
{
    private $accessKey = null;
    private $secretKey = null;
    private $path = null;
    private $regionName = null;
    private $serviceName = "ProductAdvertisingAPI";
    private $httpMethodName = null;
    private $queryParametes = array();
    private $awsHeaders = array();
    private $payload = "";

    private $HMACAlgorithm = "AWS4-HMAC-SHA256";
    private $aws4Request = "aws4_request";
    private $strSignedHeader = null;
    private $xAmzDate = null;
    private $currentDate = null;

    public $trackingId = "";
    public $locale = "";
    public $host = '';

    public $shopDefinition = [];

    public function __construct($accessKey, $secretKey, $trackingId, $shopDefinition)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->trackingId = $trackingId;
        $this->shopDefinition = $shopDefinition;

        $this->xAmzDate = $this->getTimeStamp();
        $this->currentDate = $this->getDate();
        $this->setRegionName($this->shopDefinition['region']);
        $this->host = $this->shopDefinition['host'];
        $this->locale = $this->shopDefinition['locale'];
    }

    function setPath($path)
    {
        $this->path = $path;
    }

    function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    function setRegionName($regionName)
    {
        $this->regionName = $regionName;
    }

    function setPayload($payload)
    {
        $this->payload = $payload;
    }

    function setRequestMethod($method)
    {
        $this->httpMethodName = $method;
    }

    function addHeader($headerName, $headerValue)
    {
        $this->awsHeaders [$headerName] = $headerValue;
    }

    public function prepareCanonicalRequest()
    {
        $canonicalURL = "";
        $canonicalURL .= $this->httpMethodName . "\n";
        $canonicalURL .= $this->path . "\n" . "\n";
        $signedHeaders = '';
        foreach ($this->awsHeaders as $key => $value) {
            $signedHeaders .= $key . ";";
            $canonicalURL .= $key . ":" . $value . "\n";
        }
        $canonicalURL .= "\n";
        $this->strSignedHeader = substr($signedHeaders, 0, -1);
        $canonicalURL .= $this->strSignedHeader . "\n";
        $canonicalURL .= $this->generateHex($this->payload);
        return $canonicalURL;
    }

    private function prepareStringToSign($canonicalURL)
    {
        $stringToSign = '';
        $stringToSign .= $this->HMACAlgorithm . "\n";
        $stringToSign .= $this->xAmzDate . "\n";
        $stringToSign .= $this->currentDate . "/" . $this->regionName . "/" . $this->serviceName . "/" . $this->aws4Request . "\n";
        $stringToSign .= $this->generateHex($canonicalURL);
        return $stringToSign;
    }

    private function calculateSignature($stringToSign)
    {
        $signatureKey = $this->getSignatureKey($this->secretKey, $this->currentDate, $this->regionName, $this->serviceName);
        $signature = hash_hmac("sha256", $stringToSign, $signatureKey, true);
        $strHexSignature = strtolower(bin2hex($signature));
        return $strHexSignature;
    }

    public function getHeaders()
    {
        $this->awsHeaders ['x-amz-date'] = $this->xAmzDate;
        ksort($this->awsHeaders);

        // Step 1: CREATE A CANONICAL REQUEST
        $canonicalURL = $this->prepareCanonicalRequest();

        // Step 2: CREATE THE STRING TO SIGN
        $stringToSign = $this->prepareStringToSign($canonicalURL);

        // Step 3: CALCULATE THE SIGNATURE
        $signature = $this->calculateSignature($stringToSign);

        // Step 4: CALCULATE AUTHORIZATION HEADER
        if ($signature) {
            $this->awsHeaders ['Authorization'] = $this->buildAuthorizationString($signature);
            return $this->awsHeaders;
        }
    }

    private function buildAuthorizationString($strSignature)
    {
        return $this->HMACAlgorithm . " " . "Credential=" . $this->accessKey . "/" . $this->getDate() . "/" . $this->regionName . "/" . $this->serviceName . "/" . $this->aws4Request . "," . "SignedHeaders=" . $this->strSignedHeader . "," . "Signature=" . $strSignature;
    }

    private function generateHex($data)
    {
        return strtolower(bin2hex(hash("sha256", $data, true)));
    }

    private function getSignatureKey($key, $date, $regionName, $serviceName)
    {
        $kSecret = "AWS4" . $key;
        $kDate = hash_hmac("sha256", $date, $kSecret, true);
        $kRegion = hash_hmac("sha256", $regionName, $kDate, true);
        $kService = hash_hmac("sha256", $serviceName, $kRegion, true);
        $kSigning = hash_hmac("sha256", $this->aws4Request, $kService, true);

        return $kSigning;
    }

    private function getTimeStamp()
    {
        return gmdate("Ymd\THis\Z");
    }

    private function getDate()
    {
        return gmdate("Ymd");
    }

    public function getRequestUrl()
    {
        return 'https://'.$this->host.$this->path;
    }
}