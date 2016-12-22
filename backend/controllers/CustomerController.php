<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\ContactForm;
use \common\models\Customer;
use \common\models\Goods;
use \common\models\Order;
/**
 * Site controller
 */
class CustomerController extends Controller
{
	public function actionIndex()
	{
		$customer= Customer::find()
		->all();
		return $this->render('index', ['customer' =>$customer]);
	}
	public function actionView($id_customer){
			$customer = Customer::findOne($id_customer);
			if ($customer){
				return $this->render('view', ['customer'=>$customer]); //вывели представление view
			}else{
				return 'Заказчик не найден';
			}
		}	
		public function actionEdit($id_customer){
			$customer = Customer::findOne($id_customer);
			if (!$customer){
				return 'Заказчик не найден';
			}
			if(isset($_POST['Customer'])){
				$customer->attributes=$_POST['Customer'];
				if($customer->save()){
					return $this->render('add_suc_cus');
				}
			}
			return $this->render('add', ['customer'=>$customer]);
		}
		
		public function actionDel($id_customer){
			$customer = Customer::findOne($id_customer);
			if (!$customer){
				return 'Заказчик не найден';
			}
			$customer->delete();
			return $this->redirect(['customer/index']);
		}
		
		public function actionAdd(){
			$customer= new Customer;
			if(isset($_POST['Customer'])){
				$customer->attributes=$_POST['Customer'];
				if($customer->save()){
					return $this->render('add_suc_cus');
				}
			}
			return $this->render('add', ['customer'=>$customer]);
		}
}
