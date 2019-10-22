<?php


namespace App\Middleware;


use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class UnifiedResponseMiddleware
 * @package App\Middleware
 */
class UnifiedResponseMiddleware implements MiddlewareInterface
{

    /**
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request) ;
        // get response content
        $resp_stream = $response->getBody()->getContents() ;
        return $response->withHeader("content-type","application/json")->withBody($this->unify($resp_stream)) ;
    }

    /**
     * @param string $responseString
     * @return SwooleStream
     */
    private function unify(string $responseString): SwooleStream
    {
        return new SwooleStream($this->withResponse($responseString)) ;
    }

    /**
     * @param string $responseString
     * @return string
     */
    private function withResponse(string $responseString): string
    {
        return (new class($responseString){
            public $errno = "0000" ;
            public $data ;
            public $req_url ;

            public function __construct($responseString)
            {
                $responseString = is_object(json_decode($responseString)) ? json_decode($responseString): $responseString ;
                $this->data = $responseString ;
                $req_url = (Context::get(ServerRequestInterface::class))->getUri()->getPath() ;
                $this->req_url = $req_url ;
            }

            public function __toString()
            {
                // TODO: Implement __toString() method.
                return json_encode($this) ;
            }
        });
    }

}