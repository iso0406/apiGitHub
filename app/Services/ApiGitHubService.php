<?php

namespace App\Services;

use App\Repositories\ApiGitHubRepository;

class ApiGitHubService {

    private $apiGitRepository;

    public function __construct(ApiGitHubRepository $apiGitRepository)
    {
        $this->apiGitRepository = $apiGitRepository;
    }

    public function show(string $user) 
    {
        dd('aqui services');
    }

}
