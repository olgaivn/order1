<?php
namespace frontend\controllers;
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
use common\models\Goods;
use common\models\Order; 		
use common\models\Customer;
/**
 * Site controller
 */
class OrderController extends Controller
{
	public function actionIndex()
	{
		$goods= Goods::find()
		->all();
		return $this->render('index', ['goods' =>$goods]);
	}
	
	public function actionAdd(){
		$order= new Order;
		$customer= new Customer;
		$goods=Goods::find()
		->orderBy(['name_goods'=>SORT_ASC])
		->all();
		if ($order->load(Yii::$app->request->post()) && $customer->load(Yii::$app->request->post())) {
			if (!$customer->save()) {
				echo 'Ошибка сохранения заказчика';
			} else {
				$order->id_customers = $customer->id_customer;
				$order->status = 0;
				if ($order->save()) {
				return $this->render('suc_add', ['customer'=>$customer]);
				} else {
					echo 'Ошибка сохранения заказа';
					echo '<br>ID заказчика: '.$order->id_customers;
					echo '<br>Количество: '.$order->quantity;
					echo '<br>Статус: '.$order->status;
					echo '<br> Компания-заказчик : '.$customer->name_company;
				}
			}
		}
		return $this->render('add', ['order'=>$order, 'goods'=>$goods, 'customer'=>$customer]);
	}
}
