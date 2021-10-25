<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'SuperAdmin']);
        $role2 = Role::create(['name' => 'RolSinPermisos']);

        //Permiso para ver vista principal
        Permission::create(['name' => 'admin.home',
        'descripcion' => 'Ver vista principal del sistema'])->syncRoles($role1, $role2);

        //Permisos para solo de Super usuario
        Permission::create(['name' => 'admin.users.index',
                        'descripcion' => 'Ver listado de usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.edit',
                        'descripcion' => 'Asignar un rol'])->syncRoles([$role1]);
        //Permisos de productos cafetería
        Permission::create(['name' => 'admin.productos.index',
                    'descripcion' => 'Ver listado de productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.create',
                    'descripcion' => 'Crear nuevos productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.show',
                    'descripcion' => 'Ver detalle productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.edit',
                    'descripcion' => 'Editar productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.destroy',
                    'descripcion' => 'Eliminar productos cafetería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.pdf',
                    'descripcion' => 'Generar PDF´s cafetería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.excel',
                    'descripcion' => 'Generar EXCEL´s cafetería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.operaciones',
                    'descripcion' => 'Realizar operaciones entradas/salidas de productos cafetería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.inactivo',
                    'descripcion' => 'Lista de todos los productos inactivos cafetería'])->syncRoles([$role1]);

        //Permisos de tipo de productos cafetería
        Permission::create(['name' => 'admin.tipoproductos.index',
                            'descripcion' => 'Ver listado tipo productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tipoproductos.create',
                            'descripcion' => 'Crear tipo productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tipoproductos.show',
                            'descripcion' => 'Ver detalle tipo productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tipoproductos.edit',
                            'descripcion' => 'Editar tipo productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tipoproductos.destroy',
                            'descripcion' => 'Eliminar tipo productos cafetería'])->syncRoles([$role1]);

        //Permisos entradas de productos cafetería
        Permission::create(['name' => 'admin.entradas.index',
                            'descripcion' => 'Ver listado de todas las entradas de producto cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.entradas.create',
                            'descripcion' => 'Crear nuevas entradas de productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.entradas.show',
                            'descripcion' => 'Ver detalle entradas de productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.entradas.edit',
                            'descripcion' => 'Editar entradas de productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.entradas.destroy',
                            'descripcion' => 'Eliminar entradas de productos cafetería'])->syncRoles([$role1]);

        //Permisos salidas de productos cafetería
        Permission::create(['name' => 'admin.salidas.index',
                            'descripcion' => 'Ver listado de todas las salidas de productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salidas.create',
                            'descripcion' => 'Crear nuevas salidas de productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salidas.show',
                            'descripcion' => 'Ver detalle salidas de prouctos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salidas.edit',
                            'descripcion' => 'Editar salidas de productos cafetería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salidas.destroy',
                            'descripcion' => 'Eliminar salidas de productos cafetería'])->syncRoles([$role1]);
    
            //Permisos productos papelería 
        Permission::create(['name' => 'admin.papelerias.index',
                    'descripcion' => 'Lista de todos los productos papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.create',
                    'descripcion' => 'Crear nuevos productos papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.show',
                    'descripcion' => 'Ver detalle de productos papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.edit',
                    'descripcion' => 'Editar productos papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.destroy',
                    'descripcion' => 'Eliminar productos papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.pdf',
                    'descripcion' => 'Generar PDF´s papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.excel',
                    'descripcion' => 'Generar EXCEL´s papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.operaciones',
                    'descripcion' => 'Realizar operaciones entradas/salidas de productos papeleria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.papelerias.inactivo',
                    'descripcion' => 'Lista de todos los productos inactivos papeleria'])->syncRoles([$role1]);

        //Permisos de tipo de productos papelería
        Permission::create(['name' => 'admin.papeleriatipoproductos.index',
        'descripcion' => 'Listado tipo productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriatipoproductos.create',
        'descripcion' => 'Crear nuevos tipos de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriatipoproductos.show',
        'descripcion' => 'Ver detalle tipo de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriatipoproductos.edit',
        'descripcion' => 'Editar tipos de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriatipoproductos.destroy',
        'descripcion' => 'Eliminar tipos de productos papelería'])->syncRoles([$role1]);

        //Permisos entradas de productos papelería
        Permission::create(['name' => 'admin.papeleriaentradas.index',
        'descripcion' => 'Listado entradas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriaentradas.create',
        'descripcion' => 'Crear nuevas entradas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriaentradas.show',
        'descripcion' => 'Ver detalle entradas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriaentradas.edit',
        'descripcion' => 'Editar entradas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriaentradas.destroy',
        'descripcion' => 'Eliminar entradas de productos papelería'])->syncRoles([$role1]);

        //Permisos entradas de productos papelería
        Permission::create(['name' => 'admin.papeleriasalidas.index',
        'descripcion' => 'Listado salidas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriasalidas.create',
        'descripcion' => 'Crear nuevas salidas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriasalidas.show',
        'descripcion' => 'Ver detalle salidas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriasalidas.edit',
        'descripcion' => 'Editar salidas de productos papelería'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.papeleriasalidas.destroy',
        'descripcion' => 'Eliminar salidas de productos papelería'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.proveedores.index',
                    'descripcion' => 'Listado de proveedores productos cafetería'])->syncRoles([$role1]);
                    
        Permission::create(['name' => 'admin.proveedores.create',
        'descripcion' => 'Crear nuevos proveedores productos cafetería'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.proveedores.show',
                    'descripcion' => 'Ver datelle de proveedores productos cafetería'])->syncRoles([$role1]);
                    
        Permission::create(['name' => 'admin.proveedores.edit',
        'descripcion' => 'Editar proveedores productos cafetería'])->syncRoles([$role1]);

        
        Permission::create(['name' => 'admin.proveedores.destroy',
                    'descripcion' => 'Eliminar de proveedores productos cafetería'])->syncRoles([$role1]);


    }
}
