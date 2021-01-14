# crear un factory laravel 8

$cart = App\Models\Cart::factory()->create();

# crear un factory en laravel 7

$cart = factory(App\Cart::class)->create();

# EJERCICIOS DE FACTORY EN TINKER

Creando una orden
$order = App\Models\Order::factory()->create();

Creando un pago a la orden
$payment = App\Models\Payment::factory()->create(['order_id' => $order->id]);

Accediendo al pago asosicado a la orden
$order->payment;

Accediendo a la orden asosicado al pago
$payment->order;

# CREANDO INSTANCIA DEL USUARIO

$user = App\Models\User::factory()->create();

# CREANDO INSTANCIA DE ORDERS

$order = App\Models\Order::factory()->create(['customer_id' => $user->id]);

# MOSTRANDO LA ORDEN DEL USUARIO CREADO

$user->orders;

# CREAR UNA ORDEN A TRAVES DE LA RELACION

$user->orders()->save(App\Models\Order::factory()->make());

# AGREGAR PRODUCTOS A UNA ORDEN O UN CARRITO

# creando u obteninedo el usuario

$user = App\Models\User::find(1);+

# Creando una orden

$order = App\Models\Order::factory()->create(['customer_id' => $user->id]);

# Creando un carrito

$cart = App\Models\Cart::create();

# Obteniendo primer producto

$product = App\Models\Product::find(1);

# Anexar productos a las ordenes

$order->products()->attach([1 => ['quantity' => 8], 2 => ['quantity' => 15], 3 => ['quantity' => 4],4 => ['quantity' => 12], 5 => ['quantity' => 20]]);

# Referscamos el valor de la orden

$order = $order->fresh();

# Obtenemos los productos de la orden

$order->products;

# REALACIONES A TRAVES DE RELACIONES

Similar a las inner join en SQL

-   Obtenemos el usuario: $user = App\Models\User::find(1);

-   Verificamos que el usuario tenga pagos: $user->payments;

-   Creamos orden
    $order = $user->orders()->save(App\Models\Order::factory()->make());

-   Verficando que el usuario tenga la ordenes asociadas
    $user->orders;

-   Verificando los pagos de la orden
    $order->payment;

-   Obteninedo la primera orden asociada al usuario
    $order = $user->orders->first();

-   Verficando si la orden consultada tiene pago realizado: $order->payment;

-   Creando un pago para la orden
    $payment = $order->payment()->save(App\Models\Payment::factory()->make());

-   Refrescando la información de user para poder acceder a la información de los pagos
    $user = $user->fresh();

-   Accediendo a los pagos del usuario
    $user->payments;

-   Ver ordenes de usuario
    $user->orders;

-   Accediendo al id 2 de las ordenes del usuario
    $order = $user->orders()->find(2);

-   La orden 2 no tiene pago por lo que se procede a crear uno
    $order->payment;

-   Creando pago para la orden 2
    $payment = $order->payment()->save(App\Models\Payment::factory()->make());

-   Refrescando la información del usuario: $user->fresh();

-   Ver los pagos del usuario de las ordenes
    $user->payments;

# RELACIONES POLIMORFICAS

Agregan automaticamente para el intermedio de una tabla

# ASIGNANDO UNA IMAGEN A UN USUARIO 

- Creo u obtengo una instancia del usuario: $user = App\Models\User::find(1);

- Asigno una imagen del usuario
$user->image()->save(App\Models\Image::factory()->make());

- Guardo en variable la imagen del usuario creada
$image = $user->image;

- Se veficia las imagenes que tiene asiginada
$image->imageable;

# RELACIONES DE UNO A MUCHOS
Un producto puede tener multiples imagenes

- Obteniendo un producto
$product = App\Models\Product::find(2);

- Asignando una imagen al producto
$product->images()->save(App\Models\Image::factory()->make());

- Busco la imagen insertada 
$image = App\Models\Image::find(2);

- Traemos el imageable
$image->imageable;

- Obteniendo las imagenes del producto
$product->images;

- Refrescando el producto para acceder a la colección
$product = $product->fresh();


# RELACIONES POLIMORFICAS MUCHOS A MUCHOS

