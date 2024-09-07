<?php
/*
 * Copyright 2024 Google LLC
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
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/automl/v1/service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\AutoMl\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\AutoMl\V1\AnnotationSpec;
use Google\Cloud\AutoMl\V1\CreateDatasetRequest;
use Google\Cloud\AutoMl\V1\CreateModelRequest;
use Google\Cloud\AutoMl\V1\Dataset;
use Google\Cloud\AutoMl\V1\DeleteDatasetRequest;
use Google\Cloud\AutoMl\V1\DeleteModelRequest;
use Google\Cloud\AutoMl\V1\DeployModelRequest;
use Google\Cloud\AutoMl\V1\ExportDataRequest;
use Google\Cloud\AutoMl\V1\ExportModelRequest;
use Google\Cloud\AutoMl\V1\GetAnnotationSpecRequest;
use Google\Cloud\AutoMl\V1\GetDatasetRequest;
use Google\Cloud\AutoMl\V1\GetModelEvaluationRequest;
use Google\Cloud\AutoMl\V1\GetModelRequest;
use Google\Cloud\AutoMl\V1\ImportDataRequest;
use Google\Cloud\AutoMl\V1\ListDatasetsRequest;
use Google\Cloud\AutoMl\V1\ListModelEvaluationsRequest;
use Google\Cloud\AutoMl\V1\ListModelsRequest;
use Google\Cloud\AutoMl\V1\Model;
use Google\Cloud\AutoMl\V1\ModelEvaluation;
use Google\Cloud\AutoMl\V1\UndeployModelRequest;
use Google\Cloud\AutoMl\V1\UpdateDatasetRequest;
use Google\Cloud\AutoMl\V1\UpdateModelRequest;
use Google\LongRunning\Client\OperationsClient;
use Google\LongRunning\Operation;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: AutoML Server API.
 *
 * The resource names are assigned by the server.
 * The server never reuses names that it has created after the resources with
 * those names are deleted.
 *
 * An ID of a resource is the last element of the item's resource name. For
 * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`, then
 * the id for the item is `{dataset_id}`.
 *
 * Currently the only supported `location_id` is "us-central1".
 *
 * On any input that is documented to expect a string parameter in
 * snake_case or dash-case, either of those cases is accepted.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface createDatasetAsync(CreateDatasetRequest $request, array $optionalArgs = [])
 * @method PromiseInterface createModelAsync(CreateModelRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteDatasetAsync(DeleteDatasetRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteModelAsync(DeleteModelRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deployModelAsync(DeployModelRequest $request, array $optionalArgs = [])
 * @method PromiseInterface exportDataAsync(ExportDataRequest $request, array $optionalArgs = [])
 * @method PromiseInterface exportModelAsync(ExportModelRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getAnnotationSpecAsync(GetAnnotationSpecRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getDatasetAsync(GetDatasetRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getModelAsync(GetModelRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getModelEvaluationAsync(GetModelEvaluationRequest $request, array $optionalArgs = [])
 * @method PromiseInterface importDataAsync(ImportDataRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listDatasetsAsync(ListDatasetsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listModelEvaluationsAsync(ListModelEvaluationsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listModelsAsync(ListModelsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface undeployModelAsync(UndeployModelRequest $request, array $optionalArgs = [])
 * @method PromiseInterface updateDatasetAsync(UpdateDatasetRequest $request, array $optionalArgs = [])
 * @method PromiseInterface updateModelAsync(UpdateModelRequest $request, array $optionalArgs = [])
 */
