<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
class BlogController extends Controller
{
    public function show()
    {
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(env("MAX_PAGINATE"));
        Paginator::useBootstrap();
        return view("blog", compact('publications'));
    }

    public function addPublication(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'imageFile' => 'file|mimes:jpg, jpeg, png|max:204800',
        ]);

        $fileUrl = trim($_FILES['imageFile']["name"]) ? $this->getBlogFileUrl($_FILES['imageFile']) : null;
        $record = new Blog();
        $record->title = $_POST['title'];
        $record->content = $_POST['content'];
        $record->imageUrl = $fileUrl;
        $saved = $record->save();
        if ($saved) {
            $text = "Публикация сохранена";;
        } else {
            $text = "Не удалось создать публикацию";
        }
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(5);
        Paginator::useBootstrap();
        return view("admin.adminBlog", compact('publications'));
    }

    private function getBlogFileUrl($file)
    {
        $filePath = Storage::putFile("public", new File($file['tmp_name']));
        $filePath = stristr($filePath, "/");
        return "../storage/".mb_substr($filePath, 1);
    }

    public function loadBlogCSV()
    {
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(env("MAX_PAGINATE"));
        Paginator::useBootstrap();
        $file = $_FILES['csvFile']['tmp_name'];
        if (!trim($file))
        {
            return redirect("../admin/blog")->with(['publications' => $publications,'errors' => [0 => "Неверный тип данных"]]);
        }

        $csv = array_map('str_getcsv', file($file));
        if (!$csv) {
            $text = "Файл пустой";
            return redirect("../admin/blog")->with(['publications' => $publications,'errors' => [0 => "В файле нет требуемых данных"]]);
        }

        $fields = $csv[0];
        $publs = array();
        for ($i = 1; $i < count($csv); $i++) {
            $publication = array_combine($fields, $csv[$i]);

            $validator = Validator::make(
                $publication,
                [
                    'title' => 'required',
                    'content' => 'required'
                ],
                [
                    'title.required' => 'Record ' . ($i + 1) . ': The title field is required.',
                    'content.required' => 'Record ' . ($i + 1) . ': The content field is required.',
                ]
            );

            if ($validator->fails()) {
                return redirect("../admin/blog")->with(['publications' => $publications,'errors' => $validator->errors()]);
            }

            $publs[] = $publication;
        }

        foreach ($publs as $publication) {
            $publ = new Blog();
            $publ->title = $publication['title'];
            $publ->content = $publication['content'];
            $publ->imageUrl = (isset($publication['imageUrl'])) ? $publication['imageUrl'] : null;
            $publ->save();
        }

        $text = "Форма успешно отправлена";
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(env("MAX_PAGINATE"));
        Paginator::useBootstrap();
        return redirect("../admin/blog")->with(compact('publications'));
    }

    public function update()
    {
        $inputData = file_get_contents("php://input");
        $data = json_decode($inputData, true);
        $validator = Validator::make(
            $data,
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'The title field is required.',
                'content.required' => 'The content field is required.',
            ]
        );

        if ($validator->fails()) {
            http_response_code(400);
            return(json_encode(['errors' => $validator->errors()]));
        }

        $publication = Blog::all()->find($data["id"]);
        if (!$publication) {
            http_response_code(400);
            exit;
        }

        $publication->title = $data["title"];
        $publication->content = $data["content"];
        $publication->save();

        return(json_encode(["data" => $publication]));
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $publication = Blog::all()->find($_POST["publicationId"]);
        if (!$publication) {
            http_response_code(400);
            exit;
        }

        $comment = new Comment();
        $comment->content = $_POST['content'];
        $comment->publicationId = $_POST['publicationId'];
        $comment->userId = $_SESSION['user']['id'];
        $comment->userName = $_SESSION['user']['name'];
        $comment->save();

        $commentData = '<div class="card">
                        <div class="card-header d-flex justify-content-between ">
                            <div>Автор: '.$_SESSION['user']['name'].'</div>
<div>Дата написания: '.$comment->createdAt.'</div>
</div>
<div class="card-body">
    <p class="card-text"> '.$_POST['content'].' </p>
</div>
</div>';

        return(json_encode(['commentData' => $commentData]));
    }
}
