<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IApiGItHubRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class ApiGitHubRepository implements IApiGItHubRepository 
{

    protected $urlApiGit;

    public function __construct()
    {
        $this->urlApiGit = "https://api.github.com/users/";
    }

    public function show(string $user): Response
    {
        return Http::get($this->urlApiGit . $user);
    }

    public function getFollowers(string $user)
    {
        return Http::get($this->urlApiGit . $user . '/followers');
    }

}