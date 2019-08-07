<?php
/*
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/automl/v1beta1/prediction_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\AutoMl\V1beta1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\AutoMl\V1beta1\BatchPredictInputConfig;
use Google\Cloud\AutoMl\V1beta1\BatchPredictOutputConfig;
use Google\Cloud\AutoMl\V1beta1\BatchPredictRequest;
use Google\Cloud\AutoMl\V1beta1\BatchPredictResult;
use Google\Cloud\AutoMl\V1beta1\ExamplePayload;
use Google\Cloud\AutoMl\V1beta1\PredictRequest;
use Google\Cloud\AutoMl\V1beta1\PredictResponse;
use Google\LongRunning\Operation;

/**
 * Service Description: AutoML Prediction API.
 *
 * On any input that is documented to expect a string parameter in
 * snake_case or kebab-case, either of those cases is accepted.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $predictionServiceClient = new PredictionServiceClient();
 * try {
 *     $formattedName = $predictionServiceClient->modelName('[PROJECT]', '[LOCATION]', '[MODEL]');
 *     $payload = new ExamplePayload();
 *     $response = $predictionServiceClient->predict($formattedName, $payload);
 * } finally {
 *     $predictionServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class PredictionServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.automl.v1beta1.PredictionService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'automl.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];
    private static $modelNameTemplate;
    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/prediction_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/prediction_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/prediction_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/prediction_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getModelNameTemplate()
    {
        if (null == self::$modelNameTemplate) {
            self::$modelNameTemplate = new PathTemplate('projects/{project}/locations/{location}/models/{model}');
        }

        return self::$modelNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'model' => self::getModelNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a model resource.
     *
     * @param string $project
     * @param string $location
     * @param string $model
     *
     * @return string The formatted model resource.
     * @experimental
     */
    public static function modelName($project, $location, $model)
    {
        return self::getModelNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'model' => $model,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - model: projects/{project}/locations/{location}/models/{model}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     * @experimental
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started
     * by a long running API method. If $methodName is not provided, or does
     * not match a long running API method, then the operation can still be
     * resumed, but the OperationResponse object will not deserialize the
     * final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     * @experimental
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning'])
            ? $this->descriptors[$methodName]['longRunning']
            : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();

        return $operation;
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'automl.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /**
     * Perform an online prediction. The prediction result will be directly
     * returned in the response.
     * Available for following ML problems, and their expected request payloads:
     * * Image Classification - Image in .JPEG, .GIF or .PNG format, image_bytes
     *                          up to 30MB.
     * * Image Object Detection - Image in .JPEG, .GIF or .PNG format, image_bytes
     *                            up to 30MB.
     * * Text Classification - TextSnippet, content up to 60,000 characters,
     *                         UTF-8 encoded.
     * * Text Extraction - TextSnippet, content up to 30,000 characters,
     *                     UTF-8 NFC encoded.
     * * Translation - TextSnippet, content up to 25,000 characters, UTF-8
     *                 encoded.
     * * Tables - Row, with column values matching the columns of the model,
     *            up to 5MB. Not available for FORECASTING.
     *
     * [prediction_type][google.cloud.automl.v1beta1.TablesModelMetadata.prediction_type].
     *
     * Sample code:
     * ```
     * $predictionServiceClient = new PredictionServiceClient();
     * try {
     *     $formattedName = $predictionServiceClient->modelName('[PROJECT]', '[LOCATION]', '[MODEL]');
     *     $payload = new ExamplePayload();
     *     $response = $predictionServiceClient->predict($formattedName, $payload);
     * } finally {
     *     $predictionServiceClient->close();
     * }
     * ```
     *
     * @param string         $name         Name of the model requested to serve the prediction.
     * @param ExamplePayload $payload      Required.
     *                                     Payload to perform a prediction on. The payload must match the
     *                                     problem type that the model was trained to solve.
     * @param array          $optionalArgs {
     *                                     Optional.
     *
     *     @type array $params
     *          Additional domain-specific parameters, any string must be up to 25000
     *          characters long.
     *
     *          *  For Image Classification:
     *
     *             `score_threshold` - (float) A value from 0.0 to 1.0. When the model
     *              makes predictions for an image, it will only produce results that have
     *              at least this confidence score. The default is 0.5.
     *          *  For Tables:
     *             `feature_importance` - (boolean) Whether
     *
     *          [feature_importance][[google.cloud.automl.v1beta1.TablesModelColumnInfo.feature_importance]
     *                 should be populated in the returned
     *
     *          [TablesAnnotation(-s)][[google.cloud.automl.v1beta1.TablesAnnotation].
     *                 The default is false.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\AutoMl\V1beta1\PredictResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function predict($name, $payload, array $optionalArgs = [])
    {
        $request = new PredictRequest();
        $request->setName($name);
        $request->setPayload($payload);
        if (isset($optionalArgs['params'])) {
            $request->setParams($optionalArgs['params']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'Predict',
            PredictResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Perform a batch prediction. Unlike the online [Predict][google.cloud.automl.v1beta1.PredictionService.Predict], batch
     * prediction result won't be immediately available in the response. Instead,
     * a long running operation object is returned. User can poll the operation
     * result via [GetOperation][google.longrunning.Operations.GetOperation]
     * method. Once the operation is done, [BatchPredictResult][google.cloud.automl.v1beta1.BatchPredictResult] is returned in
     * the [response][google.longrunning.Operation.response] field.
     * Available for following ML problems:
     * * Video Classification
     * * Video Object Tracking
     * * Text Extraction
     * * Tables.
     *
     * Sample code:
     * ```
     * $predictionServiceClient = new PredictionServiceClient();
     * try {
     *     $formattedName = $predictionServiceClient->modelName('[PROJECT]', '[LOCATION]', '[MODEL]');
     *     $inputConfig = new BatchPredictInputConfig();
     *     $outputConfig = new BatchPredictOutputConfig();
     *     $operationResponse = $predictionServiceClient->batchPredict($formattedName, $inputConfig, $outputConfig);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $predictionServiceClient->batchPredict($formattedName, $inputConfig, $outputConfig);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $predictionServiceClient->resumeOperation($operationName, 'batchPredict');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $predictionServiceClient->close();
     * }
     * ```
     *
     * @param string                   $name         Name of the model requested to serve the batch prediction.
     * @param BatchPredictInputConfig  $inputConfig  Required. The input configuration for batch prediction.
     * @param BatchPredictOutputConfig $outputConfig Required. The Configuration specifying where output predictions should
     *                                               be written.
     * @param array                    $optionalArgs {
     *                                               Optional.
     *
     *     @type array $params
     *          Additional domain-specific parameters for the predictions, any string must
     *          be up to 25000 characters long.
     *
     *          *  For Video Classification :
     *             `score_threshold` - (float) A value from 0.0 to 1.0. When the model
     *                 makes predictions for a video, it will only produce results that
     *                 have at least this confidence score. The default is 0.5.
     *             `segment_classification` - (boolean) Set to true to request
     *                 segment-level classification. AutoML Video Intelligence returns
     *                 labels and their confidence scores for the entire segment of the
     *                 video that user specified in the request configuration.
     *                 The default is "true".
     *             `shot_classification` - (boolean) Set to true to request shot-level
     *                 classification. AutoML Video Intelligence determines the boundaries
     *                 for each camera shot in the entire segment of the video that user
     *                 specified in the request configuration. AutoML Video Intelligence
     *                 then returns labels and their confidence scores for each detected
     *                 shot, along with the start and end time of the shot.
     *                 WARNING: Model evaluation is not done for this classification type,
     *                 the quality of it depends on training data, but there are no metrics
     *                 provided to describe that quality. The default is "false".
     *             `1s_interval_classification` - (boolean) Set to true to request
     *                 classification for a video at one-second intervals. AutoML Video
     *                 Intelligence returns labels and their confidence scores for each
     *                 second of the entire segment of the video that user specified in the
     *                 request configuration.
     *                 WARNING: Model evaluation is not done for this classification
     *                 type, the quality of it depends on training data, but there are no
     *                 metrics provided to describe that quality. The default is
     *                 "false".
     *
     *          *  For Video Object Tracking:
     *             `score_threshold` - (float) When Model detects objects on video frames,
     *                 it will only produce bounding boxes which have at least this
     *                 confidence score. Value in 0 to 1 range, default is 0.5.
     *             `max_bounding_box_count` - (int64) No more than this number of bounding
     *                 boxes will be returned per frame. Default is 100, the requested
     *                 value may be limited by server.
     *             `min_bounding_box_size` - (float) Only bounding boxes with shortest edge
     *               at least that long as a relative value of video frame size will be
     *               returned. Value in 0 to 1 range. Default is 0.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function batchPredict($name, $inputConfig, $outputConfig, array $optionalArgs = [])
    {
        $request = new BatchPredictRequest();
        $request->setName($name);
        $request->setInputConfig($inputConfig);
        $request->setOutputConfig($outputConfig);
        if (isset($optionalArgs['params'])) {
            $request->setParams($optionalArgs['params']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'BatchPredict',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }
}
