<?php
declare(strict_types=1);

namespace KnotLib\ExceptionHandler\HttpError;

use Throwable;

use KnotLib\ExceptionHandler\ExceptionHandlerInterface;
use KnotLib\Exception\Runtime\HttpStatusException;

class HttpErrorHeaderExceptionHandler implements ExceptionHandlerInterface
{
    /**
     * handle an exception
     *
     * @param Throwable $e     exception to handle
     */
    public function handleException(Throwable $e) : void
    {
        if ( $e instanceof HttpStatusException )
        {
            http_response_code($e->getStatusCode());
        }
    }
}

