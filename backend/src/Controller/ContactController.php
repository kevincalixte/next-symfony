<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    // #[Route('/api/contact', name: 'app_contact')]
    // public function index(Request $req, EntityManagerInterface $em): JsonResponse
    // {
    //     $data = json_decode($req->getContent(), true) ?? [];

    //     if (empty($data["name"]) || empty($data["age"]) || empty($data["email"])) {
    //         return $this->json(["success" => false, "error" => "Champs manquants"], 400);
    //     }

    //     $user = new User();
    //     $user->setName((string)($data["name"] ?? ""));
    //     $user->setAge((int)($data["age"] ?? 0));
    //     $user->setEmail((string)($data["email"] ?? ""));

    //     $em->persist($user);
    //     $em->flush();

    //     return $this->json(["success" => true, "user" => $user]);
    // }

     #[Route('/api/contact', name: 'app_contact')]
    public function index(Request $req, EntityManagerInterface $em): JsonResponse
    {
        $name = $req->request->get("name");
        $age = $req->request->get("age");
        $email = $req->request->get("email");
        $file = $req->files->get("avatar");
     

        $user = new User();
        $user->setName((string)($name ?? ''));
        $user->setAge((int)($age ?? 0));
        $user->setEmail((string)($email ?? ''));

        if ($file) {
            $filename = uniqid().".".$file->guessExtension();
            $file->move($this->getParameter("uploads"),$filename);
            $user->setAvatar($filename);
        }

        $em->persist($user);
        $em->flush();

        return $this->json(["success" => true, "user" => $user]);
    }
}
