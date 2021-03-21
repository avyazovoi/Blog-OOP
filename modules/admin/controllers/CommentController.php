<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Comment;
use app\models\CommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentController implements the CRUD actions for Comment model.
 */
class CommentController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function actionIndex()
    {
        $comments = Comment::find()->orderBy('id desc')->all();

        return $this->render('index', [
            'comments' => $comments,
        ]);
    }


    public function actionDelete($id)
    {
        $comment = $this->findModel($id);
        if($comment->delete())
        {
            return $this->redirect(['comment/index']);
        }
    }

    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAllow($id)
    {
        $comment = $this->findModel($id);
        if($comment->allow())
        {
            return $this->redirect(['comment/index']);
        }
    }


    public function actionDisallow($id)
    {
        $comment = $this->findModel($id);
        if($comment->disallow())
        {
            return $this->redirect(['comment/index']);
        }
    }
}
