function preguntar(valor)
{
      Swal.fire({
      title: 'Mensaje',
      text: '¿Desea borrar el registro?, con número de documento '+valor,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, borrarlo!',
      cancelButtonText: 'Cancelar'     
      }).then((result) => {
      if (result.value) {
        Swal.fire(
          '!Registro borrado!',
          'Click, el botón Ok, para cerrar',
          'success'
        )
      }
     });   
}
