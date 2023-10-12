<?php

namespace App\Repositories\Interfaces;

interface IApiGItHubRepository {
    
    public function show(string $user);
    public function getFollowers(string $user);
    
}