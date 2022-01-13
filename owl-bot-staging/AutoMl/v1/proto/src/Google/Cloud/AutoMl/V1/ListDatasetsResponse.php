<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1/service.proto

namespace Google\Cloud\AutoMl\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for [AutoMl.ListDatasets][google.cloud.automl.v1.AutoMl.ListDatasets].
 *
 * Generated from protobuf message <code>google.cloud.automl.v1.ListDatasetsResponse</code>
 */
class ListDatasetsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The datasets read.
     *
     * Generated from protobuf field <code>repeated .google.cloud.automl.v1.Dataset datasets = 1;</code>
     */
    private $datasets;
    /**
     * A token to retrieve next page of results.
     * Pass to [ListDatasetsRequest.page_token][google.cloud.automl.v1.ListDatasetsRequest.page_token] to obtain that page.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    protected $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\AutoMl\V1\Dataset[]|\Google\Protobuf\Internal\RepeatedField $datasets
     *           The datasets read.
     *     @type string $next_page_token
     *           A token to retrieve next page of results.
     *           Pass to [ListDatasetsRequest.page_token][google.cloud.automl.v1.ListDatasetsRequest.page_token] to obtain that page.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * The datasets read.
     *
     * Generated from protobuf field <code>repeated .google.cloud.automl.v1.Dataset datasets = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDatasets()
    {
        return $this->datasets;
    }

    /**
     * The datasets read.
     *
     * Generated from protobuf field <code>repeated .google.cloud.automl.v1.Dataset datasets = 1;</code>
     * @param \Google\Cloud\AutoMl\V1\Dataset[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDatasets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AutoMl\V1\Dataset::class);
        $this->datasets = $arr;

        return $this;
    }

    /**
     * A token to retrieve next page of results.
     * Pass to [ListDatasetsRequest.page_token][google.cloud.automl.v1.ListDatasetsRequest.page_token] to obtain that page.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * A token to retrieve next page of results.
     * Pass to [ListDatasetsRequest.page_token][google.cloud.automl.v1.ListDatasetsRequest.page_token] to obtain that page.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

