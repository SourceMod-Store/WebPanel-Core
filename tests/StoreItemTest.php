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
        $this->visit('/webpanel/store/categories')->see('All Categories');
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
        $this->type('test-cat', 'category_id');

        $this->press('Create Item');

        $this->see('test-itm'); //Check for the name
        $this->see('integration_test'); // Check for the type


        //Get the ID of the Item
        $item_id = $this->get_item_id();


        //Visit the Edit page
        $this->press('Edit ' . $item_id);
        $this->see("test-itm"); //Check for the name
        $this->see("integration_slot"); //Check for the loadout slot

        //Make a Edit and Save
        $this->type('integration_test_2', 'type'); //Change the type
        $this->press('Edit Category');

        //Confirm the edit
        $this->see('integration_test_2'); //Verify the changed type

        //Delete the category
        $this->press('Remove ' . $item_id);

        //Confirm that its deleted
        $this->assertNull(StoreItem::where('name', 'test-itm')->first());
    }




    private function get_item_id()
    {
        $item = StoreItem::where('name', 'test-itm')->first();
        return $item->id;
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
        $category = StoreCategory::where('name', 'test-cat')->first();

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

    private function login_with_admin_user()
    {
        $admin = User::where('name', 'admin')->first();
        $this->actingAs($admin);
    }

}