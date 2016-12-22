<?php
namespace backend\controllers;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use \common\models\Goods;
use \common\models\Order;
use \common\models\Customer;
/**
 * Site controller
 */
class GoodsController extends Controller
{
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        // страница входа в систему и сообщения об ошибке доступны всем
                        'actions' => [ 'login','error'],
                        'allow' => true,
                    ],
                    [
                        // выход из системы только для зарегистрированного пользователя
                        'actions' => ['logout','index', 'add', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
         ];
	}
	public function actionIndex()
	{
		$goods= Goods::find()
		->all();
		return $this->render('index', ['goods' =>$goods]);
	}
		
		public function actionEdit($id_goods){
			$goods = Goods::findOne($id_goods);
			if (!$goods){
				return 'Товар не найден';
			}
			if(isset($_POST['Goods'])){
				$goods->attributes=$_POST['Goods'];
				if($goods->save()){
					return $this->render('suc_add');
				}
			}
			return $this->render('add', ['goods'=>$goods]);
		}
		
		public function actionDelete($id_goods){
			$goods = Goods::findOne($id_goods);
			if (!$goods){
				return 'Товар не найден';
			}
			$goods->delete();
			return $this->redirect(['goods/index']);
		}
		
		public function actionAdd(){
			$goods= new Goods;
			if(isset($_POST['Goods'])){
				$goods->attributes=$_POST['Goods'];
				if($goods->save()){
					return $this->render('suc_add');
				}
			}
			return $this->render('add', ['goods'=>$goods]);
		}
}