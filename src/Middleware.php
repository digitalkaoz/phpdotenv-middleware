<?php

namespace Rs\Stack\PhpDotEnv;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Middleware implements HttpKernelInterface
{
    /**
     * @var HttpKernelInterface
     */
    private $app;
    /**
     * @var
     */
    private $dir;
    /**
     * @var
     */
    private $filename = '.env';

    public function __construct(HttpKernelInterface $app, $dir, $filename = '.env')
    {
        $this->app = $app;
        $this->dir = $dir;
        $this->filename = $filename;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        $this->loadEnvironment();

        return $this->app->handle($request, $type, $catch);
    }

    private function loadEnvironment()
    {
        if (!file_exists(realpath($this->dir) . '/' . $this->filename)) {
            return false;
        }

        if (class_exists('Dotenv\Dotenv')) { //2.x branch
            $dotenv = new \Dotenv\Dotenv($this->dir, $this->filename);
            $dotenv->load();

            return true;
        } elseif (class_exists('DotEnv')) {
            \Dotenv::load($this->dir, $this->filename);

            return true;
        }

        throw new \RuntimeException('no suitable .env loader found');
    }
}
