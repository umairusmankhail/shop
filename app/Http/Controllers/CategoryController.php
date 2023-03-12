<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\sub_category;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
 
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $subcategories = sub_category::with('category')->get();
    
        return view('category.index', compact('subcategories'));
    }
    public function edit(){
        $category= category::get();
        return view('category.edit')->with(['category' => $category]);
    }
    public function editcategory($id){
        
        $category = category::find($id);
      
        return view('category.editcategory')->with(['category' => $category]);
    }

  
   
       
     


    
    public function create(){
        $category = category::all();
        return view('category.category_create', compact('category'));
    }
 
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'cat_name' => 'required|max:255|unique:categories,cat_name',
        ]);
    
        // Create a new category instance and save it to the database
        $category = new Category;
        $category->cat_name = $validatedData['cat_name'];
        $category->save();
    
        // Redirect to the same page with a success message
        return redirect()->back()->with('success', 'Category added successfully.');
    }

      


 
       
    
 
   
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required',
         ]);
      
      
         $category = category::findOrFail($id);
         $category->cat_name = $request->input('cat_name');
     
         $category->save();
          return redirect()->route('category')->with('success','category Has Been updated successfully');   
 
  
        }
    

 
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $subcategories = sub_category::where('category_id', $category->id)->get();
        
        foreach ($subcategories as $subcategory) {
            $subcategory->delete();
        }
         
        $category->delete();
    }
    

    // Function for Subcategory

    public function subcategoryedit($id){
        $subcategory = sub_category::findOrFail($id);
        $category = Category::all();
        return view('category.editsubcategory', compact('subcategory', 'category'));
    }
    public function storeSubcategory(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'category_id' => 'required',
            'sub_name' => 'required',
        ]);
    
        // Create a new subcategory instance and save it to the database
        $subcategory = new sub_category;
        $subcategory->sub_name = $validatedData['sub_name'];
        $subcategory->category_id = $validatedData['category_id'];
        $subcategory->save();
    
        // Redirect to the same page with a success message
        return redirect()->back()->with('success', 'Subcategory added successfully.');
    }   

    public function subcategoryupdate(Request $request, $id)
    {
        $request->validate([
           'sub_name' => 'required',
        ]);
     
     
        $subcategory = sub_category::findOrFail($id);
        $subcategory->category_id = $request->input('category_id');
       $subcategory->sub_name=$request->sub_name;
        $subcategory->save();
         return redirect()->route('category')->with('success','Subcategory Has Been updated successfully');
    }


    public function deletesubcategory($id)
{
    $subcategory = sub_category::findOrFail($id);

    // delete any related data before deleting the subcategory
    // for example, if there are product images associated with the subcategory, delete them first
   
    $subcategory->delete();

    return redirect()->route('category.index')
        ->with('success', 'Subcategory deleted successfully');
}

}