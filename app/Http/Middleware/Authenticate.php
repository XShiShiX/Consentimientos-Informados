<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    private $name;
    private $password;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  Request  $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->name;
    }
}
