<?php namespace App\Http\Controllers\WebPanel\Store;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

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
        $json_string = File::get($file);
        $json_object = json_decode($json_string);

        // **Perform some validation**
        //Check if the JSON is valid
        if($json_object !== null)
        {
            $json_valid = true;
        }
        else
        {
            $json_valid = false;
        }

        //Check if JSON Version is set
        if(isset($json_object->version))
        {
            $json_version = $json_object->version;
        }
        else
        {
            $json_version = 0;
        }

        //Check if the Type is set
        if(isset($json_object->type))
        {
            $json_type = $json_object->type;
        }
        else
        {
            $json_type = false;
        }

        if(isset($json_object->categories))
        {
            $categories_collection = Collection::make($json_object->categories);
        }
        else
        {
            $categories_collection = false;
        }

        // TODO: Check if anything gets deleted when importing this categorie

        // TODO: Check if there are categories with the same type



        // TODO: Forward the file to the next step OR Store and then delete the file
        // **Send the output to the user**
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.tools.verify_import',compact('json_valid', 'json_version', 'json_type', 'categories_collection'));
    }

    public function PerformImport(Requests\ImportRequest $request)
    {
        //TODO: Perform the actual import

        dd($request->file('import'));
    }


    /**
     * Shows the items / categories that will be exported
     */
    public function verifyExport()
    {

    }
}
