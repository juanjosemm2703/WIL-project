<?php

use App\Models\User;
use App\Models\Partner;
use App\Models\Project;
use Tests\TestCase;

class CreateProjectTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create([
            'user_type' => 'Industry Partner',
        ]);

        $partner = Partner::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);
    }

    /**
     * Test project creation and successful store.
     */
    public function test_project_store(): void
    {
        
        $response = $this->call('POST', '/project', [
            'title' => 'This is the project created for testing',
            'students' => 3,
            'description' => 'This is the description for a project created for testing.',
            'year' => 2025,
            'trimestre' => 2,
        ]);

        // Assert that the response status is a redirect
        $response->assertStatus(302);

        // Assert that the project data is stored in the database
        $this->assertDatabaseHas('projects', [
            'title' => 'This is the project created for testing',
            'students_needed' => 3,
            'description' => 'This is the description for a project created for testing.',
            'year' => 2025,
            'trimestre' => 2,
        ]);

        
        $project = Project::where('title', 'This is the project created for testing')->first();

        // Assert that the response redirects to the project's show route
        $response->assertRedirect(route('project.show', ['id' => $project->id]));
    }

    /**
     * Test project creation with validation failure.
     */
    public function test_project_store_fail_validation(): void
    {
        
        $response = $this->call('POST', '/project', [
            'title' => 'Thi',
            'students' => 8,
            'description' => 'This is',
            'year' => "hola",
            'trimestre' => 5,
        ]);

        // Assert that the response indicates validation failure for specific fields
        $response->assertInvalid(['title', 'students', 'description', 'year', 'trimestre']);
    }

    /**
     * Test project creation with a duplicate project title.
     */
    public function test_project_store_fail_same_name(): void
    {
       
        $this->call('POST', '/project', [
            'title' => 'This is the project created for testing',
            'students' => 3,
            'description' => 'This is the description for a project created for testing.',
            'year' => 2025,
            'trimestre' => 2,
        ]);

       
        $response = $this->call('POST', '/project', [
            'title' => 'This is the project created for testing',
            'students' => 3,
            'description' => 'This is the description for a project created for testing.',
            'year' => 2025,
            'trimestre' => 2,
        ]);

        // Assert that the response indicates validation failure for the title field with a custom error message
        $response->assertInvalid(['title' => 'The title must be different']);
    }
}
