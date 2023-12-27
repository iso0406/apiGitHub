<?php

namespace App\Http\Controllers;

use App\Services\ApiGitHubService;
use Carbon\Carbon;
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

    public function data(Request $request)
    {
       $data = "2023-10-10";
       $dataTeste = Carbon::createFromFormat('Y-m-d', $data)->format('Y-m-d H:i:s');
    }

    public function show(string $user)
    {
       $data = Carbon::createFromFormat('Y-m-d', $user)->setTimeToNow()->format('Y-m-d H:i:s');
       return $this->apiGitHubService->show($user);
    }

    public function getFollowers(string $user) 
    {
       return $this->apiGitHubService->getFollowers($user);
    }
}
