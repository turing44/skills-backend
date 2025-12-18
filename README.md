# Dudas

1. Estoy creando para las relaciones N:M una tabla intermedia que represento como un modelo
<br>
Por ejemplo inscripciones bailes: creo un Model llamado InscripcionBaile. Hay una forma alternativa usando la funcion attach() pero creo que es mejor hacerlo asi. Como lo haces tu?

2. Comprueba que estoy nombrando bien los endpoint

3. Dame tu opinión sobre el AuthController y el RolMiddleware

4. Esto es correcto o deberia manejarlo el CiudadanoController?
    ```php
    Route::post('/bailes/{baile}/inscripciones', [BaileController::class, 'inscribirse']);
    ```






