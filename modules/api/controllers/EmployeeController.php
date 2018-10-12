<?php

namespace app\modules\api\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\rest\ActiveController;
use app\models\Employee;
use yii\web\HttpException;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;

class EmployeeController extends ActiveController
{
	//public $enableCsrfValidation = false;

	public $names = [];

	public $modelClass = 'app\models\Employee';

	public function verbs()
	{
		$verbs = [
			'index'     => ['GET', 'HEAD', 'POST'],
			'create'    => ['GET', 'HEAD', 'POST'],
			'update'    => ['GET', 'HEAD', 'PATCH', 'POST'],
			'delete'    => ['GET', 'HEAD', 'POST'],
			'get-post'  => ['GET', 'HEAD', 'POST']
		];

		return $verbs;
	}

	/**
	 * @ return array
	 * @ Отключить действия "delete" и "create"
	 */
	public function actions()
	{
		$actions = parent::actions();

		unset ($actions['create']);
		unset ($actions['index']);
		unset ($actions['update']);
		unset ($actions['list-employee']);
		unset ($actions['get-post']);
		return $actions;
	}

	/**
	 * @return string
	 * Get all documents as JSON or as HTML
	 */
	public function actionIndex()
	{
		$val = Yii::$app->request->post('v');

		if(isset($val) && $val == 1){
			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$object = Employee::find()->asArray()->all();

			$arr_obj = [];
			 foreach($object as $key => $obj){
				 $arr = [
					'id' => $obj['id'],
					'names' => [
						'name' => $obj['name'],
						'email' => $obj['email'],
					],
					'country' => $obj['country'],
					'status' => $obj['status'],
					'created_at' => $obj['created_at'],
					'modify_at' => $obj['modify_at']
				];
				array_push($arr_obj, $arr);
			}
			return $arr_obj;
		}

			Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
			$query = Employee::find()->asArray();
			$model = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$doc_arr = $query->offset($model->offset)->limit($model->limit)->all();

			return $this->render('index', compact('model', 'doc_arr'));
	}


	/**
	 * @return string
	 * Create new draft document (empty!)
	 */
	public function actionCreate()
	{
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$doc = Yii::$app->request->post('doc');

		if($doc){
			$model = new Employee();
			$model->load(Yii::$app->request->post(), '');
			$doc['names'];
			$model->country = '';
			$model->created_at = $doc['date'];
			$model->status = 'draft';
			$model->save();
			return $doc;
		}else{
			throw new BadRequestHttpException('Bad Request!', 400);
		}
		//return $this->render('create', compact('model', 'names'));
	}

	/**
	 * @return array|null|\yii\db\ActiveRecord
	 * Update one of array data, get by ID method PATCH
	 */
	public function actionUpdate($id)
	{
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		$docs = Yii::$app->request->post('doc');
		$docs_pub = Yii::$app->request->post('docs_pub');
		$model = Employee::find()->where(['id' => $id])->one();

		if((Yii::$app->request->isPatch) && ($model->status == 'published')){
			throw new BadRequestHttpException('Не возможно редактировать опубликованный документ!', 400);

		}

		if(Yii::$app->request->isPatch && isset($docs)) {

			$model->name = $docs['nam']['name'];
			$model->email = $docs['nam']['email'];
			$model->country = $docs['country'];
			$model->modify_at = date('Y-m-d H:i:s');
			$model->status = $docs['status'];
			$model->save();
			return $docs;
			}

		if(Yii::$app->request->isPost && isset($docs_pub)) {

			$model->name = $docs_pub['nam']['name'];
			$model->email = $docs_pub['nam']['email'];
			$model->country = $docs_pub['country'];
			$model->modify_at = date('Y-m-d H:i:s');
			$model->status = $docs_pub['status'];
			$model->save();
			return $docs_pub;
		}

		return $model;
		}

	/**
	 * @param $id
	 * Get by ID document
	 * @return string
	 * @throws HttpException
	 */
	public function actionGetPost($id)
		{
			Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;

			$gp = Employee::find()->where(['id' => $id])->one();
			if(!$gp){
				throw new HttpException(404 ,'Document not found');
			}

			return $this->render('get-post',compact('gp'));
		}

		public function actionListEmployee()
		{
			Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
			return $this->render('list-employee');
		}

}
