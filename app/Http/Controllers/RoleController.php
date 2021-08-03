<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
 * * Controlador encargado del crud y retorno de consultas en la BD sobre la entidad Roles
 * como asi tambien sus entidades relacionadas

 *@method Role store(Request $id)
 *@method Role update(Request $role, int $id)
 *@method Role void destroy (int $id)
 */


   /**
     * Mostrar una lista del recurso.
     * Metodo llamado a traves de una peticion que retorna la vista roles.index

     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $roles = Role::paginate();

        return view('roles.index', compact ('roles'));
    }

     /**
     * Muestre el formulario para crear un nuevo recurso.
     * Metodo llamado a traves de una peticion que retorna la vista roles.create

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view ('roles.create', compact('permissions'));
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());

        // actualizar PERMISOS
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit', $role->id)
         ->with('info', 'Role guardado!!');

    }

   /**
     * Mostrar una lista del recurso.
     * Metodo llamado a traves de una peticion que retorna la vista roles.show
     * @param  \App\Role  $role

     * @return \Illuminate\Http\Response
     */

     
    public function show(Role $role)
    {
         return view ('roles.show', compact ('role'));

    }

  
     /**
     * Mostrar una lista del recurso.
     * Metodo llamado a traves de una peticion que retorna la vista roles.edit
     * @param  \App\Role  $role

     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view ('roles.edit', compact ('role', 'permissions'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $role
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response  Role actualizado!!
     */
    public function update(Request $request, Role $role)
    {
       //ACTUALIZA ROLE      
        $role->update($request->all());

        // actualizar PERMISOS
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit', $role->id)
         ->with('info', 'Role actualizado!!');
    }

  /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response  Role eliminado
     */
    public function destroy(Role $role)
    {
        $role->delete();
        
        return back()->with('info', 'Role eliminado');
    }
}
