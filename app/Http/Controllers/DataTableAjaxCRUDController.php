<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
 
class DataTableAjaxCRUDController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =DB::table('categories')
            ->leftJoin('sub_categories', 'sub_categories.id','sub_categories.sub_name', 'sub_categories.category_id', '=', 'categories.id')
            ->select('categories.id', 'sub_categories.id as subcategoryid', 'categories.cat_name as cat_name',   'sub_categories.sub_name as sub_name')
            ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->subcategoryid.'" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>';
                    $button .= '   <button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i> Delete</button>';
                    return $button;
                })
                ->make(true);
        }
 
        return view('category');
    }
 
    public function store(Request $request)
    {
        $rules = array(
            'cat_name'    =>  'required',
       
        );
 
        $error = Validator::make($request->all(), $rules);
 
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
 
      
 
        $form_data = array(
            'name'        =>  $request->cat_name,
      
        );
 
        category::create($form_data);
 
        return response()->json(['success' => 'Data Added successfully.']);
    }
 
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = DB::table('categories')
                ->leftJoin('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                ->select('categories.id ', 'categories.cat_name as cat_name',   'subcategories.sub_name as sub_name')
                ->where('categories.id', $id)
                ->get();
            
            return response()->json(['result' => $data]);
        }
    }
 
    public function update(Request $request)
    {
        $rules = array(
            'name'        =>  'required',
            'email'         =>  'required',
            'address'   => 'required'
        );
 
        $error = Validator::make($request->all(), $rules);
 
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
 
        $form_data = array(
            'name'    =>  $request->name,
            'email'     =>  $request->email,
            'address'         =>  $request->address
        );
 
        Company::whereId($request->hidden_id)->update($form_data);
 
        return response()->json(['success' => 'Data is successfully updated']);
    }
 
    public function destroy($id)
    {
        $data = Company::findOrFail($id);
        $data->delete();
    }
    public function aSedit(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            // Update the category
            DB::table('categories')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('cat_name'),
                    'description' => $request->input('cat_description')
                ]);
    
            // Update the subcategories
            $subcategories = $request->input('subcategories');
    
            if (!empty($subcategories)) {
                foreach ($subcategories as $subcategory) {
                    DB::table('subcategories')
                        ->where('id', $subcategory['id'])
                        ->update([
                            'name' => $subcategory['name'],
                            'sub_name' => $subcategory['sub_name']
                        ]);
                }
            }
    
            DB::commit();
    
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
    
            return redirect()->back()->with('error', 'Error updating category: ' . $e->getMessage());
        }
    }
    

}
