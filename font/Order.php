<?
namespace app\models;

use yii\db\ActiveRecord;

/**
 * 
 */
class Reservation extends ActiveRecord
{

}



<button type="submit" class="btn btn-info"><a href="<?=\yii\helpers\Url::to(['order', 'id'=>$exhibition["exhibition_id"]])?>">Забронировать</a></button>