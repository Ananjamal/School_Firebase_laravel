<?php
namespace App\Http\Controllers\Firebase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;

class ContactController extends Controller
{
    protected $database;
    protected $table_name = 'contacts';  // Assuming you've set this up correctly

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $contacts = $this->database->getReference($this->table_name)->getValue();

        return view('firebase.contacts.index',compact('contacts'));
    }

    public function create()
    {
        return view('firebase.contacts.create');
    }

    public function store(Request $request)
    {
        $postData = [
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        // Use the injected database instance without manual configuration
        $newData = $this->database->getReference($this->table_name)->push($postData);
        
        if ($newData) {
            return redirect()->route('contacts')->with('success', 'Contact created successfully');
        }
    }
    public function edit($id)
    {
        $key = $id;
        $editData = $this->database->getReference($this->table_name)->getChild($key)->getValue();
        if($editData){
            return view('firebase.contacts.edit',compact('editData','key'));

        }else{
            return redirect()->route('contacts')->with('error','Contact not found');
        }
    }
    public function update(Request $request,$id)
    {
        $key = $id;
        $updateData = [
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        $updateData = $this->database->getReference($this->table_name.'/'. $key)->update($updateData);
        if($updateData){
            return redirect()->route('contacts')->with('success','Contact updated successfully');
        }else{
            return redirect()->route('contacts')->with('error','Contact not found');
        }

        }

        public function destroy($id)
    {
        $key = $id;
        

        $deleteData = $this->database->getReference($this->table_name.'/'. $key)->remove();
        if($deleteData){
            return redirect()->route('contacts')->with('success','Contact deleted successfully');
        }else{
            return redirect()->route('contacts')->with('error','Contact not found');
        }

        }
    }
    

