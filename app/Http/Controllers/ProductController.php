<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\sub_category;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product_images;
use App\Models\add_element;
use Illuminate\Support\Facades\DB;
use Response;
use Redirect;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
  public function edit($id)
{
    $product = product::findOrFail($id);
    $images = product_images::where('product_id', $id)->get();

    return view('product.edit', compact('product', 'images'));
}

  public function update(Request $request, $id)
  {
      $product = Product::findOrFail($id);
      $product->p_name = $request->input('p_name');
      $product->item_no = $request->input('item_no');
      $product->authorize = $request->input('authorize');
      $product->category_id = $request->input('category_id');
      $product->subcategory = $request->input('subcategory');
      $product->size = $request->input('size');
      $product->size_unit = $request->input('size_unit');
      $product->weight = $request->input('weight');
      $product->w_unit = $request->input('w_unit');
      $product->color = $request->input('color');
      $product->p_trem = $request->input('p_trem');
      $product->currency = $request->input('currency');
      $product->moq = $request->input('moq');
      $product->moq_unit = $request->input('moq_unit');
      $product->m_grade = $request->input('m_grade');
      $product->price = $request->input('price');
      $product->p_unit = $request->input('p_unit');
      $product->p_qty = $request->input('p_qty');
      $product->price_qty_unit = $request->input('price_qty_unit');
      $product->g_w_kg = $request->input('g_w_kg');
      $product->lenght = $request->input('lenght');
      $product->height = $request->input('height');
      $product->width = $request->input('width');
      $product->m3ctn = $request->input('m3ctn');
      $product->hs_code = $request->input('hs_code');
      $product->in_pack = $request->input('in_pack');
      $product->inn_pack_unit = $request->input('inn_pack_unit');
      $product->mid_pack = $request->input('mid_pack');
      $product->mid_pack_unit = $request->input('mid_pack_unit');
      $product->big_pack = $request->input('big_pack');
      $product->big_pack_unit = $request->input('big_pack_unit');
      $product->thickness = $request->input('thickness');
      $product->thickness_unit = $request->input('thickness_unit');
      $product->add_element = $request->input('add_element');
      $product->description = $request->input('description');
      $product->save();
     
    
    
    
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $videoName = $video->getClientOriginalName();
                $video->storeAs('public/videos', $videoName);
            } else {
                $videoName = null;
            }
            $images = $request->file('images');
            if (isset($images)) {
                foreach ($images as $image) {
                    $imageName = $image->getClientOriginalName();
         
              $filename = $image->store('public/images');
              $productImage = new ProductImage();
              $productImage->product_id = $product->id;
              $productImage->filename = str_replace('public/', '', $filename);
              $productImage->video = str_replace('public/', '', $videoName);
        
              $productImage->save();
          }
      
        }
      return redirect()->route('product-index')->with('success', 'Product updated successfully.');
  }
  
  public function destroy($id)
  {
      $product = product::findOrFail($id);
      $images = product_images::where('product_id', $product->id)->get();
    
      foreach ($images as $image) {
          Storage::delete('public/' . $image->filename);
          $image->delete();
      }
    
      $product->delete();
    
      return redirect()->route('product-index')->with('success', 'Product and images deleted successfully.');
  }
  



public function index(){
    return view('product.index');
}

  public function getDataForDatatables()
  {
      $products = Product::with('product')->get();
      
      return datatables()->of($products)
          ->addColumn('action', function($product) {
            $button = '<button type="button" name="edit" id="'.$product->id.'" class="edit btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>Edit</button>';
                  $button .= '<form action="'.route("products.destroy", $product->id).'" method="POST" style="display: inline-block;">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button type="submit" class="delete btn btn-danger btn-sm"><i class="bi bi-backspace-reverse-fill"></i>Delete</button>
                      </form>';
            return $button;
        })
          ->make(true);
  
  
        
    }
    public function deleteSelected(Request $request)
{
    // $users = explode(',', $request->all_providers);

    //     foreach ($users as $key => $user) {
    //         DB::table('clinic_user')->delete($user);
    //     }

    //     return redirect()->back()->with('message', 'Users Deleted Successfully');
    
    // dd($request->product_delete);
    $ids = explode(',', $request->product_delete);

    
    
    product_images::whereIn('product_id', $ids)->delete();
    
    product::whereIn('id', $ids)->delete();
    
    return redirect()->route('product-index')->with('success', 'Product and images deleted successfully.');
 
}

    

  


 



    public function create()
    {
        $categories = Category::all();
        return view('product.create')->with(['categories'=> $categories]);
    }
    public function getSubcategories($category_id)
{
    $subcategories = sub_category::where('category_id', $category_id)->select('id', 'sub_name')->get();

    return response()->json($subcategories);
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
            'label.*' => 'string|nullable|max:255',
            'value.*' => 'string|nullable|max:255',
             // Validate each uploaded image file
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
      
        $productId = DB::getPdo()->lastInsertId();
               // loop through the labels and values and create new add_element records
               $addedPairs = [];

               foreach ($validatedData['label'] as $key => $label) {
                   $value = $validatedData['value'][$key];
                   // check if label and value pair has not been added already and is not empty
                   if (!empty($label) && !empty($value) && !isset($addedPairs["$label|$value"])) {
                       add_element::create([
                           'product_id' => $productId,
                           'label' => $label,
                           'value' => $value,
                       ]);
                       // add label-value pair to added pairs array
                       $addedPairs["$label|$value"] = true;
                   }
               }
        // Check if video file exists
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = $video->getClientOriginalName();
            $video->storeAs('public/videos', $videoName);
        } else {
            $videoName = null;
        }
        
        // Check if image files exist
        $images = $request->file('images');
        if (isset($images)) {
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
        
                // Create new product image
                $productImage = new product_images;
                $productImage->product_id = $productId; // Set the product ID
                $productImage->filename = $imageName;
        
                // Check if video name exists
                if ($videoName) {
                    $productImage->video = $videoName;
                }
        
                $productImage->save();
        
                // Save the image file
                $image->storeAs('public/images', $imageName);
            }
        } else {
            // Create a new product image with only the product ID
            $productImage = new product_images;
            $productImage->product_id = $productId; // Set the product ID
            $productImage->save();
        }
        
      return redirect()->route('product-index')->with('success', 'Product created successfully.');
  }


    


}