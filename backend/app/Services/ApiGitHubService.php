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

        if ($data->successful()) {
            return $data->json();
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Registro não encontrado !',
                ]
            );
        }
    }

    public function getFollowers(string $user)
    {
        $data = $this->apiGitRepository->getFollowers($user);

        if ($data->successful()) {
            return $data->json();
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Registro não encontrado !',
                ]
            );
        }
    }
}
