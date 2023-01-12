<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermandCondition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserlistController extends Controller
{
    // public function Userlist(){
    //     $user=User::paginate(1);
    //     return view('Admin.userslist',compact('user'));
    // }
    public function index(Request $request)
    
    {
       
        if (request('term')) {
           $users=User::where('name', 'Like', '%' . request('term') . '%')->paginate(2);
        
        }else{
            $users = User::paginate(2);
        }
       

        return view('Admin.userslist', compact('users'));
    }

    public function search(Request $request)
    {
        
$output="";
$products=DB::table('users')->where('name','LIKE','%'.$request->search."%")->orwhere('email','LIKE','%'.$request->search."%")->get();
if($products)
{
foreach ($products as $key => $product) {
$output.='<tr>
<td>'.$product->id.'</td>
<td>'.$product->name.'</td>
<td>'.$product->email.'</td>
<td>'.' <div class="delete-modal btn  btn-sm" data-id='.$product->id.' id="deletecategory1" name='.$product->name.'><i class="fa fa-trash" aria-hidden="true"></i></div>'.'</td>

</tr>';
}
return Response($output);

    }

    }

    
    

    public function terms()
    {
        return view('Admin.termsandconditions');
    }
    public function postTerms(request $request)
    {
        $terms = new TermandCondition();

        $terms->title = $request->title;
        $terms->description = $request->description;
        $terms->save();
        return redirect()->back();
    }

    public function delete(request $request)
    {
 
        $users = User::where('id', $request->userid);

        $users->delete();
       

         return redirect('users')->with('success',"service_provider detail Deleted successfully");
    }



    public function searchdata(request $request){
     
    
                $users = User::query();
                if (request('term')) {
                    $users->where('name', 'Like', '%' . request('term') . '%');
                }
                
            //     $users= $users->orderBy('id', 'DESC')->paginate(10);
            // $html= view('partial',compact('Admin.users'))->render();
            // return response()->json([
            //     'html'=>$html,
            // ]);
        }
        public function getaddform(){
            return view('Admin.adduser');
        }
        public function storeuser(request $request){
            $this->validate($request, [
                'name' => 'required|max:50',
                'phone_number' => 'required',
                'email' => 'required|unique:users,email',
               
                'password' => 'required',
                
    
    
            ], [
    
                'name.required' => 'The Name field is required.',
                'phone_number.required' => 'The Name field is required.',
                'name.max' => 'The Name may not be greater than 50 characters.',
               
               
                'email.required' => 'The Email field is required. ',
                'password.required' => 'The Password field is required.',
                
    
    
            ]);
            
            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone_number =$request->phone_number;
            $users->education =$request->education;
            $users->status =$request->status;
            $users-> users['achievment'] = $request->category;            
            $users->experience =$request->experience;
            $users->phone_number =$request->phone_number;
            $users->address =$request->address;
            $users->password = Hash::make($request->password);
            $users->save();
             return redirect()->route('users')->with('success',' admin user added successfully');
        }


        public function edituser( $id){
            $cruds = User::all();
            $users = User::find($id);
           return view('Admin.editform',compact('cruds','users'));

        }
        public function updateuser(request $request, $id){
            $users = User::find($id);
            $users->name = $request->name;
            $users->email = $request->email;

            $users->password = Hash::make($request->password);
             $users->save();
             return redirect()->route('users')->with('success',' admin user added successfully');
        }
       
    }

