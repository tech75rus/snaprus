<?php

namespace App\Controller;

use App\Entity\Likes;
use App\Entity\User;
use App\Repository\LikesRepository;
use App\Repository\WorkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/api/registration-user', name: 'registration-user', methods: ['POST'])]
    public function registerUser(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hashPassword): ?Response
    {
        if (!$request->request->has('name') && !$request->request->has('password')) {
            return new Response('Введите имя и пароль', 401);
        }
        $name = $request->request->get('name');
        $password = $request->request->get('password');
        $random = new \Random\Randomizer();
        $token = md5(time()) . $random->getBytesFromString('abcdef0123456789', 36);
        $user = new User();
        $user->setUsername($name);
        $user->setPassword($hashPassword->hashPassword($user, $password));
        $user->setToken($token);
        $user->setRoles(['ROLE_USER']);
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('Пользователь зарегистрирован', 200, [
            'token' => $token
        ]);
    }
}
