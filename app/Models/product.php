<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable =['p_name','item_no','authorize','category_id','subcategory','size','size_unit','weight','w_unit','color','p_trem','currency','moq','moq_unit','m_grade','price','p_unit','p_qty','price_qty_unit','g_w_kg','lenght','height','width','m3ctn','hs_code','in_pack','inn_pack_unit','mid_pack','mid_pack_unit','big_pack','big_pack_unit','thickness','thickness_unit','add_element','description'];


    public function product(){
        {
            return $this->hasmany(product_images::class);
        }
    }
}
