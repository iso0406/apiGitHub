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
        $data = $this->apiGitRepository->show($user);

        if (isset($data)) {
            return $data;
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Registro não encontrado !',
                ]
            ); 
        };
    }

}
