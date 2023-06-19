<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\V1\Controller;
use App\Http\Resources\V1\ExpensesIndexResource;
use App\Http\Resources\V1\ExpensesShowResource;
use App\Http\Resources\V1\ExpensesActionsResource;
use App\Http\Requests\V1\Expenses\CreateRequest;
use App\Http\Requests\V1\Expenses\UpdateRequest;
use Illuminate\Http\Response as ResponseHttp;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\V1\UserController as User;
use App\Notifications\ExpenseCreate;
use Illuminate\Http\Response;

class ExpensesController extends Controller
{
    public function index(): ExpensesIndexResource
    {
        return new ExpensesIndexResource($this->business->index());
    }

    public function show(string $id): ExpensesShowResource
    {
        $this->authorizeRequest($id);
        $expense = $this->business->show($id);
        return new ExpensesShowResource($expense);
    }

    public function store(CreateRequest $request): ExpensesActionsResource
    {
        $this->authorizeDataRequest($request->userId);
        if ($this->business->create($request)) {
            $this->sendEmailCreate($request);
            return new ExpensesActionsResource(["message" => 'Insert success', "statusCode" => ResponseHttp::HTTP_OK]);
        }
        return new ExpensesActionsResource(["message" => 'Insert error', "statusCode" => ResponseHttp::HTTP_BAD_REQUEST]);
    }

    public function update(UpdateRequest $request, string $id): ExpensesActionsResource
    {
        $this->authorizeRequest($id);
        $this->authorizeDataRequest($request->userId);
        if ($this->business->update($request, $id)) {
            return new ExpensesActionsResource(["message" => 'Update success', "statusCode" => ResponseHttp::HTTP_OK]);
        }
        return new ExpensesActionsResource(["message" => 'Update error', "statusCode" => ResponseHttp::HTTP_BAD_REQUEST]);
    }

    public function destroy(string $id): ExpensesActionsResource
    {
        $this->authorizeRequest($id);
        if ($this->business->delete($id)) {
            return new ExpensesActionsResource(["message" => 'Delete success', "statusCode" => ResponseHttp::HTTP_OK]);
        }
        return new ExpensesActionsResource(["message" => 'Delete error', "statusCode" => ResponseHttp::HTTP_BAD_REQUEST]);
    }

    public function authorizeRequest(string $id): void
    {
        $expense = $this->business->show($id);
        $this->authorize('actionExpenses', $expense);
    }

    public function authorizeDataRequest(int $id): void
    {
        if (Auth::guard('api')->user()->id != $id) {
            abort(ResponseHttp::HTTP_UNAUTHORIZED, 'O userId passado para a ação não corresponde com o userId que foi autenticado.');
        }
    }

    public function sendEmailCreate(CreateRequest $request): void
    {
        try{
            $user = (new User())->show(Auth::guard('api')->user()->id);
            $user->notify(new ExpenseCreate($request));
        }catch (\Exception $ex){
            abort(Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
        
    }
}
