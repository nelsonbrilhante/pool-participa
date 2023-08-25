<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the options.
     */
    public function index()
    {
        $options = Option::all();
        return view('options.index', compact('options'));
    }

    /**
     * Display the specified option.
     */
    public function show(Option $option)
    {
        return view('options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified option.
     */
    public function edit(Option $option)
    {
        return view('options.edit', compact('option'));
    }

    /**
     * Update the specified option in storage.
     */
    public function update(Request $request, Option $option)
    {
        $option->update($request->all());
        return redirect()->route('options.index')->with('success', 'Proposta atualizada com sucesso.');
    }

    /**
     * Remove the specified option from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('options.index')->with('success', 'Proposta eliminada com sucesso.');
    }

    /**
     * Show the form for confirming the deletion of the specified option.
     */
    public function delete(Option $option)
    {
        return view('options.delete', compact('option'));
    }
}
