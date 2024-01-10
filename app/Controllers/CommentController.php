<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\NewsModel;

class CommentController extends BaseController
{
    protected $commentModel;
    protected $newsModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
        $this->newsModel = new NewsModel();
    }

    public function deleteComment($commentId)
    {
        // Check if the user is an admin
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to delete comments.');
        }

        // Perform the deletion
        $this->commentModel->delete($commentId);

        // Redirect back to the news detail page
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function addComment($newsId)
    {
        $news = $this->newsModel->find($newsId);

        if (!$news) {
            return redirect()->to('/404');
        }

        $data = [
            'news_id' => $newsId,
            'user_id' => session('user_id'),
            'content' => $this->request->getPost('content'),
        ];

        $this->commentModel->insert($data);

        return redirect()->to("news/detail/{$newsId}");
    }
}