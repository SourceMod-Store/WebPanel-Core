<?php namespace App\Http\Controllers\WebPanel\Store;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StoreCategory;
use App\Models\StoreItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ToolsController extends Controller {

    /**
     * Returns the Import / Export View
     */
    public function index()
    {
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.tools.index');
    }

    /**
     * Returns the Check JSON View
     */
    public function JsonChecker()
    {

    }

    /**
     * Returns the Shrink JSON View
     */
    public function JsonShrinker()
    {

    }

    /**
     * Shows the changes that are going to happen to the user
     *
     * @param Requests\ImportRequest $request
     * @return Response
     */
    public function verifyImport(Requests\ImportRequest $request)
    {
        // **Get the File**
        $file = $request->file('import');

        $json_valid = false;
        $json_version = 0;
        $json_type = false;
        $categories_collection = false;
        $fileName = "";


        // **Perform some validation**
        //Check if the file is valid
        if(Input::file('import')->isValid())
        {
            $json_string = File::get($file);
            $json_object = json_decode($json_string);

            $extension = Input::file('import')->getClientOriginalExtension();
            $fileName = $this->getUploadString($extension);

            Storage::put('uploads/'.$fileName,$json_string);
            // Input::file('import')->move($destinationPath,$fileName); TODO: Replace with Storage API

            //Check if the JSON is valid
            if($json_object !== null)
            {
                $json_valid = true;
            }

            //Check if JSON Version is set
            if(isset($json_object->version))
            {
                $json_version = $json_object->version;
            }

            //Check if the Type is set
            if(isset($json_object->type))
            {
                $json_type = $json_object->type;
            }

            if(isset($json_object->categories))
            {
                $categories_collection = Collection::make($json_object->categories);
            }

            // TODO: Check if anything gets deleted when importing this category

            // TODO: Check if there are categories with the same type


            // **Send the output to the user**
            return view('templates.'.\Config::get('webpanel.template').'webpanel.store.tools.verify_import',compact('json_valid', 'json_version', 'json_type', 'categories_collection','fileName'));
        }
        else
        {
            return view('templates.'.\Config::get('webpanel.template').'webpanel.store.tools.index');
        }
    }

    public function PerformImport(Requests\ImportRequest $request)
    {
        $json_string = Storage::get('uploads/'.$request->input('fileName'));

        $json_object = json_decode($json_string);

        //TODO: Handle Import Depending on JSON Versions
        //dd($json_object);
        foreach($json_object->categories as $category)
        {
            //Check if a category exists with the same name
            if(StoreCategory::where('require_plugin',$category->require_plugin)->count() > 0)
            {
                $ex_cats = StoreCategory::where('require_plugin',$category->require_plugin)->get();
                foreach($ex_cats as $ex_cat)
                {
                    $ex_cat->delete();
                }
            }

            //Delete the existing category

            // Save a new Category
            $cat = new StoreCategory((array) $category);
            $cat->save();

            //Save the Items
            foreach($category->items as $item)
            {
                //Convert the attrs into the json sting
                $item->attrs = json_encode($item->attrs);
                $item->category_id = $cat->id;
                //Create the item
                $itm = new StoreItem((array) $item);
                $itm->save();
            }
        }


        return redirect()->route('webpanel.store.tools.index');
    }


    /**
     * Shows the items / categories that will be exported
     */
    public function verifyExport()
    {

    }

    private function getUploadString($extension)
    {
        $unique = false;
        $fileName = "";
        while($unique == false)
        {
            $fileName = rand(111111,999999);
            if(!Storage::exists($fileName.".".$extension))
                $unique = true;
        }
        return $fileName.".".$extension;
    }
}
