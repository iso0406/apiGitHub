<?php

namespace App\Http\Controllers;

use App\Services\ApiGitHubService;
use Illuminate\Http\Request;

class ApiGithubController extends Controller
{
    private $apiGitHubService;

    public function __construct(ApiGitHubService $apiGitHubService)
    {
        $this->apiGitHubService = $apiGitHubService;
    }

    public function index()
    {
        dd('Aqui index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user)
    {
       return $this->apiGitHubService->show($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
