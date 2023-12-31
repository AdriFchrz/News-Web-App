<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    protected $allowedFields = ['news_id', 'user_id', 'content', 'created_at'];

    public function getCommentsByNewsId($newsId)
    {
        return $this->select('comments.*, users.username')
            ->join('users', 'users.id = comments.user_id')
            ->where('news_id', $newsId)
            ->findAll();
    }

    public function getCommentsByNewsIdAndUserId($newsId, $userId)
    {
        return $this->where('news_id', $newsId)
            ->where('user_id', $userId)
            ->findAll();
    }

}