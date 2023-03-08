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
        $category =category::with('category')->get();
    
        return view('category.index', compact('category'));
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
       

 
       
    
 
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
 
    public function update(Request $request)
    {
        $rules = array(
            'cat_name'        =>  'required',
           
        );
 
        $error = Validator::make($request->all(), $rules);
 
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
 
        $form_data = array(
            'cat_name'    =>  $request->cat_name,
                   );
 
        category::whereId($request->hidden_id)->update($form_data);
 
        return response()->json(['success' => 'Data is successfully updated']);
    }
 
    public function destroy($id)
    {
        $data = category::findOrFail($id);
        $data->delete();
    }
}