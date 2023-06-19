<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\V1\ExpensesController;
use App\Http\Requests\V1\Expenses\CreateRequest;
use App\Http\Requests\V1\Expenses\UpdateRequest;
use App\Http\Resources\V1\ExpensesIndexResource;
use App\Http\Resources\V1\ExpensesShowResource;
use App\Http\Resources\V1\ExpensesActionsResource;
use Illuminate\Http\Response as ResponseHttp;



class ExpensesTest extends TestCase
{
    public function test_index_returns_expenses_index_resource()
    {
        $controller = new ExpensesController();
        $response = $controller->index();

        $this->assertInstanceOf(ExpensesIndexResource::class, $response);
    }

    public function test_show_returns_expenses_show_resource()
    {
        $controller = new ExpensesController();
        $expenseId = '123';
        $response = $controller->show($expenseId);

        $this->assertInstanceOf(ExpensesShowResource::class, $response);
    }

    public function test_store_returns_expenses_actions_resource_on_success()
    {
        $controller = new ExpensesController();
        $request = new CreateRequest();
        $request->merge([
            // completar
        ]);

        $response = $controller->store($request);

        $this->assertInstanceOf(ExpensesActionsResource::class, $response);
        $this->assertEquals(ResponseHttp::HTTP_OK, $response->resource['statusCode']);
        $this->assertEquals('Insert success', $response->resource['message']);
    }

    public function test_store_returns_expenses_actions_resource_on_error()
    {
        $controller = new ExpensesController();
        $request = new CreateRequest();
        $request->merge([
            // completar
        ]);

        $response = $controller->store($request);

        $this->assertInstanceOf(ExpensesActionsResource::class, $response);
        $this->assertEquals(ResponseHttp::HTTP_BAD_REQUEST, $response->resource['statusCode']);
        $this->assertEquals('Insert error', $response->resource['message']);
    }

    public function test_update_returns_expenses_actions_resource_on_success()
    {
        $controller = new ExpensesController();
        $request = new UpdateRequest();
        $expenseId = '123';
        $request->merge([
            // completar
        ]);

        $response = $controller->update($request, $expenseId);

        $this->assertInstanceOf(ExpensesActionsResource::class, $response);
        $this->assertEquals(ResponseHttp::HTTP_OK, $response->resource['statusCode']);
        $this->assertEquals('Update success', $response->resource['message']);
    }

    public function test_update_returns_expenses_actions_resource_on_error()
    {
        $controller = new ExpensesController();
        $request = new UpdateRequest();
        $expenseId = '123';
        $request->merge([
            // completar
        ]);

        $response = $controller->update($request, $expenseId);

        $this->assertInstanceOf(ExpensesActionsResource::class, $response);
        $this->assertEquals(ResponseHttp::HTTP_BAD_REQUEST, $response->resource['statusCode']);
        $this->assertEquals('Update error', $response->resource['message']);
    }

    public function test_destroy_returns_expenses_actions_resource_on_success()
    {
        $controller = new ExpensesController();
        $expenseId = '123';
        $response = $controller->destroy($expenseId);

        $this->assertInstanceOf(ExpensesActionsResource::class, $response);
        $this->assertEquals(ResponseHttp::HTTP_OK, $response->resource['statusCode']);
        $this->assertEquals('Delete success', $response->resource['message']);
    }

    public function test_destroy_returns_expenses_actions_resource_on_error()
    {
        $controller = new ExpensesController();
        $expenseId = '123';

        $response = $controller->destroy($expenseId);

        $this->assertInstanceOf(ExpensesActionsResource::class, $response);
        $this->assertEquals(ResponseHttp::HTTP_BAD_REQUEST, $response->resource['statusCode']);
        $this->assertEquals('Delete error', $response->resource['message']);
    }

    public function test_authorize_request()
    {
        $controller = new ExpensesController();
        $expenseId = '123';

        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $controller->authorizeRequest($expenseId);
    }

    public function test_authorize_data_request_with_valid_user_id()
    {
        $controller = new ExpensesController();
        $userId = 123;

        $controller->authorizeDataRequest($userId);

        $this->assertTrue(true);
    }
    public function test_authorize_data_request_with_invalid_user_id()
    {
        $controller = new ExpensesController();
        $userId = 123;

        $this->expectException(\Symfony\Component\HttpKernel\Exception\HttpException::class);
        $controller->authorizeDataRequest($userId);
    }

    public function test_send_email_create()
    {
        $controller = new ExpensesController();
        $request = new CreateRequest();

        $controller->sendEmailCreate($request);

        $this->assertTrue(true);
    }
}
