<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response as HttpResponse;
use Tests\TestCase;
use App\Models\V1\Expenses;

class ExpensesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_update_updates_existing_expense_and_returns_expenses_actions_resource()
    {
        $expense = Expenses::factory()->create();
        $requestData = [
            'amount' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence,
        ];

        $response = $this->putJson('/api/expenses/' . $expense->id, $requestData);
        $response->assertStatus(HttpResponse::HTTP_OK);
        $response->assertJsonStructure(['data']);
        $response->assertJson(['message' => 'Update success', 'statusCode' => HttpResponse::HTTP_OK]);
        $this->assertDatabaseHas('expenses', $requestData);
    }

    public function test_destroy_deletes_existing_expense_and_returns_expenses_actions_resource()
    {
        $expense = Expenses::factory()->create();
        $response = $this->deleteJson('/api/expenses/' . $expense->id);

        $response->assertStatus(HttpResponse::HTTP_OK);
        $response->assertJsonStructure(['data']);
        $response->assertJson(['message' => 'Delete success', 'statusCode' => HttpResponse::HTTP_OK]);

        $this->assertEquals('expenses', ['id' => $expense->id]);
    }

    public function test_authorize_request_throws_authorization_exception()
    {
        $expense = Expenses::factory()->create();
        $controller = new \App\Http\Controllers\V1\ExpensesController();

        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $controller->authorizeRequest($expense->id);
    }

    public function test_authorize_data_request_throws_http_exception_with_invalid_user_id()
    {
        $controller = new \App\Http\Controllers\V1\ExpensesController();

        $this->expectException(\Symfony\Component\HttpKernel\Exception\HttpException::class);
        $controller->authorizeDataRequest(123);
    }
}
