<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * Adapter for receiving real exception from SoapFault
 *
 * @author Kirill Gusakov
 */
class InkRouter_Exceptions_SoapFaultAdapter
{
    const AUTHENTICATION_EXCEPTION = 'AuthenticationException';
    const PROCESSING_EXCEPTION = 'ProcessingException';
    const REJECTION_EXCEPTION = 'RejectionException';

    /**
     * @var SoapFault
     */
    private $fault;

    /**
     * @var Exception
     */
    private $exception;

    /**
     * @param SoapFault $fault
     */
    public function __construct(SoapFault $fault)
    {
        $this->fault = $fault;
    }

    /**
     * @param SoapFault $fault
     * @return InkRouter_Exceptions_SoapFaultAdapter
     */
    public static function valueOf(SoapFault $fault)
    {
        return new self($fault);
    }

    /**
     * @return InkRouter_Exceptions_Exception
     */
    public function getException()
    {
        if (!isset($this->exception)) {
            if (isset($this->fault->detail)) {
                $classVars = get_object_vars($this->fault->detail);
                $classProps = array_keys($classVars);
                switch ($classProps[0]) {
                    case self::AUTHENTICATION_EXCEPTION:
                        $this->exception = new InkRouter_Exceptions_AuthenticationException($this->fault->getMessage());
                        break;
                    case self::PROCESSING_EXCEPTION:
                        $this->exception = new InkRouter_Exceptions_ProcessingException($this->fault->getMessage());
                        break;
                    case self::REJECTION_EXCEPTION:
                        $this->exception = new InkRouter_Exceptions_RejectionException($this->fault->getMessage());
                        break;
                    default:
                        $this->exception = new InkRouter_Exceptions_InkRouterNotAvailableException($this->fault->getMessage());
                        break;
                }
            } else {
                $this->exception = new InkRouter_Exceptions_InkRouterNotAvailableException($this->fault->getMessage());
            }
        }

        return $this->exception;
    }
}
