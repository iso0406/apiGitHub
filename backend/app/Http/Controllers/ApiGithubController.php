<?php

namespace App\Http\Controllers;

use App\Services\ApiGitHubService;
use Illuminate\Http\Request;

class ApiGithubController extends Controller
{
    
    /**
     * Private constructor
     * @param ApiGithubService $apiGitHubService
     */
    private $apiGitHubService;

    public function __construct(ApiGitHubService $apiGitHubService)
    {
        $this->apiGitHubService = $apiGitHubService;
    }

    public function show(string $user)
    {
       return $this->apiGitHubService->show($user);
    }

    public function getFollowers(string $user) 
    {
       return $this->apiGitHubService->getFollowers($user);
    }
}
