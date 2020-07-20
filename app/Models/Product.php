<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id_product
 * @property string $nama
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'product';
	protected $primaryKey = 'id_product';

	protected $fillable = [
		'nama'
	];
}
