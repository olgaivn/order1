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
use \common\models\Order;
use \common\models\Goods;
use \common\models\Customer;
/**
 * Site controller
 */
class OrderController extends Controller
{
	public function actionIndex1()
	{
		$goods=Goods::find()
		->orderBy(['name_goods'=>SORT_ASC])
		->all();
		return $this->render('index1',['goods'=>$goods]);
	}
	public function actionAddt(){ 
		$order= new Order; 
		$goods=Goods::find() 
		->orderBy(['name_goods'=>SORT_ASC])
		->all(); 
		$customer=Customer::find() 
		->orderBy(['name_company'=>SORT_ASC])
		->all(); 

	if(isset($_POST['Order'])){ 
		$order->attributes=$_POST['Order']; 
			if($order->save()){ 
				return $this->render('addt_success',['customer'=>$customer]); 
				} 
	} 
    return $this->render('addt', ['order'=>$order, 'goods'=>$goods, 'customer'=>$customer]); 
}
	public function actionIndex() 
	{
		$goods=Goods::find()
		->orderBy(['name_goods'=>SORT_ASC])
		->all();
		return $this->render('index',['goods'=>$goods]);
	}
	
	public function actionIndex21(){
	$customer= new Customer;
		
		if(isset($_POST['Customer'])){
			$customer->attributes=$_POST['Customer'];
			if($customer->save()){
				return $this->render('21_suc', ['customer'=>$customer]);
			}
		}
		return $this->render('index21', [ 'customer'=>$customer]);
	}
		
	public function actionDelete($id_goods){
		$goods = Goods::findOne($id_goods);
		if (!$goods){
			return 'Товар не найден';
		}
		$goods->delete();
		return $this->redirect(['order/index']);
	}
}