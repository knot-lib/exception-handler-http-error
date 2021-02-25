<?php
declare(strict_types=1);

namespace KnotLib\ExceptionHandler\HttpError\Test;

use KnotLib\Exception\Runtime\HttpStatusException;
use KnotLib\ExceptionHandler\HttpError\HttpErrorHeaderExceptionHandler;
use PHPUnit\Framework\TestCase;

class HttpErrorHeaderExceptionHandlerTest extends TestCase
{
    public function testHandleException200()
    {
        http_response_code(500);

        //================================
        // 200
        //================================
        $handler = new HttpErrorHeaderExceptionHandler();

        $e = new HttpStatusException(200);

        $handler->handleException($e);

        $this->assertEquals(200, http_response_code());
    }
    public function testHandleException404()
    {
        http_response_code(500);

        //================================
        // 404
        //================================
        $handler = new HttpErrorHeaderExceptionHandler();

        $e = new HttpStatusException(404);

        $handler->handleException($e);

        $this->assertEquals(404, http_response_code());
    }
    public function testHandleExceptionNormal()
    {
        http_response_code(500);

        //================================
        // Exception
        //================================
        $handler = new HttpErrorHeaderExceptionHandler();

        $e = new \Exception("error");

        $handler->handleException($e);

        $this->assertEquals(500, http_response_code());
    }
}