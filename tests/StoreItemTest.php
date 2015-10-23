<?php

use App\User;
use App\Models\StoreItem;
use App\Models\StoreCategory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreItemTest extends TestCase
{
    //use DatabaseMigrations;

    /** @test */
    public function check_if_overview_can_be_accessed()
    {
        //Login with the admin user
        $this->login_with_admin_user();

        //Check if overview can be accessed
        $this->visit('/webpanel/store/items')->see('All Items');
    }

    /** @test */
    public function create_item_and_check_if_exists()
    {
        //Delete category if already exists
        $this->delete_item_if_exists();

        //Create a test Category
        $this->create_category();

        //Login with the admin user
        $this->login_with_admin_user();

        //Go to the create page and verify it
        $this->visit('/webpanel/store/items/create')->see('Create a new Item');

        //Fill out the form
        $this->type('test-itm', 'name');
        $this->type('Test Itm', 'display_name');
        $this->type('Integration Test Item', 'description');
        $this->type('integration_test', 'type');
        $this->type('integration_slot', 'loadout_slot');
        $this->type('7669035', 'price');
        $this->type($this->get_category_id(), 'category_id');

        $this->press('Create Item');


        //Get the ID of the Item
        $item_id = $this->get_item_id();
        $this->assertNotNull($item_id); //Check that the item exists

        //TODO: Verify that the item is shown at the gui


        //Visit the Edit page
        $this->visit('/webpanel/store/items/'.$item_id.'/edit')->see('Edit Item test-itm');
        $this->see("test-itm"); //Check for the name
        $this->see("integration_slot"); //Check for the loadout slot

        //Make a Edit and Save
        $this->type('integration_test_2', 'type'); //Change the type
        $this->press('Edit Item');

        $this->visit('/webpanel/store/items/'.$item_id.'/edit')->see('Edit Item test-itm');

        //Confirm the edit
        $this->see('integration_test_2'); //Verify the changed type


        //TODO: Add a remove and a remove+refund button so the item can be deleted from the edit menu
        //Delete the category
        //$this->press('Remove ' . $item_id);

        //Confirm that its deleted
        //$this->assertNull(StoreItem::where('name', 'test-itm')->first());
    }




    private function get_item_id()
    {
        $item = StoreItem::where('name', 'test-itm')->first();
        if ($item != NULL)
        {
            return $item->id;
        }
        else
        {
            return NULL;
        }
    }

    private function delete_item_if_exists()
    {
        $item = StoreItem::where('name', 'test-itm');

        if ($item != null)
        {
            $item->delete();
        }
    }

    private function create_category()
    {
        $category = StoreCategory::where('display_name', 'test-cat')->first();

        if($category != null)
        {
            $category->delete();
        }

        $category = new StoreCategory();
        $category->priority = 5;
        $category->display_name = "test-cat";
        $category->description = "Cat for Itm Test";
        $category->require_plugin = "integration_test";
        $category->web_description = "Test Category for Item Test";
        $category->web_color = "#000000";
        $category->enable_server_restriction = 0;
        $category->save();
    }

    private function get_category_id()
    {
        $category = StoreCategory::where('display_name','test-cat')->first();
        return $category->id;
    }

    private function login_with_admin_user()
    {
        $admin = User::where('name', 'admin')->first();
        $this->actingAs($admin);
    }

}