<?php

namespace app\modules\admin\controllers;

use app\models\Author;
use app\models\Category;
use app\models\ImageUpload;
use Yii;
use app\models\Book;
use app\models\BookSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost){

            $book = $this->findModel($id);

            $file = UploadedFile::getInstance($model, 'image');

            if($book->saveImage(
                $model->uploadFile($file, $book->image)
                )
            ){
                return $this->redirect(['view', 'id'=>$book->id]);
            }

        }

        return $this->render('image', ['model' => $model]);
    }

    public function actionSetCategories($id)
    {
        $book = $this->findModel($id);
        $selectedCategories = $book->getSelectedCategories();
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'category');

        if(Yii::$app->request->isPost)
        {
            $categories = Yii::$app->request->post('categories');
            $book->saveCategories($categories);

            return $this->redirect(['view', 'id'=>$book->id]);
        }

        return $this->render('categories', [
            'selectedCategories'=>$selectedCategories,
            'categories'=>$categories
        ]);
    }

    public function actionSetAuthors($id)
    {
        $book = $this->findModel($id);
        $selectedAuthors = $book->getSelectedAuthors();
        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'author');

        if(Yii::$app->request->isPost)
        {
            $authors = Yii::$app->request->post('authors');
            $book->saveAuthors($authors);

            return $this->redirect(['view', 'id'=>$book->id]);
        }

        return $this->render('authors', [
            'selectedAuthors'=>$selectedAuthors,
            'authors'=>$authors
        ]);
    }
}
