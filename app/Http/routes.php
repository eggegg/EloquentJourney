<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Database\Schema\Blueprint;

Route::get('/', function () {
    return view('welcome');
});

Route::get('create_books_table', function(){

	Schema::create('books', function(Blueprint $table){

		$table->increments('id');
		$table->string('title', 30);
		$table->integer('page_count');
		$table->decimal('price', 5, 2);
		$table->text('description');
		$table->timestamps();

	});

});

Route::get('update_books_table', function(){

	Schema::table('books', function(Blueprint $table){

		$table->string('title', 250)->change();
	});

});

Route::get('update_books_table_2', function(){

	Schema::create('authors', function(Blueprint $table){
		$table->increments('id');
		$table->string('first_name');
		$table->string('last_name');
		$table->timestamps();
	});

	Schema::table('books', function(Blueprint $table){
		$table->index('title');

		$table->integer('author_id')->unsigned();
		$table->foreign('author_id')->references('id')->on('authors');
	});

});





