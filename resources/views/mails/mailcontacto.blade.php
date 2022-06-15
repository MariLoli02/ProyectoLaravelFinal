@component('mail::message')
    # Mensaje del formulario de contacto

     Nombre: {{$datos['nombre']}}
     Apellidos: {{$datos['apellidos']}}

     Mensaje:  
    
    {{$datos['mensaje']}}
@endcomponent