<?php

namespace spec\Rs\Stack\PhpDotEnv;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rs\Stack\PhpDotEnv\Middleware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * @mixin Middleware
 */
class MiddlewareSpec extends ObjectBehavior
{
    private $file;

    public function let(HttpKernelInterface $kernel, Response $response)
    {
        $kernel->handle(Argument::type(Request::class), Argument::type('int'), Argument::type('bool'))->willReturn($response);

        if (!$this->file) {
            $this->file = tempnam(sys_get_temp_dir(), 'dotenv_middleware');
            file_put_contents($this->file, 'FOO=bar');
        }

        $this->beConstructedWith($kernel, sys_get_temp_dir(), basename($this->file));
    }

    public function letGo()
    {
        @unlink($this->file);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Middleware::class);
        $this->shouldImplement(HttpKernelInterface::class);
    }

    public function it_does_nothing_if_there_is_no_env_file(HttpKernelInterface $kernel, Request $request)
    {
        $this->beConstructedWith($kernel, sys_get_temp_dir(), 'foo');

        $this->handle($request)->shouldHaveType(Response::class);
    }

    public function it_loads_the_env_file_if_exists(Request $request)
    {
        $this->handle($request)->shouldHaveType(Response::class);

        $this->shouldHaveLoadedEnvVar('FOO', 'bar');
    }

    public function getMatchers()
    {
        return [
            'haveLoadedEnvVar' => function ($subject, $key, $value) {
                return getenv($key) && $value === getenv($key);
            },
        ];
    }
}
