<div class="form-group">
           
      {!!Form::token()!!}
      {!!Form::label('name', 'Nombre: ')!!}
      {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre aqui'])!!}

      {!!Form::label('email', 'Email: ')!!}
            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su Email aqui'])!!}

      {!!Form::label('password', 'Password: ')!!}
      {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su Email aqui'])!!}

      <br>

      {!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}

</div>