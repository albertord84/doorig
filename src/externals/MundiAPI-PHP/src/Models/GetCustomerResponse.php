<?php
/*
 * MundiAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MundiAPILib\Models;

use JsonSerializable;

/**
 * Response object for getting a customer
 */
class GetCustomerResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $email public property
     */
    public $email;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $delinquent public property
     */
    public $delinquent;

    /**
     * @todo Write general description for this property
     * @required
     * @maps created_at
     * @var string $createdAt public property
     */
    public $createdAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps updated_at
     * @var string $updatedAt public property
     */
    public $updatedAt;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $document public property
     */
    public $document;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * @todo Write general description for this property
     * @required
     * @maps fb_access_token
     * @var string $fbAccessToken public property
     */
    public $fbAccessToken;

    /**
     * @todo Write general description for this property
     * @required
     * @var GetAddressResponse $address public property
     */
    public $address;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @required
     * @var GetPhonesResponse $phones public property
     */
    public $phones;

    /**
     * @todo Write general description for this property
     * @maps fb_id
     * @var integer|null $fbId public property
     */
    public $fbId;

    /**
     * Constructor to set initial or default values of member properties
     * @param string             $id            Initialization value for $this->id
     * @param string             $name          Initialization value for $this->name
     * @param string             $email         Initialization value for $this->email
     * @param bool               $delinquent    Initialization value for $this->delinquent
     * @param string             $createdAt     Initialization value for $this->createdAt
     * @param string             $updatedAt     Initialization value for $this->updatedAt
     * @param string             $document      Initialization value for $this->document
     * @param string             $type          Initialization value for $this->type
     * @param string             $fbAccessToken Initialization value for $this->fbAccessToken
     * @param GetAddressResponse $address       Initialization value for $this->address
     * @param array              $metadata      Initialization value for $this->metadata
     * @param GetPhonesResponse  $phones        Initialization value for $this->phones
     * @param integer            $fbId          Initialization value for $this->fbId
     */
    public function __construct()
    {
        if (13 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->name          = func_get_arg(1);
            $this->email         = func_get_arg(2);
            $this->delinquent    = func_get_arg(3);
            $this->createdAt     = func_get_arg(4);
            $this->updatedAt     = func_get_arg(5);
            $this->document      = func_get_arg(6);
            $this->type          = func_get_arg(7);
            $this->fbAccessToken = func_get_arg(8);
            $this->address       = func_get_arg(9);
            $this->metadata      = func_get_arg(10);
            $this->phones        = func_get_arg(11);
            $this->fbId          = func_get_arg(12);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']              = $this->id;
        $json['name']            = $this->name;
        $json['email']           = $this->email;
        $json['delinquent']      = $this->delinquent;
        $json['created_at']      = $this->createdAt;
        $json['updated_at']      = $this->updatedAt;
        $json['document']        = $this->document;
        $json['type']            = $this->type;
        $json['fb_access_token'] = $this->fbAccessToken;
        $json['address']         = $this->address;
        $json['metadata']        = $this->metadata;
        $json['phones']          = $this->phones;
        $json['fb_id']           = $this->fbId;

        return $json;
    }
}
