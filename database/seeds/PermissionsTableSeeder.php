<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        Permission::create([
            'name'         => 'Navegar Usuarios',
            'slug'         => 'users.index',
            'description'  => 'Lista y Navega Todos los Usuarios',
  
          ]);
            Permission::create([
              'name'         => 'Ver detalle de Usuarios',
              'slug'         => 'users.show',
              'description'  => 'ver detalle de Usuarios',
    
            ]);
            Permission::create([
              'name'         => 'Edicion de Usuarios',
              'slug'         => 'users.edit',
              'description'  => 'Edita Todos los Usuarios',
    
            ]);
            Permission::create([
              'name'         => 'Eliminar Usuario',
              'slug'         => 'users.destroy',
              'description'  => 'elimina Usuarios',
    
            ]);
  
          // Roles
          Permission::create([
              'name'         => 'Navegar rol',
              'slug'         => 'roles.index',
              'description'  => 'Lista y Navega Todos los roles',
    
            ]);
              Permission::create([
                'name'         => 'Ver detalle de rol',
                'slug'         => 'roles.show',
                'description'  => 'ver detalle de rol',
      
              ]);
              Permission::create([
                  'name'         => 'Crear de rol',
                  'slug'         => 'roles.create',
                  'description'  => 'Crear rol',
        
                ]);
              Permission::create([
                'name'         => 'Edicion de rol',
                'slug'         => 'roles.edit',
                'description'  => 'Edita Todos los roles',
      
              ]);
              Permission::create([
                'name'         => 'Eliminar rol',
                'slug'         => 'roles.destroy',
                'description'  => 'elimina rol',
      
              ]);
              // Productos
          Permission::create([
              'name'         => 'Navegar productos',
              'slug'         => 'products.index',
              'description'  => 'Lista y Navega Todos los productos',
    
            ]);
              Permission::create([
                'name'         => 'Ver detalle de productos',
                'slug'         => 'products.show',
                'description'  => 'ver detalle de productos',
      
              ]);
              Permission::create([
                  'name'         => 'Crear de productos',
                  'slug'         => 'products.create',
                  'description'  => 'Crear productos',
        
                ]);
              Permission::create([
                'name'         => 'Edicion de productos',
                'slug'         => 'products.edit',
                'description'  => 'Edita Todos los productos',
      
              ]);
              Permission::create([
                'name'         => 'Eliminar productos',
                'slug'         => 'products.destroy',
                'description'  => 'elimina productos',
      
              ]);
    }
}
