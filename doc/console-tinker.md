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

- Ver los pagos del usuario de las ordenes
$user->payments;


# RELACIONES POLIMORFICAS
Agregan 



