<?php

namespace App\Controller;

use App\Entity\Project;
use App\Service\LoadImage;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    public int $sizeFile;

    public int $maxSizeFile;

    #[Route('/project/{id}', name: 'get_project')]
    public function getProject(int $id): Response
    {
        return new Response($id);
    }

    #[Route('/add-project', name: 'add_project', methods: ["POST"])]
    public function addProject(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nameProject = $request->request->get('name-project');
        $descriptionProject = $request->request->get('description-project');
        /** @var UploadedFile $imageProject */
        $imageProject = $request->files->get('image-project');
        $this->sizeFile = $imageProject->getSize();
        $this->maxSizeFile = $imageProject->getMaxFilesize();
        $error = [];
        empty($nameProject) ? array_push($error, 'Нет имени проекта') : null;
        empty($imageProject) ? array_push($error, 'Нет изображения'): null;
        ($this->sizeFile > $this->maxSizeFile) ? array_push($error, 'Изображение слишком тяжелое'): null;
        if ($error) {
            return new JsonResponse($error, 500);
        }
        return new JsonResponse($this->sizeFile);

        // запись изображения на диск
            // разбить по качеству изображение
        $directory = $this->getParameter('images_derictory');
        $image = new LoadImage($directory);
        $image->setImage($imageProject);


        // запись данных в БД
        $project = new Project();
        $project->setName($nameProject);
        $project->setDescription(!empty($descriptionProject) ? $descriptionProject : '');
        $project->setImage($imageProject->getClientOriginalName());
        $entityManager->persist($project);
        $entityManager->flush();

        return new Response('Проект добавлен');
    }

    // #[Route('/about')]
    // public function aboutInfo(): void
    // {
    //     phpinfo(INFO_MODULES);
    // }
}
