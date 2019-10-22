<?php


namespace App\Middleware;


use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use function foo\func;

class BarMiddleware implements MiddlewareInterface
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
        echo "bar middleware init ...." . PHP_EOL;
        // TODO: Implement process() method.
        // override

        $request = Context::override(ServerRequestInterface::class, function (ServerRequestInterface $request) {
            return $request->withAttribute('foo','bar') ;
        });

        $response = $handler->handle($request);
        $stream = $response->getBody()->getContents();
        $stream = json_decode($stream) ;
        $stream->code = 404 ;

        return $response->withBody(new SwooleStream(json_encode($stream)));
    }
}