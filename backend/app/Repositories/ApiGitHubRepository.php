<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IApiGItHubRepository;
use Illuminate\Support\Facades\Http;

class ApiGitHubRepository implements IApiGItHubRepository 
{

    protected $urlApiGit;

    public function __construct()
    {
        $this->urlApiGit = "https://api.github.com/users/";
    }

    public function show(string $user)
    {
        return Http::get($this->urlApiGit . $user);
    }

}