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
}
