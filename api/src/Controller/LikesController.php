<?php

namespace App\Controller;

use App\Entity\Likes;
use App\Repository\LikesRepository;
use App\Repository\WorkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikesController extends AbstractController
{
    #[Route('/add-likes/{id}')]
    public function addLike(int $id, EntityManagerInterface $entityManager, LikesRepository $likesRepository, WorkRepository $workRepository): ?Response
    {
        $work = $workRepository->find($id);
        if (!$work) {
            return new Response('Нет такой работы', 404);
        }
        $user = $this->getUser();
        $workId = $work->getId();
        $userId = $user->getId();
        $res = $likesRepository->findLikes($userId, $workId);

        if ($res) {
            $likes = $likesRepository->find($res['id']);
            $likes->setLikesBool(!$res['likes_bool']);
            $likes->setUpdateAt(new \DateTimeImmutable());
        } else {
            $likes = new Likes();
            $likes->setWork($work);
            $likes->setUser($user);
            $likes->setLikesBool(true);
        }
        $entityManager->persist($likes);
        $entityManager->flush();

        return new Response('ok');
    }
}