final class AutoMlClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.automl.v1.AutoMl';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'automl.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'automl.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = ['https://www.googleapis.com/auth/cloud-platform'];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/auto_ml_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/auto_ml_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/auto_ml_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/auto_ml_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
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
     * Create the default operation client for the service.
     *
     * @param array $options ClientOptions for the client.
     *
     * @return OperationsClient
     */
    private function createOperationsClient(array $options)
    {
        // Unset client-specific configuration options
        unset($options['serviceName'], $options['clientConfig'], $options['descriptorsConfigPath']);

        if (isset($options['operationsClient'])) {
            return $options['operationsClient'];
        }

        return new OperationsClient($options);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * annotation_spec resource.
     *
     * @param string $project
     * @param string $location
     * @param string $dataset
     * @param string $annotationSpec
     *
     * @return string The formatted annotation_spec resource.
     */
    public static function annotationSpecName(
        string $project,
        string $location,
        string $dataset,
        string $annotationSpec
    ): string {
        return self::getPathTemplate('annotationSpec')->render([
            'project' => $project,
            'location' => $location,
            'dataset' => $dataset,
            'annotation_spec' => $annotationSpec,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a dataset
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $dataset
     *
     * @return string The formatted dataset resource.
     */
    public static function datasetName(string $project, string $location, string $dataset): string
    {
        return self::getPathTemplate('dataset')->render([
            'project' => $project,
            'location' => $location,
            'dataset' => $dataset,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a location
     * resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     */
    public static function locationName(string $project, string $location): string
    {
        return self::getPathTemplate('location')->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a model
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $model
     *
     * @return string The formatted model resource.
     */
    public static function modelName(string $project, string $location, string $model): string
    {
        return self::getPathTemplate('model')->render([
            'project' => $project,
            'location' => $location,
            'model' => $model,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * model_evaluation resource.
     *
     * @param string $project
     * @param string $location
     * @param string $model
     * @param string $modelEvaluation
     *
     * @return string The formatted model_evaluation resource.
     */
    public static function modelEvaluationName(
        string $project,
        string $location,
        string $model,
        string $modelEvaluation
    ): string {
        return self::getPathTemplate('modelEvaluation')->render([
            'project' => $project,
            'location' => $location,
            'model' => $model,
            'model_evaluation' => $modelEvaluation,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - annotationSpec: projects/{project}/locations/{location}/datasets/{dataset}/annotationSpecs/{annotation_spec}
     * - dataset: projects/{project}/locations/{location}/datasets/{dataset}
     * - location: projects/{project}/locations/{location}
     * - model: projects/{project}/locations/{location}/models/{model}
     * - modelEvaluation: projects/{project}/locations/{location}/models/{model}/modelEvaluations/{model_evaluation}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
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
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates a dataset.
     *
     * The async variant is {@see AutoMlClient::createDatasetAsync()} .
     *
     * @example samples/V1/AutoMlClient/create_dataset.php
     *
     * @param CreateDatasetRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createDataset(CreateDatasetRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('CreateDataset', $request, $callOptions)->wait();
    }

    /**
     * Creates a model.
     * Returns a Model in the [response][google.longrunning.Operation.response]
     * field when it completes.
     * When you create a model, several model evaluations are created for it:
     * a global evaluation, and one evaluation for each annotation spec.
     *
     * The async variant is {@see AutoMlClient::createModelAsync()} .
     *
     * @example samples/V1/AutoMlClient/create_model.php
     *
     * @param CreateModelRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createModel(CreateModelRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('CreateModel', $request, $callOptions)->wait();
    }

    /**
     * Deletes a dataset and all of its contents.
     * Returns empty response in the
     * [response][google.longrunning.Operation.response] field when it completes,
     * and `delete_details` in the
     * [metadata][google.longrunning.Operation.metadata] field.
     *
     * The async variant is {@see AutoMlClient::deleteDatasetAsync()} .
     *
     * @example samples/V1/AutoMlClient/delete_dataset.php
     *
     * @param DeleteDatasetRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteDataset(DeleteDatasetRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('DeleteDataset', $request, $callOptions)->wait();
    }

    /**
     * Deletes a model.
     * Returns `google.protobuf.Empty` in the
     * [response][google.longrunning.Operation.response] field when it completes,
     * and `delete_details` in the
     * [metadata][google.longrunning.Operation.metadata] field.
     *
     * The async variant is {@see AutoMlClient::deleteModelAsync()} .
     *
     * @example samples/V1/AutoMlClient/delete_model.php
     *
     * @param DeleteModelRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteModel(DeleteModelRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('DeleteModel', $request, $callOptions)->wait();
    }

    /**
     * Deploys a model. If a model is already deployed, deploying it with the
     * same parameters has no effect. Deploying with different parametrs
     * (as e.g. changing
     * [node_number][google.cloud.automl.v1p1beta.ImageObjectDetectionModelDeploymentMetadata.node_number])
     * will reset the deployment state without pausing the model's availability.
     *
     * Only applicable for Text Classification, Image Object Detection , Tables, and Image Segmentation; all other domains manage
     * deployment automatically.
     *
     * Returns an empty response in the
     * [response][google.longrunning.Operation.response] field when it completes.
     *
     * The async variant is {@see AutoMlClient::deployModelAsync()} .
     *
     * @example samples/V1/AutoMlClient/deploy_model.php
     *
     * @param DeployModelRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deployModel(DeployModelRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('DeployModel', $request, $callOptions)->wait();
    }

    /**
     * Exports dataset's data to the provided output location.
     * Returns an empty response in the
     * [response][google.longrunning.Operation.response] field when it completes.
     *
     * The async variant is {@see AutoMlClient::exportDataAsync()} .
     *
     * @example samples/V1/AutoMlClient/export_data.php
     *
     * @param ExportDataRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function exportData(ExportDataRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('ExportData', $request, $callOptions)->wait();
    }

    /**
     * Exports a trained, "export-able", model to a user specified Google Cloud
     * Storage location. A model is considered export-able if and only if it has
     * an export format defined for it in
     * [ModelExportOutputConfig][google.cloud.automl.v1.ModelExportOutputConfig].
     *
     * Returns an empty response in the
     * [response][google.longrunning.Operation.response] field when it completes.
     *
     * The async variant is {@see AutoMlClient::exportModelAsync()} .
     *
     * @example samples/V1/AutoMlClient/export_model.php
     *
     * @param ExportModelRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function exportModel(ExportModelRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('ExportModel', $request, $callOptions)->wait();
    }

    /**
     * Gets an annotation spec.
     *
     * The async variant is {@see AutoMlClient::getAnnotationSpecAsync()} .
     *
     * @example samples/V1/AutoMlClient/get_annotation_spec.php
     *
     * @param GetAnnotationSpecRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AnnotationSpec
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getAnnotationSpec(GetAnnotationSpecRequest $request, array $callOptions = []): AnnotationSpec
    {
        return $this->startApiCall('GetAnnotationSpec', $request, $callOptions)->wait();
    }

    /**
     * Gets a dataset.
     *
     * The async variant is {@see AutoMlClient::getDatasetAsync()} .
     *
     * @example samples/V1/AutoMlClient/get_dataset.php
     *
     * @param GetDatasetRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Dataset
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getDataset(GetDatasetRequest $request, array $callOptions = []): Dataset
    {
        return $this->startApiCall('GetDataset', $request, $callOptions)->wait();
    }

    /**
     * Gets a model.
     *
     * The async variant is {@see AutoMlClient::getModelAsync()} .
     *
     * @example samples/V1/AutoMlClient/get_model.php
     *
     * @param GetModelRequest $request     A request to house fields associated with the call.
     * @param array           $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Model
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getModel(GetModelRequest $request, array $callOptions = []): Model
    {
        return $this->startApiCall('GetModel', $request, $callOptions)->wait();
    }

    /**
     * Gets a model evaluation.
     *
     * The async variant is {@see AutoMlClient::getModelEvaluationAsync()} .
     *
     * @example samples/V1/AutoMlClient/get_model_evaluation.php
     *
     * @param GetModelEvaluationRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ModelEvaluation
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getModelEvaluation(GetModelEvaluationRequest $request, array $callOptions = []): ModelEvaluation
    {
        return $this->startApiCall('GetModelEvaluation', $request, $callOptions)->wait();
    }

    /**
     * Imports data into a dataset.
     * For Tables this method can only be called on an empty Dataset.
     *
     * For Tables:
     * *   A
     * [schema_inference_version][google.cloud.automl.v1.InputConfig.params]
     * parameter must be explicitly set.
     * Returns an empty response in the
     * [response][google.longrunning.Operation.response] field when it completes.
     *
     * The async variant is {@see AutoMlClient::importDataAsync()} .
     *
     * @example samples/V1/AutoMlClient/import_data.php
     *
     * @param ImportDataRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function importData(ImportDataRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('ImportData', $request, $callOptions)->wait();
    }

    /**
     * Lists datasets in a project.
     *
     * The async variant is {@see AutoMlClient::listDatasetsAsync()} .
     *
     * @example samples/V1/AutoMlClient/list_datasets.php
     *
     * @param ListDatasetsRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listDatasets(ListDatasetsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListDatasets', $request, $callOptions);
    }

    /**
     * Lists model evaluations.
     *
     * The async variant is {@see AutoMlClient::listModelEvaluationsAsync()} .
     *
     * @example samples/V1/AutoMlClient/list_model_evaluations.php
     *
     * @param ListModelEvaluationsRequest $request     A request to house fields associated with the call.
     * @param array                       $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listModelEvaluations(
        ListModelEvaluationsRequest $request,
        array $callOptions = []
    ): PagedListResponse {
        return $this->startApiCall('ListModelEvaluations', $request, $callOptions);
    }

    /**
     * Lists models.
     *
     * The async variant is {@see AutoMlClient::listModelsAsync()} .
     *
     * @example samples/V1/AutoMlClient/list_models.php
     *
     * @param ListModelsRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listModels(ListModelsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListModels', $request, $callOptions);
    }

    /**
     * Undeploys a model. If the model is not deployed this method has no effect.
     *
     * Only applicable for Text Classification, Image Object Detection and Tables;
     * all other domains manage deployment automatically.
     *
     * Returns an empty response in the
     * [response][google.longrunning.Operation.response] field when it completes.
     *
     * The async variant is {@see AutoMlClient::undeployModelAsync()} .
     *
     * @example samples/V1/AutoMlClient/undeploy_model.php
     *
     * @param UndeployModelRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function undeployModel(UndeployModelRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('UndeployModel', $request, $callOptions)->wait();
    }

    /**
     * Updates a dataset.
     *
     * The async variant is {@see AutoMlClient::updateDatasetAsync()} .
     *
     * @example samples/V1/AutoMlClient/update_dataset.php
     *
     * @param UpdateDatasetRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Dataset
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateDataset(UpdateDatasetRequest $request, array $callOptions = []): Dataset
    {
        return $this->startApiCall('UpdateDataset', $request, $callOptions)->wait();
    }

    /**
     * Updates a model.
     *
     * The async variant is {@see AutoMlClient::updateModelAsync()} .
     *
     * @example samples/V1/AutoMlClient/update_model.php
     *
     * @param UpdateModelRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Model
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateModel(UpdateModelRequest $request, array $callOptions = []): Model
    {
        return $this->startApiCall('UpdateModel', $request, $callOptions)->wait();
    }
}
