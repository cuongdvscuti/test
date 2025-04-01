<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Http\Response;

trait ApiResponseHelper
{
    /**
     * send response to ajax request
     *
     * @param  string  $message
     * @param  null  $data
     * @param  int  $statusCode
     * @param  array  $headers
     * @return Response
     */
    public function sendResponse($data = null, $message = '', $statusCode = 200, $headers = [])
    {
        $d = [
            'status' => $statusCode,
            'message' => $message,
            'data' => $data,
        ];

        return response($d, $statusCode, $headers);
    }

    /**
     * send ok response
     *
     * @param  array  $data
     * @return Response
     */
    public function sendResponseOk($data = [], string $message = 'Ok.', array $headers = [])
    {
        return $this->sendResponse($data, $message, 200, $headers);
    }

    /**
     * send a not found response
     *
     * @return Response
     */
    public function sendResponseNotFound(string $message = 'Resource not found.', array $headers = [])
    {
        return $this->sendResponse([], $message, 404, $headers);
    }

    /**
     * send a Unauthenticated response
     *
     * @return Response
     */
    public function sendResponseUnauthenRequest(string $message = 'Bad Request.', array $headers = [])
    {
        return $this->sendResponse([], $message, 401, $headers);
    }

    /**
     * send a bad request response
     *
     * @return Response
     */
    public function sendResponseBadRequest(string $message = 'Bad Request.', array $headers = [])
    {
        return $this->sendResponse([], $message, 400, $headers);
    }

    /**
     * send a bad validate response
     *
     * @param  array  $data
     * @return Response
     */
    public function sendResponseBadValidate($data = [], string $message = 'Bad validation', array $headers = [])
    {
        return $this->sendResponse($data, $message, 422, $headers);
    }

    /**
     * send created response
     *
     * @param  array  $data
     * @return Response
     */
    public function sendResponseCreated($data = [], string $message = 'Resource created.', array $headers = [])
    {
        return $this->sendResponse($data, $message, 201, $headers);
    }

    /**
     * send updated response
     *
     * @param  array  $data
     * @return Response
     */
    public function sendResponseUpdated($data = [], string $message = 'Resource updated.', array $headers = [])
    {
        return $this->sendResponse($data, $message, 200, $headers);
    }

    /**
     * send deleted response
     *
     * @return Response
     */
    public function sendResponseDeleted(string $message = 'Resource deleted.', array $headers = [])
    {
        return $this->sendResponse([], $message, 200, $headers);
    }

    /**
     * send forbidden response
     *
     * @return Response
     */
    public function sendResponseForbidden(string $message = 'Action forbidden.', array $headers = [])
    {
        return $this->sendResponse([], $message, 403, $headers);
    }

    /**
     * send with total data
     *
     * @param  null  $data
     * @param  string  $message
     * @param  array  $totals
     * @param  int  $statusCode
     * @return Response
     */
    public function sendResponseWithTotal($data = null, $totals = [], $message = '', $statusCode = 201)
    {
        $d = [
            'message' => $message,
            'data' => $data,
            'totals' => $totals,
        ];

        return response($d, $statusCode, []);
    }

    /**
     * send no content
     *
     * @return Response
     */
    public function sendResponseNoContent()
    {
        return response(null, 204);
    }

    /**
     * send a bad validate response
     *
     * @param  string  $message
     * @param  array  $data
     * @return Response
     */
    public function sendResponseErrorsValidate($data = [], $message = [], array $headers = [])
    {
        return $this->sendResponse($data, $message, 422, $headers);
    }

    /**
     * send a response expired time
     *
     * @return Response
     */
    public function sendResponseExpiryTime(string $message = 'Expiry time.', array $headers = [])
    {
        return $this->sendResponse([], $message, 419, $headers);
    }

    /**
     * send a response server error
     *
     * @return Response
     */
    public function sendResponseServerError(string $message = 'Server Error.', array $headers = [])
    {
        return $this->sendResponse([], $message, 500, $headers);
    }

    public function abort($code, $message = '')
    {

        if ($code == 404 && $message == '') {
            $message = __('Not found');
        }

        if ($code == 403 && $message == '') {
            $message = __('Forbidden');
        }

        if ($code == 500 && $message == '') {
            $message = __('Server error');
        }

        abort(response(['status' => $code, 'message' => $message], $code));
    }
}
