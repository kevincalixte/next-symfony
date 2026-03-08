<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class UserApiController extends AbstractController
{
    #[Route('/api/users', name: 'app_users')]
    public function index(UserRepository $ur): JsonResponse
    {

        $users = $ur->findAll();
        $data = array_map(fn($user) => [
            "id" => $user->getId(),
            "name" => $user->getName(),
            "age" => $user->getAge(),
            "email" => $user->getEmail(),
        ], $users);

        return $this->json($data);
    }

    #[Route('/api/users/id/{id}', name: 'app_user_id')]
    public function userid(UserRepository $ur, int $id): JsonResponse
    {

        $user = $ur->find($id);
        // dd($user);

        return $this->json($user);
    }

    #[Route('/api/users/name/{name}', name: 'app_user_name')]
    public function username(UserRepository $ur, string $name): JsonResponse
    {

        $user = $ur->findOneBy(["name" => $name]);
        // dd($user);

        return $this->json($user);
    }

    #[Route('/api/users/me', name: 'app_user_me')]
    public function me(UserRepository $ur): JsonResponse
    {

        $name = "Alice";
        $user = $ur->findOneBy(["name" => $name]);


        return $this->json($user);
    }
    
}
