<!--Método do Controller	Método Esperado na Policy/Gate
index()	                viewAny
show()	                view
create()	            create
store()	                create
edit()	                update
update()	            update
destroy()	            delete-->

return [
'permissions' => [
'viewAny' => ['comum', 'admin'],
'view'    => ['comum', 'admin'],
'create'  => ['admin'],
'update'  => ['admin'],
'delete'  => ['admin'],
],
];
