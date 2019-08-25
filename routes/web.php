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

Auth::routes();

Route::get('/admin', 'AdminController@dashbord')->middleware('is_admin');
Route::post('authentificate', 'LoginController@authenticate');
Route::put('editPassword','LoginController@editPassword');

Route::get('/', 'ActualiteController@index');
Route::get('/home', 'ActualiteController@index');
Route::get('/actualite/{id}', 'ActualiteController@show');

Route::get('/bureau', 'BureauMemberController@index');
Route::get('/organisation', 'BureauMemberController@organisation');
Route::get('/departement/{id}', 'DepartementController@show');
Route::get('/statut', 'HomeController@statut');
Route::get('/contact','ContactController@create');
Route::post('/contact', 'ContactController@store');
Route::get('/adherent', 'AdherentController@create');
Route::get('/termes_adhesion', 'HomeController@termeAdhesion');

Route::post('/adherent', 'AdherentController@store');
Route::get('/partenaire', 'PartenaireController@create');
Route::get('/termes_partenariat', 'HomeController@termeAdhesion');
Route::post('/partenaire', 'PartenaireController@store');
Route::get('activites/{id}','ActiviteController@showActivite');
Route::post('activites/participer','ParticipationController@store');

Route::get('/compte','UserController@redirectToCompte')->middleware('is_user');
Route::put('adherent/editInfo','AdherentController@edit')->middleware('is_user');
Route::put('partenaire/editInfo','PartenaireController@edit')->middleware('is_user');




Route::get('admin/compte','AdminController@admin')->middleware('is_admin');
Route::put('admin/compte','AdminController@edit')->middleware('is_admin');
Route::get('admin/activites','ActiviteController@index')->middleware('is_admin');
Route::post('activite','ActiviteController@store')->middleware('is_admin');
Route::post('categorie','CategorieController@store')->middleware('is_admin');
Route::post('activite/find','ActiviteController@findByCriteria')->middleware('is_admin');
Route::put('activite/update','ActiviteController@update')->middleware('is_admin');
Route::delete('activites/{id}','ActiviteController@destroy')->middleware('is_admin');
Route::get('activite/{id}','ActiviteController@show')->middleware('is_admin');
Route::get('admin/activites/rest','ActiviteController@findDeleted')->middleware('is_admin');
Route::get('admin/activites/images','ActiviteController@loadActivites')->middleware('is_admin');
Route::post('/admin/activites/photos','ActiviteImageController@findByActivite')->middleware('is_admin');
Route::post('/admin/activites/photos/create','ActiviteImageController@store')->middleware('is_admin');
Route::delete('/admin/activites/photos/{id}','ActiviteImageController@destroy')->middleware('is_admin');

Route::put('admin/activites/rest','ActiviteController@rest')->name('rest')->middleware('is_admin');

Route::get('admin/actualites/{id}','ActualiteController@get')->middleware('is_admin');
Route::get('admin/actualites','ActualiteController@list')->middleware('is_admin');
Route::post('admin/actualites','ActualiteController@store')->middleware('is_admin');
Route::delete('admin/actualites/{id}','ActualiteController@destroy')->middleware('is_admin');

Route::get('admin/adherents','AdherentController@list')->middleware('is_admin');
Route::post('admin/adherents','AdherentController@findByCriteria')->middleware('is_admin');
Route::delete('admin/adherents/{id}','AdherentController@destroy')->middleware('is_admin');
Route::get('admin/adherents/approuver','AdherentController@loadNonApprouve')->middleware('is_admin');
Route::put('admin/adherents/approuver','AdherentController@approuver')->name('approuveAdherent')->middleware('is_admin');
Route::delete('admin/adherents/approuver/{id}','AdherentController@forceDestroy')->name('deleteDemande')->middleware('is_admin');
Route::put('admin/adherents/affecter','AdherentController@affecter')->name('affecter')->middleware('is_admin');
Route::post('admin/adherents','AdherentController@findByCriteria')->middleware('is_admin');
Route::get('admin/membrebureau','BureauMemberController@list')->middleware('is_admin');
Route::post('admin/membrebureau','BureauMemberController@store')->middleware('is_admin');
Route::get('admin/membrebureau/find','BureauMemberController@find')->middleware('is_admin');
Route::delete('admin/membrebureau/{id}','BureauMemberController@destroy')->middleware('is_admin');
Route::delete('admin/formejuridique/{id}','FormeJuridiqueController@destroy')->middleware('is_admin');
Route::get('admin/formejuridique','FormeJuridiqueController@index')->middleware('is_admin');
Route::post('admin/formejuridique','FormeJuridiqueController@store')->middleware('is_admin');



Route::get('admin/partenaires','PartenaireController@list')->middleware('is_admin');
Route::post('admin/partenaires','PartenaireController@findByCriteria')->middleware('is_admin');
Route::delete('admin/partenaires/{id}','PartenaireController@destroy')->middleware('is_admin');
Route::get('admin/partenaires/approuver','PartenaireController@loadNonApprouve')->middleware('is_admin');
Route::put('admin/partenaires/approuver','PartenaireController@approuver')->name('approuvePartenaire')->middleware('is_admin');
Route::delete('admin/partenaires/approuver/{id}','PartenaireController@forceDestroy')->name('deleteDemandePartenaire')->middleware('is_admin');

Route::get('admin/departements/{id}','DepartementController@getDepartement')->middleware('is_admin');
Route::get('admin/departements','DepartementController@index')->middleware('is_admin');
Route::put('admin/departements','DepartementController@edit')->middleware('is_admin');
Route::post('admin/departements','DepartementController@store')->middleware('is_admin');
Route::delete('admin/departements/{id}','DepartementController@destroy')->middleware('is_admin');

Route::get('admin/messages','ContactController@list')->middleware('is_admin');
Route::Post('admin/messages','ContactController@findByDateMinMax')->middleware('is_admin');
Route::delete('admin/messages/{id}','ContactController@destroy')->middleware('is_admin');


Route::get('admin/revisions','RevisionController@index')->middleware('is_admin');;
Route::post('admin/revisions','RevisionController@findHistory')->middleware('is_admin');;
