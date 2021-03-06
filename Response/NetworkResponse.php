<?php

namespace Artack\MxApi\Response;

use Buzz\Message\Response as BaseResponse;

/**
 * @author Patrick Landolt <patrick.landolt@artack.ch>
 */
class NetworkResponse extends BaseResponse
{

    /**
     * Is the response a 201 created?
     *
     * @return Boolean
     */
    public function isCreated()
    {
        return 201 === $this->getStatusCode();
    }

    /**
     * Is the response a 204 no content?
     *
     * @return Boolean
     */
    public function isNoContent()
    {
        return 204 === $this->getStatusCode();
    }
    
    /**
     * @return array
     */
    public function getHeadersArray()
    {
        $headerArray = array();
        
        foreach ($this->getHeaders() as $header)
        {
            $doublePointPos = strpos($header, ":");
            if (false !== $doublePointPos)
            {
                $headerName = substr($header, 0, $doublePointPos);
                $headerArray[strtolower($headerName)] = $this->getHeader($headerName);
            }
        }
        
        return $headerArray;
    }
    
}