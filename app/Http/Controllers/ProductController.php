<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function create(){
    return view('product.create');
  }

  public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'p_name' => 'required',
            'item_no' => 'required', 
            'authorize' => 'required', 
            'category_id' => 'required', 
            'subcategory' => 'required', 
            'size' => 'required', 
            'size_unit' => 'required', 
            'weight' => 'required', 
            'w_unit' => 'required', 
            'color' => 'required', 
            'p_trem' => 'required', 
            'currency' => 'required', 
            'moq' => 'required', 
            'moq_unit' => 'required', 
            'm_grade' => 'required', 
            'price' => 'required', 
            'p_unit' => 'required', 
            'p_qty' => 'required', 
            'price_qty_unit' => 'required', 
            'g_w_kg' => 'required', 
            'lenght' => 'required', 
            'height' => 'required', 
            'width' => 'required', 
            'm3ctn' => 'required', 
            'hs_code' => 'required', 
            'in_pack' => 'required', 
            'inn_pack_unit' => 'required', 
            'mid_pack' => 'required', 
            'mid_pack_unit' => 'required', 
            'big_pack' => 'required', 
            'big_pack_unit' => 'required', 
            'thickness' => 'required', 
            'thickness_unit' => 'required', 
            'add_element' => 'required', 
            'description' => 'required', 
            'filename' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:2048',
        ]);
   
 
        // Create a new category instance and save it to the database
      $form_data = array(
        'p_name' => $request->p_name,
        'item_no' => $request->item_no,
        'authorize' => $request->authorize ,
        'category_id' => $request->category_id, 
        'subcategory' => $request->subcategory,
        'size' => $request->size, 
        'size_unit' => $request->size_unit,
        'weight' => $request->weight, 
        'w_unit' => $request->w_unit, 
        'color' => $request->color, 
        'p_trem' => $request->p_trem,
        'currency' => $request->currency,
        'moq' => $request->moq,
        'moq_unit' => $request->moq_unit,
        'm_grade' => $request->m_grade, 
        'price' => $request->price, 
        'p_unit' => $request->p_unit, 
        'p_qty' => $request->p_qty,
        'price_qty_unit' => $request->price_qty_unit,
        'g_w_kg' => $request->g_w_kg,
        'lenght' => $request->lenght,
        'height' => $request->height,
        'width' => $request-> width,
        'm3ctn' => $request->m3ctn,
        'hs_code' => $request->hs_code,
        'in_pack' => $request->in_pack,
        'inn_pack_unit' => $request->inn_pack_unit,
        'mid_pack' => $request->mid_pack,
        'mid_pack_unit' => $request->mid_pack_unit,
        'big_pack' => $request->big_pack,
        'big_pack_unit' => $request->big_pack_unit,
        'thickness' => $request->thickness,
        'thickness_unit' => $request->thickness_unit,
        'add_element' => $request->add_element,
        'description' => $request->description,
     
      );
        product::create($form_data);
        $image_path = $request->file('filename')->store('public/images');
    
        // Create a new product image record
        $product_image = new product_images([
            'product_id' => $product->id,
            'image_path' => $image_path,
        ]);
        
        // Save the product image record to the database
        $product_image->save();
    
  // Redirect to the same page with a success message
  return redirect(route('category'))->with('success', 'Category added successfully.');
}

}