<?php


namespace App\EventListeners;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getException();

        $response = new Response();

        if ($exception instanceof HttpExceptionInterface) {
            $code = $exception->getStatusCode();
            $response->setStatusCode($code);
            $response->headers->replace($exception->getHeaders());
        } else {
            $code = $exception->getCode() !== 0 ? $exception->getCode() : Response::HTTP_UNPROCESSABLE_ENTITY;
            $response->setStatusCode($code);
        }

        $message = [
            'message' => $exception->getMessage(),
            'code'    => $code,
        ];

        $response->setContent(json_encode($message));

        $event->setResponse($response);
    }
}