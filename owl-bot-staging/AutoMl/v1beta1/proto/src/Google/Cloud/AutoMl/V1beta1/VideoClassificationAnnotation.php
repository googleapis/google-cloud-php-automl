<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/classification.proto

namespace Google\Cloud\AutoMl\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains annotation details specific to video classification.
 *
 * Generated from protobuf message <code>google.cloud.automl.v1beta1.VideoClassificationAnnotation</code>
 */
class VideoClassificationAnnotation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Expresses the type of video classification. Possible values:
     * *  `segment` - Classification done on a specified by user
     *        time segment of a video. AnnotationSpec is answered to be present
     *        in that time segment, if it is present in any part of it. The video
     *        ML model evaluations are done only for this type of classification.
     * *  `shot`- Shot-level classification.
     *        AutoML Video Intelligence determines the boundaries
     *        for each camera shot in the entire segment of the video that user
     *        specified in the request configuration. AutoML Video Intelligence
     *        then returns labels and their confidence scores for each detected
     *        shot, along with the start and end time of the shot.
     *        WARNING: Model evaluation is not done for this classification type,
     *        the quality of it depends on training data, but there are no
     *        metrics provided to describe that quality.
     * *  `1s_interval` - AutoML Video Intelligence returns labels and their
     *        confidence scores for each second of the entire segment of the video
     *        that user specified in the request configuration.
     *        WARNING: Model evaluation is not done for this classification type,
     *        the quality of it depends on training data, but there are no
     *        metrics provided to describe that quality.
     *
     * Generated from protobuf field <code>string type = 1;</code>
     */
    protected $type = '';
    /**
     * Output only . The classification details of this annotation.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationAnnotation classification_annotation = 2;</code>
     */
    protected $classification_annotation = null;
    /**
     * Output only . The time segment of the video to which the
     * annotation applies.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.TimeSegment time_segment = 3;</code>
     */
    protected $time_segment = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $type
     *           Output only. Expresses the type of video classification. Possible values:
     *           *  `segment` - Classification done on a specified by user
     *                  time segment of a video. AnnotationSpec is answered to be present
     *                  in that time segment, if it is present in any part of it. The video
     *                  ML model evaluations are done only for this type of classification.
     *           *  `shot`- Shot-level classification.
     *                  AutoML Video Intelligence determines the boundaries
     *                  for each camera shot in the entire segment of the video that user
     *                  specified in the request configuration. AutoML Video Intelligence
     *                  then returns labels and their confidence scores for each detected
     *                  shot, along with the start and end time of the shot.
     *                  WARNING: Model evaluation is not done for this classification type,
     *                  the quality of it depends on training data, but there are no
     *                  metrics provided to describe that quality.
     *           *  `1s_interval` - AutoML Video Intelligence returns labels and their
     *                  confidence scores for each second of the entire segment of the video
     *                  that user specified in the request configuration.
     *                  WARNING: Model evaluation is not done for this classification type,
     *                  the quality of it depends on training data, but there are no
     *                  metrics provided to describe that quality.
     *     @type \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation $classification_annotation
     *           Output only . The classification details of this annotation.
     *     @type \Google\Cloud\AutoMl\V1beta1\TimeSegment $time_segment
     *           Output only . The time segment of the video to which the
     *           annotation applies.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Classification::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Expresses the type of video classification. Possible values:
     * *  `segment` - Classification done on a specified by user
     *        time segment of a video. AnnotationSpec is answered to be present
     *        in that time segment, if it is present in any part of it. The video
     *        ML model evaluations are done only for this type of classification.
     * *  `shot`- Shot-level classification.
     *        AutoML Video Intelligence determines the boundaries
     *        for each camera shot in the entire segment of the video that user
     *        specified in the request configuration. AutoML Video Intelligence
     *        then returns labels and their confidence scores for each detected
     *        shot, along with the start and end time of the shot.
     *        WARNING: Model evaluation is not done for this classification type,
     *        the quality of it depends on training data, but there are no
     *        metrics provided to describe that quality.
     * *  `1s_interval` - AutoML Video Intelligence returns labels and their
     *        confidence scores for each second of the entire segment of the video
     *        that user specified in the request configuration.
     *        WARNING: Model evaluation is not done for this classification type,
     *        the quality of it depends on training data, but there are no
     *        metrics provided to describe that quality.
     *
     * Generated from protobuf field <code>string type = 1;</code>
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. Expresses the type of video classification. Possible values:
     * *  `segment` - Classification done on a specified by user
     *        time segment of a video. AnnotationSpec is answered to be present
     *        in that time segment, if it is present in any part of it. The video
     *        ML model evaluations are done only for this type of classification.
     * *  `shot`- Shot-level classification.
     *        AutoML Video Intelligence determines the boundaries
     *        for each camera shot in the entire segment of the video that user
     *        specified in the request configuration. AutoML Video Intelligence
     *        then returns labels and their confidence scores for each detected
     *        shot, along with the start and end time of the shot.
     *        WARNING: Model evaluation is not done for this classification type,
     *        the quality of it depends on training data, but there are no
     *        metrics provided to describe that quality.
     * *  `1s_interval` - AutoML Video Intelligence returns labels and their
     *        confidence scores for each second of the entire segment of the video
     *        that user specified in the request configuration.
     *        WARNING: Model evaluation is not done for this classification type,
     *        the quality of it depends on training data, but there are no
     *        metrics provided to describe that quality.
     *
     * Generated from protobuf field <code>string type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->type = $var;

        return $this;
    }

    /**
     * Output only . The classification details of this annotation.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationAnnotation classification_annotation = 2;</code>
     * @return \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation|null
     */
    public function getClassificationAnnotation()
    {
        return $this->classification_annotation;
    }

    public function hasClassificationAnnotation()
    {
        return isset($this->classification_annotation);
    }

    public function clearClassificationAnnotation()
    {
        unset($this->classification_annotation);
    }

    /**
     * Output only . The classification details of this annotation.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationAnnotation classification_annotation = 2;</code>
     * @param \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation $var
     * @return $this
     */
    public function setClassificationAnnotation($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation::class);
        $this->classification_annotation = $var;

        return $this;
    }

    /**
     * Output only . The time segment of the video to which the
     * annotation applies.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.TimeSegment time_segment = 3;</code>
     * @return \Google\Cloud\AutoMl\V1beta1\TimeSegment|null
     */
    public function getTimeSegment()
    {
        return $this->time_segment;
    }

    public function hasTimeSegment()
    {
        return isset($this->time_segment);
    }

    public function clearTimeSegment()
    {
        unset($this->time_segment);
    }

    /**
     * Output only . The time segment of the video to which the
     * annotation applies.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.TimeSegment time_segment = 3;</code>
     * @param \Google\Cloud\AutoMl\V1beta1\TimeSegment $var
     * @return $this
     */
    public function setTimeSegment($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AutoMl\V1beta1\TimeSegment::class);
        $this->time_segment = $var;

        return $this;
    }

}
