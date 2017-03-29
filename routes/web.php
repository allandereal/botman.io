<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use Webuni\CommonMark\TableExtension\TableExtension;

/**
 * Convert some text to Markdown...
 */
if (!function_exists('markdown')) {
    function markdown($text)
    {
        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new TableExtension());

        $converter = new Converter(new DocParser($environment), new HtmlRenderer($environment));

        return $converter->convertToHtml($text);
    }
}
Route::get('/', 'DocumentationController@show');
Route::get('/{version}/', 'DocumentationController@show');
Route::get('/{version}/{page}', 'DocumentationController@show');
