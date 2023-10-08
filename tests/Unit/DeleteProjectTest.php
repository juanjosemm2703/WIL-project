<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Application;
use App\Models\Partner;
use App\Models\Student;
use App\Models\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class DeleteProjectTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test project deletion.
     */
    public function test_project_delete(): void
    {
        // Create an Industry Partner user
        $userPartner = User::factory()->create([
            'user_type' => 'Industry Partner',
        ]);

        $partner = Partner::factory()->create(['user_id' => $userPartner->id]);
        $this->actingAs($userPartner);

        // Create a project for testing
        $response = $this->call('POST', '/project', [
            'title' => 'This is the project created for testing',
            'students' => 3,
            'description' => 'This is the description for a project created for testing.',
            'year' => 2025,
            'trimestre' => 2,
        ]);

        // Assert that the project is created successfully
        $response->assertStatus(302);
        $this->assertDatabaseHas('projects', [
            'title' => 'This is the project created for testing',
            'students_needed' => 3,
            'description' => 'This is the description for a project created for testing.',
            'year' => 2025,
            'trimestre' => 2,
        ]);

        
        $project = Project::where('title', 'This is the project created for testing')->first();
        
        
        $response = $this->call('DELETE', "/project/$project->id");

        // Assert that the project is deleted from the database
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    /**
     * Test project deletion failure when students are applied.
     */
    public function test_project_delete_fail(): void
    {
        // Create an Industry Partner user
        $userPartner = User::factory()->create([
            'user_type' => 'Industry Partner',
        ]);
        $partner = Partner::factory()->create(['user_id' => $userPartner->id]);
        $this->actingAs($userPartner);

        // Create a project for testing
        $response = $this->call('POST', '/project', [
            'title' => 'This is the project created for testing',
            'students' => 3,
            'description' => 'This is the description for a project created for testing.',
            'year' => 2025,
            'trimestre' => 2,
        ]);
        $project = Project::where('title', 'This is the project created for testing')->first();

        // Create a Student user
        $userStudent = User::factory()->create([
            'user_type' => 'Student',
        ]);
        $student = Student::factory()->create(['user_id' => $userStudent->id]);
        $this->actingAs($userStudent);

       
        $application = Application::factory()->create([
            'student_id' => $student->user_id,
            'project_id' => $project->id,
        ]);
       
        
        $this->actingAs($userPartner);

        $response = $this->call('DELETE', "/project/$project->id");
        // Assert that the response indicates deletion failure due to students applied
        $response->assertInvalid(['application' => 'Project has students applied']);
    }
}
