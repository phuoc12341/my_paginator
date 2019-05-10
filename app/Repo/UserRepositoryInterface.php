<?php
namespace App\Repo;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function index(Request $request);
}
