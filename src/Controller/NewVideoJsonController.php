<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class NewVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $request = file_get_contents("php://input");
        $videoData = json_decode($request, true);
        $video = new Video($videoData["url"], $videoData["title"]);
        $this->videoRepository->add($video);

        // resposta 201 = criado
        http_response_code(201);
    }
}
