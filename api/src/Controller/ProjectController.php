<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\User;
use App\Repository\LikesRepository;
use App\Repository\ProjectRepository;
use App\Service\LoadImage;
use Doctrine\DBAL\Exception;
use Doctrine\Migrations\Configuration\Migration\JsonFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProjectController extends AbstractController
{
    #[Route('/project/{id}', name: 'get_project')]
    public function getProject(int $id, ProjectRepository $projectRepository): Response
    {
        $project = $projectRepository->find($id);
        return $this->json($project);
    }

    #[Route('/projects', name: 'get_projects')]
    public function getProjects(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();
        if ($user = $this->getUser()) {
            /** @var User $user */
            $token = $user->getToken();
        }
        return $this->json($projects, 200, [
            'token' => $token ?? ''
        ]);
    }

    #[Route('/add-project', name: 'add_project', methods: ["POST"])]
    public function addProject(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nameProject = $request->request->get('name-project');
        $descriptionProject = $request->request->get('description-project');
        /** @var UploadedFile $imageProject */
        $imageProject = $request->files->get('image-project');

        $error = [];
        empty($nameProject) ? array_push($error, 'Нет имени проекта') : null;
        empty($imageProject) ? array_push($error, 'Нет изображения'): null;
        if (!in_array($imageProject->getClientOriginalExtension(), ['JPG', 'JPEG', 'PNG', 'WEBP', 'jpg', 'jpeg', 'png', 'webp'])) {
            array_push($error, 'Не верный формат. Формат должен быть jpg, png или webp');
        }
        // Если файл больше чем разрешен в php.ini тогда результат 0 если нет тогда показывается размер файла в байтах
        !filesize($imageProject) ? array_push($error, 'Изображение слишком большого размера. Максимально допустимо ' . ini_get('upload_max_filesize')): null;
        if ($error) {
            return new JsonResponse($error, 500);
        }

        $directory = $this->getParameter('images_derictory');
        $image = new LoadImage($directory);
        $arrayPathImages = $image->setImage($imageProject);

        // запись данных в БД
        $project = new Project();
        $project->setName($nameProject);
        $project->setDescription(!empty($descriptionProject) ? $descriptionProject : '');
        $project->setImageOrigin($arrayPathImages['origin']);
        $project->setBigImage($arrayPathImages['big']);
        $project->setMiddleImage($arrayPathImages['middle']);
        $project->setSmallImage($arrayPathImages['small']);
        $entityManager->persist($project);
        $entityManager->flush();

        return new Response('Проект добавлен');
    }

    // #[Route('/about')]
    // public function aboutInfo(): void
    // {
    //     phpinfo();
    // }
}
