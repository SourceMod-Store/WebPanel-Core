<?php

use App\User;
use App\Models\StoreCategory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreCategoryTest extends TestCase
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
    public function create_category_and_check_if_exists()
    {
        //Delete category if already exists
        $this->delete_category_if_exists();

        //Login with the admin user
        $this->login_with_admin_user();

        //Go to the create page and verify it
        $this->visit('/webpanel/store/categories/create')->see('Create a new Category');

        //Fill out the form
        $this->type('Int Test Cat', 'display_name');
        $this->type('Integration Test Category', 'description');
        $this->type('Integration_test', 'require_plugin');
        $this->type('Integration Test Web Category', 'web_description');
        $this->type('#3751d5', 'web_color');
        $this->press('Create Category');

        $this->see("Int Test Cat"); //Check for the display name
        $this->see('integration_test'); // Check for the Requrie-Plugin

        //Get the ID of the Category
        $category_id = $this->get_category_id();

        //Visit the Edit page
        $this->press('Edit ' . $category_id);
        $this->see("Int Test Cat"); //Check for the display name
        $this->see('integration_test'); // Check for the Requrie-Plugin
        $this->see('Integration Test Category'); //Check for the description

        //Make a Edit and Save
        $this->type('integration_test_2', 'require_plugin');
        $this->press('Edit Category');

        //Confirm the edit
        $this->see('integration_test_2');

        //Delete the category
        $this->press('Remove ' . $category_id);

        //Confirm that its deleted
        $this->assertNull(StoreCategory::where('display_name', 'test')->first());
    }

    private function get_category_id()
    {
        $category = StoreCategory::where('display_name', 'test')->first();
        return $category->id;
    }

    private function delete_category_if_exists()
    {
        $category = StoreCategory::where('display_name', 'test');

        if ($category != null) {
            $category->delete();
        }
    }

    private function login_with_admin_user()
    {
        $admin = User::where('name', 'admin')->first();
        $this->actingAs($admin);
    }

}