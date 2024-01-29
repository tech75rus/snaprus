<?php

namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class MainCustomAuthenticator extends AbstractAuthenticator
{

    public UserRepository $userRepository;

    public EntityManagerInterface $em;

    public string $token;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
        $this->em = $em;
    }

    public function supports(Request $request): ?bool
    {
        if ($request->getPathInfo() === '/api/registration-user') {
            return false;
        }
        return true;
    }

    public function authenticate(Request $request): Passport
    {
        if (!$request->headers->has('token')) {
            $this->newGuest();
        } else {
            $this->token = $request->headers->get('token');
            $user = $this->userRepository->findOneBy(['token' => $this->token]);
            if ($user === null) {
                $this->newGuest();
            }
        }

        // $token = $request->request->get('token');

        // /** @var User $user */
        // $user = $this->userRepository->findOneBy(['token' => $token]);
        return new SelfValidatingPassport(new UserBadge($this->token));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return null;
        // return new JsonResponse($exception->getMessageData(), 502);
    }

    private function newGuest()
    {
        $random = new \Random\Randomizer();
        $this->token = md5(time()) . $random->getBytesFromString('abcdef0123456789', 36);
        /** @var User $user */
        $user = new User();
        $user->setUsername('guest_' . $random->getBytesFromString('abcdef0123456789', 6));
        $user->setToken($this->token);
        $user->setPassword('guest_password');
        $this->em->persist($user);
        $this->em->flush();
    }

//    public function start(Request $request, AuthenticationException $authException = null): Response
//    {
//        /*
//         * If you would like this class to control what happens when an anonymous user accesses a
//         * protected page (e.g. redirect to /login), uncomment this method and make this class
//         * implement Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface.
//         *
//         * For more details, see https://symfony.com/doc/current/security/experimental_authenticators.html#configuring-the-authentication-entry-point
//         */
//    }
}
