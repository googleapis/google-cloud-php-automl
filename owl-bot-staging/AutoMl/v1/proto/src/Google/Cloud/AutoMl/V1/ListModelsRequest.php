<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1/service.proto

namespace Google\Cloud\AutoMl\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for [AutoMl.ListModels][google.cloud.automl.v1.AutoMl.ListModels].
 *
 * Generated from protobuf message <code>google.cloud.automl.v1.ListModelsRequest</code>
 */
class ListModelsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Resource name of the project, from which to list the models.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $parent = '';
    /**
     * An expression for filtering the results of the request.
     *   * `model_metadata` - for existence of the case (e.g.
     *             `video_classification_model_metadata:*`).
     *   * `dataset_id` - for = or !=. Some examples of using the filter are:
     *   * `image_classification_model_metadata:*` --> The model has
     *                                      `image_classification_model_metadata`.
     *   * `dataset_id=5` --> The model was created from a dataset with ID 5.
     *
     * Generated from protobuf field <code>string filter = 3;</code>
     */
    protected $filter = '';
    /**
     * Requested page size.
     *
     * Generated from protobuf field <code>int32 page_size = 4;</code>
     */
    protected $page_size = 0;
    /**
     * A token identifying a page of results for the server to return
     * Typically obtained via
     * [ListModelsResponse.next_page_token][google.cloud.automl.v1.ListModelsResponse.next_page_token] of the previous
     * [AutoMl.ListModels][google.cloud.automl.v1.AutoMl.ListModels] call.
     *
     * Generated from protobuf field <code>string page_token = 6;</code>
     */
    protected $page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. Resource name of the project, from which to list the models.
     *     @type string $filter
     *           An expression for filtering the results of the request.
     *             * `model_metadata` - for existence of the case (e.g.
     *                       `video_classification_model_metadata:*`).
     *             * `dataset_id` - for = or !=. Some examples of using the filter are:
     *             * `image_classification_model_metadata:*` --> The model has
     *                                                `image_classification_model_metadata`.
     *             * `dataset_id=5` --> The model was created from a dataset with ID 5.
     *     @type int $page_size
     *           Requested page size.
     *     @type string $page_token
     *           A token identifying a page of results for the server to return
     *           Typically obtained via
     *           [ListModelsResponse.next_page_token][google.cloud.automl.v1.ListModelsResponse.next_page_token] of the previous
     *           [AutoMl.ListModels][google.cloud.automl.v1.AutoMl.ListModels] call.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Resource name of the project, from which to list the models.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. Resource name of the project, from which to list the models.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * An expression for filtering the results of the request.
     *   * `model_metadata` - for existence of the case (e.g.
     *             `video_classification_model_metadata:*`).
     *   * `dataset_id` - for = or !=. Some examples of using the filter are:
     *   * `image_classification_model_metadata:*` --> The model has
     *                                      `image_classification_model_metadata`.
     *   * `dataset_id=5` --> The model was created from a dataset with ID 5.
     *
     * Generated from protobuf field <code>string filter = 3;</code>
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * An expression for filtering the results of the request.
     *   * `model_metadata` - for existence of the case (e.g.
     *             `video_classification_model_metadata:*`).
     *   * `dataset_id` - for = or !=. Some examples of using the filter are:
     *   * `image_classification_model_metadata:*` --> The model has
     *                                      `image_classification_model_metadata`.
     *   * `dataset_id=5` --> The model was created from a dataset with ID 5.
     *
     * Generated from protobuf field <code>string filter = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setFilter($var)
    {
        GPBUtil::checkString($var, True);
        $this->filter = $var;

        return $this;
    }

    /**
     * Requested page size.
     *
     * Generated from protobuf field <code>int32 page_size = 4;</code>
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * Requested page size.
     *
     * Generated from protobuf field <code>int32 page_size = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setPageSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->page_size = $var;

        return $this;
    }

    /**
     * A token identifying a page of results for the server to return
     * Typically obtained via
     * [ListModelsResponse.next_page_token][google.cloud.automl.v1.ListModelsResponse.next_page_token] of the previous
     * [AutoMl.ListModels][google.cloud.automl.v1.AutoMl.ListModels] call.
     *
     * Generated from protobuf field <code>string page_token = 6;</code>
     * @return string
     */
    public function getPageToken()
    {
        return $this->page_token;
    }

    /**
     * A token identifying a page of results for the server to return
     * Typically obtained via
     * [ListModelsResponse.next_page_token][google.cloud.automl.v1.ListModelsResponse.next_page_token] of the previous
     * [AutoMl.ListModels][google.cloud.automl.v1.AutoMl.ListModels] call.
     *
     * Generated from protobuf field <code>string page_token = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_token = $var;

        return $this;
    }

}
