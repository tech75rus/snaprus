<?php

namespace App\Controller;

use App\Entity\Likes;
use App\Entity\User;
use App\Entity\Work;
use App\Repository\LikesRepository;
use App\Repository\WorkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorkController extends AbstractController
{
    #[Route('/works')]
    public function getWorks(WorkRepository $workRepository, LikesRepository $likesRepository): ?Response
    {
        $works = $workRepository->findWorksLikes(1);
        return new JsonResponse($works);
    }

    public function addWork(): ?Response
    {
        return new Response('added work');
    }

    public function deleteWork(): ?Response
    {
        return new Response('Delete work');
    }

    public function updateWork(): ?Response
    {
        return new Response('update work');
    }
}
