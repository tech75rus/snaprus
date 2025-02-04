<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/api/registration-user', name: 'registration-user', methods: ['POST'])]
    public function registerUser(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hashPassword): ?Response
    {
        if (!$request->request->has('name') && !$request->request->has('password')) {
            return new Response('Введите имя и пароль', 401);
        }
        if ($request->headers->has('token')) {
            $user = $entityManager->getRepository(User::class)->findOneBy(['token' => $request->headers->get('token')]);
            if ($user) {
                $token = $this->newRegisterUser($request, $entityManager, $hashPassword, $user);
                return new Response('Пользователь зарегистрирован', 200, [
                    'token' => $token
                ]);        
            }
        }

        // TODO сделать проверку на существование зарегистрированого пользлвателя

        $token = $this->newRegisterUser($request, $entityManager, $hashPassword);
        return new Response('Пользователь зарегистрирован', 200, [
            'token' => $token
        ]);
    }

    #[Route('/api/login', name: 'authentication', methods: ['POST'])]
    public function authenticationUser(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $hashPassword): ?Response
    {
        if (!$request->request->has('name') && !$request->request->has('password')) {
            return new Response('Введите имя и пароль', 401);
        }

        /** @var User $user */
        if (!$user = $userRepository->findOneBy(['username' => $request->request->get('name')])) {
            return new Response('Не верный логин или пароль', 401);
        }
        if (!$hashPassword->isPasswordValid($user, $request->request->get('password'))) {
            return new Response('Не верный логин или пароль', 401);
        }

        return new Response('Пользователь авторизован', 201, [
            'token' => $user->getToken()
        ]);
    }

    #[Route('/api/is-admin', name: 'is-admin')]
    public function isAdmin(): ?Response
    {
        /** @var User $user */
        $user = $this->getUser();
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return new Response('true', 201);
        } else {
            return new Response('false', 401);
        }
    }




    private function newRegisterUser(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hashPassword, User $user = null): string
    {
        $name = $request->request->get('name');
        $password = $request->request->get('password');
        $random = new \Random\Randomizer();
        $token = md5(time()) . $random->getBytesFromString('abcdef0123456789', 36);
        $user ?? $user = new User();
        $user->setUsername($name);
        $user->setPassword($hashPassword->hashPassword($user, $password));
        $user->setToken($token);
        $user->setRoles(['ROLE_USER']);
        $entityManager->persist($user);
        $entityManager->flush();
        return $token;
    }
}
