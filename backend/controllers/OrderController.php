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
class OrderController extends Controller
{
	public function actionIndex()
	{
		$order=Order::find()
		->having('status=0')
		->orderBy(['date_order'=> SORT_ASC])
		->all();
		return $this->render('index', ['order' =>$order]);
	}
	public function actionArhive()
	{
		$order= Order::find()
		->having('status=1')
		->orderBy(['date_order'=> SORT_ASC])
		->all();
		return $this->render('arhive', ['order' =>$order]);
	}
		
		public function actionEdit($id_order){
			$goods=Goods::find()
			->orderBy(['name_goods'=>SORT_ASC])
			->all();
			$customer=Customer::find()
			->orderBy(['name_company'=>SORT_ASC])
			->all();
			$order = Order::findOne($id_order);
			if (!$order){
				throw new \yii\web\NotFoundHttpException('Заказ не найден');
			}
			if(isset($_POST['Order'])){
				$order->attributes=$_POST['Order'];
				if($order->save()){
					return $this->render('suc_add');
				}
			}
			return $this->render('add', ['order'=>$order, 'goods'=>$goods, 'customer'=>$customer]);
		}
		
		
	public function actionDelete($id_order){
		$order = Orders::findOne($id_order);
		if (!$order){
			throw new \yii\web\NotFoundHttpException('Заказ не найден');
		}
		$order->delete();
		return $this->redirect(['order/index']);
	}
	public function actionDel($id_order){
		$order = Order::findOne($id_order);
		if (!$order){
			throw new \yii\web\NotFoundHttpException('Заказ не найден');
		}
		$order -> delete();
		return $this->redirect(['order/arhive']);
	}
		
}